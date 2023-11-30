<?php

function createRecruiter(string $name, string $surname)
{
  $recruiter = new Recruiter();
  $recruiter->name = $name;
  $recruiter->surname = $surname;
  $recruiter->save();

  return $recruiter;
}

function createCandidate(string $name, string $surname)
{
  $candidate = new Candidate();
  $candidate->name = $name;
  $candidate->surname = $surname;
  $candidate->save();

  return $candidate;
}

function create(Recruiter $recruiter, Candidate $candidate)
{
  $timeline = new Timeline();
  $timeline->recruiter_id = $recruiter->id;
  $timeline->candidate_id = $candidate->id;
  $timeline->save();

  return $timeline;
}

function create(Timeline $timeline, string $category, string $status)
{
  $step = new Step();
  $step->timeline_id = $timeline->id;
  $step->category = $category;
  $step->status = $status;
  $step->save();

  return $step;
}
