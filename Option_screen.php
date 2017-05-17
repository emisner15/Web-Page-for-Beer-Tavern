<?php
	function Option_screen()
	{	
		if($_SESSION['next_page'] == "Option_screen")
		{
			$username = strip_tags($_POST['username']);
			$password = $_POST['password'];
			
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
		}
		else
		{
			$username=$_SESSION['username'];
			$password=$_SESSION['password'];	
		}


		?>
		<p> Option Screen </p>
		<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <fieldset>
            <legend> Options </legend>
			<div>
			</div>
            <div>
			
				<input type="submit" name="submit" value="Find Customers Age"/>
				<hr/>
				<input type="submit" name="submit" value="Beer Information"/> 
				<hr/>
				<input type="submit" name="submit" value="Sell Beer"/>
				<hr/>
				<input type="submit" name="submit" value="Exit"/>
            </div>
        </fieldset>
        </form>
		<?php
	}
?>