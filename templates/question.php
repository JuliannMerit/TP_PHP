<?php
require_once '../entities/QTexte.php';
require_once '../entities/QCM.php';

try{
    $file_bd = new PDO('sqlite:qcm.sqlite3');
    $file_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $result = $file_bd->query('SELECT * FROM questions');
    $reponses = array();
    $questions = array();
    foreach ($result as $row) {
        if ($row['type'] === "QTexte") {
            $question = new QTexte($row['question'], $row['reponse'], $row['id']);
        } else {
            $autre_reponse = array();
            $result2 = $file_bd->query('SELECT * FROM reponses WHERE id_question = ' . $row['id']);
            foreach ($result2 as $row2) {
                array_push($autre_reponse, $row2['reponse']);
            }
            $question = new QCM($row['question'], $autre_reponse, $row['id']);
        }
        array_push($questions, $question);
    }


}catch (PDOException $e) {
    echo "Error !: " . $e->getMessage() . "<br/>";
    die();
}

$questions = array(
    new QTexte("que fait 2+2?", "4", 0),
    new QCM("Question 2", array("rep1", "rep2", "rep3", "rep4"), "rep2", 1),
    new QCM("Question 3", array("rep1", "rep2", "rep3", "rep4"), "rep3", 2)
);


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question
        <?php ?>
    </title>
</head>

<body>
    <main>
        <?php
        $question = $questions[$_GET["index"]];
        echo "<h2>" . $question->getQuestion() . "</h2>";
        $nextId = $question->getId() + 1;
        echo "<p>" . $nextId . "</p>";
        echo '<form action="question.php?index=' . $nextId . '" method="post">';
        if ($nextId !== 1) {
            array_push($reponses, $_POST["reponse"]);
        }
        echo print_r($reponses)
            ?>
        <input class="reponse" type="text" placeholder="votre Réponse" name="reponse">
        <input class="valider" type="submit" value="Valider">
        </form>
    </main>
</body>

</html>