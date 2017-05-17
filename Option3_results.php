<?php
	function Option3_results()
	{
		$beer_id = $_POST["beer"];	
		$quantity = $_POST["bottle_amount"];
		
		
		$conn = hsu_conn_sess($_SESSION['username'], $_SESSION['password']);
		
		
		$sell_beer= 'BEGIN sell_bottles(:beer_id,:amount);END;';
		
		$stmt = oci_parse($conn, $sell_beer);

		oci_bind_by_name($stmt, ":beer_id", $beer_id);
		oci_bind_by_name($stmt, ":amount", $quantity);
					
		oci_execute($stmt, OCI_DEFAULT);
		oci_commit($conn);
		oci_free_statement($stmt);
        oci_close($conn);
		
		
		$conn = hsu_conn_sess($_SESSION['username'], $_SESSION['password']);
		
		
		$query= 'select beer_name '.
				'from beer '.
				'where beer_id = :beer_id';
		
		$stmt = oci_parse($conn, $query);

		oci_bind_by_name($stmt, ":beer_id", $beer_id);
					
		oci_execute($stmt, OCI_DEFAULT);
		
		while(oci_fetch($stmt))
        {
			$beer_name = oci_result($stmt, "BEER_NAME");
		}
		?>
		
		<p> Option 3 Results </p>
		
		<p> You sold <strong> <?= $quantity ?> <?= $beer_name ?> </strong> </p> 
		<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <fieldset>
			<input name="result" value="3" type="hidden"></input>
            <div>
				<input type="submit" name="submit" value="Another"/>
				<input type="submit" name="submit" value="Option Screen"/>
            </div>
        </fieldset>
        </form>
		<?php
	}
?>