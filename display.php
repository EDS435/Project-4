<?php

require('pdo.php');

$fName = filter_input(INPUT_POST,'fName');
$lName = filter_input(INPUT_POST,'lName');
$bDay = filter_input(INPUT_POST,'bDay');
$PassWord = filter_input(INPUT_POST,'PassWord');
$eMail = filter_input(INPUT_POST,'eMail');

    if(strlen($PassWord) >= 8) {
        echo "First Name: $fName <br>";
        echo "Last Name: $lName <br>";
        echo "Birthday: $bDay <br>";
        echo "E-mail: $eMail <br>";
        echo "Password: $PassWord <br>";

        $query = 'INSERT INTO accounts
                     (email, Firstname, Lastname, BirthDay, PassWord)
                    
                    VALUES 
                        (:email, :Firstname, :Lastname, :BirthDay, PassWord)';

        global $db;
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $eMail);
        $statement->bindValue(':FirstName', $fName);
        $statement->bindValue(':LastName', $lName);
        $statement->bindValue(':BirthDay', $bDay);
        $statement->bindValue(':PassWord', $PassWord);

        $statement->execute();

        $statement->closeCursor();

    }else {
        echo "Form is not valid";
    }
?>