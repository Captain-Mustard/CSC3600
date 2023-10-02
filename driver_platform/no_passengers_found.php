<?php include '../view/header.php'; ?>
<div class="container">
<main>
    <h1>No Passengers Bookings Found.
        <br><br>
        <p>Click below to make new booking or view other bookings.</p>
       
    </h1>

    <form action="../booking_platform/booking_add.php">
        <input class="submit-button" type="submit" value="New Booking"/>
    </form>

    <form action="../driver_platform">
        <input class="submit-button" type="submit" value="View Another Booking"/>
</form>
        <form action="../booking_platform/logout.php" method="post">
            <input type="hidden" name="action" value="log_out">
            <input class="submit-button" type="submit" value="Logout">
        </form>
</main>
</div>
<?php include '../view/footer.php'; ?>