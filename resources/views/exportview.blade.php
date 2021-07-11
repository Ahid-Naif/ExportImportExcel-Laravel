<!DOCTYPE html>
<html>
<head>
    <title>Export Attendance Data</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Jquery UI --}}
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
	<div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Export Attendance Data
            </div>
            
            <div class="card-body row">
                <form 
                    class="container"
                    method="GET"
                    action=""
                >

                    <label for="from-date">From:</label>
                    <input type="text" id="from-datepicker" name="from-date" value={{ isset($_GET['from-date']) ? $_GET['from-date'] : ' ' }}>

                    <label for="to-date">To:</label>
                    <input type="text" id="to-datepicker" name="to-date" value={{ isset($_GET['to-date']) ? $_GET['to-date'] : ' ' }}>

                    <button
                        type="submit"
                        class="btn btn-warning"
                        name="action"
                        value="export"
                    >
                        Export
                    </button>

                    <button
                        type="submit"
                        class="btn btn-success"
                        name="action"
                        value="save"
                    >
                        Save
                    </button>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>EmpID</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @forelse ($attendances as $attendance)
                            <tr>
                                <td>{{ $attendance->empID }}</td>
                                <td>{{ $attendance->date }}</td>
                                <td>{{ $attendance->time }}</td>
                            </tr>
                        @empty
                            <p>No Data available yet!</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(function()
        {
            $("#from-datepicker").datepicker();
            $("#to-datepicker").datepicker();
        });
    </script>
</body>
</html>