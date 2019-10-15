<?php
/* A cookie is often used to identify a user. 
A cookie is a small file that the server embeds on 
the user's computer. Each time the same computer 
requests a page with a browser, it will send the cookie too.
Syntax ::: setcookie(name, value, expire, path, domain, secure, httponly);*/

$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>
<html>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>