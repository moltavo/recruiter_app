<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Step</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .table-container {
            background-color: lightblue;
            color: black; 
            padding: 20px;
            border: 2px solid black; 
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, p, li {
            color: white;
        }
    </style>
</head>
<body>

<div class="table-container">
    <h1>Edit Timeline</h1>

    <p>Recruiter: {{ $timeline->recruiter_name }} {{ $timeline->recruiter_surname }}</p>
    <p>Candidate: {{ $timeline->candidate_name }} {{ $timeline->candidate_surname }}</p>

    <h2>Steps</h2>
    <ul>
        @foreach ($timeline->steps as $step)
            <form method="PATCH" action="/steps/update">
                @csrf
                @method('PATCH')
                <label for="category">Category:</label>
                <select name="category" required>
                    <option value="1st Interview" {{ $step->category == '1st Interview' ? 'selected' : '' }}>1st Interview</option>
                    <option value="Tech Assessment" {{ $step->category == 'Tech Assessment' ? 'selected' : '' }}>Tech Assessment</option>
                    <option value="Offer" {{ $step->category == 'Offer' ? 'selected' : '' }}>Offer</option>
                </select>

                <label for="status_category">Status Category:</label>
                <select name="status_category" required>
                    <option value="Pending" {{ $step->status_category == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Complete" {{ $step->status_category == 'Complete' ? 'selected' : '' }}>Complete</option>
                    <option value="Reject" {{ $step->status_category == 'Reject' ? 'selected' : '' }}>Reject</option>
                </select>

                <button type="submit" class="btn btn-primary">Ενημέρωση</button>
                <input type="hidden" name="id" value="{{ $step->id }}">
            </form>
            <input type="hidden" name="timeline_id" value="{{ $timeline->id }}">
        @endforeach
    </ul>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
