<?php

require('pdo.php');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if (strpos($email, '@') == false ) {
    echo 'Email must contain an @ character';
    echo '<br>';
} else{
    $userID=check_login($email,$password);
    if($userID==false){
        header("location: .?action=display_registration");
    }else{
        header("location: .?action=display_questions&userID=$userID");
    }


}

if (empty($password)) {
    echo 'We need your password';
} elseif (strlen($password) <= 8){
    echo 'Your password must have 8 or more characters';
    echo "<br>";
}


function check_login($email, $password) {
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    if(count($user)>0){
        return $user['id'];
    } else {
        return false;
    }

}

?>

<html>
<head>
    <title>Here is your login Information</title></head>
<body>

<h2>Here is your private information</h2>
<div>
    Email: <?php echo $email; ?>
</div>
<div>
    Password: <?php echo $password; ?>
</div>
<div style="text-align: center"><a href="quest.php">Click Next to go to Questions</a></div>
</body>
</html>

