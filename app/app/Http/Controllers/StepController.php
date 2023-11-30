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
            $a = 0;
            $b = 0;
            $c = 0;
            $d = 0;
            // Δημιουργία νέου Step
            $step = new Step();
            $step->timeline_id = $timeline->id;
            $step->category = $request->input('category');
            $step->status_category = $request->input('status_category');
            if($request->input('category') == '1st Interview')
                {
                    $step->category_1 = 1;
                    $step->status_category_1 = 1;
                    $step->category_2 = 0;
                    $step->status_category_2 = 0;
                    $step->category_3 = 0;
                    $step->status_category_3 = 0;
                }elseif($request->input('category') == 'Tech Assessment'){
                    $step->category_1 = 0;
                    $step->status_category_1 = 0;
                    $step->category_2 = 1;
                    $step->status_category_2 = 1;
                    $step->category_3 = 0;
                    $step->status_category_3 = 0;
                }elseif($request->input('category') == 'Offer'){
                    $step->category_1 = 0;
                    $step->status_category_1 = 0;
                    $step->category_2 = 0;
                    $step->status_category_2 = 0;
                    $step->category_3 = 1;
                    $step->status_category_3 = 1;
                }
            // $step->category_1 = $a;
            // $step->category_2 = $b;
            // $step->category_3 = $c;
            // $step->status_category_1 = $a;
            // $step->status_category_2 = $b;
            // $step->status_category_3 = $c;       
            $step->save();

            return view('welcome');
        }

        public function update(Request $request)
        {
            $step = Step::findOrFail($request->input('id'));
        
            // Έλεγχος αν το category είναι 1 σε ένα από τα πεδία category_1, category_2, category_3

            if ($request->input('category') == '1st Interview') {
                $step->category_1 = 1;
            } elseif ($request->input('category') == 'Tech Assessment') {
                $step->category_2 = 1;
            } elseif ($request->input('category') == 'Offer') {
                $step->category_3 = 1;
            }


            if ($request->input('status_category') == 'Pending') {
                $step->status_category_1 = 1;
            } elseif ($request->input('status_category') == 'Complete') {
                $step->status_category_2 = 1;
            } elseif ($request->input('status_category') == 'Reject') {
                $step->status_category_3 = 1;
            }

            if ($request->input('status_category') == 'Pending' && (
                $step->category_1 == '1'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }elseif ($request->input('status_category') == 'Pending' && (
                $step->category_2 == '1'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }elseif ($request->input('status_category') == 'Pending' && (
                $step->category_3 == '1'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }  
            elseif ($request->input('status_category') == 'Complete' && (
                $step->category_2 == '1'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }elseif ($request->input('status_category') == 'Complete' && (
                $step->category_2 == '2'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }elseif ($request->input('status_category') == 'Complete' && (
                $step->category_2 == '3'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }
             elseif ($request->input('status_category') == 'Reject' && (
                $step->category_3 == '1'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }elseif ($request->input('status_category') == 'Reject' && (
                $step->category_3 == '2'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }elseif ($request->input('status_category') == 'Reject' && (
                $step->category_3 == '3'
            )) {
                return response()->json(['message' => 'Category already exists.'], 400);
            }

              
            // Ενημέρωση των πεδίων
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
