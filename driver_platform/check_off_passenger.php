<?php include '../view/header.php'; 
require('../model/database.php');

$passengers_off = mark_off_passenger($off_time, $finished, $trip_id, $uni_id)?>

<div class="container">
<h1>Passengers on Board:</h1>

<table>
    <tr>
    <th>UniSQ ID: </th>
    <th>Off Time: </th>
    <th>Finished: </th>
    <th>&nbsp;</th>
    </tr>
        <tr>

            <td><?php echo $uni_id; ?></td>
            <td><?php echo $off_time; ?></td>
            <td><?php echo $finished; ?></td>
         
        </tr>

</table>

<form action="." method="post">
            <input type="hidden" name="action" value="get_passengers">
                <input type="submit" value="Check Off More Passengers">
    </form>

<form action="../booking_platform/logout.php" method="post">
            <input type="hidden" name="action" value="log_out">
            <input class="submit-button" type="submit" value="Logout">
        </form>
</div>

<?php include '../view/footer.php'; ?>