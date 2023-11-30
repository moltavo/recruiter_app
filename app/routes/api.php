<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Timeline;
use App\Models\Step;
use App\Models\Status;
use App\Models\Recruiter;
use App\Models\Candidate;

Route::post('/create-timeline', function (Request $request) {
    // Λαμβάνουμε τα δεδομένα από το αίτημα
    $data = $request->only(['recruiter_name', 'recruiter_surname', 'candidate_name', 'candidate_surname']);

    // Δημιουργούμε το timeline
    $timeline = Timeline::create([
        'recruiter_name' => $data['recruiter_name'],
        'recruiter_surname' => $data['recruiter_surname'],
        'candidate_name' => $data['candidate_name'],
        'candidate_surname' => $data['candidate_surname'],
    ]);
    });

Route::post('/create-step', function (Request $request) {
    $data = $request->only(['timeline_id', 'step_category', 'status_category']);

    // Βρίσκουμε το timeline
    $timeline = Timeline::findOrFail($data['timeline_id']);

    // Βρίσκουμε το τελευταίο step αν υπάρχει
    $lastStep = $timeline->steps()->latest()->first();

    // Αν δεν υπάρχει τελευταίο step ή το τελευταίο step δεν έχει το ίδιο category, τότε δημιουργούμε ένα νέο step
    if (!$lastStep || $lastStep->category !== $data['step_category']) {
        $step = Step::create([
            'category' => $data['step_category'],
            'status_category' => $data['status_category'],
        ]);

        // Συνδέουμε το step με το timeline
        $timeline->steps()->save($step);

        return response()->json(['message' => 'Step created successfully']);
    }

    return response()->json(['message' => 'Step category already exists for this timeline'], 422);
});

Route::post('/create-status', function (Request $request) {
    $data = $request->only(['step_id', 'status_category']);

    // Βρίσκουμε το step
    $step = Step::findOrFail($data['step_id']);

    // Δημιουργούμε το status
    $status = Status::create([
        'status_category' => $data['status_category'],
    ]);

    // Συνδέουμε το status με το step
    $step->statuses()->save($status);

    return response()->json(['message' => 'Status created successfully']);
});

Route::get('/fetch-timeline/{timeline_id}', function ($timeline_id) {
    // Βρίσκουμε το timeline
    $timeline = Timeline::with('recruiter', 'candidate', 'steps.statuses')->findOrFail($timeline_id);

    return response()->json($timeline);
});
