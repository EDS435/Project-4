<?php

require('pdo.php');

$cHoice = filter_input(INPUT_POST, 'cHoice');
$bOdy = filter_input(INPUT_POST, 'bOdy');
$bOdy = htmlspecialchars($bOdy);
$sKills = filter_input(INPUT_POST, 'sKills');
$iD = filter_input(INPUT_POST, 'iD');
$sKillArray= explode(',', $sKills);



if (strlen($cHoice) < 1) {
    echo 'There was no question';
    echo"<br>";
}
elseif (strlen($cHoice) < 3){
    echo 'Your question was too long, less than 3 characters..';
    echo"<br>";
}

if (strlen($bOdy) < 1) {
    echo 'Your response was either too short or you did not respond';
    echo"<br>";
}
elseif(strlen($bOdy) > 500){
    echo 'Your response is too long';
    echo"<br>";
}

if(count($sKills) < 2){
    echo 'You have to enter 2 skills';
    echo"<br>";
}

global $db;

$query = 'INSERT INTO questions
                (title, body, skills, ID)
              VALUES
                (:title, :body, :skills, :ID)';
$statement = $db->prepare($query);
$statement->bindValue(':title', $cHoice);
$statement->bindValue(':body', $bOdy);
$statement->bindValue(':skills', $sKills);
$statement->bindValue(':ID', $iD);
$statement->execute();
$statement->closeCursor();

?>

<html>
<head><title>Your Registration Question</title></head>
<body>

<h2>Your Question</h2>
<div>
    Choice: <?php echo $cHoice; ?>
</div>

<h2> Question Body </h2>
<div>
    Body:<br>
    <?php echo $bOdy; ?>
</div>

<h2> Your Skills </h2>
<div>
    Skills Array: <?php print_r($sKills); ?><br>
</div>

<div type="text-align: center"><input type ="submit" value="Add New Question"></div>

</body>
</html>