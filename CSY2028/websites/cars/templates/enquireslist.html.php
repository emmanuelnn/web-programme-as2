<table>
			<thead>
			<tr>
			<th>Enquires List</th>
			<th style="width: 5%">&nbsp;</th>
			<th style="width: 5%">&nbsp;</th>
			</tr>
            
<?php
			foreach ($enquires as $category) {
			echo '<tr>';
			echo '<td>Name: ' . $category['name'] . '</td>';
            echo '<td><h3>Enquiry:</h3> ' . $category['enquiry'] . '</td>';
            echo '<td>Status: ' . $category['status'] . '</td>';
            echo '<td>Dealt by: ' . $category['members'] . '</td>';
			echo '<td><a style="float: right" href="/enquires/edit?id=' . $category['id'] . '">Edit</a></td>';
			echo '<td><form method="post" action="/enquires/delete">';
			echo '<input type="hidden" name="id" value="' . $category['id'] . '" />';
			echo '<input type="submit" name="submit" value="Delete" />';
			echo '</form></td>';
			echo '</tr>';
			}
            ?>
            
<a href="/enquires/edit">Add enquires</a>
			</thead>
			</table>
            <a href="/admin">Back to Admin</a>
