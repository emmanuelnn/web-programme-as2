<h2>Cars</h2>

<a class="new" href="/cars/edit">Add New Car</a>


<table>
<thead>
<tr>
<th>Model</th>
<th style="width: 10%">Price</th>
<th style="width: 5%">&nbsp;</th>
<th style="width: 5%">&nbsp;</th>
</tr>

<?php
foreach ($cars as $car) {
    echo '<tr>';
    echo '<td>' . $car['name'] . '</td>';
    echo '<td>£' . $car['price'] . '</td>';
    echo '<td><a style="float: right" href="/cars/edit?id=' . $car['id'] . '">Edit</a></td>';
    echo '<td><form method="post" action="/cars/delete">
    <input type="hidden" name="id" value="' . $car['id'] . '" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>';
    echo '</tr>';
}
?>
</thead>
</table>

<a href="/admin">Back to Admin</a>
