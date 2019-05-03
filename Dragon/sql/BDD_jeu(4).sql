#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
drop database if exists BDD_jeu ; 
create database BDD_jeu; 
use BDD_jeu; 

ALTER database BDD_jeu CHARACTER SET utf8 COLLATE utf8_general_ci;

#------------------------------------------------------------
# Table: DEYE_Photo
#------------------------------------------------------------

CREATE TABLE DEYE_Photo(
        IdPhoto   Int  Auto_increment  NOT NULL ,
        url       Varchar (50) NOT NULL ,
		TypePhoto Varchar (50) NOT NULL 
	,CONSTRAINT DEYE_Photo_PK PRIMARY KEY (IdPhoto)
	
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Photo
#------------------------------------------------------------

insert into DEYE_Photo values (null, "../img/logo.png", "DEFAUT");
insert into DEYE_Photo values (null, "../img/trone.jpg", "DEFAUT");
insert into DEYE_Photo values (null, "../img/monopoly.jpg", "DEFAUT");
insert into DEYE_Photo values (null, "../img/bonne_paye.jpg", "DEFAUT");
insert into DEYE_Photo values (null, "../img/dixit.jpg", "DEFAUT");

#------------------------------------------------------------
# Table: DEYE_Lieu
#------------------------------------------------------------

CREATE TABLE DEYE_Lieu(
        IdLieu  Int  Auto_increment  NOT NULL ,
		IdPhoto Int  NOT NULL,
        Adresse Varchar (50) NOT NULL ,
        ville   Varchar (50) NOT NULL ,
        Nom     Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Lieu_PK PRIMARY KEY (IdLieu)
	,CONSTRAINT DEYE_Photo_DEYE_Lieu0_PK FOREIGN KEY (IdPhoto) REFERENCES DEYE_Photo(IdPhoto) ON DELETE CASCADE

)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Lieu
#------------------------------------------------------------

insert into DEYE_Lieu values (null, 1, "16 Rue Stanislas, 75006", "Paris", "Waaagh Taverne");
insert into DEYE_Lieu values (null, 1, "24 Boulevard Beaumarchais, 75011", "Paris", "Magic Corp");
insert into DEYE_Lieu values (null, 1, "131 Avenue de France, 75013", "Paris", "Magic Bazar");
insert into DEYE_Lieu values (null, 1, " 25 Rue de la Reine Blanche, 75013", "Paris", "OYA");
insert into DEYE_Lieu values (null, 1, " 227 Rue Saint-Martin, 75003", "Paris", "LE NID - Cocon Ludique");

#------------------------------------------------------------
# Table: DEYE_Evenement
#------------------------------------------------------------

CREATE TABLE DEYE_Evenement(
        IdEvent     Int  Auto_increment  NOT NULL ,
        designation Varchar (50) NOT NULL ,
        date_event  Date NOT NULL ,
        heure_event Time NOT NULL ,
		IdPhoto     Int NOT NULL ,
        IdLieu      Int NOT NULL
	,CONSTRAINT DEYE_Evenement_PK PRIMARY KEY (IdEvent)
    ,CONSTRAINT DEYE_Photo_DEYE_Event0_PK FOREIGN KEY (IdPhoto) REFERENCES DEYE_Photo(IdPhoto) ON DELETE CASCADE
	,CONSTRAINT DEYE_Evenement_DEYE_Lieu1_FK FOREIGN KEY (IdLieu) REFERENCES DEYE_Lieu(IdLieu) ON DELETE CASCADE
	
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Evenement
#------------------------------------------------------------

insert into DEYE_Evenement values (null, "Trial Zap Duel Commander", "2018/12/03", "19:15:00", 1, 1);
insert into DEYE_Evenement values (null, "Soirée Jeux de société", "2018/12/05", "19:00:00", 1, 2);
insert into DEYE_Evenement values (null, "Ultimate Masters Booster Draft", "2018/12/07", "19:15:00", 1, 3);
insert into DEYE_Evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00", 1, 4);
insert into DEYE_Evenement values (null, "Soirée Jeux de société", "2018/12/08", "19:00:00", 1, 5);
insert into DEYE_Evenement values (null, "Ultimate Masters Paquet Scellé", "2018/12/09", "12:00:00", 1, 2);
insert into DEYE_Evenement values (null, "Dragon Ball Last Chance", "2018/12/14", "13:00:00", 1, 3);
insert into DEYE_Evenement values (null, "Tournoi Mensuel Modern", "2018/12/15", "11:30:00", 1, 4);
insert into DEYE_Evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00", 1, 5);

#------------------------------------------------------------
# Table: DEYE_Evenement_Archive
#------------------------------------------------------------

CREATE TABLE DEYE_Evenement_Archive(
		IdEvent_Archive	Int	Auto_increment	NOT NULL ,
        IdEvent     Int  NOT NULL ,
        designation Varchar (50) NOT NULL ,
        date_event  Date NOT NULL ,
        heure_event Time NOT NULL ,
		IdPhoto     Int NOT NULL ,
        IdLieu      Int NOT NULL ,
		date_histo	DATETIME	NOT NULL
	,CONSTRAINT DEYE_Evenement_Archive_PK PRIMARY KEY (IdEvent_Archive)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DEYE_Editeur
#------------------------------------------------------------

CREATE TABLE DEYE_Editeur(
        IdEditeur   Int  Auto_increment  NOT NULL ,
        Nom         Varchar (50) NOT NULL ,
        nationalite Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Editeur_PK PRIMARY KEY (IdEditeur)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Editeur
#------------------------------------------------------------

insert into DEYE_Editeur values (null, "Hasbro", "Américain");
insert into DEYE_Editeur values (null, "Ravensburger", "Allemagne");
insert into DEYE_Editeur values (null, "Kosmos", "Allemagne");
insert into DEYE_Editeur values (null, "GameWorks", "Suisse");
insert into DEYE_Editeur values (null, "Repos Production", "Belgique");
insert into DEYE_Editeur values (null, "Ludoca", "Québec");
insert into DEYE_Editeur values (null, "Filosofia", "Québec");
insert into DEYE_Editeur values (null, "Portal Games", "Pologne");
insert into DEYE_Editeur values (null, "Ankama", "France");
insert into DEYE_Editeur values (null, "Asmodee", "France");
insert into DEYE_Editeur values (null, "Cocktail Games", "France");
insert into DEYE_Editeur values (null, "Days of Wonder", "France");
insert into DEYE_Editeur values (null, "Edge Entertainment", "France");
insert into DEYE_Editeur values (null, "FunForge", "France");
insert into DEYE_Editeur values (null, "Lui-même", "France");

#------------------------------------------------------------
# Table: DEYE_Categorie
#------------------------------------------------------------

CREATE TABLE DEYE_Categorie(
        IdCategorie Int  Auto_increment  NOT NULL ,
        libelle     Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Categorie_PK PRIMARY KEY (IdCategorie)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Categorie
#------------------------------------------------------------

insert into DEYE_Categorie values (null, "Stratégie");
insert into DEYE_Categorie values (null, "Coopération");
insert into DEYE_Categorie values (null, "Jeux de Rôles");
insert into DEYE_Categorie values (null, "Casse-Tête");
insert into DEYE_Categorie values (null, "Conquête");
insert into DEYE_Categorie values (null, "Course");
insert into DEYE_Categorie values (null, "Educatif");
insert into DEYE_Categorie values (null, "Humour");
insert into DEYE_Categorie values (null, "Négociation");
insert into DEYE_Categorie values (null, "Plateau");
insert into DEYE_Categorie values (null, "Cartes");
insert into DEYE_Categorie values (null, "Créativité");

#------------------------------------------------------------
# Table: DEYE_Age
#------------------------------------------------------------

CREATE TABLE DEYE_Age(
        IdAge Int  Auto_increment  NOT NULL ,
        age_requis     Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Age_PK PRIMARY KEY (IdAge)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Age
#------------------------------------------------------------

insert into DEYE_Age values (null, "0-3 ans et +");
insert into DEYE_Age values (null, "4-5 ans et +");
insert into DEYE_Age values (null, "6-7 ans et +");
insert into DEYE_Age values (null, "8-10 ans et +");
insert into DEYE_Age values (null, "10 ans et +");
insert into DEYE_Age values (null, "Toutes les tranches d'âge");

#------------------------------------------------------------
# Table: DEYE_Status
#------------------------------------------------------------

CREATE TABLE DEYE_Status(
        IdStatus      char(1) NOT NULL PRIMARY KEY,
        StatusType  Varchar (50) NOT NULL
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Status
#------------------------------------------------------------

insert into DEYE_Status values ('N', 'Nouveau');
insert into DEYE_Status values ('A', 'Admin');
insert into DEYE_Status values ('U', 'Utilisateur');

#------------------------------------------------------------
# Table: DEYE_Personne
#------------------------------------------------------------

CREATE TABLE DEYE_Personne(
        IdPersonne Int  Auto_increment  NOT NULL ,
		IdType     char(1) NOT NULL REFERENCES DEYE_Status(IdStatus) ,
        nom        Varchar (50) NOT NULL ,
        prenom     Varchar (50) NOT NULL ,
        email      Varchar (50) NOT NULL ,
        mdp        Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Status_PK PRIMARY KEY (IdPersonne, IdType)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Personne
#------------------------------------------------------------

insert into DEYE_Personne values (null, 'A', "lakun", "cindy", "test1@gmail.com", "0000");
insert into DEYE_Personne values (null, 'A', "kvs", "eric", "test2@gmail.com", "0001");
insert into DEYE_Personne values (null, 'A', "phitso", "pierre", "test3@gmail.com", "0002");
insert into DEYE_Personne values (null, 'A', "test", "yacine", "test4@gmail.com", "0003");
insert into DEYE_Personne values (null, 'N', "teteen", "cyril", "test5@gmail.com", "0004");
insert into DEYE_Personne values (null, 'N', "abaach", "yahia", "test6@gmail.com", "0005");
insert into DEYE_Personne values (null, 'N', "procha", "vincent", "test7@gmail.com", "0006");
insert into DEYE_Personne values (null, 'N', "saga", "sinthujah", "test8@gmail.com", "0007");
insert into DEYE_Personne values (null, 'N', "bereski", "alexandra", "test9@gmail.com", "0008");
insert into DEYE_Personne values (null, 'N', "tran", "céline", "test10@gmail.com", "0009");

#------------------------------------------------------------
# Table: DEYE_Personne_Archive
#------------------------------------------------------------

CREATE TABLE DEYE_Personne_Archive(
		IdPersonne_Archive Int	Auto_increment NOT NULL ,
        IdPersonne Int			NOT NULL ,
		IdType   char(1)      NOT NULL ,
        nom        Varchar (50) NOT NULL ,
        prenom     Varchar (50) NOT NULL ,
        email      Varchar (50) NOT NULL ,
        mdp        Varchar (50) NOT NULL ,
		date_histo	DATETIME	NOT NULL
	,CONSTRAINT DEYE_Personne_Archive_PK PRIMARY KEY (IdPersonne_Archive)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DEYE_Utilisateur
#------------------------------------------------------------

CREATE TABLE DEYE_Utilisateur(
		IdPersonne      Int PRIMARY KEY ,
		UserType        char(1) NOT NULL ,
        date_naissance  Date ,
        telephone       Varchar (50)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Utilisateur
#------------------------------------------------------------

#------------------------------------------------------------
# Table: DEYE_Validateur
#------------------------------------------------------------

CREATE TABLE DEYE_Validateur(
		IdPersonne   Int PRIMARY KEY ,
		UserType     char(1) NOT NULL ,    
        date_droits  Date
	,CONSTRAINT DEYE_Validateur_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Personne(IdPersonne) ON DELETE CASCADE
	
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Validateur
#------------------------------------------------------------

insert into DEYE_Validateur values (1, 'A', NOW()),
(2, 'A', NOW()), (3, 'A', NOW()),
(4, 'A',  NOW());

#------------------------------------------------------------
# Table: DEYE_Jeux
#------------------------------------------------------------

CREATE TABLE DEYE_Jeux(
        IdJeux                 Int  Auto_increment  NOT NULL ,
        designation            Varchar (50) NOT NULL ,
        date_sortie            Date NOT NULL ,
        prix                   Float NOT NULL ,
        temps_jeux             Time NOT NULL ,
        nb_joueurs             Int NOT NULL ,
        IdPersonne             Int ,
        IdEditeur              Int NOT NULL ,
        IdAge                  Int NOT NULL ,
        IdCategorie            Int NOT NULL ,
		IdPhoto                Int NOT NULL 
	,CONSTRAINT DEYE_Jeux_PK PRIMARY KEY (IdJeux)
	
	,CONSTRAINT DEYE_Jeux_DEYE_Id_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Personne(IdPersonne) ON DELETE CASCADE
	,CONSTRAINT DEYE_Jeux_DEYE_Editeur0_FK FOREIGN KEY (IdEditeur) REFERENCES DEYE_Editeur(IdEditeur) ON DELETE CASCADE
	,CONSTRAINT DEYE_Jeux_DEYE_Age1_FK FOREIGN KEY (IdAge) REFERENCES DEYE_Age(IdAge) ON DELETE CASCADE
	,CONSTRAINT DEYE_Jeux_DEYE_Categorie2_FK FOREIGN KEY (IdCategorie) REFERENCES DEYE_Categorie(IdCategorie) ON DELETE CASCADE
	,CONSTRAINT DEYE_Jeux_DEYE_Photo3_FK FOREIGN KEY (IdPhoto) REFERENCES DEYE_Photo(IdPhoto) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Jeux
#------------------------------------------------------------

insert into DEYE_Jeux values (null, "Games of Thrones" ,"2011/12/21", "54.00", "2:00:00", "6", 1, 1, 1, 1, 2);
insert into DEYE_Jeux values (null, "Jamaica" ,"2008/02/11", "35.00", "00:30:00", "6", 2, 2, 2, 10, 1);
insert into DEYE_Jeux values (null, "Monopoly" ,"1935/02/06", "20.00", "12:00:00", "6", 3, 6, 3, 10, 3);
insert into DEYE_Jeux values (null, "Games of Thrones" ,"2011/12/21", "54.00", "2:00:00", "6", 4, 4, 4, 1, 1);
insert into DEYE_Jeux values (null, "Munchkins" ,"2010/12/21", "36.00", "1:00:00", "6", 5, 5, 5, 5, 1);
insert into DEYE_Jeux values (null, "La Bonne Paye" ,"1975/12/21", "20.00", "1:00:00", "6", 6, 6, 6, 6, 4);
insert into DEYE_Jeux values (null, "Uno", "1971/01/01", "7.00", "00:20:00", "10", 7, 2, 3, 10, 1);
insert into DEYE_Jeux values (null, "Labyrinthe", "1986/01/01", "20.00", "00:40:00", "4", 8, 2, 2, 2, 1);
insert into DEYE_Jeux values (null, "Dixit", "2008/01/01", "26.90", "00:30:00", "6", 9, 2, 2, 2, 5);

#------------------------------------------------------------
# Table : DEYE_Jeux_Archive
#------------------------------------------------------------

CREATE TABLE DEYE_Jeux_Archive(
        IdJeux_Archive          Int  Auto_increment  NOT NULL ,
		IdJeux                  Int  NOT NULL ,
        designation            Varchar (50) NOT NULL ,
        date_sortie            Date NOT NULL ,
        prix                   Float NOT NULL ,
        temps_jeux             Time NOT NULL ,
        nb_joueurs             Int NOT NULL ,
        IdPersonne             Int NOT NULL ,
        IdEditeur              Int NOT NULL ,
        IdAge                  Int NOT NULL ,
        IdCategorie            Int NOT NULL ,
		IdPhoto                Int NOT NULL ,
		date_histo				DATETIME NOT NULL
	,CONSTRAINT DEYE_Jeux_Archive_PK PRIMARY KEY (IdJeux_Archive)

)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: DEYE_Annonce
#------------------------------------------------------------

CREATE TABLE DEYE_Annonce(
		IdAnnonce        Int Auto_increment NOT NULL ,
		IdJeux           Int   NOT NULL ,
		IdPersonne       Int   NOT NULL ,
		IdPhoto          Int   NOT NULL ,
		IdAge            Int   NOT NULL ,
		IdCategorie      Int   NOT NULL ,
		région           Varchar(50) NOT NULL ,
		ville            Varchar(50) NOT NULL ,
		postal           Varchar(50) NOT NULL ,
		Etat             Varchar(50) NOT NULL ,
		Description      Text  NOT NULL
	,CONSTRAINT DEYE_Annonce_PK PRIMARY KEY (IdAnnonce)
	
	,CONSTRAINT DEYE_Annonce_DEYE_Jeux_FK FOREIGN KEY (IdJeux) REFERENCES DEYE_Jeux(IdJeux) ON DELETE CASCADE
	,CONSTRAINT DEYE_Annonce_DEYE_Personne0_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Personne(IdPersonne) ON DELETE CASCADE
	,CONSTRAINT DEYE_Annonce_DEYE_Photo1_FK FOREIGN KEY (IdPhoto) REFERENCES DEYE_Photo(IdPhoto) ON DELETE CASCADE
	,CONSTRAINT DEYE_Annonce_DEYE_Age2_FK FOREIGN KEY (IdAge) REFERENCES DEYE_Age(IdAge) ON DELETE CASCADE
	,CONSTRAINT DEYE_Annonce_DEYE_Categorie3_FK FOREIGN KEY (IdCategorie) REFERENCES DEYE_Categorie(IdCategorie) ON DELETE CASCADE	
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Annonce
#------------------------------------------------------------

insert into DEYE_Annonce values (null, 1, 1, 1, 1, 3, "Ile-de-France", "Paris", "75013","Bon","Jeux en bon état, sympa a jouer");
insert into DEYE_Annonce values (null, 2, 2, 2, 2, 4, "Ile-de-France", "Paris", "75011","Abimé","test");
insert into DEYE_Annonce values (null, 3, 3, 3, 6, 6, "Ile-de-France", "Paris", "75003","Excellent","test");
insert into DEYE_Annonce values (null, 4, 4, 4, 4, 9, "Ile-de-France", "Paris", "75000","Usé","test");

#------------------------------------------------------------
# Table: DEYE_Offre
#------------------------------------------------------------

CREATE TABLE DEYE_Offre(
		IdAnnonce       Int PRIMARY KEY ,
		AnnonceType     VARCHAR(50) NOT NULL
	
	,CONSTRAINT DEYE_Offre_PK FOREIGN KEY (IdAnnonce) REFERENCES DEYE_Annonce(IdAnnonce) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: DEYE_Demande
#------------------------------------------------------------

CREATE TABLE DEYE_Demande(
		IdAnnonce       Int PRIMARY KEY ,
		AnnonceType     VARCHAR(50) NOT NULL
	
	,CONSTRAINT DEYE_Demande_PK FOREIGN KEY (IdAnnonce)	REFERENCES DEYE_Annonce(IdAnnonce) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: DEYE_Commentaire
#------------------------------------------------------------

CREATE TABLE DEYE_Commentaire(
        IdComment       Int  Auto_increment  NOT NULL ,
        texte           Text NOT NULL ,
        datepublication Date NOT NULL ,
        note            Int NOT NULL ,
        IdJeux          Int NOT NULL ,
        IdPersonne      Int 
	,CONSTRAINT DEYE_Commentaire_PK PRIMARY KEY (IdComment)

	,CONSTRAINT DEYE_Commentaire_DEYE_Jeux_FK FOREIGN KEY (IdJeux) REFERENCES DEYE_Jeux(IdJeux) ON DELETE CASCADE
	,CONSTRAINT DEYE_Commentaire_DEYE_Personne0_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Personne(IdPersonne) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Commentaire
#------------------------------------------------------------

insert into DEYE_Commentaire values (null, "très nul", "2018/12/10", "0", 1, 1);
insert into DEYE_Commentaire values (null, "nul", "2018/06/27", "0.5", 2, 3);
insert into DEYE_Commentaire values (null, "pas incroyable", "2018/01/05", "1", 3, 2);
insert into DEYE_Commentaire values (null, "pas très bien", "2018/01/15", "1.5", 4, 4);
insert into DEYE_Commentaire values (null, "bof", "2018/10/23", "2", 5, 9);
insert into DEYE_Commentaire values (null, "normal", "2018/07/31", "2.5", 6, 8);
insert into DEYE_Commentaire values (null, "moyen", "2018/04/01", "3", 4, 6);
insert into DEYE_Commentaire values (null, "Pas mal", "2018/03/17", "3.5", 5 , 5);
insert into DEYE_Commentaire values (null, "Super", "2018/12/11", "4", 6, 7);
insert into DEYE_Commentaire values (null, "Excellent Jeux", "2018/01/20", "4.5", 1, 10);
insert into DEYE_Commentaire values (null, "Parfait", "2018/05/30", "5", 2, 4);

#------------------------------------------------------------
# Table: DEYE_Rendezvous
#------------------------------------------------------------

CREATE TABLE DEYE_Rendezvous(
        idrendezvous     Int  Auto_increment  NOT NULL ,
        date_rendezvous  Date NOT NULL ,
        heure_rendezvous Time NOT NULL ,
        IdJeux           Int NOT NULL ,
        IdPersonne       Int 
	,CONSTRAINT DEYE_Rendezvous_PK PRIMARY KEY (idrendezvous)
	 
	,CONSTRAINT DEYE_Rendezvous_DEYE_Jeux_FK FOREIGN KEY (IdJeux) REFERENCES DEYE_Jeux(IdJeux) ON DELETE CASCADE
	,CONSTRAINT DEYE_Rendezvous_DEYE_Utilisateur0_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Utilisateur(IdPersonne) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Rendezvous
#------------------------------------------------------------

insert into DEYE_Rendezvous values (null, "2018/12/07", "12:00:00", 1, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "12:30:00", 2, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "13:00:00", 3, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "13:30:00", 4, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "14:00:00", 5, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "14:30:00", 6, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "15:00:00", 3, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "15:30:00", 5, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "16:00:00", 1, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "16:30:00", 3, IdPersonne);
insert into DEYE_Rendezvous values (null, "2018/12/07", "17:00:00", 4, IdPersonne);

#------------------------------------------------------------
# Table: DEYE_Rendezvous_Archive
#------------------------------------------------------------

CREATE TABLE DEYE_Rendezvous_Archive(
		IdRendezvous_Archive Int Auto_increment NOT NULL ,
        IdRendezvous     Int  NOT NULL ,
        date_rendezvous  Date NOT NULL ,
        heure_rendezvous Time NOT NULL ,
        IdJeux           Int NOT NULL ,
        IdPersonne       Int NOT NULL 
	,CONSTRAINT DEYE_Rendezvous_Archive_PK PRIMARY KEY (IdRendezvous_Archive)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Organiser
#------------------------------------------------------------

CREATE TABLE DEYE_Organiser(
        IdJeux   Int NOT NULL ,
        IdEvent Int NOT NULL
	,CONSTRAINT Organiser_PK PRIMARY KEY (IdJeux,IdEvent)

	,CONSTRAINT Organiser_DEYE_Jeux_FK FOREIGN KEY (IdJeux) REFERENCES DEYE_Jeux(IdJeux) ON DELETE CASCADE
	,CONSTRAINT Organiser_DEYE_Evenement0_FK FOREIGN KEY (IdEvent) REFERENCES DEYE_Evenement(IdEvent) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: Organiser
#------------------------------------------------------------

#------------------------------------------------------------
# Trigger: DEYE_Personne_Archivage_Update
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Personne_Archivage_After_Update AFTER UPDATE
	ON DEYE_Personne
	FOR each row
	BEGIN
		insert into DEYE_Personne_Archive values
		(null, OLD.IdPersonne, OLD.IdType, OLD.nom, OLD.prenom, OLD.email, OLD.mdp, NOW());
	END $
DELIMITER ;


#------------------------------------------------------------
# Trigger: DEYE_Personne_Archivage_Delete
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Personne_Archivage_Before_Delete BEFORE DELETE
	ON DEYE_Personne
	FOR each row
	BEGIN
		insert into DEYE_Personne_Archive values
		(null, OLD.IdPersonne, OLD.IdType ,OLD.nom, OLD.prenom, OLD.email, OLD.mdp, NOW());
	END $
DELIMITER ;



#------------------------------------------------------------
# Trigger: Jeux_Archivage_Update
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_DEYE_Jeux_Archivage_After_Update AFTER UPDATE
	ON DEYE_Jeux
	FOR each row
	BEGIN
		insert into DEYE_Jeux_Archive values
		(null, OLD.IdJeux, OLD.designation, OLD.date_sortie, OLD.prix, OLD.temps_jeux, OLD.nb_joueurs,
		 OLD.IdPersonne, OLD.IdEditeur, OLD.IdAge, OLD.IdCategorie, OLD.IdPhoto, NOW());
	END $
DELIMITER ;


#------------------------------------------------------------
# Trigger: Jeux_Archivage_Delete
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_DEYE_Jeux_Archivage_Before_Delete BEFORE DELETE
	ON DEYE_Jeux
	FOR each row
	BEGIN
		insert into DEYE_Jeux_Archive values
		(null, OLD.IdJeux, OLD.designation, OLD.date_sortie, OLD.prix, OLD.temps_jeux, OLD.nb_joueurs,
		 OLD.IdPersonne, OLD.IdEditeur, OLD.IdAge, OLD.IdCategorie, OLD.IdPhoto, NOW());
	END $
DELIMITER ;

#------------------------------------------------------------
# Trigger: Evenement_Archivage_Update
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Evenement_Archivage_After_Update AFTER UPDATE
	ON DEYE_Evenement
	FOR each row
	BEGIN
		insert into DEYE_Evenement_Archive values
		(null, OLD.IdEvent, OLD.designation, OLD.date_event, OLD.heure_event, OLD.IdPhoto, OLD.IdLieu, NOW());
	END $
DELIMITER ;


#------------------------------------------------------------
# Trigger: Evenement_Archivage_Delete
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Evenement_Archivage_Before_Delete BEFORE DELETE
	ON DEYE_Evenement
	FOR each row
	BEGIN
		insert into DEYE_Evenement_Archive values
		(null, OLD.IdEvent, OLD.designation, OLD.date_event, OLD.heure_event, OLD.IdPhoto, OLD.IdLieu, NOW());
	END $
DELIMITER ;

#------------------------------------------------------------
# Trigger: Rendezvous_Archivage_Update
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Rendezvous_Archivage_After_Update AFTER UPDATE
	ON DEYE_Rendezvous
	FOR each row
	BEGIN
		insert into DEYE_Rendezvous_Archive values
		(null, OLD.IdRendezvous, OLD.date_rendezvous, OLD.heure_rendezvous, OLD.IdJeux, OLD.IdPersonne, NOW());
	END $
DELIMITER ;


#------------------------------------------------------------
# Trigger: Rendezvous_Archivage_Delete
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Rendezvous_Archivage_Before_Delete BEFORE DELETE
	ON DEYE_Rendezvous
	FOR each row
	BEGIN
		insert into DEYE_Rendezvous_Archive values
		(null, OLD.IdRendezvous, OLD.date_rendezvous, OLD.heure_rendezvous, OLD.IdJeux, OLD.IdPersonne, NOW());
	END $
DELIMITER ;

#------------------------------------------------------------
# Trigger: Changement_Status
#------------------------------------------------------------

	DELIMITER $
	CREATE TRIGGER TRG_DEYE_STATUS_Before_Update BEFORE UPDATE
		ON DEYE_Personne
		FOR each row
		BEGIN
			IF (NEW.IdType = 'U' AND OLD.IdType="N") THEN
				insert into DEYE_Utilisateur values(Old.IdPersonne, NEW.IdType, null, null);
				
			ELSE IF (NEW.IdType = 'A' AND OLD.IdType="U") THEN
				delete from DEYE_Utilisateur WHERE IdPersonne = old.IdPersonne;
				insert into DEYE_validateur values(Old.IdPersonne, NEW.IdType, NOW());
				
				ELSE IF (NEW.IdType = 'A' AND OLD.IdType="N") THEN
						insert into DEYE_validateur values(Old.IdPersonne, NEW.IdType, NOW());
						
						
						ELSE IF (NEW.IdType = 'U' AND OLD.IdType="A") THEN
							delete from DEYE_Validateur WHERE IdPersonne = old.IdPersonne;
							insert into DEYE_Utilisateur values(Old.IdPersonne, NEW.IdType, null, null);
						END IF; 
					END IF; 
				END IF; 
			END IF ;
		END $
	DELIMITER ;
	
	
#------------------------------------------------------------
# Procedure: Compter Jeux Total
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE DEYE_Count_Game()
BEGIN
	SELECT COUNT(*)
	FROM DEYE_Jeux;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Afficher Jeux par Categorie
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE DEYE_Afficher_Jeux_Categorie (IN p_IdCategorie INT)
BEGIN
	SELECT * FROM DEYE_Jeux
	WHERE IdCategorie = p_IdCategorie;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Afficher Jeux par Categorie et par Limite Prix
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE DEYE_Afficher_Jeux_Categorie_Limite_Prix (IN p_IdCategorie INT, IN p_prix INT)
BEGIN
	SELECT * FROM DEYE_Jeux
	WHERE IdCategorie = p_IdCategorie
	AND prix <= p_prix;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Compter Categorie
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE DEYE_Count_Categorie ()
BEGIN
	SELECT COUNT(*)
	FROM DEYE_Categorie;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Compter Jeux par Categorie
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE DEYE_Count_Game_Per_Categorie (p_IdCategorie INT)
BEGIN
	SELECT COUNT(*)
	FROM DEYE_Jeux
	WHERE IdCategorie = p_IdCategorie;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Compter Evenement
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE DEYE_Count_Evenement ()
BEGIN
	SELECT COUNT(*)
	FROM DEYE_Evenement;
END $
DELIMITER ;


#------------------------------------------------------------
# Procedure: Compter Evenement par Lieu
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE DEYE_Count_Event_Per_Lieu (IN p_IdLieu INT)
BEGIN
	SELECT COUNT(*)
	FROM DEYE_Event
	WHERE IdLieu = p_IdLieu;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Afficher Evenement par Lieu
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE DEYE_Afficher_Event_Per_Lieu (IN p_IdLieu INT)
BEGIN
	SELECT *
	FROM DEYE_Event
	WHERE IdLieu = p_IdLieu;
END $
DELIMITER ;