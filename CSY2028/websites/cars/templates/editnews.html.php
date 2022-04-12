<form action="" method="POST">
	<input type="hidden" name="news[id]" value="<?=$news['id'] ?? ''?>" /> 
    
	<label>News Name</label>
	<input type="text" name="news[title]" value="<?=$news['title'] ?? ''?>" /> 

    <label>Description</label>
    <textarea name="news[description]"><?=$news['description'] ?? ''?></textarea>

    <label>Posted By</label>
    <input type="text" name="news[postedby]" value="<?=$news['postedby'] ?? ''?>" /> 
    

	<input type="submit" name="submit" value="Save" />
</form>