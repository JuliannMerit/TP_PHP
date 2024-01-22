INSERT INTO UTILISATEUR(id_utilisateur, nom) VALUES
(1, 'Juliann'),
(2, 'Théo');

INSERT INTO QUESTION(id_question, question, reponse, type) VALUES
(1, 'Quel est le meilleur jeu de l''année ?', 'Baldur''s Gate', 'QCM'),
(2, 'Qui est l''homme plus grand du monde', 'Robert Wadlow', 'QTexte');

INSERT INTO REPONSE(id_reponse, reponse, id_question) VALUES
(1, 'Undertale', 1),
(2, 'League of Leagends', 1),
(3, 'The Witcher 3', 1);

INSERT INTO QUESTIONNAIRE(id_questionnaire, nom, id_utilisateur) VALUES
(1, 'Test', 1);

INSERT INTO QUESTIONNAIRE_QUESTION(id_questionnaire, id_question) VALUES
(1, 1),
(1, 2);
