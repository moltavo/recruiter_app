<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Step</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa; /* Ανοιχτό γκρι χρώμα για το background */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* 100% ύψος της οθόνης */
            margin: 0; /* Καμία περιθώρια στο body */
        }

        .table-container {
            background-color: lightblue; /* Μαύρο χρώμα για τον πίνακα */
            color: black; /* Λευκό χρώμα για το κείμενο */
            padding: 20px;
            border: 2px solid black; /* Μαύρο περίγραμμα για τον πίνακα */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, p, li {
            color: white; /* Λευκό χρώμα για τους τίτλους και το κείμενο */
        }

        .timeline-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .timeline-step {
            margin-bottom: 20px;
            width: 100%;
        }

        .timeline-step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 2px solid black;
            margin: 0 auto;
        }

        .timeline-step-label {
            text-align: center;
            font-size: 18px;
        }

        .timeline-step-status {
            text-align: center;
            font-size: 16px;
        }

        .timeline-step-status.pending {
            color: red;
        }

        .timeline-step-status.complete {
            color: green;
        }

        .timeline-step-status.reject {
            color: red;
        }
    </style>
</head>
<body>

<div class="table-container">
    <h1>Edit Timeline</h1>

    <p>Recruiter: {{ $timeline->recruiter_name }} {{ $timeline->recruiter_surname }}</p>
    <p>Candidate: {{ $timeline->candidate_name }} {{ $timeline->candidate_surname }}</p>

    <h2>Steps</h2>

    <div class="timeline-container">
        @foreach ($timeline->steps as $step)
            <div class="timeline-step">
                <div class="timeline-step-circle">
                    <div class="timeline-step-circle" style="background-color: {{ $step->status_category == 'Pending' ? 'red' : ($step->status_category == 'Complete' ? 'green' : 'red') }}">
                    </div>
                    <div class="timeline-step-label">{{ $step->category }}</div>
                </div>
                <div class="timeline-step-label">
                    {{ $step->category }}
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
