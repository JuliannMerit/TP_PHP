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
}