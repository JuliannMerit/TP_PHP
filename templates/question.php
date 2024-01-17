<?php

session_start();

require_once 'QTexte.php';
require_once 'QCM.php';
require_once 'bd.php';

date_default_timezone_set('Europe/Paris');

try{
    $file_bd = new PDO('sqlite:qcm.sqlite3');
    $file_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $file_bd->query('SELECT * FROM QUESTION');
    $reponses = array();
    $questions = array();
    foreach ($result as $row) {
        if ($row['type'] === "QTexte") {
            $question = new QTexte($row['question'], $row['reponse'], intval($row['id']));
        } else {
            $autre_reponse = array();
            $result2 = $file_bd->query('SELECT * FROM REPONSE WHERE id_question = ' . intval($row['id']));
            foreach ($result2 as $row2) {
                array_push($autre_reponse, $row2['reponse']);
            }
            $question = new QCM($row['question'], $autre_reponse, $row['reponse'], intval($row['id']));
        }
        array_push($questions, $question);
    }


}catch (PDOException $e) {
    echo "Error !: " . $e->getMessage() . "<br/>";
    die();
}

if (!isset($_SESSION["reponses"])) {
    $_SESSION["reponses"] = array();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $questionIndex = $_GET["index"];
    $reponse = $_POST["reponse"];
    if ($questionIndex !== "0") {
        $_SESSION["reponses"][$questionIndex] = $reponse;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
</head>

<body>
    <main>
        <?php
        $question = $questions[$_GET["index"]];
        echo "<h2>" . $question->getQuestion() . "</h2>";
        $nextId = $question->getId() + 1;
        echo '<form action="question.php?index=' . $nextId . '" method="post">';
        echo print_r($_SESSION["reponses"]);
        ?>
        <input class="reponse" type="text" placeholder="votre Réponse" name="reponse">
        <input class="valider" type="submit" value="Valider">
        </form>
    </main>
</body>

</html>