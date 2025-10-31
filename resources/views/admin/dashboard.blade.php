<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Flag Icon CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <!-- Optional: Your custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/admin.css') }}">
</head>
<body>

    <h1>Admin Dashboard</h1>

    <!-- Screenshots / Placeholder images -->
    <div>
        <h3>Placeholder Images</h3>
        <img src="{{ asset('admin/assets/images/screenshots/light.jpg') }}" alt="light">
<img src="{{ asset('admin/assets/images/screenshots/dark.jpg') }}" alt="dark">
<img src="{{ asset('admin/assets/images/screenshots/30x30.jpg') }}" alt="30x30">
<img src="{{ asset('admin/assets/images/screenshots/80x80.jpg') }}" alt="80x80">


    </div>

    <!-- Charts container -->
    <div id="chart" style="width:600px;height:400px;"></div>

    <!-- jQuery (required by Flot) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Flot chart library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.6/jquery.flot.js" integrity="sha512-b0/xA9839WwDovAHA0nMyu/6/Vtd58xyMub+i9MRpz7Lv6PbeasD5Ww4SB3QEZHC/KZTsj1+cJFJY9Ivei1wfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Flot resize plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/4.2.6/jquery.flot.resize.js" integrity="sha512-KL7NnNaYsW97uTAyzRVRaM2C8C8gfTw7HhiSrG4XNvRwj6bBylMT+ddIgQSf7J9OHuEQ5mMJ6/6JYJcvmtWAMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Example Flot chart -->
    <script>
        $(function() {
            var data = [
                { label: "Sales", data: [[0, 10], [1, 20], [2, 30]] },
                { label: "Orders", data: [[0, 5], [1, 15], [2, 25]] }
            ];

            $.plot("#chart", data, {
                series: {
                    lines: { show: true },
                    points: { show: true }
                },
                grid: { hoverable: true, clickable: true },
                colors: ["#1f77b4", "#ff7f0e"]
            });
        });
    </script>
</body>
</html>
