<?php

abstract class QuestionC{
    private string $reponse;

    private string $question;

    private int $id;

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

    public function getId(): int{
        return $this->id;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }
}