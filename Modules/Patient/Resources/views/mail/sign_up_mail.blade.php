<!DOCTYPE html>
<html>

<head>
    <title>Registration Mail</title>
    <style>
        * {
            font: 400 12.8px 'Open Sans', sans-serif;
        }

        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        thead:before,
        thead:after {
            display: none;
        }

        tbody:before,
        tbody:after {
            display: none;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid gray;
        }

        th {
            font-size: 13.8px;
        }

        td {
            font-size: 12.8px;
        }

        p {
            font-size: 12.8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<!------ Include the above in your HEAD tag ---------->
@php
    
@endphp

<body>
    <div class="container">
        <div class="row">
            <p>Dear <span style="font-weight: bold"> {{ $patient_name }} </span>,</p>
            <p>You successfully created an account at Hospice Bangladesh. You agreed our Terms &
                Conditions</p>

            <p>To read our <a href="{{ url('https://hospicebangladesh.com/services-charge/') }}" target="_blank">Service
                    Charge</a>, <a href="{{ url('https://hospicebangladesh.com/terms-conditions/') }}"
                    target="_blank">Terms & Conditions</a></p>
            <p>To log in to your account, please go to the <a
                    href="https://play.google.com/store/apps/details?id=com.codage.telehospice&hl=en&gl=US"
                    target="_blank">Play Store</a> or click <a href="https://app.hospicebangladesh.com/"> Web apps</a>
            </p>
            <p><span style="font-weight: bold;">User id: </span> {{ $phone }}/{{ $email }}</p>
            <p><span style="font-weight: bold;">Password: </span> {{ $password }}</p>
            <p>We look forward to helping you achieve your goal</p>
        </div>
        <div>
            <img src="{{ asset('/images/logo.png') }}" style="height: 60px; width: 60px;" />
        </div>
        <p>Need help? Please email us at <a href="{{ $project->email }}">{{ $project->email }}</a> or call our helpline
            number <a href="tel:+88{{ $project->phone }}">+88 {{ $project->phone }}</a> 0r What’s Up <a
                href="https://wa.me/8801840486068?text=Hello, i am {{ $patient_name }}, reg id {{ $reg_no }}. Anyone there? ">+88
                01840486068</a>
            <a href="{{ $project->web_link }}">{{ $project->web_link }}</a>
        </p>
    </div>
</body>

</html>
