<!DOCTYPE html>
<html>
<head>
    <title>Timeline {{ $timeline->id }}</title>
</head>
<body>
    <h1>Timeline {{ $timeline->id }}</h1>
    <p>Recruiter: {{ $recruiter->name }} {{ $recruiter->surname }}</p>
    <p>Candidate: {{ $candidate->name }} {{ $candidate->surname }}</p>
    <h2>Steps</h2>
    <ul>
        @foreach ($steps as $step)
            <li>
                {{ $step->category }} - {{ $step->statuses->last()->category }}
            </li>
        @endforeach
    </ul>
</body>
</html>

