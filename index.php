<?php
// Include the header.php file to add common header content
include 'view/header.php';
?>

<main class="home-main">
    <nav class="home-nav">
        <!-- Admin & Analytics Section -->
        <h2 class="section-title">Admin & Analytics</h2>
        <ul class="section-links">
            <li><a href="analytics">Admin & Analytics</a></li>
            <li><a href="analytics_testing">Analytics Testing</a></li>
        </ul>

        <!-- Booking Platform Section -->
        <h2 class="section-title">Booking Platform</h2>
        <ul class="section-links">
            <li><a href="booking_platform">End User Bookings</a></li>
        </ul>

        <!-- Driver Platform Section -->
        <h2 class="section-title">Driver Platform</h2>
        <ul class="section-links">
            <li><a href="driver_login">Bus Driver Admin</a></li>
        </ul>
    </nav>
</main>

<?php
// Include the footer.php file to add common footer content
include 'view/footer.php';
?>
