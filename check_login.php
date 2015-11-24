<?php
	session_start();
	mysql_connect("localhost","root","");
	mysql_select_db("webapp");
	$strSQL = "SELECT * FROM member WHERE username = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["status"] = $objResult["status"];

			session_write_close();
			
			if($objResult["status"] == "admin")
			{
				header("location:home.html");
			}
			else
			{
				header("location:user_page.php");
			}
	}
	mysql_close();
?>
