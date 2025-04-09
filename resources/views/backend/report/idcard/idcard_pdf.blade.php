<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
    }

    .page {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .card {
        width: 300px;
        height: 450px;
        margin: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
        background-color: #f9f9f9;
        padding: 15px;
    }

    .card img.logo {
        width: 80px;
        height: 80px;
        margin-bottom: 10px;
    }

    .card img.student-image {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    .card h3 {
        font-size: 18px;
        margin: 10px 0;
        color: #333;
    }

    .card p {
        font-size: 14px;
        margin: 5px 0;
        color: #555;
    }

    .card .title {
        font-size: 16px;
        font-weight: bold;
        color: #444;
    }

    .card button {
        margin-top: 15px;
        padding: 8px 15px;
        font-size: 14px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .card button:hover {
        background-color: #0056b3;
    }

    .footer {
        font-size: 10px;
        text-align: right;
        margin-top: 20px;
    }

    hr {
        border: dashed 1px #000;
        margin-top: 20px;
    }
    </style>
</head>

<body>

    <div class="page">
        @foreach($allData as $value)
        <div class="card" style="border: 1px solid #000;">
            <h2 style="text-align:center; margin-bottom: 20px;">Student ID Cards</h2>
            <?php $image_path = '/upload/IIT.png'; ?>
            <img src="{{ public_path() . $image_path }}" alt="Institute Logo" class="logo">
            <img src="{{ public_path('upload/student_images/' . $value['student']['image']) }}" alt="Student Image"
                class="student-image">
            <h3>{{ $value['student']['name'] }}</h3>
            <p class="title">Class: {{ $value['student_class']['name'] }}</p>
            <p>Session: {{ $value['student_year']['name'] }}</p>
            <p>ID No: {{ $value['student']['id_no'] }}</p>
            <p>Roll: {{ $value->roll }}</p>
            <p>Mobile: {{ $value['student']['mobile'] }}</p>
            <button>Contact IIT, DU</button>
        </div>
        @endforeach
    </div>

    <div class="footer">
        <i>Print Date: {{ date("d M Y") }}</i>
    </div>
</body>

</html>