<?php
	function Page_handle()
	{
		/* option screen*/
		if($_POST['submit'] == "Exit")
		{
			Cust_login();
			$_SESSION['next_page'] = "Option_screen";
		}
		elseif($_POST['submit'] == "Find Customers Age")
		{
			if($_POST['submit'] == "Find Customers Age")
			{
				Option1();
				$_SESSION['next_page'] = "Page_handle";
			}
		}
		elseif($_POST['submit'] == "Find Customers Age")
		{
			if($_POST['submit'] == "Find Customers Age")
			{
				Option1();
				$_SESSION['next_page'] = "Page_handle";
			}
		}
		elseif($_POST['submit'] == "Beer Information")
		{
			if($_POST['submit'] == "Beer Information")
			{
				Option2();
				$_SESSION['next_page'] = "Page_handle";
			}
		}
		elseif($_POST['submit'] == "Sell Beer")
		{
			if($_POST['submit'] == "Sell Beer")
			{
				Option3();
				$_SESSION['next_page'] = "Page_handle";
			}
		}
		
		/*options*/
		elseif($_POST['submit'] == "Cancel")
		{
			Option_screen();
			$_SESSION['next_page'] = "Page_handle";
			
		}
		elseif($_POST['submit'] == "Proceed Find Customers Age")
		{
			if($_POST['Option1'] == "1")
			{
				Option1_results();
				$_SESSION['next_page'] = "Page_handle";
			}
		}
		elseif($_POST['submit'] == "Proceed Finding Beer Information")
		{
			if($_POST['Option2'] == "2")
			{
				Option2_results();
				$_SESSION['next_page'] = "Page_handle";
			}
		}
		elseif($_POST['submit'] == "Proceed Selling Beer")
		{
			if($_POST['Option3'] == "3")
			{
				Option3_results();
				$_SESSION['next_page'] = "Page_handle";
			}
		}
		/* Result pages*/
		elseif($_POST['submit'] == "Another")
		{
			if($_POST['result'] == "1")
			{
				Option1();
				$_SESSION['next_page'] = "Page_handle";
			}
			elseif($_POST['result'] == "2")
			{
				Option2();
				$_SESSION['next_page'] = "Page_handle";
			}
			elseif($_POST['result'] == "3")
			{
				Option3();
				$_SESSION['next_page'] = "Page_handle";
			}


		}
		elseif($_POST['submit'] == "Option Screen")
		{
			Option_screen();
			$_SESSION['next_page'] = "Page_handle";
		}
		
		/*Error end session*/
		else
		{
			echo("oops");	
			session_destroy();
		}
	}
?>