<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project 1</title>
</head>
<body>

<h1>Project 1</h1>
<form action="display.php" method="post">
    <h2>Please Enter Your Email Address and Password</h2>
    <div>

        <label for="email">Email:</label>
        <input type="text" name ="email" id = "email">
        <span class="userMistake">* <?php echo $userMistake;?></span><br>

        <label for="pssWord">Password:</label>
        <input type="text" name ="pssWrd" id = "pssWrd">
        <span class="passwordMistake">* <?php echo $passwordMistake;?></span><br>
    </div>
    <br><br>
    <input type = "submit" value = "Submit">
</form>


</body>
</html>
