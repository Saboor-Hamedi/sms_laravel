<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scores Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    @php
        $groupedScores = $scores->groupBy('academic.year');
    @endphp
    @foreach ($groupedScores as $year => $yearScores)
        <h2>Academic Year: {{ $year }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Assignment</th>
                    <th>Formative</th>
                    <th>Mid-Term</th>
                    <th>Final</th>
                    <th>Average</th>
                    <th>Report</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($yearScores as $score)
                    <tr>
                        <td>{{ $score->assignment }}</td>
                        <td>{{ $score->formative }}</td>
                        <td>{{ $score->midterm }}</td>
                        <td>{{ $score->final }}</td>
                        <td>{{ $score->average }}</td>
                        <td>{{ $score->report }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>

</html>
