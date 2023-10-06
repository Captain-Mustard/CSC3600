<?php include '../view/header.php'; ?>
<main>
    <nav>
        <h1>View Analytics by Route:</h1>
        <br />

        <!-- Display options for last 7 days by routes -->
        <form method="post">
            <div class="box-analytics-child">
                <p>Last 7 Days by Routes:</p>
                <label for="destination">Route End:</label>
                <select id="destination" name="end">
                    <option selected disabled>-- select --</option>
                    <option value="Toowoomba">Toowoomba</option>
                    <option value="Springfield">Springfield</option>
                    <option value="Springfield Central">Springfield Central</option>
                    <option value="Ipswich">Ipswich</option>
                    <option value="Plainland">Plainland</option>
                </select>
                <input type="hidden" name="submit_day" />
            </div>
            <br />

            <!-- Action for last 7 days by routes -->
            <input type="hidden" name="action" value="last_7_routes">
            <input type="submit" value="Last 7 Days by route">
            <br><br>
        </form>

        <!-- Display options for last 30 days by routes -->
        <form method="post">
            <div class="box-analytics-child">
                <p>Last 30 Days by Routes:</p>
                <label for="destination">Route End:</label>
                <select id="destination" name="end">
                    <option selected disabled>-- select --</option>
                    <option value="Toowoomba">Toowoomba</option>
                    <option value="Springfield">Springfield</option>
                    <option value="Springfield Central">Springfield Central</option>
                    <option value="Ipswich">Ipswich</option>
                    <option value="Plainland">Plainland</option>
                </select>
                <input type="hidden" name="submit_day" />
            </div>
            <br />

            <!-- Action for last 30 days by routes -->
            <input type="hidden" name="action" value="last_30_routes">
            <input type="submit" value="Last 30 Days by route">
            <br><br>
        </form>	

        <!-- Display options for next 7 days by routes -->
        <form method="post">
            <div class="box-analytics-child">
                <p>Next 7 Days by Routes:</p>
                <label for="destination">Route End:</label>
                <select id="destination" name="end">
                    <option selected disabled>-- select --</option>
                    <option value="Toowoomba">Toowoomba</option>
                    <option value="Springfield">Springfield</option>
                    <option value="Springfield Central">Springfield Central</option>
                    <option value="Ipswich">Ipswich</option>
                    <option value="Plainland">Plainland</option>
                </select>
                <input type="hidden" name="submit_day" />
            </div>
            <br />

            <!-- Action for next 7 days by routes -->
            <input type="hidden" name="action" value="next_7_routes">
            <input type="submit" value="Next 7 Days by route">
            <br><br>
        </form>		

        <!-- Display options for next 30 days by routes -->
        <form method="post">
            <div class="box-analytics-child">
                <p>Next 30 Days by Routes:</p>
                <label for="destination">Route End:</label>
                <select id="destination" name="end">
                    <option selected disabled>-- select --</option>
                    <option value="Toowoomba">Toowoomba</option>
                    <option value="Springfield">Springfield</option>
                    <option value="Springfield Central">Springfield Central</option>
                    <option value="Ipswich">Ipswich</option>
                    <option value="Plainland">Plainland</option>
                </select>
                <input type="hidden" name="submit_day" />
            </div>
            <br />

            <!-- Action for next 30 days by routes -->
            <input type="hidden" name="action" value="next_30_routes">
            <input type="submit" value="Next 30 Days by route">
            <br><br>
        </form>	

        <!-- Back button -->
        <form method="post">
            <input type="hidden" name="action" value="analytics">
            <input type="submit" value="Back">
            <br><br>
        </form>
    </nav>
</main>
</div>
</div>
<?php include '../view/footer.php'; ?>
