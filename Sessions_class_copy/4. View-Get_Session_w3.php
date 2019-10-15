<?php
/* Next, we create another page from this page, 
we will access the session information we set earlier.

Notice that session variables are not passed individually 
to each new page, instead they are retrieved from the session
we open at the beginning of each page (session_start()).

Also notice that all session variable values are stored
in the global $_SESSION variable:
Session variables are set with the PHP global variable: $_SESSION.*/

session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
?>

</body>
</html>