<form action="" method="POST">
	<input type="hidden" name="manufacturers[id]" value="<?=$manufacturers['id'] ?? ''?>" /> 
	<label>Manufacturers Name</label>

	<input type="text" name="manufacturers[name]" value="<?=$manufacturers['name'] ?? ''?>" /> 

	<input type="submit" name="submit" value="Save" />
</form>