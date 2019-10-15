
<?php 

Session_start();

if (isset($_SESSION['Username']))
{
	echo 'Welcome, '.$_SESSION['Username'];
}
else
{ echo 'Please login';
}

?>