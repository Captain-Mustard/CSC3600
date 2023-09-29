<?php
include '../view/header.php';
require('../model/database.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script>
        // Function to disable weekend days in the date input
        function disableWeekends() {
            var dateInput = document.getElementById('date');
            if (dateInput) {
                dateInput.addEventListener('input', function() {
                    var selectedDate = new Date(dateInput.value);
                    var dayOfWeek = selectedDate.getDay(); // 0 = Sunday, 6 = Saturday
                    if (dayOfWeek === 0 || dayOfWeek === 6) {
                        alert('Weekend days (Saturday and Sunday) are not selectable.');
                        dateInput.value = ''; // Clear the input if it's a weekend day
                    }
                });
            }
        }

        // Function to toggle the visibility of the start time dropdown
        function toggleStartTimeVisibility() {
            var departureSelect = document.getElementById('departure');
            var startTimeSelect = document.getElementById('startTime');

            if (departureSelect && startTimeSelect) {
                departureSelect.addEventListener('change', function() {
                    if (departureSelect.value !== '') {
                        startTimeSelect.style.display = 'block';
                        populateStartTimes(departureSelect.value);
                    } else {
                        startTimeSelect.style.display = 'none';
                        startTimeSelect.innerHTML = ''; // Clear the options
                    }
                });
            }
        }

        // Function to populate start times based on departure point
        function populateStartTimes(departurePoint) {
            var startTimes = document.getElementById('startTime');

            // Define the available start times based on the selected departure point
            var toowoombaTimes = ['06:30', '10:00', '13:15', '16:15'];
            var springfieldTimes = ['06:45', '10:00', '13:15', '16:15'];

            // Choose the appropriate start times array based on the departure point
            var timesArray = (departurePoint === 'Toowoomba') ? toowoombaTimes : springfieldTimes;

            // Clear previous options
            startTimes.innerHTML = '';

            // Populate start time options
            for (var i = 0; i < timesArray.length; i++) {
                var option = document.createElement('option');
                option.value = timesArray[i];
                option.text = timesArray[i];
                startTimes.appendChild(option);
            }
        }

        window.onload = function() {
            disableWeekends();
            toggleStartTimeVisibility();
        };
    </script>
</head>
<body>
    <main>
        <div class="container">
            <h1>Bus Booking</h1>
            <form method="post" action="book_bus.php">
                <div class="form-group">
                    <label for="date">Select Date:</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="form-group">
                    <label for="departure">Select Departure Point:</label>
                    <select id="departure" name="departure" required>
                        <option value="">Select Departure Point</option>
                        <option value="Toowoomba">Toowoomba</option>
                        <option value="Springfield">Springfield</option>
                    </select>
                </div>

                <div class="form-group">
                    <!-- Start Time Dropdown (Initially hidden) -->
                    <label for="startTime" style="display: none;">Select Start Time:</label>
                    <select id="startTime" name="startTime" required style="display: none;">
                        <!-- Start times options will be populated dynamically -->
                    </select>
                </div>

                <input type="submit" class="submit-button" value="Book Trip">
            </form>
        </div>
    </main>
</body>
</html>

<?php include '../view/footer.php'; ?>