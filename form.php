<?php

require('pdo.php');

function get_users_questions ($userId) {
    global $db;

    $query ='SELECT * FROM questions WHERE ownerid = :userId';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $questionform = $statement->fetchAll();
    $statement->closeCursor();

    return $questionform;
}


function create_question ($title, $body, $skills, $ownerid)
{
    global $db;

    $query = 'INSERT INTO questions
                (title, body, skills, ownerid)
              VALUES
                (:title, :body, :skills, :ownerid)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skills', $skills);
    $statement->bindValue(':ownerid', $ownerid);
    $statement->execute();
    $statement->closeCursor();

}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Questions</title>
</head>

<body>
<a href="login.php">Login: </a>
<a href="reg.php">Register: </a>
<header>
    <form action="questiondisplay.php" method="post">
        <h2>Questions</h2>
        <div>
            <label for="qC">Question of Choice</label>
            <br><br>
            <input type="text" name="qC" id="qC">
            <br><br>
        </div>
        <div>
            <label for="qB">Body of Question</label>
            <br><br>
            <textarea name="qB" id="qB" rows="5" cols="70">
                Enter the question of choice.
            </textarea>
        </div>
        <div>
            <label for="qS">Question Skills</label>
            <br><br>
            <input type="text" name="qS" id="qS">
        </div>

        <div type="text-align: center"><input type ="submit" value="Submit"></div>
    </form>
</header>
</body>

</html>