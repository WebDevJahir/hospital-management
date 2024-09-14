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