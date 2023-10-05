<?php include '../view/header.php'; ?>
<main>
    <nav>
        <h1>View Analytics by Route or Day:</h1>
        <p>Select a Route or Day of Week:</p>

        <form action="view_analytics.php" method="post">
            <!-- Departure Point Selection -->
            <div class="container">
                <div class="box-analytics-container">
                    <div class="box-analytics-child">
                        <label for="start">Route End:</label>
                        <select id="start" name="destination">
                            <option selected disabled>-- select --</option>
                            <option value="Toowoomba">Toowoomba</option>
                            <option value="Springfield">Springfield</option>
                            <!-- Add more route start points as needed -->
                        </select>
                    </div>
                </div>
            </div>

            <!-- Day of Week Selection -->
            <div class="container">
                <div class="box-analytics-container">
                    <div class="box-analytics-child">
                        <label for="day">Select Day of the Week:</label>
                        <select id="day" name="day">
                            <option selected disabled>-- select --</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="container">
                <input type="submit" value="View Analytics">
            </div>
        </form>

        <br>
        <form action="logout.php" method="post">
            <input type="hidden" name="action" value="log_out">
            <input class="submit-button" type="submit" value="Logout">
        </form>
    </nav>
</main>
<?php include '../view/footer.php'; ?>
