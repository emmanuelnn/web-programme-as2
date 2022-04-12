<?php
foreach($stmt as $joke) { ?>
	<blockquote>
	<p><?= $joke['joketext'];?></p>
	</blockquote>
<?php } ?>