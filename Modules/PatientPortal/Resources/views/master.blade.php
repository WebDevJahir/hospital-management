<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal Dashboard</title>
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="{{ asset('patient_portal/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('patient_portal/css/style.css') }}">
   
</head>

<body>
    <!-- Top Bar -->
    @include('patientportal::layouts.header')

    <!-- Sidebar -->
    @include('patientportal::layouts.sidebar')

    <!-- Main Content -->
    <main class="content">
        <section class="info">
            <div class="info-box">
                <!-- book an  appointment icon -->
                 <i class="fas fa-calendar-plus fa-2xl text-primary"></i>
                <h3 class="margin-top-10">Appointment</h3>
            </div>
            <div class="info-box">
                <!-- Prescription -->
                <i class="fa-solid fa-file-prescription fa-2xl text-primary"></i>
                <h3 class="margin-top-10">Prescriptions</h3>
            </div>
            <div class="info-box">
                <i class="fa-solid fa-file-waveform fa-2xl text-primary"></i>
                <h3 class="margin-top-10">Investigations</h3>
            </div>
            <div class="info-box">
                <h3>Follow Ups</h3>
                <p>Schedule your follow-up appointments.</p>
            </div>
            <div class="info-box">
                <h3>Plan</h3>
                <p>Your personalized healthcare plan.</p>
            </div>
        </section>
    </main>

    @include('patientportal::layouts.footer')
    <script src="{{ asset('patient_portal/js/main.js') }}"></script>
    <script src="{{ asset('patient_portal/js/font-awesome.min.js') }}"></script>
</body>

</html>
