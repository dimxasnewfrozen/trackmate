
<h3>Please check your e-mail for your new temporary password. </h3>

<form method="post" action="/login/confirm_new_password">

    Username/E-mail Address <br/>
    <input type="text" size="30" name="username" value="<?php echo $email; ?>" /> <br/>
    
    Temp Password <br/>
    <input type="password" size="30" name="temp_password" /> <br/>
    
    New Password <br/>
    <input type="password" size="30" name="password1" /> <br/>
    
    Repeat New Password  <br/>
    <input type="password" size="30" name="password2" /> <br/>
    
    <div class="errors">
    <?php
    if (@$errors) {
        echo $errors . "<br/>";
    }
	if (@$success) {
		echo $success; 
	}
    ?>
    </div>
    <input type="submit" value="Update Password" class="skip"/>

</form>
