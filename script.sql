DROP TABLE IF EXISTS T_UTILISATEUR;

CREATE TABLE T_UTILISATEUR (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
prenom VARCHAR(80) NOT NULL,
email VARCHAR(50),
motdepasse VARCHAR(40)
);

INSERT INTO T_UTILISATEUR (nom, prenom , email, motdepasse) 
VALUES ('Marley', 'Bob', 'bob.marley@gmail.com', md5('bob123'));
INSERT INTO T_UTILISATEUR ( nom, prenom , email, motdepasse) 
VALUES ('Wonder', 'Stevie', 'stevie.wonder@gmail.com', md5('stevie123'));