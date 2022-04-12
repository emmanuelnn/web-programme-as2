<h2>Any Enquires?</h2>

<form action="" method="POST">
	<input type="hidden" name="enquires[id]" value="<?=$enquires['id'] ?? ''?>" /> 
    
	<label>Enquires Name</label>
	<input type="text" name="enquires[name]" value="<?=$enquires['name'] ?? ''?>" /> 

    <label>Email Address</label>
    <input type="text" name="enquires[email]" value="<?=$enquires['email'] ?? ''?>" /> 


    <label>Telephone</label>
    <input type="text" name="enquires[telephone]" value="<?=$enquires['telephone'] ?? ''?>" /> 


    <label>Enquiry</label>
    <textarea name="enquires[enquiry]"><?=$enquires['enquiry'] ?? ''?></textarea>

    <label>Status</label>
    <input type="text" name="enquires[status]" value="<?=$enquires['status'] ?? ''?>" /> 

    <label>Dealt by:</label>
    <input type="text" name="enquires[members]" value="<?=$enquires['members'] ?? ''?>" /> 

	<input type="submit" name="submit" value="Submit" />
</form>