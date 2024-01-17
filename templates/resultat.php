<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    // Initialize the score
    $score = 0;

    // Loop through each question
    echo print_r($_POST);
    foreach ($_POST["questions"] as $question) {
        // Print the question
        echo $question['question'];

        // Check if the answer is correct
        if ($question['answer'] == $question['user_answer']) {
            echo " - correct";
            $score++;
        } else {
            echo " - incorrect";
        }

        echo "<br>";
    }

    // Print the total score
    echo "Total Score: " . $score;
    ?>
</body>
</html>