#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
drop database if exists BDD_Jeu ; 
create database BDD_Jeu; 
use BDD_Jeu; 

#------------------------------------------------------------
# Table: Lieu
#------------------------------------------------------------

CREATE TABLE DEYE_Lieu(
        IdLieu  Int  Auto_increment  NOT NULL ,
        Adresse Varchar (50) NOT NULL ,
        ville   Varchar (50) NOT NULL ,
        Nom     Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Lieu_PK PRIMARY KEY (IdLieu)
)ENGINE=InnoDB;


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

	,CONSTRAINT DEYE_Evenement_DEYE_Lieu_FK FOREIGN KEY (IdLieu) REFERENCES DEYE_Lieu(IdLieu)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Photo
#------------------------------------------------------------

CREATE TABLE DEYE_Photo(
        IdPhoto Int  Auto_increment  NOT NULL ,
        url     Varchar (50) NOT NULL ,
        type    Varchar (50) NOT NULL ,
        IdEvent Int NOT NULL
	,CONSTRAINT Photo_PK PRIMARY KEY (IdPhoto)

	,CONSTRAINT DEYE_Photo_DEYE_Evenement_FK FOREIGN KEY (IdEvent) REFERENCES DEYE_Evenement(IdEvent)
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
# Table: DEYE_Categorie
#------------------------------------------------------------

CREATE TABLE DEYE_Categorie(
        IdCategorie Int  Auto_increment  NOT NULL ,
        libelle     Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Categorie_PK PRIMARY KEY (IdCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Tranche age
#------------------------------------------------------------

CREATE TABLE DEYE_DEYE_Trancheage(
        Id_tranche_age Int  Auto_increment  NOT NULL ,
        age_requis     Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Trancheage_PK PRIMARY KEY (Id_tranche_age)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE DEYE_Personne(
        IdPersonne Int  Auto_increment  NOT NULL ,
        nom        Varchar (50) NOT NULL ,
        prenom     Varchar (50) NOT NULL ,
        email      Varchar (50) NOT NULL ,
        mdp        Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Personne_PK PRIMARY KEY (IdPersonne)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: Archive Personne
#------------------------------------------------------------

CREATE TABLE DEYE_PersonneArchive(
IdArchive				Int 			Auto_increment 	NOT NULL,
IdPersonne				Int 							NOT NULL,
nom        				Varchar (50)		 			NOT NULL,
prenom     				Varchar (50) 					NOT NULL,
email      				Varchar (50) 					NOT NULL,
mdp        				Varchar (50) 					NOT NULL,
date_histo				DATETIME						NOT NULL,
CONSTRAINT DEYE_Personne_Archive_PK		PRIMARY KEY (IdArchive)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: DEYE_Utilisateur
#------------------------------------------------------------

CREATE TABLE DEYE_Utilisateur(
        IdPersonne     Int NOT NULL ,
        date_naissance Date NOT NULL ,
        telephone      Varchar (50) NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        prenom         Varchar (50) NOT NULL ,
        email          Varchar (50) NOT NULL ,
        mdp            Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Utilisateur_PK PRIMARY KEY (IdPersonne,date_naissance)

	,CONSTRAINT DEYE_Utilisateur_Personne_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Personne(IdPersonne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DEYE_Validateur
#------------------------------------------------------------

CREATE TABLE DEYE_Validateur(
        IdPersonne  Int NOT NULL ,
        date_entree Date NOT NULL ,
        poste       Varchar (50) NOT NULL ,
        date_droits Date NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        prenom      Varchar (50) NOT NULL ,
        email       Varchar (50) NOT NULL ,
        mdp         Varchar (50) NOT NULL
	,CONSTRAINT DEYE_Validateur_PK PRIMARY KEY (IdPersonne,date_entree)

	,CONSTRAINT DEYE_Validateur_Personne_FK FOREIGN KEY (IdPersonne) REFERENCES DEYE_Personne(IdPersonne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DEYE_Jeu
#------------------------------------------------------------

CREATE TABLE DEYE_Jeu(
        IdJeu                  Int  Auto_increment  NOT NULL ,
        designation            Varchar (50) NOT NULL ,
        date_sortie            Date NOT NULL ,
        prix                   Float NOT NULL ,
        temps_Jeu              Time NOT NULL ,
        nb_joueurs             Int NOT NULL ,
        date_validation        Date NOT NULL ,
        IdPersonne             Int NOT NULL ,
        date_naissance         Date NOT NULL ,
        Id_Editeur              Int NOT NULL ,
        Id_tranche_age         Int NOT NULL ,
        IdCategorie            Int NOT NULL ,
        IdPersonne_Validateur  Int NOT NULL ,
        date_entree_Validateur Date NOT NULL
	,CONSTRAINT DEYE_Jeu_PK PRIMARY KEY (IdJeu)

	,CONSTRAINT DEYE_Jeu_DEYE_Utilsateur_FK FOREIGN KEY (IdPersonne,date_naissance) REFERENCES DEYE_Utilisateur(IdPersonne,date_naissance)
	,CONSTRAINT DEYE_Jeu_DEYE_Editeur0_FK FOREIGN KEY (IdEditeur) REFERENCES DEYE_Editeur(IdDEYE_Editeur)
	,CONSTRAINT DEYE_Jeu_DEYE_Trancheage1_FK FOREIGN KEY (Id_tranche_age) REFERENCES DEYE_Trancheage(Id_tranche_age)
	,CONSTRAINT DEYE_Jeu_DEYE_Categorie2_FK FOREIGN KEY (IdCategorie) REFERENCES DEYE_Categorie(IdCategorie)
	,CONSTRAINT DEYE_Jeu_DEYE_Validateur3_FK FOREIGN KEY (IdPersonne_Validateur,date_entree_Validateur) REFERENCES DEYE_Validateur(IdPersonne,date_entree)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DEYE_Commentaire
#------------------------------------------------------------

CREATE TABLE DEYE_Commentaire(
        IdComment       Int  Auto_increment  NOT NULL ,
        texte           Text NOT NULL ,
        datepublication Date NOT NULL ,
        note            Int NOT NULL ,
        IdDEYE_Jeu           Int NOT NULL ,
        IdPersonne      Int NOT NULL ,
        date_naissance  Date NOT NULL
	,CONSTRAINT DEYE_Commentaire_PK PRIMARY KEY (IdComment)

	,CONSTRAINT DEYE_Commentaire_DEYE_Jeu_FK FOREIGN KEY (Id_Jeu) REFERENCES DEYE_Jeu(IdJeu)
	,CONSTRAINT DEYE_Commentaire_DEYE_Utilisateur0_FK FOREIGN KEY (IdPersonne,date_naissance) REFERENCES DEYE_Utilisateur(IdPersonne,date_naissance)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: DEYE_Rendezvous
#------------------------------------------------------------

CREATE TABLE DEYE_DEYE_Rendezvous(
        idDEYE_Rendezvous     Int  Auto_increment  NOT NULL ,
        date_DEYE_Rendezvous  Date NOT NULL ,
        heure_DEYE_Rendezvous Time NOT NULL ,
        IdDEYE_Jeu            Int NOT NULL ,
        IdPersonne       Int NOT NULL ,
        date_naissance   Date NOT NULL
	,CONSTRAINT DEYE_DEYE_Rendezvous_PK PRIMARY KEY (idDEYE_Rendezvous)

	,CONSTRAINT DEYE_Rendezvous_DEYE_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES DEYE_Jeu(IdDEYE_Jeu)
	,CONSTRAINT DEYE_Rendezvous_DEYE_Utilisateur0_FK FOREIGN KEY (IdPersonne,date_naissance) REFERENCES DEYE_Utilisateur(IdPersonne,date_naissance)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Organiser
#------------------------------------------------------------

CREATE TABLE DEYE_Organiser(
        IdJeu   Int NOT NULL ,
        IdEvent Int NOT NULL
	,CONSTRAINT DEYE_Organiser_PK PRIMARY KEY (IdJeu,IdEvent)

	,CONSTRAINT DEYE_Organiser_DEYE_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES DEYE_Jeu(IdJeu)
	,CONSTRAINT DEYE_Organiser_DEYE_Evenement0_FK FOREIGN KEY (IdEvent) REFERENCES DEYE_Evenement(IdEvent)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: Personne
#------------------------------------------------------------

insert into DEYE_Personne values (null, "lakun", "cindy", "test1@gmail.com", "0000");
insert into DEYE_Personne values (null, "kvs", "eric", "test2@gmail.com", "0001");
insert into DEYE_Personne values (null, "phitso", "pierre", "test3@gmail.com", "0002");
insert into DEYE_Personne values (null, "test", "yacine", "test4@gmail.com", "0003");
insert into DEYE_Personne values (null, "teteen", "cyril", "test5@gmail.com", "0004");
insert into DEYE_Personne values (null, "abaach", "yahia", "test6@gmail.com", "0005");
insert into DEYE_Personne values (null, "procha", "vincent", "test7@gmail.com", "0006");
insert into DEYE_Personne values (null, "saga", "sinthujah", "test8@gmail.com", "0007");
insert into DEYE_Personne values (null, "bereski", "alexandra", "test9@gmail.com", "0008");
insert into DEYE_Personne values (null, "tran", "céline", "test10@gmail.com", "0009");

#------------------------------------------------------------
# INSERT: Lieu
#------------------------------------------------------------

insert into DEYE_Lieu values (null, "16 Rue Stanislas, 75006", "Paris", "Waaagh Taverne");
insert into DEYE_Lieu values (null, "24 Boulevard Beaumarchais, 75011", "Paris", "Magic Corp");
insert into DEYE_Lieu values (null, "131 Avenue de France, 75013", "Paris", "Magic Bazar");
insert into DEYE_Lieu values (null, " 25 Rue de la Reine Blanche, 75013", "Paris", "OYA");
insert into DEYE_Lieu values (null, " 227 Rue Saint-Martin, 75003", "Paris", "LE NID - Cocon Ludique");

#------------------------------------------------------------
# INSERT: Photo
#------------------------------------------------------------

insert into Photo values (null, "img/bazar.png");
insert into Photo values (null, "img/bazar.png");
insert into Photo values (null, "img/bazar.png");
insert into Photo values (null, "img/bazar.png");
insert into Photo values (null, "img/bazar.png");

#------------------------------------------------------------
# INSERT: DEYE_DEYE_Evenement
#------------------------------------------------------------

insert into DEYE_Evenement values (null, "Trial Zap Duel Commander", "2018/12/03", "19:15:00");
insert into DEYE_Evenement values (null, "Soirée DEYE_Jeux de société", "2018/12/05", "19:00:00");
insert into DEYE_Evenement values (null, "Ultimate Masters Booster Draft", "2018/12/07", "19:15:00");
insert into DEYE_Evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00");
insert into DEYE_Evenement values (null, "Soirée DEYE_Jeux de société", "2018/12/08", "19:00:00");
insert into DEYE_Evenement values (null, "Ultimate Masters Paquet Scellé", "2018/12/09", "12:00:00");
insert into DEYE_Evenement values (null, "Dragon Ball Last Chance", "2018/12/14", "13:00:00");
insert into DEYE_Evenement values (null, "Tournoi Mensuel Modern", "2018/12/15", "11:30:00");
insert into DEYE_Evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00");

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
# INSERT: DEYE_Categorie
#------------------------------------------------------------

insert into DEYE_Categorie values (null, "Stratégie");
insert into DEYE_Categorie values (null, "Coopération");
insert into DEYE_Categorie values (null, "DEYE_Jeux de Rôles");
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
# INSERT: DEYE_Trancheage
#------------------------------------------------------------

insert into DEYE_Trancheage values ("0-3 ans et +");
insert into DEYE_Trancheage values ("4-5 ans et +");
insert into DEYE_Trancheage values ("6-7 ans et +");
insert into DEYE_Trancheage values ("8-10 ans et +");
insert into DEYE_Trancheage values ("10 ans et +");
insert into DEYE_Trancheage values ("Toutes les tranches d'âge");

#------------------------------------------------------------
# INSERT: DEYE_Utilisateur
#------------------------------------------------------------

insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "lakun", "cindy", "test1@gmail.com", "0000");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "kvs", "eric", "test2@gmail.com", "0001");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "phitso", "pierre", "test3@gmail.com", "0002");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "sotin", "yacine", "test4@gmail.com", "0003");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "teteen", "cyril", "test5@gmail.com", "0004");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "abaach", "yahia", "test6@gmail.com", "0005");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "procha", "vincent", "test7@gmail.com", "0006");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "saga", "sinthujah", "test8@gmail.com", "0007");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "bereski", "alexandra", "test9@gmail.com", "0008");
insert into DEYE_Utilisateur values ("1998/01/01", "0601010101", "tran", "céline", "test10@gmail.com", "0009");

#------------------------------------------------------------
# INSERT: DEYE_Validateur
#------------------------------------------------------------

insert into DEYE_Validateur values ("2018/09/15", "Administrateur", "2018/09/15", "lakun", "cindy", "test1@gmail.com", "0000");
insert into DEYE_Validateur values ("2018/09/15", "Administrateur", "kvs", "eric", "test2@gmail.com", "0001");
insert into DEYE_Validateur values ("2018/09/15", "Administrateur", "phitso", "pierre", "test3@gmail.com", "0002");
insert into DEYE_Validateur values ("2018/09/15", "Administrateur", "sotin", "yacine", "test4@gmail.com", "0003");
insert into DEYE_Validateur values ("2018/09/15", "membre", "teteen", "cyril", "test5@gmail.com", "0004");
insert into DEYE_Validateur values ("2018/09/15", "membre", "abaach", "yahia", "test6@gmail.com", "0005");
insert into DEYE_Validateur values ("2018/09/15", "membre", "procha", "vincent", "test7@gmail.com", "0006");
insert into DEYE_Validateur values ("2018/09/15", "membre", "saga", "sinthujah", "test8@gmail.com", "0007");
insert into DEYE_Validateur values ("2018/09/15", "membre", "bereski", "alexandra", "test9@gmail.com", "0008");
insert into DEYE_Validateur values ("2018/09/15", "membre", "tran", "céline", "test10@gmail.com", "0009");

#------------------------------------------------------------
# INSERT: DEYE_Jeu
#------------------------------------------------------------

insert into DEYE_Jeu values (null, "Games of Thrones" ,"2011/12/21", "54,00", "2:00:00", "6");
insert into DEYE_Jeu values (null, "*Jamaica" ,"2008/02/11", "35,00", "00:30:00", "6");
insert into DEYE_Jeu values (null, "Monopoly" ,"1935/02/06", "20,00", "12:00:00", "6");
insert into DEYE_Jeu values (null, "Games of Thrones" ,"2011/12/21", "54,00", "2:00:00", "6");
insert into DEYE_Jeu values (null, "Munchkins" ,"2010/12/21", "36,00", "1:00:00", "6");
insert into DEYE_Jeu values (null, "La Bonne Paye" ,"1975/12/21", "20,00", "1:00:00", "6");

#------------------------------------------------------------
# INSERT: DEYE_Commentaire
#------------------------------------------------------------

insert into DEYE_Commentaire values (null, "très nul", "2018/12/10", "0");
insert into DEYE_Commentaire values (null, "nul", "2018/06/27", "0,5");
insert into DEYE_Commentaire values (null, "pas incroyable", "2018/01/05", "1");
insert into DEYE_Commentaire values (null, "pas très bien", "2018/01/15", "1,5");
insert into DEYE_Commentaire values (null, "bof", "2018/10/23", "2");
insert into DEYE_Commentaire values (null, "normal", "2018/07/31", "2,5");
insert into DEYE_Commentaire values (null, "moyen", "2018/04/01", "3");
insert into DEYE_Commentaire values (null, "Pas mal", "2018/03/17", "3,5");
insert into DEYE_Commentaire values (null, "Super", "2018/12/11", "4");
insert into DEYE_Commentaire values (null, "Excellent DEYE_Jeu", "2018/01/20", "4,5");
insert into DEYE_Commentaire values (null, "Parfait", "2018/05/30", "5");

#------------------------------------------------------------
# INSERT: DEYE_Rendezvous
#------------------------------------------------------------

insert into DEYE_Rendezvous values (null, "2018/12/07", "12:00:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "12:30:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "13:00:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "13:30:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "14:00:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "14:30:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "15:00:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "15:30:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "16:00:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "16:30:00");
insert into DEYE_Rendezvous values (null, "2018/12/07", "17:00:00");

#------------------------------------------------------------
# TRIGGER : Archive_Personne
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER DEYE_TRG_Archivage_Personne_After_Update AFTER UPDATE
	ON DEYE_Personne
	FOR each row
	BEGIN
		insert into DEYE_PersonneArchive (IdPersonne, nom, prenom, email, mdp, date_histo)
		values
		(OLD.IdPersonne, OLD.nom, OLD.prenom, OLD.email, OLD.mdp, NOW());
	END $
DELIMITER ;