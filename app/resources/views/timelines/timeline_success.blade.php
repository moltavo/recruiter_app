<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline Step</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: white;
        }

        #container {
            background-color: lightblue;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="container">
        <h2>Στοιχεία</h2>
        <table class="table">
            <tr>
                <th>Recruiter Name:</th>
                <td>{{ $timeline->recruiter_name }}</td>
            </tr>
            <tr>
                <th>Recruiter Surname:</th>
                <td>{{ $timeline->recruiter_surname }}</td>
            </tr>
            <tr>
                <th>Candidate Name:</th>
                <td>{{ $timeline->candidate_name }}</td>
            </tr>
            <tr>
                <th>Candidate Surname:</th>
                <td>{{ $timeline->candidate_surname }}</td>
            </tr>
        </table>

        <h2>Timeline Step</h2>
        <form method="PATCH" action="/steps/create">
            @csrf
            @method('PATCH')

            <label for="category">Category:</label>
            <input type="text" name="category" value="1st Interview" readonly>

            <label for="status_category">Status Category:</label>
            <select name="status_category" required>
                <option value="Pending">Pending</option>
                <option value="Complete">Complete</option>
                <option value="Reject">Reject</option>
            </select>

            <input type="hidden" name="timeline_id" value="{{ $timeline->id }}">
            
            <button type="submit" class="btn btn-primary">Update Timeline</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
