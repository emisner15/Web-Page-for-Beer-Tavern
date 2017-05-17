<?php
	function Option2_results()
	{
		
		$conn = hsu_conn_sess($_SESSION['username'], $_SESSION['password']);
		
		$beer_style_query = 'select beer_name,year,bottle_ammount,keg_ammount,beer_style_name '.
						    'from serving_style A,beer_style C,beer B,beer_serving_style S '.
                            'where B.beer_id = S.beer_id 
                                  and (S.serving_style_id = A.serving_style_id)
                                  and (B.beer_style_id = C.beer_style_id)
                                  and (B.beer_id = :beer_id)';
		     
			 
		$stmt = oci_parse($conn, $beer_style_query);

		$beer_id = $_POST['beer_name'];
		
	    $_SESSION['beer_name'] = $beer_id;
			
		oci_bind_by_name($stmt, ":beer_id", $beer_id);
			
		oci_execute($stmt, OCI_DEFAULT);


		?>
		
		
		
        <table>
        <caption> Beer Information </caption>
        <tr> <th scope ="col">Beer Name</th>
			 <th scope ="col">Year</th>
			 <th scope ="col">Bottles of Beer</th>
			 <th scope ="col">Keg Amount</th>
			 <th scope="col"> Type </th>
		</tr>

   <?php	
		while(oci_fetch($stmt))
		{
            $curr_beer_name = oci_result($stmt, "BEER_NAME");
			$curr_year = oci_result($stmt, "YEAR");
			$curr_bottles = oci_result($stmt, "BOTTLE_AMMOUNT");
			$curr_keg = oci_result($stmt, "KEG_AMMOUNT");
            $curr_type = oci_result($stmt, "BEER_STYLE_NAME");

        }
		oci_free_statement($stmt);
		oci_close($conn);
    ?>
	
	
		    <tr>
				<td> <?= $curr_beer_name ?> </td>
				<td> <?= $curr_year ?> </td>
				<td> <?= $curr_bottles ?> </td>
				<td> <?= $curr_keg ?>oz</td>
				<td> <?= $curr_type ?> </td>
			</tr>;
			
         </table>

<hr/>
		<p> Option 2 Results </p>
		<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <fieldset>
			<input name="result" value="2" type="hidden"></input>
            <div>
				<input type="submit" name="submit" value="Another"/>
				<input type="submit" name="submit" value="Option Screen"/>
            </div>
        </fieldset>
        </form>
		<?php
	}
?>