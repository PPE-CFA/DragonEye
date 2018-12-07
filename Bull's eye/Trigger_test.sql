drop database if exists BDD_jeu ; 
create database BDD_jeu; 
use BDD_jeu; 

CREATE TABLE Personne(
        IdPersonne Int  Auto_increment  NOT NULL ,
        nom        	Varchar 	(50) 	NOT NULL ,
        prenom     	Varchar 	(50) 	NOT NULL ,
        email      	Varchar 	(50) 	NOT NULL ,
        mdp        	Varchar 	(50) 	NOT NULL ,
	CONSTRAINT Personne_PK PRIMARY KEY (IdPersonne)
)ENGINE=InnoDB;

CREATE TABLE PersonneArchive(
IdArchive				Int 			Auto_increment 	NOT NULL ,
IdPersonne				Int 							NOT NULL ,
nom        				Varchar (50)		 			NOT NULL ,
prenom     				Varchar (50) 					NOT NULL ,
email      				Varchar (50) 					NOT NULL ,
mdp        				Varchar (50) 					NOT NULL ,
CONSTRAINT Personne_Archive_PK		PRIMARY KEY (IdArchive)
) ENGINE=InnoDB;

DELIMITER $
CREATE TRIGGER TRG_Personne_On_Insert_Row_Dates BEFORE INSERT
	ON Personne
	FOR each row
	BEGIN
		insert into PersonneArchive values (OLD.IdPersonne.Personne, OLD.nom.Personne, OLD.prenom.Personne, OLD.email.Personne, OLD.mdp.Personne)
	END $
DELIMITER ;






