<?php

abstract class Question{
    private string $reponse;

    private string $question;

    public function getReponse(): string{
        return $this->reponse;
    }

    public function setReponse(string $reponse): void{
        $this->reponse = $reponse;
    }

    public function getQuestion(): string{
        return $this->question;
    }

    public function setQuestion(string $question): void{
        $this->question = $question;
    }
}