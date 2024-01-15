<?php

require 'Question.php';

use Question;

class QTexte extends Question{
    public function __construct(string $enonce, string $reponse){
        $this->setQuestion($enonce);
        $this->setReponse($reponse);
    }

}