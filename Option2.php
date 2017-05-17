<?php
	function Option2()
	{
			$username=$_SESSION['username'];
			$password=$_SESSION['password'];	
		


        $conn = oci_connect($username, $password, $db_conn_str);
		
		$beer_query = 'select beer_id,beer_name '.
					  'from beer ';
					  
	    $stmt = oci_parse($conn, $beer_query);
        oci_execute($stmt, OCI_DEFAULT);
		

		?>
		 <form method="post" onsubmit="return (validateForm() );" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>" 
			  name="Beer">
        	<fieldset>
            	<legend> Select a Beer </legend>
				<div>
					<label for = "beer_name" > Title: </label>
					<select name="beer_name" size = "3">
              	<?php
                	while(oci_fetch($stmt))
              		{
						$curr_beer_id = oci_result($stmt, "BEER_ID");
                		$curr_beer_name = oci_result($stmt, "BEER_NAME");
                ?>
                		<option value= <?= $curr_beer_id?>> <?= $curr_beer_name ?> (<?= $curr_beer_id?>) </option>
                <?php
              		}
                	oci_free_statement($stmt);
                	oci_close($conn);
                ?>
					</select>
					
							<input name="Option2" value="2" type="hidden"></input>
            <div>
				<input type="submit" name="submit" value="Proceed Finding Beer Information" onclick = "return button_control('option2');"/>
				<input type="submit" name="submit" value="Cancel"/>
            </div>
			
			
		<hr/>
			
		<?php
	}
?>