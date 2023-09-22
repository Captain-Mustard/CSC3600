<?php include '../view/header.php'; ?>

<h1>Passengers on Board:</h1>

<table>
    <tr>
    <th>UniSQ ID: </th>
    <th>Off Time: </th>
    <th>Finished: </th>
    <th>&nbsp;</th>
    </tr>
	

    <?php foreach ($passengers_off as $passenger_off) : ?>
        <tr>

            <td><?php echo htmlspecialchars($passenger_off['unisqId']); ?></td>
            <td><?php echo htmlspecialchars($passenger_off['offTime']); ?></td>
			<td><?php echo htmlspecialchars($passenger_off['finished']); ?></td>
            </form></td>
        </tr>
        <?php endforeach; ?>
    </table>

</table>

<?php include '../view/footer.php'; ?>