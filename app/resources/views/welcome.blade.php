<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment Timeline</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
            display: inline-block;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div id="container">
        <h2>Recruitment Timeline</h2>

        <form method="POST" action="/timelines/create">
            @csrf
            <label for="recruiterName">Recruiter Name:</label>
            <input type="text" name="recruiter_name" required>

            <label for="recruiterSurname">Recruiter Surname:</label>
            <input type="text" name="recruiter_surname" required>

            <label for="candidateName">Candidate Name:</label>
            <input type="text" name="candidate_name" required>

            <label for="candidateSurname">Candidate Surname:</label>
            <input type="text" name="candidate_surname" required>

            <button type="submit" class="btn btn-primary">Create Timeline</button>
            <div style="text-align: left; margin-top: 20px;" class="carousel-control-next-icon">
                <a href="/timelines" class="btn btn-primary">Timelines</a>
            </div>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
