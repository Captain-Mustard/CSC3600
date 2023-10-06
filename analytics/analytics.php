<?php include '../view/header.php'; ?>
<main>
    <nav>
        <?php
        // Retrieve passenger counts for analytics
        $last_month_count = get_last_month_passenger_count();
        $next_month_count = get_next_month_passenger_count();
        $last_week_count = get_last_week_passenger_count();
        $next_week_count = get_next_week_passenger_count();
        ?>

        <!-- Button to view analytics by route -->
        <form method="post">
            <input type="hidden" name="action" value="get_routes">
            <input type="submit" value="Analytics by Route">
            <br><br>
        </form>

        <!-- Button to view analytics by day -->
        <form method="post">
            <input type="hidden" name="action" value="get_day">
            <input type="submit" value="Analytics by Day">
            <br><br>
        </form>

        <!-- Display passenger counts -->
        <h2>Total passengers last month:</h2>
        <p><?= $last_month_count['totalTrips']; ?></p><br>
        <h2>Total passengers this month:</h2>
        <p><?= $next_month_count['totalTrips']; ?></p><br>
        <h2>Total passengers last week:</h2>
        <p><?= $last_week_count['totalTrips']; ?></p><br>
        <h2>Total passengers this week:</h2>
        <p><?= $next_week_count['totalTrips']; ?></p><br>
        <br>

        <!-- Logout button -->
        <form>
            <input type="hidden" name="action" value="log_out">
            <input class="submit-button" type="submit" value="Logout">
        </form>
    </nav>
</main>

<?php include '../view/footer.php'; ?>
