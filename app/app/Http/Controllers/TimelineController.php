<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\Candidate;
use App\Models\Step;

class TimelineController extends Controller
{
    public function index()
    {
        $timelines = Timeline::with(['recruiter', 'candidate', 'steps.statuses'])->get();
        return view('timelines.index', compact('timelines'));
    }

    public function show($id)
    {
        // Εύρεση ενός συγκεκριμένου timeline με βάση το ID
        $timeline = Timeline::findOrFail($id);
        return view('timelines.show', compact('timeline'));
    }

    public function edit(Timeline $timeline)
    {
        // Εδώ μπορείτε να υλοποιήσετε τη λογική για την επεξεργασία του timeline.
        return view('timelines.edit', compact('timeline'));
    }

    public function diagram(Timeline $timeline)
    {
        // Εδώ μπορείτε να υλοποιήσετε τη λογική για την επεξεργασία του timeline.
        return view('timelines.diagram', compact('timeline'));
    }

    public function create(Request $request)
    {
        $data = $request->only(['recruiter_name', 'recruiter_surname', 'candidate_name', 'candidate_surname']);

        // Δημιουργούμε το timeline
        $timeline = Timeline::create([
            'recruiter_name' => $data['recruiter_name'],
            'recruiter_surname' => $data['recruiter_surname'],
            'candidate_name' => $data['candidate_name'],
            'candidate_surname' => $data['candidate_surname'],
        ]);

        return view('timelines.timeline_success', compact('timeline'));

    }



    public function fetchTimeline($timeline_id)
    {
        // Εύρεση ενός συγκεκριμένου timeline με βάση το ID
        $timeline = Timeline::findOrFail($timeline_id);

        // Λήψη του Recruiter και του Candidate του Timeline
        $recruiter = $timeline->recruiter;
        $candidate = $timeline->candidate;

        // Λήψη όλων των βημάτων του timeline με τα τρέχοντα status
        $steps = Step::where('timeline_id', $timeline->id)->with('statuses')->get();

        // Επιστροφή των δεδομένων του timeline, των βημάτων, του Recruiter και του Candidate
        return response()->json(['timeline' => $timeline, 'steps' => $steps, 'recruiter' => $recruiter, 'candidate' => $candidate]);
    }
}
