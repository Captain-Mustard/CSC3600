<?php include '../view/header.php'; ?>
<main class="container">
    <div class="error-container">
        <h2>Sorry, function is currently not available.</h2>
        <p>Please direct the rider to the booking platform to login or create a new account, then add their booking.</p>
        <form action="list_busses.php" method="get">
            <input type="submit" value="Back to Bus List">
        </form>
    </div>
</main>
<?php include '../view/footer.php'; ?>