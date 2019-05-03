#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
drop database if exists BDD_jeu ; 
create database BDD_jeu; 
use BDD_jeu; 

ALTER database BDD_jeu CHARACTER SET utf8 COLLATE utf8_general_ci;

#------------------------------------------------------------
# Table: DEYE_Lieu
#------------------------------------------------------------

CREATE TABLE DEYE_Lieu(
        IdLieu  Int  Auto_increment  NOT NULL ,
        Adresse Varchar (50) NOT NULL ,
        ville   Varchar (50) NOT NULL ,
        Nom     Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Lieu_PK PRIMARY KEY (IdLieu)
	
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Lieu
#------------------------------------------------------------

insert into DEYE_Lieu values (null, "16 Rue Stanislas, 75006", "Paris", "Waaagh Taverne");
insert into DEYE_Lieu values (null, "24 Boulevard Beaumarchais, 75011", "Paris", "Magic Corp");
insert into DEYE_Lieu values (null, "131 Avenue de France, 75013", "Paris", "Magic Bazar");
insert into DEYE_Lieu values (null, " 25 Rue de la Reine Blanche, 75013", "Paris", "OYA");
insert into DEYE_Lieu values (null, " 227 Rue Saint-Martin, 75003", "Paris", "LE NID - Cocon Ludique");

#------------------------------------------------------------
# Table: DEYE_Evenement
#------------------------------------------------------------

CREATE TABLE DEYE_Evenement(
        IdEvent     Int  Auto_increment  NOT NULL ,
        designation Varchar (50) NOT NULL ,
        date_event  Date NOT NULL ,
        heure_event Time NOT NULL ,
        IdLieu      Int NOT NULL
	,CONSTRAINT DEYE_Evenement_PK PRIMARY KEY (IdEvent)

	,CONSTRAINT DEYE_Evenement_DEYE_Lieu_FK FOREIGN KEY (IdLieu) REFERENCES DEYE_Lieu(IdLieu) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Evenement
#------------------------------------------------------------

insert into DEYE_Evenement values (null, "Trial Zap Duel Commander", "2018/12/03", "19:15:00", 1);
insert into DEYE_Evenement values (null, "Soirée Jeux de société", "2018/12/05", "19:00:00", 2);
insert into DEYE_Evenement values (null, "Ultimate Masters Booster Draft", "2018/12/07", "19:15:00", 3);
insert into DEYE_Evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00", 4);
insert into DEYE_Evenement values (null, "Soirée Jeux de société", "2018/12/08", "19:00:00", 5);
insert into DEYE_Evenement values (null, "Ultimate Masters Paquet Scellé", "2018/12/09", "12:00:00", 2);
insert into DEYE_Evenement values (null, "Dragon Ball Last Chance", "2018/12/14", "13:00:00", 3);
insert into DEYE_Evenement values (null, "Tournoi Mensuel Modern", "2018/12/15", "11:30:00", 4);
insert into DEYE_Evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00", 5);

#------------------------------------------------------------
# Table: DEYE_Evenement_Archive
#------------------------------------------------------------

CREATE TABLE DEYE_Evenement_Archive(
		IdEvent_Archive	Int	Auto_increment	NOT NULL ,
        IdEvent     Int  NOT NULL ,
        designation Varchar (50) NOT NULL ,
        date_event  Date NOT NULL ,
        heure_event Time NOT NULL ,
        IdLieu      Int NOT NULL ,
		date_histo	DATETIME	NOT NULL
	,CONSTRAINT DEYE_Evenement_Archive_PK PRIMARY KEY (IdEvent_Archive)

)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: DEYE_Photo
#------------------------------------------------------------

CREATE TABLE DEYE_Photo(
        IdPhoto Int  Auto_increment  NOT NULL ,
        url     Varchar (50) NOT NULL ,
        IdEvent Int NOT NULL
	,CONSTRAINT DEYE_Photo_PK PRIMARY KEY (IdPhoto)

	,CONSTRAINT DEYE_Photo_DEYE_Evenement_FK FOREIGN KEY (IdEvent) REFERENCES DEYE_Evenement(IdEvent) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Photo
#------------------------------------------------------------

insert into DEYE_Photo values (null, "../img/logo.png", 1);
insert into DEYE_Photo values (null, "../img/logo.png", 2);
insert into DEYE_Photo values (null, "../img/logo.png", 3);
insert into DEYE_Photo values (null, "../img/logo.png", 4);
insert into DEYE_Photo values (null, "../img/logo.png", 5);

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
# Table: DEYE_Trancheage
#------------------------------------------------------------

CREATE TABLE DEYE_Trancheage(
        Id_tranche_age Int  Auto_increment  NOT NULL ,
        age_requis     Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Trancheage_PK PRIMARY KEY (Id_tranche_age)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Trancheage
#------------------------------------------------------------

insert into DEYE_Trancheage values (null, "0-3 ans et +");
insert into DEYE_Trancheage values (null, "4-5 ans et +");
insert into DEYE_Trancheage values (null, "6-7 ans et +");
insert into DEYE_Trancheage values (null, "8-10 ans et +");
insert into DEYE_Trancheage values (null, "10 ans et +");
insert into DEYE_Trancheage values (null, "Toutes les tranches d'âge");

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
insert into DEYE_Personne values (null, 'U', "teteen", "cyril", "test5@gmail.com", "0004");
insert into DEYE_Personne values (null, 'U', "abaach", "yahia", "test6@gmail.com", "0005");
insert into DEYE_Personne values (null, 'U', "procha", "vincent", "test7@gmail.com", "0006");
insert into DEYE_Personne values (null, 'U', "saga", "sinthujah", "test8@gmail.com", "0007");
insert into DEYE_Personne values (null, 'U', "bereski", "alexandra", "test9@gmail.com", "0008");
insert into DEYE_Personne values (null, 'U', "tran", "céline", "test10@gmail.com", "0009");

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
        telephone       Varchar (50) ,
		CONSTRAINT DEYE_Utilisateur_FK FOREIGN KEY (IdPersonne,UserType) REFERENCES DEYE_Personne(IdPersonne, IdType) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Utilisateur
#------------------------------------------------------------

insert into DEYE_Utilisateur values (5, 'U' , null, null),
(6, 'U', null, null), (7, 'U', null, null), 
(8, 'U', null, null), (9, 'U', null, null),
(10, 'U', null, null);


#------------------------------------------------------------
# Table: DEYE_Validateur
#------------------------------------------------------------

CREATE TABLE DEYE_Validateur(
		IdPersonne   Int PRIMARY KEY ,
		UserType     char(1) NOT NULL ,    
        date_entree  Date NOT NULL ,
        date_droits  Date NOT NULL 
	,CONSTRAINT DEYE_Validateur_FK FOREIGN KEY (IdPersonne,UserType) REFERENCES DEYE_Personne(IdPersonne, IdType) ON DELETE CASCADE
	
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Validateur
#------------------------------------------------------------

insert into DEYE_Validateur values (1, 'A', "2018/09/16", "2018/09/15"),
(2, 'A', "2018/09/17", "2018/09/13"), (3, 'A', "2018/09/15", "2018/09/2"),
(4, 'A', "2018/09/15",  "2018/03/05");

#------------------------------------------------------------
# Table: DEYE_Jeux
#------------------------------------------------------------

CREATE TABLE DEYE_Jeux(
        IdJeux                 Int  Auto_increment  NOT NULL ,
        designation            Varchar (50) NOT NULL ,
        date_sortie            Date NOT NULL ,
        prix                   Float NOT NULL ,
        temps_Jeux              Time NOT NULL ,
        nb_joueurs             Int NOT NULL ,
        date_validation        Date NOT NULL ,
        IdPersonne             Int ,
        IdEditeur              Int NOT NULL ,
        Id_tranche_age         Int NOT NULL ,
        IdCategorie            Int NOT NULL ,
        IdValidateur           Int ,
        date_entree_Validateur DATETIME NOT NULL
	,CONSTRAINT DEYE_Jeux_PK PRIMARY KEY (IdJeux)
	
	,CONSTRAINT DEYE_Jeux_DEYE_Id_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Personne(IdPersonne) ON DELETE CASCADE
	,CONSTRAINT DEYE_Jeux_DEYE_Editeur0_FK FOREIGN KEY (IdEditeur) REFERENCES DEYE_Editeur(IdEditeur) ON DELETE CASCADE
	,CONSTRAINT DEYE_Jeux_DEYE_Trancheage1_FK FOREIGN KEY (Id_tranche_age) REFERENCES DEYE_Trancheage(Id_tranche_age) ON DELETE CASCADE
	,CONSTRAINT DEYE_Jeux_DEYE_Categorie2_FK FOREIGN KEY (IdCategorie) REFERENCES DEYE_Categorie(IdCategorie) ON DELETE CASCADE
	,CONSTRAINT DEYE_Jeux_DEYE_Validateur3_FK FOREIGN KEY (IdValidateur) REFERENCES DEYE_Validateur(IdPersonne) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Jeux
#------------------------------------------------------------

insert into DEYE_Jeux values (null, "Games of Thrones" ,"2011/12/21", "54.00", "2:00:00", "6", "2011/12/21", 1, 1, 1, 1, 2, NOW());
insert into DEYE_Jeux values (null, "Jamaica" ,"2008/02/11", "35.00", "00:30:00", "6", "2011/06/21", 2, 2, 2, 10, 1, NOW());
insert into DEYE_Jeux values (null, "Monopoly" ,"1935/02/06", "20.00", "12:00:00", "6", "2011/07/21", 3, 6, 3, 10, 4, NOW());
insert into DEYE_Jeux values (null, "Games of Thrones" ,"2011/12/21", "54.00", "2:00:00", "6", "2011/12/11", 4, 4, 4, 1, 3, NOW());
insert into DEYE_Jeux values (null, "Munchkins" ,"2010/12/21", "36.00", "1:00:00", "6", "2011/04/06", 5, 5, 5, 1, 2, NOW());
insert into DEYE_Jeux values (null, "La Bonne Paye" ,"1975/12/21", "20.00", "1:00:00", "6", "2011/05/07", 6, 6, 6, 10, 1,  NOW());
insert into DEYE_Jeux values (null, "Uno", "1971/01/01", "7.00", "00:20:00", "10", "2011/03/12", 7, 2, 3, 10, 2, NOW());
insert into DEYE_Jeux values (null, "Labyrinthe", "1986/01/01", "20.00", "00:40:00", "4", "2014/05/27", 8, 2, 2, 1, 3, NOW());

#------------------------------------------------------------
# Table : DEYE_Jeux_Archive
#------------------------------------------------------------

CREATE TABLE DEYE_Jeux_Archive(
        IdJeux_Archive          Int  Auto_increment  NOT NULL ,
		IdJeux                  Int  NOT NULL ,
        designation            Varchar (50) NOT NULL ,
        date_sortie            Date NOT NULL ,
        prix                   Float NOT NULL ,
        temps_Jeux              Time NOT NULL ,
        nb_joueurs             Int NOT NULL ,
        date_validation        Date NOT NULL ,
        IdPersonne             Int NOT NULL ,
        IdEditeur              Int NOT NULL ,
        Id_tranche_age         Int NOT NULL ,
        IdCategorie            Int NOT NULL ,
        IdPersonne_Validateur  Int NOT NULL ,
        date_entree_Validateur Date NOT NULL ,
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
		Id_tranche_age   Int   NOT NULL ,
		IdCategorie      Int   NOT NULL ,
		Description      Text  NOT NULL
	,CONSTRAINT DEYE_Annonce_PK PRIMARY KEY (IdAnnonce)
	
	,CONSTRAINT DEYE_Annonce_DEYE_Jeux_FK FOREIGN KEY (IdJeux) REFERENCES DEYE_Jeux(IdJeux) ON DELETE CASCADE
	,CONSTRAINT DEYE_Annonce_DEYE_Personne0_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Personne(IdPersonne) ON DELETE CASCADE
	,CONSTRAINT DEYE_Annonce_DEYE_Photo1_FK FOREIGN KEY (IdPhoto) REFERENCES DEYE_Photo(IdPhoto) ON DELETE CASCADE
	,CONSTRAINT DEYE_Annonce_DEYE_Trancheage2_FK FOREIGN KEY (Id_tranche_age) REFERENCES DEYE_Trancheage(Id_tranche_age) ON DELETE CASCADE
	,CONSTRAINT DEYE_Annonce_DEYE_Categorie3_FK FOREIGN KEY (IdCategorie) REFERENCES DEYE_Categorie(IdCategorie) ON DELETE CASCADE	
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: DEYE_Annonce
#------------------------------------------------------------

insert into DEYE_Annonce values (null, 1, 1, 1, 1, 3, "Jeux en bon état, sympa a jouer");
insert into DEYE_Annonce values (null, 2, 2, 2, 2, 4, "test");
insert into DEYE_Annonce values (null, 3, 3, 3, 6, 6, "test");
insert into DEYE_Annonce values (null, 4, 4, 4, 4, 9, "test");

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

insert into DEYE_Commentaire values (null, "très nul", "2018/12/10", "0", 1, IdPersonne);
insert into DEYE_Commentaire values (null, "nul", "2018/06/27", "0.5", 2, IdPersonne);
insert into DEYE_Commentaire values (null, "pas incroyable", "2018/01/05", "1", 3, IdPersonne);
insert into DEYE_Commentaire values (null, "pas très bien", "2018/01/15", "1.5", 4, IdPersonne);
insert into DEYE_Commentaire values (null, "bof", "2018/10/23", "2", 5, IdPersonne);
insert into DEYE_Commentaire values (null, "normal", "2018/07/31", "2.5", 6, IdPersonne);
insert into DEYE_Commentaire values (null, "moyen", "2018/04/01", "3", 4, IdPersonne);
insert into DEYE_Commentaire values (null, "Pas mal", "2018/03/17", "3.5", 5 , IdPersonne);
insert into DEYE_Commentaire values (null, "Super", "2018/12/11", "4", 6, IdPersonne);
insert into DEYE_Commentaire values (null, "Excellent Jeux", "2018/01/20", "4.5", 1, IdPersonne);
insert into DEYE_Commentaire values (null, "Parfait", "2018/05/30", "5", 2, IdPersonne);

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
		(null, OLD.IdJeux, OLD.designation, OLD.date_sortie, OLD.prix, OLD.temps_Jeux, OLD.nb_joueurs, OLD.date_validation,
		 OLD.IdEditeur, OLD.Id_tranche_age, OLD.IdCategorie, OLD.IdPersonne, OLD.date_entree_Validateur, NOW());
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
		(null, OLD.IdJeux, OLD.designation, OLD.date_sortie, OLD.prix, OLD.temps_Jeux, OLD.nb_joueurs, OLD.date_validation,
		 OLD.IdEditeur, OLD.Id_tranche_age, OLD.IdCategorie, OLD.IdPersonne, OLD.date_entree_Validateur, NOW());
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
		(null, OLD.IdEvent, OLD.designation, OLD.date_event, OLD.heure_event, OLD.IdLieu, NOW());
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
		(null, OLD.IdEvent, OLD.designation, OLD.date_event, OLD.heure_event, OLD.IdLieu, NOW());
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