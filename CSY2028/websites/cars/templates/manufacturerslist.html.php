
			<table>
			<thead>
			<tr>
			<th>Manufacturer List</th>
			<th style="width: 5%">&nbsp;</th>
			<th style="width: 5%">&nbsp;</th>
			</tr>
            
<?php
			foreach ($manufacturers as $category) {
			echo '<tr>';
			echo '<td>' . $category['name'] . '</td>';
			echo '<td><a style="float: right" href="/manufacturers/edit?id=' . $category['id'] . '">Edit</a></td>';
			echo '<td><form method="post" action="/manufacturers/delete">';
			echo '<input type="hidden" name="id" value="' . $category['id'] . '" />';
			echo '<input type="submit" name="submit" value="Delete" />';
			echo '</form></td>';
			echo '</tr>';
			}
            ?>
<a class="new" href="/manufacturers/edit">Add Manufacturers</a>
			</thead>
			</table>
            <a href="/admin">Back to Admin</a>
