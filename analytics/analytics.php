<?php include '../view/header.php'; ?>
<main>
    <nav>
  <h1>View Analytics by Route or Day:</h1>
  <p>Select a Route or Day of Week:</p>
</br>

    <!-- display -->

    <form action="view_analytics.php" method="post">
    <div class="container">
    <div class="box-analytics-container">
        <div class="box-analytics-child">
        <label for="destination">Route Start:</label>
        <select id="destination" name="start">
            <option selected disabled>-- select --</option>
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
            <option value="Springfield Central">Springfield Central</option>
            <option value="Ipswich">Ipswich</option>
            <option value="Plainland">Plainland</option>
        </select>
        <input type="hidden" name="submit_start"/>

        <br />

        <label for="destination">Route End:</label>
        <select id="destination" name="end">
            <option selected disabled>-- select --</option>
            <option value="Toowoomba">Toowoomba</option>
            <option value="Springfield">Springfield</option>
            <option value="Springfield Central">Springfield Central</option>
            <option value="Ipswich">Ipswich</option>
            <option value="Plainland">Plainland</option>
        </select>
        <input type="hidden" name="submit_end"/>
</div>
<div class="box-analytics-child">
    <br><br>
        <label for="day">Day:</label>
        <select id="day" name="day">
            <option selected disabled>-- select --</option>
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            </select> <br /><br /><br />
            <input type="hidden" name="submit_day"/>
</div>
</div>
</br>
        <p>Select to View:</p>
        <input type="hidden" name="action" value="next_7_days">
        <input type="submit" value="Next 7 Days">

        <input type="hidden" name="action" value="past_7_days">
        <input type="submit" value="Past 7 Days">

        <input type="hidden" name="action" value="past_30_days">
        <input type="submit" value="Past 30 Days">

        <input type="hidden" name="action" value="next_30_days">
        <input type="submit" value="Next 30 Days">


    </form>

    
    <br>
    <form action="logout.php" method="post">
            <input type="hidden" name="action" value="log_out">
            <input class="submit-button" type="submit" value="Logout">
        </form>
    </nav>

    
</main>
</div>
</div>
<?php include '../view/footer.php'; ?>