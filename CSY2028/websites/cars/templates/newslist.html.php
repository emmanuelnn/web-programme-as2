
			<table>
			<thead>
			<tr>
			<th>News List</th>
			<th style="width: 5%">&nbsp;</th>
			<th style="width: 5%">&nbsp;</th>
			</tr>
            
<?php
			foreach ($news as $category) {
			echo '<tr>';
			echo '<td>' . $category['title'] . '</td>';
			echo '<td><a style="float: right" href="/news/edit?id=' . $category['id'] . '">Edit</a></td>';
			echo '<td><form method="post" action="/news/delete">';
			echo '<input type="hidden" name="id" value="' . $category['id'] . '" />';
			echo '<input type="submit" name="submit" value="Delete" />';
			echo '</form></td>';
			echo '</tr>';
			}
            ?>
<a href="/news/edit">Add news</a>
			</thead>
			</table>

            <a href="/admin">Back to Admin</a>
