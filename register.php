<?php
    $userMistake = '';
    $passwordMistake = '';
    $email = '';
    $pssWrd = '';
    $FirstName = '';
    $FNmistake = '';
    $LastName = '';
    $LNmistake = '';
    $Bday = '';
    $BdayMistake = '';
    session_start();
    if(empty($_POST["email"])){
        $userMistake = "Enter your email please...\n";
    }
    else{
        $email = input_data($_POST["email"]);
        if(strpos($email,'@') == false){
            $userMistake = "You don't have @....\n";
        }
        else{
            $userMistake = "Your email is valid\n";
        }

    }
    echo $userMistake;
    echo "<br>";

    if (empty($_POST["pssWrd"])){
        $passwordMistake = "Please input your password\n ";
    }
    elseif(strlen($_POST["pssWrd"]) <= 7){
        $passwordMistake = "Your password should be 8 characters or longer\n";
    }
    else{
        $passwordMistake = "Password is valid\n";
    }
    echo $passwordMistake;
    echo "<br>";

    if(empty($_POST["FirstName"])){
        $FNmistake= "Enter your First Name....\n";
    }
    else{
        $FNmistake= "First Name is Valid.\n";
    }
    echo $FNmistake;
    echo "<br>";

    if(empty($_POST["LastName"])){
        $LNmistake = "Enter your Last Name....\n";
    }
    else{
        $LNmistake = "Last Name is Valid\n";
    }
    echo $LNmistake;
    echo "<br>";

    if(empty($_POST["Bday"])){
        $BdayMistake = "Enter your Birthday....\n";
    }
    else{
        $BdayMistake = "Your Birthady is Valid.\n";
    }
    echo $BdayMistake;
    echo "<br>";

    function input_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

?>
