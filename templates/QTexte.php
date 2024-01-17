<?php

require 'QuestionC.php';


class QTexte extends QuestionC{
    public function __construct(string $enonce, string $reponse, int $id){
        $this->setQuestion($enonce);
        $this->setReponse($reponse);
        $this->setId($id);
    }

    public function display(){
        echo "<h2>" . $this->getQuestion() . "</h2>
        <input type='text' name='reponse' id='reponse' placeholder='Votre réponse' required>
        <imput type='button' value='retour'>
        <input type='submit' value='Valider'>";
    }
}