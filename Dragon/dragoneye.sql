#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
drop database if exists dragoneye ; 
create database dragoneye; 
use dragoneye; 

ALTER database dragoneye CHARACTER SET utf8 COLLATE utf8_general_ci;

#------------------------------------------------------------
# Table: deye_photo_type
#------------------------------------------------------------

CREATE TABLE deye_photo_type(
	idPhoto_type char(2) NOT NULL PRIMARY KEY,
	Photo_origine Varchar (50) NOT NULL
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_photo_type
#------------------------------------------------------------

insert into deye_photo_type values ('S', "Système");
insert into deye_photo_type values ('AN', "Annonce");
insert into deye_photo_type values ('J', "Jeux");
insert into deye_photo_type values ('L', "Lieu");

#------------------------------------------------------------
# Table: deye_photo
#------------------------------------------------------------

CREATE TABLE deye_photo(
	idPhoto       Int auto_increment NOT NULL ,
	idPhoto_T   char(2) NOT NULL REFERENCES deye_photo_Type(idPhoto_Type) ,
	Url_photo     Varchar (50) NOT NULL
	,CONSTRAINT deye_photo_type_PK PRIMARY KEY (idPhoto, idPhoto_T)

)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_photo
#------------------------------------------------------------

insert into deye_photo values (null, 'S', "../img/logo.png");
insert into deye_photo values (null, 'J', "../../img/Jeux/trone.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/monopoly.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/bonne_paye.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/dixit.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/Comanautes.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/Fuji.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/Iceteam.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/MississipiQueen.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/Narabi.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/PortraitRobot.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/RollPlayer.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/UnDernierDonjon.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/UnderwaterCities.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/UnoDeluxe.jpg");
insert into deye_photo values (null, 'J', "../../img/Jeux/VictorianMastermind.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/trone.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/monopoly.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/bonne_paye.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/dixit.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/Comanautes.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/Fuji.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/Iceteam.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/MississipiQueen.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/Narabi.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/PortraitRobot.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/RollPlayer.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/UnDernierDonjon.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/UnderwaterCities.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/UnoDeluxe.jpg");
insert into deye_photo values (null, 'AN', "../../img/Annonce/VictorianMastermind.jpg");

#------------------------------------------------------------
# Table: deye_lieu
#------------------------------------------------------------

CREATE TABLE deye_lieu(
	idLieu  Int  Auto_increment  NOT NULL ,
	idPhoto Int  NOT NULL,
	Adresse Varchar (50) NOT NULL ,
	Ville   Varchar (50) NOT NULL ,
	Nom     Varchar (50) NOT NULL
,CONSTRAINT deye_lieu_PK PRIMARY KEY (idLieu)
,CONSTRAINT deye_photo_deye_lieu0_PK FOREIGN KEY (idPhoto) REFERENCES deye_photo(idPhoto) ON DELETE CASCADE

)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_lieu
#------------------------------------------------------------

insert into deye_lieu values (null, 1, "16 Rue Stanislas, 75006", "Paris", "Waaagh Taverne");
insert into deye_lieu values (null, 1, "24 Boulevard Beaumarchais, 75011", "Paris", "Magic Corp");
insert into deye_lieu values (null, 1, "131 Avenue de France, 75013", "Paris", "Magic Bazar");
insert into deye_lieu values (null, 1, " 25 Rue de la Reine Blanche, 75013", "Paris", "OYA");
insert into deye_lieu values (null, 1, " 227 Rue Saint-Martin, 75003", "Paris", "LE NID - Cocon Ludique");

#------------------------------------------------------------
# Table: deye_evenement
#------------------------------------------------------------

CREATE TABLE deye_evenement(
	idEvent     Int  Auto_increment  NOT NULL ,
	Designation Varchar (50) NOT NULL ,
	Date_event  Date NOT NULL ,
	Heure_event Time NOT NULL ,
	idPhoto     Int NOT NULL ,
	idLieu      Int NOT NULL
,CONSTRAINT deye_evenement_PK PRIMARY KEY (idEvent)
,CONSTRAINT deye_photo_deye_Event0_PK FOREIGN KEY (idPhoto) REFERENCES deye_photo(idPhoto) ON DELETE CASCADE
,CONSTRAINT deye_evenement_deye_lieu1_FK FOREIGN KEY (idLieu) REFERENCES deye_lieu(idLieu) ON DELETE CASCADE

)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_evenement
#------------------------------------------------------------

insert into deye_evenement values (null, "Trial Zap Duel Commander", "2018/12/03", "19:15:00", 1, 1);
insert into deye_evenement values (null, "Soirée Jeux de société", "2018/12/05", "19:00:00", 1, 2);
insert into deye_evenement values (null, "Ultimate Masters Booster Draft", "2018/12/07", "19:15:00", 1, 3);
insert into deye_evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00", 1, 4);
insert into deye_evenement values (null, "Soirée Jeux de société", "2018/12/08", "19:00:00", 1, 5);
insert into deye_evenement values (null, "Ultimate Masters Paquet Scellé", "2018/12/09", "12:00:00", 1, 2);
insert into deye_evenement values (null, "Dragon Ball Last Chance", "2018/12/14", "13:00:00", 1, 3);
insert into deye_evenement values (null, "Tournoi Mensuel Modern", "2018/12/15", "11:30:00", 1, 4);
insert into deye_evenement values (null, "Tournoi Mensuel Legacy", "2018/12/08", "11:30:00", 1, 5);

#------------------------------------------------------------
# Table: deye_evenement_archive
#------------------------------------------------------------

CREATE TABLE deye_evenement_archive(
	idEvent_archive	Int	Auto_increment	NOT NULL ,
	idEvent     Int  NOT NULL ,
	Designation Varchar (50) NOT NULL ,
	Date_event  Date NOT NULL ,
	Heure_event Time NOT NULL ,
	idPhoto     Int NOT NULL ,
	idLieu      Int NOT NULL ,
	Date_histo	DATETIME NOT NULL
,CONSTRAINT deye_evenement_archive_PK PRIMARY KEY (idEvent_archive)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: deye_editeur
#------------------------------------------------------------

CREATE TABLE deye_editeur(
	idEditeur   Int  Auto_increment  NOT NULL ,
	Nom         Varchar (50) NOT NULL ,
	Nationalite Varchar (50) NOT NULL
,CONSTRAINT deye_editeur_PK PRIMARY KEY (idEditeur)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_editeur
#------------------------------------------------------------

insert into deye_editeur values (null, "Hasbro", "Américain");
insert into deye_editeur values (null, "Ravensburger", "Allemagne");
insert into deye_editeur values (null, "Kosmos", "Allemagne");
insert into deye_editeur values (null, "GameWorks", "Suisse");
insert into deye_editeur values (null, "Repos Production", "Belgique");
insert into deye_editeur values (null, "Ludoca", "Québec");
insert into deye_editeur values (null, "Filosofia", "Québec");
insert into deye_editeur values (null, "Portal Games", "Pologne");
insert into deye_editeur values (null, "Ankama", "France");
insert into deye_editeur values (null, "Asmodee", "France");
insert into deye_editeur values (null, "Cocktail Games", "France");
insert into deye_editeur values (null, "Days of Wonder", "France");
insert into deye_editeur values (null, "Edge Entertainment", "France");
insert into deye_editeur values (null, "FunForge", "France");
insert into deye_editeur values (null, "Lui-même", "France");
insert into deye_editeur values (null, "Ludocom", "France");
insert into deye_editeur values (null, "Delicious Games", "Britannique");
insert into deye_editeur values (null, "Cmon", "USA");
insert into deye_editeur values (null, "Super Meeple", "France");
insert into deye_editeur values (null, "Intrafin", "France");
insert into deye_editeur values (null, "Flying Games", "France");
insert into deye_editeur values (null, "Lifestyle", "Russie");
insert into deye_editeur values (null, "FoxGames" , "Allemagne");
insert into deye_editeur values (null, "Schmidt Spiele", "Allemagne");

#------------------------------------------------------------
# Table: deye_categorie
#------------------------------------------------------------

CREATE TABLE deye_categorie(
	idCategorie Int  Auto_increment  NOT NULL ,
	Libelle     Varchar (50) NOT NULL
,CONSTRAINT deye_categorie_PK PRIMARY KEY (idCategorie)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_categorie
#------------------------------------------------------------

insert into deye_categorie values (null, "Stratégie");
insert into deye_categorie values (null, "Coopération");
insert into deye_categorie values (null, "Jeux de Rôles");
insert into deye_categorie values (null, "Casse-Tête");
insert into deye_categorie values (null, "Conquête");
insert into deye_categorie values (null, "Course");
insert into deye_categorie values (null, "Educatif");
insert into deye_categorie values (null, "Humour");
insert into deye_categorie values (null, "Négociation");
insert into deye_categorie values (null, "Plateau");
insert into deye_categorie values (null, "Cartes");
insert into deye_categorie values (null, "Créativité");
insert into deye_categorie values (null, "Ambiance");
insert into deye_categorie values (null, "Dés");
insert into deye_categorie values (null, "Pose de tuiles");

#------------------------------------------------------------
# Table: deye_age
#------------------------------------------------------------

CREATE TABLE deye_age(
	idAge Int  Auto_increment  NOT NULL ,
	Age_requis     Varchar (50) NOT NULL
,CONSTRAINT deye_age_PK PRIMARY KEY (idAge)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_age
#------------------------------------------------------------

insert into deye_age values (null, "0-3 ans et +");
insert into deye_age values (null, "4-5 ans et +");
insert into deye_age values (null, "6-7 ans et +");
insert into deye_age values (null, "8-10 ans et +");
insert into deye_age values (null, "10 ans et +");
insert into deye_age values (null, "Toutes les tranches d'âge");

#------------------------------------------------------------
# Table: deye_status
#------------------------------------------------------------

CREATE TABLE deye_status(
	idStatus      char(1) NOT NULL PRIMARY KEY,
	Status_Type  Varchar (50) NOT NULL
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_status
#------------------------------------------------------------

insert into deye_status values ('N', 'Nouveau');
insert into deye_status values ('A', 'Admin');
insert into deye_status values ('U', 'Utilisateur');

#------------------------------------------------------------
# Table: deye_personne
#------------------------------------------------------------

CREATE TABLE deye_personne(
	idPersonne Int  Auto_increment  NOT NULL ,
	idType     char(1) NOT NULL REFERENCES deye_status(idStatus) ,
	Nom        Varchar (50) NOT NULL ,
	Prenom     Varchar (50) NOT NULL ,
	Email      Varchar (50) NOT NULL ,
	Mdp        Varchar (50) NOT NULL
,CONSTRAINT deye_status_PK PRIMARY KEY (idPersonne, idType)
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_personne
#------------------------------------------------------------

insert into deye_personne values (null, 'A', "lakun", "cindy", "test1@gmail.com", "0000");
insert into deye_personne values (null, 'A', "kvs", "eric", "test2@gmail.com", "0001");
insert into deye_personne values (null, 'A', "phitso", "pierre", "test3@gmail.com", "0002");
insert into deye_personne values (null, 'A', "test", "yacine", "test4@gmail.com", "0003");
insert into deye_personne values (null, 'N', "teteen", "cyril", "test5@gmail.com", "0004");
insert into deye_personne values (null, 'N', "abaach", "yahia", "test6@gmail.com", "0005");
insert into deye_personne values (null, 'N', "procha", "vincent", "test7@gmail.com", "0006");
insert into deye_personne values (null, 'N', "saga", "sinthujah", "test8@gmail.com", "0007");
insert into deye_personne values (null, 'N', "bereski", "alexandra", "test9@gmail.com", "0008");
insert into deye_personne values (null, 'N', "tran", "céline", "test10@gmail.com", "0009");

#------------------------------------------------------------
# Table: deye_personne_archive
#------------------------------------------------------------

CREATE TABLE deye_personne_archive(
	idPersonne_archive Int	Auto_increment NOT NULL ,
	idPersonne Int			NOT NULL ,
	idType   char(1)      NOT NULL ,
	Nom        Varchar (50) NOT NULL ,
	Prenom     Varchar (50) NOT NULL ,
	Email      Varchar (50) NOT NULL ,
	Mdp        Varchar (50) NOT NULL ,
	Date_histo	DATETIME	NOT NULL
,CONSTRAINT deye_personne_archive_PK PRIMARY KEY (idPersonne_archive)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: deye_utilisateur
#------------------------------------------------------------

CREATE TABLE deye_utilisateur(
	idPersonne      Int PRIMARY KEY ,
	User_type        char(1) NOT NULL ,
	Date_naissance  Date ,
	Telephone       Varchar (50)
	,CONSTRAINT deye_utilisateur_FK FOREIGN KEY (idPersonne) REFERENCES deye_personne(idPersonne) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_utilisateur
#------------------------------------------------------------

#------------------------------------------------------------
# Table: deye_validateur
#------------------------------------------------------------

CREATE TABLE deye_validateur(
	idPersonne   Int PRIMARY KEY ,
	User_type     char(1) NOT NULL ,    
	Date_droits  Date
,CONSTRAINT deye_validateur_FK FOREIGN KEY (idPersonne) REFERENCES deye_personne(idPersonne) ON DELETE CASCADE

)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_validateur
#------------------------------------------------------------

insert into deye_validateur values (1, 'A', NOW()),
(2, 'A', NOW()), (3, 'A', NOW()),
(4, 'A',  NOW());

#------------------------------------------------------------
# Table: deye_jeux
#------------------------------------------------------------

CREATE TABLE deye_jeux(
	idJeux                 Int  Auto_increment  NOT NULL ,
	Designation            Varchar (50) NOT NULL ,
	Date_sortie            Date NOT NULL ,
	Prix                   Float NOT NULL ,
	Temps_jeux             Time NOT NULL ,
	Nb_joueurs             Int NOT NULL ,
	idPersonne             Int ,
	idEditeur              Int NOT NULL ,
	idAge                  Int NOT NULL ,
	idCategorie            Int NOT NULL ,
	idPhoto                Int NOT NULL 
,CONSTRAINT deye_jeux_PK PRIMARY KEY (idJeux)

,CONSTRAINT deye_jeux_deye_id_FK FOREIGN KEY (idPersonne) REFERENCES deye_personne(idPersonne) ON DELETE CASCADE
,CONSTRAINT deye_jeux_deye_editeur0_FK FOREIGN KEY (idEditeur) REFERENCES deye_editeur(idEditeur) ON DELETE CASCADE
,CONSTRAINT deye_jeux_deye_age1_FK FOREIGN KEY (idAge) REFERENCES deye_age(idAge) ON DELETE CASCADE
,CONSTRAINT deye_jeux_deye_categorie2_FK FOREIGN KEY (idCategorie) REFERENCES deye_categorie(idCategorie) ON DELETE CASCADE
,CONSTRAINT deye_jeux_deye_photo3_FK FOREIGN KEY (idPhoto) REFERENCES deye_photo(idPhoto) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_jeux
#------------------------------------------------------------

insert into deye_jeux values (null, "Games of Thrones" ,"2011/12/21", "54.00", "2:00:00", "6", 1, 1, 5, 1, 2);
insert into deye_jeux values (null, "Jamaica" ,"2008/02/11", "35.00", "00:30:00", "6", 2, 2, 3, 10, 1);
insert into deye_jeux values (null, "Monopoly" ,"1935/02/06", "20.00", "12:00:00", "6", 3, 6, 3, 10, 3);
insert into deye_jeux values (null, "Munchkins" ,"2010/12/21", "36.00", "1:00:00", "6", 5, 5, 5, 5, 1);
insert into deye_jeux values (null, "La Bonne Paye" ,"1975/12/21", "20.00", "1:00:00", "6", 6, 6, 3, 6, 4);
insert into deye_jeux values (null, "Uno", "1971/01/01", "7.00", "00:20:00", "10", 7, 2, 6, 11, 1);
insert into deye_jeux values (null, "Labyrinthe", "1986/01/01", "20.00", "00:40:00", "4", 8, 2, 6, 15, 1);
insert into deye_jeux values (null, "Dixit", "2008/01/01", "26.90", "00:30:00", "6", 9, 2, 5, 11, 5);
insert into deye_jeux values (null, "Portrait Robot", "2008/01/01", "00.00", "00:03:00", "6", 9, 11, 5, 11, 11);
insert into deye_jeux values (null, "Un Dernier Donjon Pour la Route", "2008/01/01", "00.00", "00:30:00", "6", 1, 14, 4, 15, 13);
insert into deye_jeux values (null, "Comanautes", "2008/01/01", "00.00", "01:15:00", "4", 2, 2, 5, 2, 6);
insert into deye_jeux values (null, "Star Wars : Outer Rim", "2008/01/01", "00.00", "02:00:00", "4", 2, 13, 5, 1, 1);
insert into deye_jeux values (null, "Underwater Cities", "2008/01/01", "00.00", "02:00:00", "4", 2, 17, 5, 11, 14);
insert into deye_jeux values (null, "Victorian Masterminds", "2008/01/01", "00.00", "00:45:00", "4", 2, 18, 5, 1, 16);
insert into deye_jeux values (null, "Mississipi Queen", "2008/01/01", "00.00", "00:45:00", "6", 2, 19, 5, 6, 9);
insert into deye_jeux values (null, "Roll Player", "2008/01/01", "00.00", "01:30:00", "4", 2, 20, 5, 4, 12);
insert into deye_jeux values (null, "Fuji", "2008/01/01", "00.00", "00:45:00", "4", 2, 19, 5, 2, 7);
insert into deye_jeux values (null, "Iceteam", "2008/01/01", "00.00", "00:20:00", "2", 2, 21, 4, 6, 8);
insert into deye_jeux values (null, "Narabi", "2008/01/01", "00.00", "00:15:00", "5", 2, 22, 5, 2, 10);
insert into deye_jeux values (null, "Detective Club", "2008/01/01", "00.00", "00:45:00", "8", 2, 23, 4, 13, 1);
insert into deye_jeux values (null, "Qwirkle Cubes", "2008/01/01", "00.00", "00:30:00", "4", 2, 24, 3, 14, 1);

#------------------------------------------------------------
# Table : deye_jeux_archive
#------------------------------------------------------------

CREATE TABLE deye_jeux_archive(
	idJeux_archive          Int  Auto_increment  NOT NULL ,
	idJeux                  Int  NOT NULL ,
	Designation            Varchar (50) NOT NULL ,
	Date_sortie            Date NOT NULL ,
	Prix                   Float NOT NULL ,
	Temps_jeux             Time NOT NULL ,
	Nb_joueurs             Int NOT NULL ,
	idPersonne             Int NOT NULL ,
	idEditeur              Int NOT NULL ,
	idAge                  Int NOT NULL ,
	idCategorie            Int NOT NULL ,
	idPhoto                Int NOT NULL ,
	Date_histo				DATETIME NOT NULL
,CONSTRAINT deye_jeux_archive_PK PRIMARY KEY (idJeux_archive)

)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: deye_annonce_type
#------------------------------------------------------------

CREATE TABLE deye_annonce_type(
	idA_type      char(2) NOT NULL PRIMARY KEY,
	Annonce_type  Varchar (50) NOT NULL
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_annonce_type
#------------------------------------------------------------

insert into deye_annonce_type values ('NO', 'Nouvelle Offre');
insert into deye_annonce_type values ('ND', 'Nouvelle Demande');
insert into deye_annonce_type values ('O', 'Offre');
insert into deye_annonce_type values ('D', 'Demande');

#------------------------------------------------------------
# Table: deye_annonce
#------------------------------------------------------------

CREATE TABLE deye_annonce(
	idAnnonce        Int Auto_increment NOT NULL ,
	idJeux           Int   NOT NULL ,
	idPersonne       Int   NOT NULL ,
	idAge            Int   NOT NULL ,
	idPhoto          Int   NOT NULL ,
	idCategorie      Int   NOT NULL ,
	idForme          char(2) NOT NULL REFERENCES deye_annonce_type(idA_type) ,
	Region           Varchar(50) NOT NULL ,
	Ville            Varchar(50) NOT NULL ,
	Postal           Varchar(50) NOT NULL ,
	Etat             Varchar(50) NOT NULL ,
	Description      Text  NOT NULL ,
	Dépot			 DATE NOT NULL 
,CONSTRAINT deye_annonce_PK PRIMARY KEY (idAnnonce)

,CONSTRAINT deye_annonce_deye_jeux_FK FOREIGN KEY (idJeux) REFERENCES deye_jeux(idJeux) ON DELETE CASCADE
,CONSTRAINT deye_annonce_deye_personne0_FK FOREIGN KEY (idPersonne) REFERENCES deye_personne(idPersonne) ON DELETE CASCADE
,CONSTRAINT deye_annonce_deye_photo1_FK FOREIGN KEY (idPhoto) REFERENCES deye_photo(idPhoto) ON DELETE CASCADE
,CONSTRAINT deye_annonce_deye_age2_FK FOREIGN KEY (idAge) REFERENCES deye_age(idAge) ON DELETE CASCADE
,CONSTRAINT deye_annonce_deye_categorie3_FK FOREIGN KEY (idCategorie) REFERENCES deye_categorie(idCategorie) ON DELETE CASCADE	
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_annonce
#------------------------------------------------------------

insert into deye_annonce values (null, 1, 1, 1, 17, 3, "NO", "Ile-de-France", "Paris", "75013", "Bon", "Jeux en bon état, sympa a jouer", NOW());
insert into deye_annonce values (null, 2, 2, 2, 18, 4, "NO", "Ile-de-France", "Paris", "75011", "Abimé", "test", NOW());
insert into deye_annonce values (null, 3, 3, 3, 19, 6, "NO", "Ile-de-France", "Paris", "75003", "Excellent", "test", NOW());
insert into deye_annonce values (null, 4, 4, 4, 20, 9, "NO", "Ile-de-France", "Paris", "75000", "Usé", "test", NOW());
insert into deye_annonce values (null, 5, 1, 1, 21, 3, "NO", "Ile-de-France", "Paris", "75013", "Bon", "Jeux en bon état, sympa a jouer", NOW());
insert into deye_annonce values (null, 6, 2, 2, 22, 4, "NO", "Ile-de-France", "Paris", "75011", "Abimé", "test", NOW());
insert into deye_annonce values (null, 7, 3, 3, 23, 6, "NO", "Ile-de-France", "Paris", "75003", "Excellent", "test", NOW());
insert into deye_annonce values (null, 8, 4, 4, 24, 9, "NO", "Ile-de-France", "Paris", "75000", "Usé", "test", NOW());
insert into deye_annonce values (null, 9, 1, 1, 25, 3, "NO", "Ile-de-France", "Paris", "75013", "Bon", "Jeux en bon état, sympa a jouer", NOW());
insert into deye_annonce values (null, 10, 2, 2, 26, 4, "NO", "Ile-de-France", "Paris", "75011", "Abimé", "test", NOW());
insert into deye_annonce values (null, 11, 3, 3, 6, 6, "NO", "Ile-de-France", "Paris", "75003", "Excellent", "test", NOW());
insert into deye_annonce values (null, 12, 4, 4, 4, 9, "NO", "Ile-de-France", "Paris", "75000", "Usé", "test", NOW());
insert into deye_annonce values (null, 13, 1, 1, 1, 3, "NO", "Ile-de-France", "Paris", "75013", "Bon", "Jeux en bon état, sympa a jouer", NOW());
insert into deye_annonce values (null, 14, 2, 2, 2, 4, "NO", "Ile-de-France", "Paris", "75011", "Abimé", "test", NOW());
insert into deye_annonce values (null, 15, 3, 3, 6, 6, "NO", "Ile-de-France", "Paris", "75003", "Excellent", "test", NOW());
insert into deye_annonce values (null, 16, 4, 4, 4, 9, "NO", "Ile-de-France", "Paris", "75000", "Usé", "test", NOW());
insert into deye_annonce values (null, 1, 1, 1, 1, 3, "ND", "Ile-de-France", "Paris", "75013", "Bon", "Jeux en bon état, sympa a jouer", NOW());
insert into deye_annonce values (null, 2, 2, 2, 2, 4, "ND", "Ile-de-France", "Paris", "75011", "Abimé", "test", NOW());
insert into deye_annonce values (null, 3, 3, 3, 6, 6, "ND", "Ile-de-France", "Paris", "75003", "Excellent", "test", NOW());
insert into deye_annonce values (null, 4, 4, 4, 4, 9, "ND", "Ile-de-France", "Paris", "75000", "Usé", "test", NOW());
insert into deye_annonce values (null, 5, 1, 1, 1, 3, "ND", "Ile-de-France", "Paris", "75013", "Bon", "Jeux en bon état, sympa a jouer", NOW());
insert into deye_annonce values (null, 6, 2, 2, 2, 4, "ND", "Ile-de-France", "Paris", "75011", "Abimé", "test", NOW());
insert into deye_annonce values (null, 7, 3, 3, 6, 6, "ND", "Ile-de-France", "Paris", "75003", "Excellent", "test", NOW());
insert into deye_annonce values (null, 8, 4, 4, 4, 9, "ND", "Ile-de-France", "Paris", "75000", "Usé", "test", NOW());
insert into deye_annonce values (null, 9, 1, 1, 1, 3, "ND", "Ile-de-France", "Paris", "75013", "Bon", "Jeux en bon état, sympa a jouer", NOW());
insert into deye_annonce values (null, 10, 2, 2, 2, 4, "ND", "Ile-de-France", "Paris", "75011", "Abimé", "test", NOW());
insert into deye_annonce values (null, 11, 3, 3, 6, 6, "ND", "Ile-de-France", "Paris", "75003", "Excellent", "test", NOW());
insert into deye_annonce values (null, 12, 4, 4, 4, 9, "ND", "Ile-de-France", "Paris", "75000", "Usé", "test", NOW());
insert into deye_annonce values (null, 13, 1, 1, 1, 3, "ND", "Ile-de-France", "Paris", "75013", "Bon", "Jeux en bon état, sympa a jouer", NOW());
insert into deye_annonce values (null, 14, 2, 2, 2, 4, "ND", "Ile-de-France", "Paris", "75011", "Abimé", "test", NOW());
insert into deye_annonce values (null, 15, 3, 3, 6, 6, "ND", "Ile-de-France", "Paris", "75003", "Excellent", "test", NOW());
insert into deye_annonce values (null, 16, 4, 4, 4, 9, "ND", "Ile-de-France", "Paris", "75000", "Usé", "test", NOW());

#------------------------------------------------------------
# Table: deye_offre
#------------------------------------------------------------

CREATE TABLE deye_offre(
	idAnnonce       Int PRIMARY KEY ,
	Annonce_categorie   VARCHAR(50) NOT NULL

,CONSTRAINT deye_offre_PK FOREIGN KEY (idAnnonce) REFERENCES deye_annonce(idAnnonce) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: deye_demande
#------------------------------------------------------------

CREATE TABLE deye_demande(
	idAnnonce       Int PRIMARY KEY ,
	Annonce_categorie     VARCHAR(50) NOT NULL

,CONSTRAINT deye_demande_PK FOREIGN KEY (idAnnonce)	REFERENCES deye_annonce(idAnnonce) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# Table: deye_commentaire
#------------------------------------------------------------

CREATE TABLE deye_commentaire(
	idComment       Int  Auto_increment  NOT NULL ,
	Texte           Text NOT NULL ,
	Date_publication Date NOT NULL ,
	Note            Int NOT NULL ,
	idJeux          Int NOT NULL ,
	idPersonne      Int 
,CONSTRAINT deye_commentaire_PK PRIMARY KEY (idComment)

,CONSTRAINT deye_commentaire_deye_jeux_FK FOREIGN KEY (idJeux) REFERENCES deye_jeux(idJeux) ON DELETE CASCADE
,CONSTRAINT deye_commentaire_deye_personne0_FK FOREIGN KEY (idPersonne) REFERENCES deye_personne(idPersonne) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_commentaire
#------------------------------------------------------------

insert into deye_commentaire values (null, "très nul", "2018/12/10", "0", 1, 1);
insert into deye_commentaire values (null, "nul", "2018/06/27", "0.5", 2, 3);
insert into deye_commentaire values (null, "pas incroyable", "2018/01/05", "1", 3, 2);
insert into deye_commentaire values (null, "pas très bien", "2018/01/15", "1.5", 4, 4);
insert into deye_commentaire values (null, "bof", "2018/10/23", "2", 5, 9);
insert into deye_commentaire values (null, "normal", "2018/07/31", "2.5", 6, 8);
insert into deye_commentaire values (null, "moyen", "2018/04/01", "3", 4, 6);
insert into deye_commentaire values (null, "Pas mal", "2018/03/17", "3.5", 5 , 5);
insert into deye_commentaire values (null, "Super", "2018/12/11", "4", 6, 7);
insert into deye_commentaire values (null, "Excellent Jeux", "2018/01/20", "4.5", 1, 10);
insert into deye_commentaire values (null, "Parfait", "2018/05/30", "5", 2, 4);

#------------------------------------------------------------
# Table: deye_rendezvous
#------------------------------------------------------------

CREATE TABLE deye_rendezvous(
	idrendezvous     Int  Auto_increment  NOT NULL ,
	Date_rendezvous  Date NOT NULL ,
	Heure_rendezvous Time NOT NULL ,
	idJeux           Int NOT NULL ,
	idPersonne       Int 
,CONSTRAINT deye_rendezvous_PK PRIMARY KEY (idrendezvous)
 
,CONSTRAINT deye_rendezvous_deye_jeux_FK FOREIGN KEY (idJeux) REFERENCES deye_jeux(idJeux) ON DELETE CASCADE
,CONSTRAINT deye_rendezvous_deye_Utilisateur0_FK FOREIGN KEY (idPersonne) REFERENCES deye_utilisateur(idPersonne) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_rendezvous
#------------------------------------------------------------

insert into deye_rendezvous values (null, "2018/12/07", "12:00:00", 1, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "12:30:00", 2, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "13:00:00", 3, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "13:30:00", 4, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "14:00:00", 5, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "14:30:00", 6, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "15:00:00", 3, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "15:30:00", 5, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "16:00:00", 1, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "16:30:00", 3, idPersonne);
insert into deye_rendezvous values (null, "2018/12/07", "17:00:00", 4, idPersonne);

#------------------------------------------------------------
# Table: deye_rendezvous_archive
#------------------------------------------------------------

CREATE TABLE deye_rendezvous_archive(
	idRendezvous_archive Int Auto_increment NOT NULL ,
	idRendezvous     Int  NOT NULL ,
	Date_rendezvous  Date NOT NULL ,
	Heure_rendezvous Time NOT NULL ,
	idJeux           Int NOT NULL ,
	idPersonne       Int NOT NULL 
,CONSTRAINT deye_rendezvous_archive_PK PRIMARY KEY (idRendezvous_archive)

)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: deye_organiser
#------------------------------------------------------------

CREATE TABLE deye_organiser(
	idJeux   Int NOT NULL ,
	idEvent Int NOT NULL
,CONSTRAINT deye_organiser_PK PRIMARY KEY (idJeux,idEvent)

,CONSTRAINT deye_organiser_deye_jeux_FK FOREIGN KEY (idJeux) REFERENCES deye_jeux(idJeux) ON DELETE CASCADE
,CONSTRAINT deye_organiser_deye_evenement0_FK FOREIGN KEY (idEvent) REFERENCES deye_evenement(idEvent) ON DELETE CASCADE
)ENGINE=InnoDB;

#------------------------------------------------------------
# INSERT: deye_organiser
#------------------------------------------------------------

#------------------------------------------------------------
# Trigger: deye_personne_archivage_update
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Personne_Archivage_After_Update AFTER UPDATE
ON deye_personne
FOR each row
BEGIN
	insert into deye_personne_archive values
	(null, OLD.idPersonne, OLD.idType, OLD.Nom, OLD.Prenom, OLD.Email, OLD.Mdp, NOW());
END $
DELIMITER ;


#------------------------------------------------------------
# Trigger: deye_personne_archivage_delete
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Personne_Archivage_Before_Delete BEFORE DELETE
ON deye_personne
FOR each row
BEGIN
	insert into deye_personne_archive values
	(null, OLD.idPersonne, OLD.idType ,OLD.Nom, OLD.Prenom, OLD.Email, OLD.Mdp, NOW());
END $
DELIMITER ;



#------------------------------------------------------------
# Trigger: deye_jeux_archivage_update
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_deye_jeux_Archivage_After_Update AFTER UPDATE
ON deye_jeux
FOR each row
BEGIN
	insert into deye_jeux_archive values
	(null, OLD.idJeux, OLD.Designation, OLD.Date_sortie, OLD.Prix, OLD.Temps_jeux, OLD.Nb_joueurs,
	 OLD.idPersonne, OLD.idEditeur, OLD.idAge, OLD.idCategorie, OLD.idPhoto, NOW());
END $
DELIMITER ;


#------------------------------------------------------------
# Trigger: deye_Jeux_archivage_delete
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_deye_jeux_Archivage_Before_Delete BEFORE DELETE
ON deye_jeux
FOR each row
BEGIN
	insert into deye_jeux_archive values
	(null, OLD.idJeux, OLD.Designation, OLD.Date_sortie, OLD.Prix, OLD.Temps_jeux, OLD.Nb_joueurs,
	 OLD.idPersonne, OLD.idEditeur, OLD.idAge, OLD.idCategorie, OLD.idPhoto, NOW());
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger: deye_evenement_archivage_update
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Evenement_Archivage_After_Update AFTER UPDATE
ON deye_evenement
FOR each row
BEGIN
	insert into deye_evenement_archive values
	(null, OLD.idEvent, OLD.Designation, OLD.Date_event, OLD.heure_event, OLD.idPhoto, OLD.idLieu, NOW());
END $
DELIMITER ;


#------------------------------------------------------------
# Trigger: deye_evenement_archivage_delete
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Evenement_Archivage_Before_Delete BEFORE DELETE
ON deye_evenement
FOR each row
BEGIN
	insert into deye_evenement_archive values
	(null, OLD.idEvent, OLD.Designation, OLD.Date_event, OLD.heure_event, OLD.idPhoto, OLD.idLieu, NOW());
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger: deye_rendezvous_archivage_update
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Rendezvous_Archivage_After_Update AFTER UPDATE
ON deye_rendezvous
FOR each row
BEGIN
	insert into deye_rendezvous_archive values
	(null, OLD.idRendezvous, OLD.Date_rendezvous, OLD.heure_rendezvous, OLD.idJeux, OLD.idPersonne, NOW());
END $
DELIMITER ;


#------------------------------------------------------------
# Trigger: deye_rendezvous_archivage_delete
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_Rendezvous_Archivage_Before_Delete BEFORE DELETE
ON deye_rendezvous
FOR each row
BEGIN
	insert into deye_rendezvous_archive values
	(null, OLD.idRendezvous, OLD.Date_rendezvous, OLD.heure_rendezvous, OLD.idJeux, OLD.idPersonne, NOW());
END $
DELIMITER ;

#------------------------------------------------------------
# Trigger: deye_changement_status
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_deye_STATUS_Before_Update BEFORE UPDATE
	ON deye_personne
	FOR each row
	BEGIN
		IF (NEW.idType = 'U' AND OLD.idType="N") THEN
			insert into deye_utilisateur values(Old.idPersonne, NEW.idType, null, null);
			
		ELSE IF (NEW.idType = 'A' AND OLD.idType="U") THEN
			delete from deye_utilisateur WHERE idPersonne = old.idPersonne;
			insert into deye_valiDateur values(Old.idPersonne, NEW.idType, NOW());
			
			ELSE IF (NEW.idType = 'A' AND OLD.idType="N") THEN
					insert into deye_valiDateur values(Old.idPersonne, NEW.idType, NOW());
					
					
					ELSE IF (NEW.idType = 'U' AND OLD.idType="A") THEN
						delete from deye_validateur WHERE idPersonne = old.idPersonne;
						insert into deye_utilisateur values(Old.idPersonne, NEW.idType, null, null);
					END IF; 
				END IF; 
			END IF; 
		END IF ;
	END $
DELIMITER ;

#------------------------------------------------------------
# Trigger: deye_changement_type_annonce
#------------------------------------------------------------

DELIMITER $
CREATE TRIGGER TRG_deye_annonce_Before_Update BEFORE UPDATE
	ON deye_annonce
	FOR each row
	BEGIN
		IF (NEW.idforme = 'O' AND OLD.idforme="NO") THEN
			insert into deye_offre values(Old.idAnnonce, NEW.idforme);
			
		ELSE IF(NEW.idforme = 'D' AND OLD.idforme="ND") THEN
			insert into deye_demande values(Old.idAnnonce, NEW.idforme);
			END IF ;
		END IF ;
	END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Compter Jeux Total
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE deye_Count_Game()
BEGIN
SELECT COUNT(*)
FROM deye_jeux;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Afficher Jeux par Categorie
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE deye_Afficher_Jeux_Categorie (IN p_idCategorie INT)
BEGIN
SELECT * FROM deye_jeux
WHERE idCategorie = p_idCategorie;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Afficher Jeux par Categorie et par Limite Prix
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE deye_Afficher_Jeux_Categorie_Limite_Prix (IN p_idCategorie INT, IN p_prix INT)
BEGIN
SELECT * FROM deye_jeux
WHERE idCategorie = p_idCategorie
AND Prix <= p_prix;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Compter Categorie
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE deye_Count_Categorie ()
BEGIN
SELECT COUNT(*)
FROM deye_categorie;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Compter Jeux par Categorie
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE deye_Count_Game_Per_Categorie (p_idCategorie INT)
BEGIN
SELECT COUNT(*)
FROM deye_jeux
WHERE idCategorie = p_idCategorie;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Compter Evenement
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE deye_Count_Evenement ()
BEGIN
SELECT COUNT(*)
FROM deye_evenement;
END $
DELIMITER ;


#------------------------------------------------------------
# Procedure: Compter Evenement par Lieu
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE deye_Count_Event_Per_Lieu (IN p_idLieu INT)
BEGIN
SELECT COUNT(*)
FROM deye_Event
WHERE idLieu = p_idLieu;
END $
DELIMITER ;

#------------------------------------------------------------
# Procedure: Afficher Evenement par Lieu
#------------------------------------------------------------

DELIMITER $
CREATE PROCEDURE deye_Afficher_Event_Per_Lieu (IN p_idLieu INT)
BEGIN
SELECT *
FROM deye_Event
WHERE idLieu = p_idLieu;
END $
DELIMITER ;