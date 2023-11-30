<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timelines</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <h3>Timelines</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Recruiter</th>
                                    <th>Candidate</th>
                                    <th>Step</th>
                                    <th>Status</th>
                                    <th>Επεξεργασία</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($timelines as $timeline)
                                    <tr>
                                        <td>{{ $timeline->id }}</td>
                                        <td>{{ $timeline->recruiter_name }} {{ $timeline->recruiter_surname }}</td>
                                        <td>{{ $timeline->candidate_name }} {{ $timeline->candidate_surname }}</td>
                                    @foreach ($timeline->steps as $step)
                                        <td>{{ $step->category}}</td>
                                        <td>{{ $step->status_category}}</td>
                                    @endforeach
                                        <td>
                                            <a href="{{ route('timelines.edit', $timeline->id) }}" class="btn btn-primary">Επεξεργασία</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <a href="{{ url('/') }}" class="btn btn-secondary mt-3">Επιστροφή</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
