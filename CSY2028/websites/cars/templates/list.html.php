<section class="left">
		<ul>
			<p>Manufacturer</p>
            <?php 
        foreach ($manufacturers as $manufacturer) {
            echo '<li>';
            ?>
            <a href="/cars/car_filter?id=<?=$manufacturer['id']?>"><?=$manufacturer['name']?></a>

            <?php 
            echo '</li>';
        }
            ?>
		</ul>
	</section>


    <section class="right">

<ul class= 'cars'>
<?php

	foreach ($cars as $car) {
		$manufacturer = $manufacturersTable ->find('id',$car['manufacturerId'])[0];
		echo '<li>';

		if (file_exists('images/cars/' . $car['id'] . '.jpg')) {
			echo '<a href="/images/cars/' . $car['id'] . '.jpg"><img src="/images/cars/' . $car['id'] . '.jpg" /></a>';
		}

		echo '<div class="details">';
		echo '<h2>' . $manufacturer['name'] . ' ' . $car['name'] . '</h2>';
		echo '<h3>£' . $car['price'] . '</h3>';
		echo '<h3><em>' . $car['price_before'] . '</h3></em>';
		echo '<h3>' . $car['price_after'] . '</h3>';
		echo '<p>' . $car['description'] . '</p>';

		echo '<h3>Mileage: </h3>' . '<p>' . $car['mileage'] . ' miles</p>';
		echo '<h3>Engine Type: </h3>' . '<p>' . $car['engine_type'] . '</p>';

		echo '</div>';
		echo '</li>';
	}

	?>

    </ul>
    </section>
