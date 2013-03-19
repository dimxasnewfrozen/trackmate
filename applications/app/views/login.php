

	<form method="post" action="/login">
		Username/E-mail Address <br/>
		<input type="text" size="30" name="username" /> <br/>
		Password <br/>
		<input type="password" size="30" name="password" /><br/>
        
        <div>
        	<a href="/login/reset_password">Forgot/reset password</a><br/>
            <!--<a href="/login/create_account">Create new account</a>-->
        
        </div>
        
        <div class="errors">
        <?php
			if (@$errors) {
				echo $errors . "<br/>";
			}
		?>
		</div>
		<input type="submit" value="Login" class="skip"/>

	</form>

	

