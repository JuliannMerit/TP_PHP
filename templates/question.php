<?php

require_once '../entities/QTexte.php';
require_once '../entities/QCM.php';

session_start();

// Création des questions
$_SESSION["questions"] = array(
    new QTexte("que fait 2+2?", "4", 0),
    new QCM("Couleur rouge ?", array("noir", "bleu", "vert", "rouge"), "rouge", 1),
    new QCM("animal chien ?", array("chat", "chien", "requin", "rat"), "chien", 2)
);

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
        <form method="post" action="traitement.php">
            <?php foreach ($_SESSION["questions"] as $index => $question): ?>
                <div>
                    <p>
                        <?php echo $question->getQuestion(); ?>
                    </p>
                    <?php if ($question instanceof QTexte): ?>
                        <input type="text" name="reponse[<?php echo $index; ?>]" required>
                    <?php elseif ($question instanceof QCM): ?>
                        <?php foreach ($question->getPropositions() as $optionIndex => $option): ?>
                            <label>
                                <input type="radio" name="reponse[<?php echo $index; ?>]" value="<?php echo $option; ?>" required>
                                <?php echo $option; ?>
                            </label>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <input class="valider" type="submit" value="Valider">
        </form>
    </main>
</body>

</html>