<?php
	function Option3()
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
					<label for = "beer" > Title: </label>
					<select name="beer" size = "3">
              	<?php
                	while(oci_fetch($stmt))
              		{
						$curr_beer_id = oci_result($stmt, "BEER_ID");
                		$curr_beer_name = oci_result($stmt, "BEER_NAME");
                ?>
                		<option value="<?= $curr_beer_id?>"> <?= $curr_beer_name ?> (<?= $curr_beer_id?>) </option>
                <?php
              		}
                	oci_free_statement($stmt);
                	oci_close($conn);
                ?>
					</select>
				</div>
				<div>
					<label for = "bottle_amount" > Amount of Chosen Drink: </label>
					<input type="number" name="bottle_amount" value = "1" id="bottle_amount" required="required">
				</div>
			<input name="Option3" value="3" type="hidden"></input>
            <div>
				<input type="submit" name="submit" value="Proceed Selling Beer" onclick = "return button_control('option3');"/>
				<input type="submit" name="submit" value="Cancel"/>
            </div>
        </fieldset>
        </form>
		
	
		<?php
	}
?>