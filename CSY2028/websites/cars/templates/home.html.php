<h2>Welcome to Claire's Cars, Northampton's specialist in classic and import cars.</h2>


<h3>Latest News</h3>


<p><em>
<?php
foreach ($news as $new) {
echo '<em>'. $new['newsdate'] . '</em>' ;
echo '<li>'. $new['description'] . '</li>' ;
echo '<p> Posted By: '. $new['postedby'] . '</p>' ;
}
?>
</em></p>