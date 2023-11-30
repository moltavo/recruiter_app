<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;
use App\Models\Step;
use App\Models\Status;

class StepController extends Controller
{
        public function create (Request $request)
        {
            // Ελέγξτε αν το timeline υπάρχει
            $timeline = Timeline::findOrFail($request->input('timeline_id'));

            // Δημιουργία νέου Step
            $step = new Step();
            $step->timeline_id = $timeline->id;
            $step->category = $request->input('category');
            $step->status_category = $request->input('status_category');
            $step->save();

            return view('welcome');
        }

        public function update(Request $request)
        {
            $step = Step::findOrFail($request->input('id'));

            // Ενημέρωση των πεδίων
            $step->id = $step->id;
            $step->category = $request->input('category');
            $step->status_category = $request->input('status_category');
            $step->save();

            return view('welcome');
        }


    public function show($id)
    {
        // Εύρεση του timeline με βάση το $id
        $timeline = Timeline::findOrFail($id);

        // Περάστε το timeline στην προβολή και επιστρέψτε την προβολή timeline_step.blade.php
        return view('timelines.timeline_step', compact('timeline'));
    }

    public function createStatus(Request $request)
    {
        return response()->json(['message' => 'Status created successfully']);
    }

    public function addStep(Request $request, $id)
    {
        // Εξαγωγή των δεδομένων από το αίτημα
        $data = $request->only(['category', 'status_category']);

        // Εύρεση του timeline με βάση το $id
        $timeline = Timeline::findOrFail($id);

        // Ενημέρωση των πεδίων του timeline
        $timeline->update($data);

    }

    public function fetchTimeline($timeline_id)
    {
        // Εύρεση ενός συγκεκριμένου timeline με βάση το ID
        $timeline = Timeline::findOrFail($timeline_id);

        // Λήψη όλων των βημάτων του timeline με τα τρέχοντα status
        $steps = Step::where('timeline_id', $timeline->id)->with('statuses')->get();

        // Επιστροφή των δεδομένων του timeline και των βημάτων του
        return response()->json(['timeline' => $timeline, 'steps' => $steps]);
    }
}
