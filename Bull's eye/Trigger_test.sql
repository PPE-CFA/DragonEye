drop database if exists BDD_jeu ; 
create database BDD_jeu; 
use BDD_jeu; 

CREATE TABLE Personne(
        IdPersonne Int  Auto_increment  NOT NULL ,
        nom        Varchar (50) NOT NULL ,
        prenom     Varchar (50) NOT NULL ,
        email      Varchar (50) NOT NULL ,
        mdp        Varchar (50) NOT NULL ,
		CreateDate 	DATETIME		NULL ,
		LastDate   	DATETIME		NULL ,
	CONSTRAINT Personne_PK PRIMARY KEY (IdPersonne)
)ENGINE=InnoDB;

CREATE TABLE PersonneArchive(
IdArchive				Int 			Auto_increment 	NOT NULL ,
IdPersonne				Int 							NOT NULL ,
nom        				Varchar (50)		 			NOT NULL ,
prenom     				Varchar (50) 					NOT NULL ,
email      				Varchar (50) 					NOT NULL ,
mdp        				Varchar (50) 					NOT NULL ,
OperationType 			VARCHAR (1)						NOT NULL ,
VersionStartTime		DATETIME						NOT NULL ,
VersionEndTime			DATETIME						NOT NULL ,
ChangeUser				VARCHAR (20)					NULL ,
ChangeIp				VARCHAR (20)					NULL ,
CONSTRAINT Personne_Archive_PK		PRIMARY KEY (IdArchive)
) ENGINE=InnoDB;

CREATE TRIGGER TRG_Personne_On_Insert_Row_Dates
	ON Personne
	FOR INSERT
	AS 
	BEGIN
		SET NOCOUNT ON
		UPDATE Personne
			SET CreateDate = GETUTCDATE(),
				LastDate = GETUTCDATE()
			FROM Personne INNER JOIN inserted
				ON Personne.IdPersonne = inserted.IdPersonne;
	END
GO

CREATE TRIGGER TRG_Personne_On_Update_Row_Dates
	ON Personne
	FOR UPDATE
	AS
	BEGIN
		SET NOCOUNT ON
		
		IF ( (SELECT trigger_nestlevel() ) >1)
			RETURN
		
		UPDATE Personne
			SET CreateDate = deleted.CreateDate,
			LastDate = GETUTCDATE()
		FROM Personne
		INNER JOIN deleted
			ON Personne.IdPersonne = deleted.IdPersonne;
	END
GO

CREATE TRIGGER TRG_Personne_Archive_Updates
	ON PersonneArchive
	FOR UPDATE
	AS
	BEGIN
		SET NOCOUNT ON
		
		IF ( (SELECT trigger_nestlevel() ) >1)
			RETURN
			
		INSERT INTO PersonneArchive
			(IdPersonne, nom, prenom, email, mdp, OperationType, VersionStartTime, VersionEndTime, ChangeUser, ChangeIp)
		SELECT
			deleted.IdPersonne, deleted.nom, deleted.prenom, deleted.email, deleted.mdp, 'U', deleted.LastDate, GETUTCDATE(),
			CURRENT_USER, CONVERT(varchar(20), CONNECTIONPROPERTY('client_net_adress'))
		FROM deleted
	END
GO

CREATE TRIGGER TRG_Personne_Archive_Deletes
	ON PersonneArchive
	FOR DELETE
	AS
	BEGIN
		SET NOCOUNT ON
		
		IF ( (SELECT trigger_nestlevel() ) >1)
			RETURN
			
		INSERT INTO PersonneArchive
			(IdPersonne, nom, prenom, email, mdp, OperationType, VersionStartTime, VersionEndTime, ChangeUser, ChangeIp)
		SELECT
			deleted.IdPersonne, deleted.nom, deleted.prenom, deleted.email, deleted.mdp, 'D', deleted.LastDate, GETUTCDATE(),
			CURRENT_USER, CONVERT(varchar(20), CONNECTIONPROPERTY('client_net_adress'))
		FROM deleted
	END
GO