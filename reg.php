<?php
require('pdo.php');

    $fName = filter_input(INPUT_POST, 'firstName');
    $lName = filter_input(INPUT_POST, 'lastName');
    $bDay = filter_input(INPUT_POST, 'birthday');
    $eMail = filter_input(INPUT_POST, 'email');
    $PassWord = filter_input(INPUT_POST, 'password');


    if(strlen($PassWord) < 8) {
        echo 'Password should be at least 8 characters';}
    if (empty($fName)){
        echo 'First name is empty'; }
    if (empty($lName)){
        echo 'Last name is empty'; }
    if (empty($bDay)){
        echo 'Birthday is empty'; }
    if (empty($eMail)){
        echo 'Email is empty'; }
    if (strpos($eMail, '@') == false ) {
        echo 'Email must contain an @ character';
    }

    $query = 'INSERT INTO accounts
                (email, fname, lname, birthday, password)
             VALUES
                (:email, :fname, :lname, :birthday, :password)';

    global $db;
    $statement = $db->prepare($query);

    $statement->bindValue(':email', $eMail);
    $statement->bindValue(':fname', $fName);
    $statement->bindValue(':lname', $lName);
    $statement->bindValue(':birthday', $bDay);
    $statement->bindValue(':password', $PassWord);

    $statement->execute();

    $statement->closeCursor();

?>

<html>
<body>
<head>
    <h2>Display Registration Inputs</h2>
    <div>
        <?php echo "Registration is complete <br>"; ?>
    </div>
    <div>
        Your first name is: <?php echo $fName; ?>
    </div>
    <div>
        Your last name is: <?php echo $lName; ?>
    </div>
    <div>
        Date of birth: <?php echo $bDay; ?>
    </div>
    <div>
        Email: <?php echo $eMail; ?>
    </div>
    <div>
        Password: <?php echo $PassWord; ?>
    </div>

    <a>Go back to home page</a>
</head>
</body>
</html>