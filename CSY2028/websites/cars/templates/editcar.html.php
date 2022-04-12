

<form action="" method="POST" enctype="multipart/form-data">

<input type="hidden" name="cars[id]" value="<?=$cars['id'] ?? ''?>" />
<label>Name</label>
<input type="text" name="cars[name]" value="<?=$cars['name'] ?? ''?>" />

<label>Description</label>
<textarea name="cars[description]"><?=$cars['description'] ?? ''?></textarea>

<label>Price</label>
<input type="text" name="cars[price]" value="<?=$cars['price'] ?? ''?>" />

<label>Price Before</label>
<input type="text" name="cars[price_before]" value="<?=$cars['price_after1'] ?? ''?>" />

<label>Price After</label>
<input type="text" name="cars[price_after]" value="<?=$cars['price_after'] ?? ''?>" />

<label>Mileage</label>
<input type="text" name="cars[mileage]" value="<?=$cars['mileage'] ?? ''?>" />

<label>Engine Type</label>
<input type="text" name="cars[engine_type]" value="<?=$cars['engine_type'] ?? ''?>" />

<label>Category</label>

<select name="cars[manufacturerId]">
				<?php

					foreach ($manufacturers as $manufacturer) {
                        echo '<option value="' . $manufacturer['id'] . '">' . $manufacturer['name'] . '</option>';
					}

				?>

</select>



<label>Image</label>

<input type="file" name="image" />


<input type="submit" name="submit" value="Save Car" />

			</form>