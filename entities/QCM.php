<?php

require 'Question.php';

use Question;

class QCM extends Question{
    private array $propositions;

    public function __construct(string $enonce, array $propositions, string $reponse){
        $this->setQuestion($enonce);
        $this->setPropositions($propositions);
        $this->setReponse($reponse);
    }

    public function getPropositions(): array{
        return $this->propositions;
    }

    public function setPropositions(array $propositions): void{
        $this->propositions = $propositions;
    }
}