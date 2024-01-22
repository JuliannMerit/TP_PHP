<?php

require_once 'Question.php';

class QCM extends Question{
    private array $propositions;

    public function __construct(string $enonce, array $propositions, string $reponse, int $id){
        $this->setQuestion($enonce);
        $this->setPropositions($propositions);
        $this->setReponse($reponse);
        $this->setId($id);
    }

    public function getPropositions(): array{
        return $this->propositions;
    }

    public function setPropositions(array $propositions): void{
        $this->propositions = $propositions;
    }

    public function display(){
        echo "<h2>" . $this->getQuestion() . "</h2>";
        foreach($this->getPropositions() as $proposition){
            echo "<input type='radio' name='reponse' value='" . $proposition . "'>" . $proposition . "<br>";
        }
        echo "<input type='button' value='retour'>
        <input type='submit' value='Valider'>";
    }
}