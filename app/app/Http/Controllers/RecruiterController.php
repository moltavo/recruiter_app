<?php

namespace App\Http\Controllers;

use App\Models\Recruiter;
use Illuminate\Http\Request;


class RecruiterController
{
  public function index()
  {
    $recruiters = Recruiter::all();

    return view('recruiters.index', compact('recruiters'));
  }

  public function create()
  {
    return view('recruiters.create');
  }

  public function store(Request $request)
  {
    $recruiter = new Recruiter();
    $recruiter->name = $request->input('name');
    $recruiter->surname = $request->input('surname');
    $recruiter->save();

    return redirect()->route('recruiters.index');
  }

  public function show($id)
  {
    $recruiter = Recruiter::find($id);

    return view('recruiters.show', compact('recruiter'));
  }

  public function edit($id)
  {
    $recruiter = Recruiter::find($id);

    return view('recruiters.edit', compact('recruiter'));
  }

  public function update(Request $request, $id)
  {
    $recruiter = Recruiter::find($id);
    $recruiter->name = $request->input('name');
    $recruiter->surname = $request->input('surname');
    $recruiter->save();

    return redirect()->route('recruiters.index');
  }

  public function destroy($id)
  {
    $recruiter = Recruiter::find($id);
    $recruiter->delete();

    return redirect()->route('recruiters.index');
  }
}