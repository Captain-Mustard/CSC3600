<?php include '../view/header.php'; ?>
<main>
    <nav>
        <h1>View Analytics Day:</h1>
        <br />
        
        <!-- Display options -->
        <form method="post">
            <div class="box-analytics-child">
                <p>Last 7 days of Trips:</p>
                <div class="box-analytics-child">
                    <label for="day">Day:</label>
                    <select id="day" name="day">
                        <option selected disabled>-- select --</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select> <br />
                    <input type="hidden" name="submit_day" />
                </div>
            </div>
            <br />

            <!-- Action for past 7 days -->
            <input type="hidden" name="action" value="past_7_days">
            <input type="submit" value="Past 7 Days by Day">
            <br><br>
        </form>

        <!-- Display options for last 30 days -->
        <form method="post">
            <div class="box-analytics-child">
                <p>Last 30 Days of Trips:</p>
                <div class="box-analytics-child">
                    <label for="day">Day:</label>
                    <select id="day" name="day">
                        <option selected disabled>-- select --</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select> 
                    <input type="hidden" name="submit_day" />
                </div>
            </div>
            <br />

            <!-- Action for past 30 days -->
            <input type="hidden" name="action" value="past_30_days">
            <input type="submit" value="Past 30 Days by Day">
            <br><br>
        </form>

        <!-- Display options for next 7 days -->
        <form method="post">
            <div class="box-analytics-child">
                <p>Next 7 Days of Trips:</p>
                <div class="box-analytics-child">
                    <label for="day">Day:</label>
                    <select id="day" name="day">
                        <option selected disabled>-- select --</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select> 
                    <input type="hidden" name="submit_day" />
                </div>
            </div>
            <br />

            <!-- Action for next 7 days -->
            <input type="hidden" name="action" value="next_7_days">
            <input type="submit" value="Next 7 Days by Day">
            <br><br>
        </form>		

        <!-- Display options for next 30 days -->
        <form method="post">
            <div class="box-analytics-child">
                <p>Next 30 Days of Trips:</p>
                <div class="box-analytics-child">
                    <label for="day">Day:</label>
                    <select id="day" name="day">
                        <option selected disabled>-- select --</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                    </select> 
                    <input type="hidden" name="submit_day" />
                </div>
            </div>
            <br />

            <!-- Action for next 30 days -->
            <input type="hidden" name="action" value="next_30_days">
            <input type="submit" value="Next 30 Days by Day ">
            <br><br>
        </form>	

        <!-- Back button -->
        <form>
            <input type="hidden" name="action" value="analytics">
            <input type="submit" value="Back">
            <br><br>
        </form>
    </nav>
</main>
<?php include '../view/footer.php'; ?>
