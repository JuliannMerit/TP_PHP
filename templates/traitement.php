<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat</title>
</head>

<body>
    <main>

        <?php

        require_once '../entities/QTexte.php';
        require_once '../entities/QCM.php';

        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les réponses du formulaire
            $reponses = isset($_POST['reponse']) ? $_POST['reponse'] : array();

            // Vérifier les réponses
            $questions = $_SESSION["questions"];
            $score = 0;

            echo "<h2>Résultats du Quizz</h2>";

            for ($i = 0; $i < count($questions); $i++) {
                $question = $questions[$i];
                $isReponseCorrecte = false;

                echo "<p><strong>Question " . ($i + 1) . ":</strong> " . $question->getQuestion() . "</p>";

                // Utilisez la clé spécifique pour accéder à la réponse correspondante
                $reponseDonnee = isset($reponses[$i]) ? trim($reponses[$i]) : '';

                if ($question instanceof QTexte) {
                    // Vérification pour les questions de type texte
                    $reponseAttendue = $question->getReponse();

                    echo "<p>Réponse attendue: $reponseAttendue</p>";
                    echo "<p>Votre réponse: $reponseDonnee</p>";

                    if ($reponseDonnee === $reponseAttendue) {
                        $isReponseCorrecte = true;
                        $score += 1;
                    }
                } elseif ($question instanceof QCM) {
                    // Vérification pour les questions de type QCM
                    $reponseAttendue = $question->getReponse();

                    echo "<p>Options disponibles: " . implode(', ', $question->getPropositions()) . "</p>";
                    echo "<p>Réponse attendue: $reponseAttendue</p>";

                    if ($reponseDonnee === $reponseAttendue) {
                        $isReponseCorrecte = true;
                        $score += 1;
                    }

                    echo "<p>Votre réponse: " . ($reponseDonnee ?: "[Pas de réponse]") . "</p>";
                }

                echo "<p>Réponse correcte: " . ($isReponseCorrecte ? "Oui" : "Non") . "</p>";
                echo "<hr>";
            }

            // Afficher le résultat final
            echo "<p><strong>Votre score est de :</strong> $score points.</p>";
        } else {
            // Redirection si la requête n'est pas de type POST
            header("Location: question.php");
            exit();
        }

        ?>
    </main>
</body>

</html>