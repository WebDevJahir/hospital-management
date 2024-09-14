<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        /* Top Bar */
        /* Top Bar */
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4CAF50;
            padding: 10px 20px;
            color: #fff;
        }

        .hamburger {
            cursor: pointer;
            font-size: 24px;
        }

        /* Right section of the top bar (Notification + Logout) */
        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 15px;
            /* Adds spacing between notification and logout */
        }

        .notifications {
            cursor: pointer;
            font-size: 24px;
        }

        .btn-logout {
            background-color: #fff;
            border: none;
            padding: 5px 10px;
            color: #4CAF50;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100%;
            background-color: #333;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            overflow: auto;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .sidebar nav ul {
            list-style: none;
            padding: 20px;
        }

        .sidebar nav ul li {
            padding: 15px;
        }

        .sidebar nav ul li a {
            text-decoration: none;
            color: #fff;
        }

        .sidebar nav ul li:hover {
            background-color: #444;
        }

        /* Main Content */
        .content {
            padding: 20px;
            background-color: #f4f4f4;
            min-height: calc(100vh - 40px);
            transition: margin-left 0.3s;
        }

        .info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .info-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
        }

        .info-box:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        /* Bottom Toolbar (Mobile) */
        .bottom-toolbar {
            display: none;
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #4CAF50;
            padding: 10px 0;
            display: flex;
            justify-content: space-around;
            color: #fff;
        }

        .bottom-toolbar .tool {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        .bottom-toolbar .tool p {
            margin-top: 5px;
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }

            .bottom-toolbar {
                display: flex;
            }

            .sidebar {
                width: 200px;
            }

            .info {
                flex-direction: column;
                align-items: center;
            }

            .info-box {
                width: 100%;
                margin-bottom: 20px;
            }

            .info-box:hover {
                transform: none;
            }



        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #fff;
            cursor: pointer;
        }

        /* Dropdown Menu Styling */
        /* Dropdown Menu Styling */
        .dropdown {
            display: none;
            /* Initially hidden */
            position: absolute;
            right: 20px;
            /* Align below the notification icon */
            top: 50px;
            /* Position below the top bar */
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 250px;
            z-index: 1000;
        }

        .dropdown ul {
            list-style: none;
            padding: 10px;
            margin: 0;
        }

        .dropdown ul li {
            padding: 3px;
            border-bottom: 1px solid #f0f0f0;
            color: #333;
        }

        .dropdown ul li:last-child {
            border-bottom: none;
        }

        .dropdown ul li:hover {
            background-color: #f9f9f9;
            cursor: pointer;
        }

        /* Show dropdown when active */
        .dropdown.active {
            display: block;
        }

        .dropdown.active ul li:hover {
            background-color: #f9f9f9;
            cursor: pointer;
        }

        .dropdown.active ul li:last-child {
            border-bottom: none;
        }

        .dropdown.active ul li a {
            text-decoration: none;
            color: #333;
            font-size: 14px;

        }
    </style>
</head>

<body>
    <!-- Top Bar -->
    <header class="top-bar">
        <div class="hamburger" id="hamburger"><i class="fas fa-bars"></i></div>
        <h1>Patient Portal</h1>
        <div class="top-bar-right">
            <div class="notifications" id="notifications">
                <i class="fas fa-bell"></i>
                <!-- Notification Dropdown -->
                <div class="dropdown" id="notification-dropdown">
                    <ul>
                        <li><a href="#">New prescription added</a></li>
                        <li><a href="#">New investigation report available</a></li>
                        <li><a href="#">Follow-up scheduled</a></li>
                        <!-- Add more notification items here -->
                    </ul>
                </div>
            </div>
            <div class="logout"><button class="btn-logout">Logout</button></div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="close-btn" id="close-btn"><i class="fas fa-times"></i></div>
        <nav>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Prescriptions</a></li>
                <li><a href="#">Medicines</a></li>
                <li><a href="#">Investigations</a></li>
                <li><a href="#">Follow Ups</a></li>
                <li><a href="#">Plan</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="content">
        <section class="info">
            <div class="info-box">
                <h3>Prescriptions</h3>
                <p>View and manage your prescriptions.</p>
            </div>
            <div class="info-box">
                <h3>Medicines</h3>
                <p>List of prescribed medicines.</p>
            </div>
            <div class="info-box">
                <h3>Investigations</h3>
                <p>Latest investigation reports.</p>
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

    <!-- Bottom Toolbar (for Mobile) -->
    <footer class="bottom-toolbar">
        <div class="tool"><i class="fas fa-home"></i>
            <p>Home</p>
        </div>
        <div class="tool"><i class="fas fa-file-medical"></i>
            <p>Prescriptions</p>
        </div>
        <div class="tool"><i class="fas fa-pills"></i>
            <p>Medicines</p>
        </div>
        <div class="tool"><i class="fas fa-calendar-check"></i>
            <p>Follow Ups</p>
        </div>
    </footer>
    <script>

        const hamburger = document.getElementById('hamburger');
        const sidebar = document.getElementById('sidebar');
        const closeBtn = document.getElementById('close-btn');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
        const notificationsIcon = document.getElementById('notifications');
        const notificationDropdown = document.getElementById('notification-dropdown');

        // Toggle the dropdown on clicking the notification icon
        notificationsIcon.addEventListener('click', (event) => {
            event.stopPropagation(); // Stop event from propagating to window
            notificationDropdown.classList.toggle('active');
        });

        // Close the dropdown if clicking outside the notification area
        window.addEventListener('click', (event) => {
            if (!notificationsIcon.contains(event.target)) {
                notificationDropdown.classList.remove('active');
            }
        });
    </script>

</body>

</html>