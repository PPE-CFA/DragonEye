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
<<<<<<< HEAD
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
=======
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
>>>>>>> 5393d28158e631359dc43b35564f2f4e24ae5a4a
        IdPersonne     Int NOT NULL ,
        date_naissance Date NOT NULL ,
        telephone      Varchar (50) NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        prenom         Varchar (50) NOT NULL ,
        email          Varchar (50) NOT NULL ,
        mdp            Varchar (50) NOT NULL
<<<<<<< HEAD
	,CONSTRAINT User_PK PRIMARY KEY (IdPersonne,date_naissance)

	,CONSTRAINT User_Personne_FK FOREIGN KEY (IdPersonne) REFERENCES Personne(IdPersonne)
=======
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (IdPersonne,date_naissance)

	,CONSTRAINT Utilisateur_Personne_FK FOREIGN KEY (IdPersonne) REFERENCES Personne(IdPersonne)
>>>>>>> 5393d28158e631359dc43b35564f2f4e24ae5a4a
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
<<<<<<< HEAD
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
=======
        # date_naissance         Date NOT NULL ,
        IdEditeur              Int NOT NULL ,
        Id_tranche_age         Int NOT NULL ,
        IdCategorie            Int NOT NULL ,
        IdPersonne_Validateur  Int NOT NULL 
        # date_entree_Validateur Date NOT NULL
	,CONSTRAINT Jeu_PK PRIMARY KEY (IdJeu)

	,CONSTRAINT Jeu_Utilisateur_FK FOREIGN KEY (IdPersonne) REFERENCES Utilisateur(IdPersonne)
	,CONSTRAINT Jeu_Editeur0_FK FOREIGN KEY (IdEditeur) REFERENCES Editeur(IdEditeur)
	,CONSTRAINT Jeu_Trancheage1_FK FOREIGN KEY (Id_tranche_age) REFERENCES Trancheage(Id_tranche_age)
	,CONSTRAINT Jeu_Categorie2_FK FOREIGN KEY (IdCategorie) REFERENCES Categorie(IdCategorie)
	,CONSTRAINT Jeu_Validateur3_FK FOREIGN KEY (IdPersonne_Validateur) REFERENCES Validateur(IdPersonne)
>>>>>>> 5393d28158e631359dc43b35564f2f4e24ae5a4a
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
<<<<<<< HEAD
        IdPersonne      Int NOT NULL ,
        date_naissance  Date NOT NULL
	,CONSTRAINT Commentaire_PK PRIMARY KEY (IdComment)

	,CONSTRAINT Commentaire_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES Jeu(IdJeu)
	,CONSTRAINT Commentaire_User0_FK FOREIGN KEY (IdPersonne,date_naissance) REFERENCES User(IdPersonne,date_naissance)
=======
        IdPersonne      Int NOT NULL 
        #date_naissance  Date NOT NULL
	,CONSTRAINT Commentaire_PK PRIMARY KEY (IdComment)

	,CONSTRAINT Commentaire_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES Jeu(IdJeu)
	,CONSTRAINT Commentaire_Utilisateur0_FK FOREIGN KEY (IdPersonne) REFERENCES Utilisateur(IdPersonne)
>>>>>>> 5393d28158e631359dc43b35564f2f4e24ae5a4a
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Rendezvous
#------------------------------------------------------------

CREATE TABLE Rendezvous(
        idrendezvous     Int  Auto_increment  NOT NULL ,
        date_rendezvous  Date NOT NULL ,
        heure_rendezvous Time NOT NULL ,
        IdJeu            Int NOT NULL ,
<<<<<<< HEAD
        IdPersonne       Int NOT NULL ,
        date_naissance   Date NOT NULL
	,CONSTRAINT Rendezvous_PK PRIMARY KEY (idrendezvous)

	,CONSTRAINT Rendezvous_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES Jeu(IdJeu)
	,CONSTRAINT Rendezvous_User0_FK FOREIGN KEY (IdPersonne,date_naissance) REFERENCES User(IdPersonne,date_naissance)
=======
        IdPersonne       Int NOT NULL 
        #date_naissance   Date NOT NULL
	,CONSTRAINT Rendezvous_PK PRIMARY KEY (idrendezvous)

	,CONSTRAINT Rendezvous_Jeu_FK FOREIGN KEY (IdJeu) REFERENCES Jeu(IdJeu)
	,CONSTRAINT Rendezvous_Utilisateur0_FK FOREIGN KEY (IdPersonne) REFERENCES Utilisateur(IdPersonne)
>>>>>>> 5393d28158e631359dc43b35564f2f4e24ae5a4a
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
<<<<<<< HEAD
)ENGINE=InnoDB;
=======
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: Personne
#------------------------------------------------------------

insert into Personne values (null, "lakun", "cindy", "test1@gmail.com", "0000");
insert into Personne values (null, "kvs", "eric", "test2@gmail.com", "0001");
insert into Personne values (null, "phitso", "pierre", "test3@gmail.com", "0002");
insert into Personne values (null, "test", "yacine", "test4@gmail.com", "0003");
insert into Personne values (null, "teteen", "cyril", "test5@gmail.com", "0004");
insert into Personne values (null, "abaach", "yahia", "test6@gmail.com", "0005");
insert into Personne values (null, "procha", "vincent", "test7@gmail.com", "0006");
insert into Personne values (null, "saga", "sinthujah", "test8@gmail.com", "0007");
insert into Personne values (null, "bereski", "alexandra", "test9@gmail.com", "0008");
insert into Personne values (null, "tran", "céline", "test10@gmail.com", "0009");

#------------------------------------------------------------
# INSERT: Lieu
#------------------------------------------------------------

insert into Lieu values (null, "16 Rue Stanislas, 75006", "Paris", "Waaagh Taverne");
insert into Lieu values (null, "24 Boulevard Beaumarchais, 75011", "Paris", "Magic Corp");
insert into Lieu values (null, "131 Avenue de France, 75013", "Paris", "Magic Bazar");
insert into Lieu values (null, " 25 Rue de la Reine Blanche, 75013", "Paris", "OYA");
insert into Lieu values (null, " 227 Rue Saint-Martin, 75003", "Paris", "LE NID - Cocon Ludique");

#------------------------------------------------------------
# INSERT: Evenement
#------------------------------------------------------------

insert into Evenement values (null, "Trial Zap Duel Commander", "2018/12/03", "19:15:00", 1);
insert into Evenement values (null, "Soirée jeux de société", "2018/12/05", "19:00:00", 2);
insert into Evenement values (null, "Ultimate Masters Booster Draft", "2018/12/07", "19:15:00", 3);
insert into Evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00", 4);
insert into Evenement values (null, "Soirée jeux de société", "2018/12/08", "19:00:00", 5);
insert into Evenement values (null, "Ultimate Masters Paquet Scellé", "2018/12/09", "12:00:00", 2);
insert into Evenement values (null, "Dragon Ball Last Chance", "2018/12/14", "13:00:00", 3);
insert into Evenement values (null, "Tournoi Mensuel Modern", "2018/12/15", "11:30:00", 4);
insert into Evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00", 5);

#------------------------------------------------------------
# INSERT: Photo
#------------------------------------------------------------

insert into Photo values (null, "img/bazar.png", "png", 1);
insert into Photo values (null, "img/bazar.png", "png", 2);
insert into Photo values (null, "img/bazar.png", "png", 3);
insert into Photo values (null, "img/bazar.png", "png", 4);
insert into Photo values (null, "img/bazar.png", "png", 5);

#------------------------------------------------------------
# INSERT: Editeur
#------------------------------------------------------------

insert into Editeur values (null, "Hasbro", "Américain");
insert into Editeur values (null, "Ravensburger", "Allemagne");
insert into Editeur values (null, "Kosmos", "Allemagne");
insert into Editeur values (null, "GameWorks", "Suisse");
insert into Editeur values (null, "Repos Production", "Belgique");
insert into Editeur values (null, "Ludoca", "Québec");
insert into Editeur values (null, "Filosofia", "Québec");
insert into Editeur values (null, "Portal Games", "Pologne");
insert into Editeur values (null, "Ankama", "France");
insert into Editeur values (null, "Asmodee", "France");
insert into Editeur values (null, "Cocktail Games", "France");
insert into Editeur values (null, "Days of Wonder", "France");
insert into Editeur values (null, "Edge Entertainment", "France");
insert into Editeur values (null, "FunForge", "France");
insert into Editeur values (null, "Lui-même", "France");

#------------------------------------------------------------
# INSERT: Categorie
#------------------------------------------------------------

insert into Categorie values (null, "Stratégie");
insert into Categorie values (null, "Coopération");
insert into Categorie values (null, "Jeux de Rôles");
insert into Categorie values (null, "Casse-Tête");
insert into Categorie values (null, "Conquête");
insert into Categorie values (null, "Course");
insert into Categorie values (null, "Educatif");
insert into Categorie values (null, "Humour");
insert into Categorie values (null, "Négociation");
insert into Categorie values (null, "Plateau");
insert into Categorie values (null, "Cartes");
insert into Categorie values (null, "Créativité");

#------------------------------------------------------------
# INSERT: Trancheage
#------------------------------------------------------------

insert into Trancheage values (null, "0-3 ans et +");
insert into Trancheage values (null, "4-5 ans et +");
insert into Trancheage values (null, "6-7 ans et +");
insert into Trancheage values (null, "8-10 ans et +");
insert into Trancheage values (null, "10 ans et +");
insert into Trancheage values (null, "Toutes les tranches d'âge");

#------------------------------------------------------------
# INSERT: Utilisateur
#------------------------------------------------------------

insert into Utilisateur values (1, "1998/01/01", "0601010101", "lakun", "cindy", "test1@gmail.com", "0000");
insert into Utilisateur values (2, "1998/01/01", "0601010101", "kvs", "eric", "test2@gmail.com", "0001");
insert into Utilisateur values (3, "1998/01/01", "0601010101", "phitso", "pierre", "test3@gmail.com", "0002");
insert into Utilisateur values (4, "1998/01/01", "0601010101", "sotin", "yacine", "test4@gmail.com", "0003");
insert into Utilisateur values (5, "1998/01/01", "0601010101", "teteen", "cyril", "test5@gmail.com", "0004");
insert into Utilisateur values (6, "1998/01/01", "0601010101", "abaach", "yahia", "test6@gmail.com", "0005");
insert into Utilisateur values (7, "1998/01/01", "0601010101", "procha", "vincent", "test7@gmail.com", "0006");
insert into Utilisateur values (8, "1998/01/01", "0601010101", "saga", "sinthujah", "test8@gmail.com", "0007");
insert into Utilisateur values (9, "1998/01/01", "0601010101", "bereski", "alexandra", "test9@gmail.com", "0008");
insert into Utilisateur values (10, "1998/01/01", "0601010101", "tran", "céline", "test10@gmail.com", "0009");

#------------------------------------------------------------
# INSERT: Validateur
#------------------------------------------------------------

insert into Validateur values (1, "2018/09/15", "Administrateur", "2018/09/15", "lakun", "cindy", "test1@gmail.com", "0000");
insert into Validateur values (2, "2018/09/15", "Administrateur",  "2018/09/13", "kvs", "eric", "test2@gmail.com", "0001");
insert into Validateur values (3, "2018/09/15", "Administrateur",  "2018/09/2", "phitso", "pierre", "test3@gmail.com", "0002");
insert into Validateur values (4, "2018/09/15", "Administrateur",  "2018/03/05", "sotin", "yacine", "test4@gmail.com", "0003");
insert into Validateur values (5, "2018/09/15", "membre",  "2018/01/04", "teteen", "cyril", "test5@gmail.com", "0004");
insert into Validateur values (6, "2018/09/15", "membre",  "2018/05/05", "abaach", "yahia", "test6@gmail.com", "0005");
insert into Validateur values (7, "2018/09/15", "membre",  "2018/02/08", "procha", "vincent", "test7@gmail.com", "0006");
insert into Validateur values (8, "2018/09/15", "membre",  "2018/04/14", "saga", "sinthujah", "test8@gmail.com", "0007");
insert into Validateur values (9, "2018/09/15", "membre",  "2018/06/25", "bereski", "alexandra", "test9@gmail.com", "0008");
insert into Validateur values (10, "2018/09/15", "membre",  "2018/09/16", "tran", "céline", "test10@gmail.com", "0009");

#------------------------------------------------------------
# INSERT: Jeu
#------------------------------------------------------------

insert into Jeu values (null, "Games of Thrones" ,"2011/12/21", "54,00", "2:00:00", "6", "2011/12/21", 1, 1, 1, 1, 1);
insert into Jeu values (null, "*Jamaica" ,"2008/02/11", "35,00", "00:30:00", "6", "2011/06/21", 2, 2, 2, 2, 2);
insert into Jeu values (null, "Monopoly" ,"1935/02/06", "20,00", "12:00:00", "6", "2011/07/21", 3, 3, 3, 3, 3);
insert into Jeu values (null, "Games of Thrones" ,"2011/12/21", "54,00", "2:00:00", "6", "2011/12/11", 4, 4, 4, 4, 4);
insert into Jeu values (null, "Munchkins" ,"2010/12/21", "36,00", "1:00:00", "6", "2011/04/06", 5, 5, 5, 5, 5);
insert into Jeu values (null, "La Bonne Paye" ,"1975/12/21", "20,00", "1:00:00", "6", "2011/05/07", 6, 6, 6, 6, 6);

#------------------------------------------------------------
# INSERT: Commentaire
#------------------------------------------------------------

insert into Commentaire values (null, "très nul", "2018/12/10", "0", 1, 1);
insert into Commentaire values (null, "nul", "2018/06/27", "0,5", 2, 2);
insert into Commentaire values (null, "pas incroyable", "2018/01/05", "1", 3, 3);
insert into Commentaire values (null, "pas très bien", "2018/01/15", "1,5", 4, 4);
insert into Commentaire values (null, "bof", "2018/10/23", "2", 5, 5);
insert into Commentaire values (null, "normal", "2018/07/31", "2,5", 6, 6);
insert into Commentaire values (null, "moyen", "2018/04/01", "3", 4, 4);
insert into Commentaire values (null, "Pas mal", "2018/03/17", "3,5", 5 ,5);
insert into Commentaire values (null, "Super", "2018/12/11", "4", 6, 6);
insert into Commentaire values (null, "Excellent jeu", "2018/01/20", "4,5", 1, 1);
insert into Commentaire values (null, "Parfait", "2018/05/30", "5", 2, 2);

#------------------------------------------------------------
# INSERT: Rendezvous
#------------------------------------------------------------

insert into Rendezvous values (null, "2018/12/07", "12:00:00",1 ,1);
insert into Rendezvous values (null, "2018/12/07", "12:30:00", 2, 2);
insert into Rendezvous values (null, "2018/12/07", "13:00:00", 3, 3);
insert into Rendezvous values (null, "2018/12/07", "13:30:00", 4, 4);
insert into Rendezvous values (null, "2018/12/07", "14:00:00", 5, 5);
insert into Rendezvous values (null, "2018/12/07", "14:30:00", 6, 6);
insert into Rendezvous values (null, "2018/12/07", "15:00:00", 3, 4);
insert into Rendezvous values (null, "2018/12/07", "15:30:00", 5, 5);
insert into Rendezvous values (null, "2018/12/07", "16:00:00", 1, 4);
insert into Rendezvous values (null, "2018/12/07", "16:30:00", 3, 3);
insert into Rendezvous values (null, "2018/12/07", "17:00:00", 4, 4);

#------------------------------------------------------------
# INSERT: Organiser
#------------------------------------------------------------
>>>>>>> 5393d28158e631359dc43b35564f2f4e24ae5a4a
