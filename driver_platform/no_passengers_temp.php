<?php include '../view/header.php'; ?>
<div class="container">
    <main>
        <h1>No Passenger Bookings Found</h1>
        <p>Sorry, there are no passenger bookings found at the moment. You can either create a new booking or return to the list of buses.</p>

        <div class="button-container">
            <form action="new_booking_temp.php">
                <input class="button" type="submit" value="Create New Booking"/>
            </form>

            <form action="list_busses.php" method="get">
                <input class="button" type="submit" value="Back to Bus List"/>
            </form>

            <form action="logout.php" method="post">
                <input type="hidden" name="action" value="log_out">
                <input class="button" type="submit" value="Logout"/>
            </form>
        </div>
    </main>
</div>
<?php include '../view/footer.php'; ?>
