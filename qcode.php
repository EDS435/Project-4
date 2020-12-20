<?php
$questionMistake = '';
$body = '';
$bodyMistake = '';
$question = '';
$answer = '';
$Mistake = '';
$list = explode(',', $_POST["answer"]);
session_start();

    if (empty($_POST["question"])) {
        $questionMistake = "Please input your question \n";
    }
    elseif (strlen($_POST["question"]) <= 3) {
        $question = "Your password should be 3 characters or longer.... \n";
    }
    else {
        $questionMistake = $_POST["question"] ;
    }
    echo $questionMistake;
    echo "<br>";

    if (empty($_POST["body"])) {
        $bodyMistake = "Please input your question's body \n";
    }
    elseif (strlen($_POST["body"]) >= 499) {
        $bodyMistake = "Your question should be shorter\n";
    }
    else {
        $bodyMistake = $_POST["body"];
    }
    echo $bodyMistake;
    echo "<br>";

    if (empty($_POST["answer"])) {
         $Mistake = "Please input your answers \n";
    }
    elseif (strlen($_POST["answer"]) < 1) {
        $bodyMistake = "Need more answers\n";
    }
    else {
        $Mistake = explode(',', $_POST["answer"]);
    }
    echo $Mistake;
    echo $list;
    echo "<br>";


function input_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>