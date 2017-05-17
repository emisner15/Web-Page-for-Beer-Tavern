<?php
	function Option1()
	{
			
		if($_SESSION['next_page'] == "Option1")
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


        $conn = oci_connect($username, $password, $db_conn_str);
		
		$query_cust_name = 'select cust_id,cust_lname, cust_fname '.
                      	  'from customers';

		$stmt = oci_parse($conn, $query_cust_name);
        oci_execute($stmt, OCI_DEFAULT);
			
			

        if (! $conn)
        {
        	?>
            <p> Could not log into Oracle, sorry. </p>

            <?php
           		require_once("328footer.html");
     		?>
		</body>
		</html>
            <?php
           		session_destroy();
            	exit;        
        }

		?>
		  <form method="post" onsubmit="return (validateForm() );" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>" 
			  name="customercheck">
        	<fieldset>
            	<legend> Select a Customer's Name </legend>
				<div>
					<label for = "cust_name" > Customer Names: </label>
					<select name="cust_name" size = "3">
              	<?php
                	while(oci_fetch($stmt))
              		{
						$curr_cust_id = oci_result($stmt, "CUST_ID");
						$curr_cust_lname = oci_result($stmt, "CUST_LNAME");
                		$curr_cust_fname = oci_result($stmt, "CUST_FNAME");
                ?>
                		<option value= <?= $curr_cust_id ?>> <?= $curr_cust_lname ?>, <?= $curr_cust_fname ?> </option>
                <?php
              		}
                	oci_free_statement($stmt);
                	oci_close($conn);
                ?>
				
		<p> Option 1 </p>
		<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <fieldset>
			<input name="Option1" value="1" type="hidden"></input>
            <div>
				<input type="submit" name="submit" value="Proceed Find Customers Age" onclick = "return button_control('option1');"/>
				<input type="submit" name="submit" value="Cancel"/>
            </div>
        </fieldset>
        </form>
		<?php
	}
?>