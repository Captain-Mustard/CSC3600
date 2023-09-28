<?php include '../view/header.php'; ?>
<main>
    <h1>No Passengers Bookings Found.
        <br><br>
        <p>Click below to make new booking or view other bookings.</p>
    </h1>
</br></br></br>
    <form action="../booking_platform/new_booking.html">
        <input type="submit" value="New Booking"/>
</form>

    <form href="driver_display">
        <input type="submit" value="View Another Booking"/>
</main>
<?php include '../view/footer.php'; ?>