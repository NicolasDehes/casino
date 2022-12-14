DROP TABLE IF EXISTS T_UTILISATEUR;
DROP TABLE IF EXISTS T_JEU;
DROP TABLE IF EXISTS T_HISTORIQUE;

CREATE TABLE T_UTILISATEUR (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    prenom VARCHAR(80) NOT NULL,
    email VARCHAR(50),
    motdepasse VARCHAR(40),
    solde FLOAT DEFAULT 0,
  	isAdmin BOOLEAN DEFAULT 0
);

CREATE TABLE T_JEU (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(30) NOT NULL,
    minimum FLOAT DEFAULT 1,
    maximum FLOAT
);

CREATE TABLE T_HISTORIQUE (
    idJeu INT NOT NULL REFERENCES T_JEU(id),
    idUtilisateur INT NOT NULL REFERENCES T_UTILISATEUR(id),
    dateJeu DATETIME DEFAULT CURRENT_TIMESTAMP,
    mise FLOAT NOT NULL,
    gain FLOAT, /* que positif */
    PRIMARY KEY(idJeu, idUtilisateur, dateJeu)
);

INSERT INTO T_UTILISATEUR (nom, prenom , email, motdepasse) 
VALUES ('Marley', 'Bob', 'bob.marley@gmail.com', md5('bob123'));
INSERT INTO T_UTILISATEUR ( nom, prenom , email, motdepasse) 
VALUES ('Wonder', 'Stevie', 'stevie.wonder@gmail.com', md5('stevie123'));
INSERT INTO T_JEU(nom, minimum) VALUES ('Roulette',1),('Pile ou Face',1);