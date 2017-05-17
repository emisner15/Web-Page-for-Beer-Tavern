function button_control(type) 
{
	// Option 1
	if(type == "option1")
	{
	    var option = document.forms["customercheck"]["cust_name"].value;

	    if (option == "") 
	    {
	        alert("Please select a customer before resuming");
	        return false;
	    }
	}
	
	// Option 2
	if(type == "option2")
	{
	    var option = document.forms["Beer"]["beer_name"].value;

	    if (option == "") 
	    {
	        alert("Please select a Beer to continue");
	        return false;
	    }
	}
	
	// Option 3
	if(type == "option3")
	{
	    var option = document.forms["Beer"]["beer"].value;

	    if (option == "") 
	    {
	        alert("Please select the Beer that was sold");
	        return false;
	    }
	}
}
