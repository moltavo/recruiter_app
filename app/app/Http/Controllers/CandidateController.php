<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;


class CandidateController
{
  public function index()
  {
    $candidates = Candidate::all();

    return view('candidates.index', compact('candidates'));
  }

  public function create()
  {
    return view('candidates.create');
  }

  public function store(Request $request)
  {
    $candidate = new Candidate();
    $candidate->name = $request->input('name');
    $candidate->surname = $request->input('surname');
    $candidate->save();

    return redirect()->route('candidates.index');
  }

  public function show($id)
  {
    $candidate = Candidate::find($id);

    return view('candidates.show', compact('candidate'));
  }

  public function edit($id)
  {
    $candidate = Candidate::find($id);

    return view('candidates.edit', compact('candidate'));
  }

  public function update(Request $request, $id)
  {
    $candidate = Candidate::find($id);
    $candidate->name = $request->input('name');
    $candidate->surname = $request->input('surname');
    $candidate->save();

    return redirect()->route('candidates.index');
  }

  public function destroy($id)
  {
    $candidate = Candidate::find($id);
    $candidate->delete();

    return redirect()->route('candidates.index');
  }
}