<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scores Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #ffffff;
            padding: 10px 5px;
        }

        .header img {
            max-width: 120px;
            /* Adjust logo size */
            margin-bottom: 10px;
        }

        h1 {
            font-size: 26px;
            color: #000000;
            margin: 5px 0;
            /* Reduced margin */
        }

        .container {
            margin-top: 20px;
            max-width: 900px;
            margin: 80px auto 20px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        th {
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            /* Uppercase for headers */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
            /* Slightly lighter background for even rows */
        }

        tr:hover {
            background-color: #e0f7fa;
            /* Light blue hover effect */
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            padding: 10px 0;
            border-top: 1px solid #ddd;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @media print {
            body {
                background-color: #fff;
                margin: 0;
                padding: 0;
            }

            .header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                padding: 10px 0;
                z-index: 1000;
            }

            .container {
                margin-top: 80px;
                /* Leave space for the fixed header */
                box-shadow: none;
            }

            .header img {
                max-width: 80px;
                /* Adjust logo size for print */
            }

            .footer {
                position: fixed;
                bottom: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <div class="header">
        <img src="path_to_logo.png" alt="Logo"> <!-- Replace with your logo URL -->
        <h1>Scores Report</h1>
    </div>

    <!-- Container for the Table -->
    <div class="container">
        <!-- Table Section -->
        <table>
            <thead>
                <tr>
                    <th>Assignment</th>
                    <th>Formative</th>
                    <th>Mid-Term</th>
                    <th>Final</th>
                    <th>Average</th>
                    <th>Year</th>
                    <th>Report</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($scores as $score)
                    <tr>
                        <td>{{ $score->assignment }}</td>
                        <td>{{ $score->formative }}</td>
                        <td>{{ $score->midterm }}</td>
                        <td>{{ $score->final }}</td>
                        <td>{{ $score->average }}</td>
                        <td>{{ $score->academic->year ?? 'N/A' }}</td>
                        <td>{{ $score->report }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <span class="page-number"></span>
    </div>

</body>

</html>
