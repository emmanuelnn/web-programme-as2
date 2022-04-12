<h2>Contact us</h2>

<p>Please call us on  01604 90345 or email <a href="mailto:enquiries@clairscars.co.uk">enquiries@clairscars.co.uk</a>

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


	<input type="submit" name="submit" value="Submit" />
</form>