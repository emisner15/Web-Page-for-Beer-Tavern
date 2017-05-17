<?php
    session_start();
?>
<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml">

<!-- 
    using session attributes to control a multi-state
    application

    you can run this via the URL: (post-labs combined version)
    http://nrs-projects.humboldt.edu/~em1909/cs328hw10/Custom_call.php



    by: Eric Misner
    last modified: 2017-04-28
-->

<head>  
    <title> Beer Tavern Details</title>
    <meta charset="utf-8" />

    <?php

        require_once("Cust_login.php");
		require_once("Option_screen.php");
		require_once("Option1.php");
		require_once("Option2.php");
		require_once("Option3.php");
		require_once("Option1_results.php");
		require_once("Option2_results.php");
		require_once("Option3_results.php");
		require_once("Page_handle.php");
		require_once("hsu_conn_sess.php");
    ?>

    <link href="http://users.humboldt.edu/smtuttle/styles/normalize.css" 
          type="text/css" rel="stylesheet" />

    <link href="http://nrs-projects.humboldt.edu/~em1909/cs328hw10/newcustome.css" 
	  type="text/css" rel="stylesheet" />

	



    <script src ="button_control.js" type="text/javascript"> </script>



</head> 

<body>
    <h1> Beer Tavern</h1>

    <?php
    if (! array_key_exists('next_page', $_SESSION))
    {
        Cust_login();
        $_SESSION['next_page'] = "Option_screen";
    }
    elseif ($_SESSION['next_page'] == "Option_screen")
    {
        Option_screen();
        $_SESSION['next_page'] = "Page_handle";
    }
	elseif($_SESSION['next_page']=="Page_handle")
	{
		Page_handle();
	}
    else
    {

        session_destroy();
        session_regenerate_id(TRUE);
        session_start();

     
    }

    require_once("328footer.html");
?>
</body>
</html>