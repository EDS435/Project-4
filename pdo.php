<?php
$hostname = 'sql1.njit.edu';
$username = 'ets6';
$password = '9287744Ethan!';
$dsn = "mysql:host = $hostname; dbname=$username";

try{
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e){
    echo "Connection just did not work" . $e -> getMessage();
}
?>
