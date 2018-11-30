#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
drop database if exists BDD_jeu ; 
create database BDD_jeu; 
use BDD_jeu; 

#------------------------------------------------------------
# Table: Lieu
#------------------------------------------------------------

CREATE TABLE Lieu(
        IdLieu  Int  Auto_increment  NOT NULL ,
        Adresse Varchar (50) NOT NULL ,
        ville   Varchar (50) NOT NULL ,
        Nom     Varchar (50) NOT NULL
	,CONSTRAINT Lieu_PK PRIMARY KEY (IdLieu)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evenement
#------------------------------------------------------------

CREATE TABLE Evenement(
        IdEvent     Int  Auto_increment  NOT NULL ,
        designation Varchar (50) NOT NULL ,
        date_event  Date NOT NULL ,
        heure_event Time NOT NULL ,
        IdLieu      Int NOT NULL
	,CONSTRAINT Evenement_PK PRIMARY KEY (IdEvent)

	,CONSTRAINT Evenement_Lieu_FK FOREIGN KEY (IdLieu) REFERENCES Lieu(IdLieu)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Photo
#------------------------------------------------------------

CREATE TABLE Photo(
        IdPhoto Int  Auto_increment  NOT NULL ,
        url     Varchar (50) NOT NULL ,
        type    Varchar (50) NOT NULL ,
        IdEvent Int NOT NULL
	,CONSTRAINT Photo_PK PRIMARY KEY (IdPhoto)

	,CONSTRAINT Photo_Evenement_FK FOREIGN KEY (IdEvent) REFERENCES Evenement(IdEvent)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Editeur
#------------------------------------------------------------

CREATE TABLE Editeur(
        IdEditeur   Int  Auto_increment  NOT NULL ,
        Nom         Varchar (50) NOT NULL ,
        nationalite Varchar (50) NOT NULL
	,CONSTRAINT Editeur_PK PRIMARY KEY (IdEditeur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Categorie
#------------------------------------------------------------

CREATE TABLE Categorie(
        IdCategorie Int  Auto_increment  NOT NULL ,
        libelle     Varchar (50) NOT NULL
	,CONSTRAINT Categorie_PK PRIMARY KEY (IdCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Trancheage
#------------------------------------------------------------

CREATE TABLE Trancheage(
        Id_tranche_age Int  Auto_increment  NOT NULL ,
        age_requis     Varchar (50) NOT NULL
	,CONSTRAINT Trancheage_PK PRIMARY KEY (Id_tranche_age)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        IdPersonne Int  Auto_increment  NOT NULL ,
        nom        Varchar (50) NOT NULL ,
        prenom     Varchar (50) NOT NULL ,
        email      Varchar (50) NOT NULL ,
        mdp        Varchar (50) NOT NULL
	,CONSTRAINT Personne_PK PRIMARY KEY (IdPersonne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        IdPersonne     Int NOT NULL ,
        date_naissance Date NOT NULL ,
        telephone      Varchar (50) NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        prenom         Varchar (50) NOT NULL ,
        email          Varchar (50) NOT NULL ,
        mdp            Varchar (50) NOT NULL
	,CONSTRAINT User_PK PRIMARY KEY (IdPersonne,date_naissance)

	,CONSTRAINT User_Personne_FK FOREIGN KEY (IdPersonne) REFERENCES Personne(IdPersonne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Validateur
#------------------------------------------------------------

CREATE TABLE Validateur(
        IdPersonne  Int NOT NULL ,
        date_entree Date NOT NULL ,
        poste       Varchar (50) NOT NULL ,
        date_droits Date NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        prenom      Varchar (50) NOT NULL ,
        email       Varchar (50) NOT NULL ,
        mdp         Varchar (50) NOT NULL
	,CONSTRAINT Validateur_PK PRIMARY KEY (IdPersonne,date_entree)

	,CONSTRAINT Validateur_Personne_FK FOREIGN KEY (IdPersonne) REFERENCES Personne(IdPersonne)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Jeu
#------------------------------------------------------------

CREATE TABLE Jeu(
        IdJeu                  Int  Auto_increment  NOT NULL ,
        designation            Varchar (50) NOT NULL ,
        date_sortie            Date NOT NULL ,
        prix                   Float NOT NULL ,
        temps_jeu              Time NOT NULL ,
        nb_joueurs             Int NOT NULL ,
        date_validation        Date NOT NULL ,
        IdPersonne             Int NOT NULL ,
        date_naissance         Date NOT NULL ,
        IdEditeur              Int NOT NULL ,
        Id_tranche_age         Int NOT NULL ,
        IdCategorie            Int NOT NULL ,
        IdPersonne_Validateur  Int NOT NULL ,
        date_entree_Validateur Date NOT NULL
	,CONSTRAINT Jeu_PK PRIMARY KEY (IdJeu)

	,CONSTRAINT Jeu_User_FK FOREIGN KEY (IdPersonne,date_naissance) REFERENCES User(IdPersonne,date_naissance)
	,CONSTRAINT Jeu_Editeur0_FK FOREIGN KEY (IdEditeur) REFERENCES Editeur(IdEditeur)
	,CONSTRAINT Jeu_Trancheage1_FK FOREIGN KEY (Id_tranche_age) REFERENCES Trancheage(Id_tranche_age)
	,CONSTRAINT Jeu_Categorie2_FK FOREIGN KEY (IdCategorie) REFERENCES Categorie(IdCategorie)
	,CONSTRAINT Jeu_Validateur3_FK FOREIGN KEY (IdPersonne_Validateur,date_entree_Validateur) REFERENCES Validateur(IdPersonne,date_entree)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Commentaire
#------------------------------------------------------------

CREATE TABLE Commentaire(
        IdComment       Int  Auto_increment  NOT NULL ,
        texte           Text NOT NULL ,
        datepublication Date NOT NULL ,
        note            Int NOT NULL ,
        IdJeu           Int NOT NULL ,
        IdPersonne      Int NOT NULL ,
        date_naissance  Date NOT NULL
	,CONSTRAINT Commentaire_PK PRIMARY KEY (IdComment)

	,CONSTRAINT Commentaire_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES Jeu(IdJeu)
	,CONSTRAINT Commentaire_User0_FK FOREIGN KEY (IdPersonne,date_naissance) REFERENCES User(IdPersonne,date_naissance)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Rendezvous
#------------------------------------------------------------

CREATE TABLE Rendezvous(
        idrendezvous     Int  Auto_increment  NOT NULL ,
        date_rendezvous  Date NOT NULL ,
        heure_rendezvous Time NOT NULL ,
        IdJeu            Int NOT NULL ,
        IdPersonne       Int NOT NULL ,
        date_naissance   Date NOT NULL
	,CONSTRAINT Rendezvous_PK PRIMARY KEY (idrendezvous)

	,CONSTRAINT Rendezvous_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES Jeu(IdJeu)
	,CONSTRAINT Rendezvous_User0_FK FOREIGN KEY (IdPersonne,date_naissance) REFERENCES User(IdPersonne,date_naissance)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Organiser
#------------------------------------------------------------

CREATE TABLE Organiser(
        IdJeu   Int NOT NULL ,
        IdEvent Int NOT NULL
	,CONSTRAINT Organiser_PK PRIMARY KEY (IdJeu,IdEvent)

	,CONSTRAINT Organiser_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES Jeu(IdJeu)
	,CONSTRAINT Organiser_Evenement0_FK FOREIGN KEY (IdEvent) REFERENCES Evenement(IdEvent)
)ENGINE=InnoDB;