<?php
	function Option1_results()
	{
		
		if($_SESSION['next_page'] == "Option1_results")
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
		
			$conn = hsu_conn_sess($_SESSION['username'], $_SESSION['password']);
		
			$cust_by_age = 'begin :b := cust_by_age(:customer_id);end;';
			
			$stmt = oci_parse($conn, $cust_by_age);
			
			$cust_id = $_POST['cust_name'];
			
			oci_bind_by_name($stmt, ":customer_id", $cust_id);
			oci_bind_by_name($stmt, ":b", $cust_age, 10000); 
	
			oci_execute($stmt, OCI_DEFAULT);
			oci_free_statement($stmt);
			oci_close($conn);
			
		?>
		        <table>
        <caption> Customer's Names </caption>
        <tr> <th scope ="col">Customers Age</th>
		</tr>

	
		    <tr>
				<td> <?= $cust_age?> </td>
			</tr>;
			
         </table>



<hr/>
		<p> Option 1 Results </p>
		<form method="post" 
              action="<?= htmlentities($_SERVER['PHP_SELF'], ENT_QUOTES) ?>">
        <fieldset>
			<input name="result" value="1" type="hidden"></input>
            <div>
				<input type="submit" name="submit" value="Another"/>
				<input type="submit" name="submit" value="Option Screen"/>
            </div>
        </fieldset>
        </form>
		<?php
	}
?>