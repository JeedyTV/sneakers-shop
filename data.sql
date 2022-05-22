CREATE TABLE Client(
        idClient  Int  Auto_increment  NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        prenom    Varchar (50) NOT NULL ,
        telephone Varchar (50) NOT NULL ,
        email     Varchar (50) NOT NULL,
        username Varchar(50) NOT NULL,
        mdp Varchar(50) NOT NULL,
        CONSTRAINT Client_PK PRIMARY KEY (idClient)
)ENGINE=InnoDB;

CREATE TABLE Produit(
        idProduit Int  Auto_increment  NOT NULL ,
        model       Varchar (50) NOT NULL ,
        prix      Float NOT NULL ,
        marque    Varchar (50) NOT NULL ,
        quantite  Int NOT NULL,
        pointure  Float NOT NULL ,
        couleur   Varchar (50) NOT NULL,
	CONSTRAINT produit_PK PRIMARY KEY (idProduit)
)ENGINE=InnoDB;

CREATE TABLE Panier(
        idPanier      Int  Auto_increment  NOT NULL ,
        date_commande Date NOT NULL ,
        prix          Float NOT NULL ,
        idClient      Int NOT NULL,
        etat          BOOLEAN NOT NULL,
        CONSTRAINT pannier_PK PRIMARY KEY (idPanier),
        CONSTRAINT pannier_Client_FK FOREIGN KEY (idClient) REFERENCES Client(idClient)
)ENGINE=InnoDB;

CREATE TABLE Item(
        idItem    Int  Auto_increment  NOT NULL ,
        idPanier  Int NOT NULL ,
        idProduit Int NOT NULL ,
        quantite  Int NOT NULL,
	CONSTRAINT ITEM_PK PRIMARY KEY (idItem),
        CONSTRAINT ITEM_pannier_FK FOREIGN KEY (idPanier) REFERENCES Panier(idPanier),
	CONSTRAINT ITEM_produit_FK FOREIGN KEY (idProduit) REFERENCES Produit(idProduit)

)ENGINE=InnoDB;


INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('Orly','Nzisabira',0493105430,'orly@hotmail.com','admin','admin');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('Stephan',' bulut',0493105431,'stephan@hotmail.com','stephan',' steph1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('jean david','mukolonga',0493105432,'jd@hotmail.com','jd','jdmuko');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('kevin','gusenga',0493105433,'kevin@hotmail.com','kevin','kevin1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('kalvin','ndjoli',0493105434,'kalvin@hotmail.com','kalvin','kalvin1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('philippe','kaninda',0493105435,'pippo@hotmail.com','philippe','philippe1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('maxime','leone',0493105436,'max@hotmail.com','maxime','maxime1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('lea ','rompen',0493105437,'lea@hotmail.com','lea','lea1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('madio','fatalini',0493105438,'madio@hotmail.com','madio','madio1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('louise','jammaer',0493105439,'lou@hotmail.com','louise','louise1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('sarah','sferrazza',0493105440,'sarah@hotmail.com','sarah','sarah1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('guillaume','beulen',0493105441,'gui@hotmail.com','guillaume','guillaume1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('julien','maquet',0493105442,'ju@hotmail.com','julien','julien1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('jean denis','phuta',0493105443,'jd1@hotmail.com','jean denis','jd1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('kenny','durant',0493105444,'ken@hotmail.com','kenny','kenny1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('james','potier',0493105445,'james@hotmail.com','james','james1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('thomas','goeme',0493105446,'tom@hotmail.com','thomas','thomas1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('clement ','matisse',0493105447,'clem@hotmail.com','clement','clement1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('thibault','marien',0493105448,'thib@hotmail.com','thibault','thibault1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('matteo','van goethem',0493105449,'matteo@hotmail.com','matteo','matteo1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('loic','meunier',0493105450,'loic@hotmail.com','loic','loic1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES (' louis','titeca',0493105451,'louis@hotmail.com','louis','louis1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('william','robeyns',0493105452,'will@hotmai.com','william','william1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('helene','tombeur',0493105453,'helene@hotmail.com','helene','helene1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('tania ','richard',0493105454,'tania@hotmail.com','tania','tania1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('eric','dupont',0493105455,'eric@hotmail.com','eric','eric1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('raphael','allemand',0493105456,'raph@hotmail.com','raphael',' raphael1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('lola','wolfs',0493105457,'lola@hotmail.com','lola','lola1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('stephanie','nimbonera',0493105458,'steph@hotmain.com','stephanie','stephanie1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('jonathan','uhoda',0493105459,'jon@hotmail.com','jonathan','jonathan1');
INSERT INTO client (Nom,Prenom,Telephone,email,username,Mdp) VALUES ('chris','brown',0493105459,'cb@hotmail.com','cb','cb2');

INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Jordan 11 Retro Low Bright Citrus',185,'Nike',2,42,'orange');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Air Max 96 Supreme',175,'Nike',2,40,'noir');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Supreme x Air Max 96',190,'Nike',1,33,'Metallic Silver');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('LeBron 8 V2 Low Miami Nights (2021)',180,'Nike',4,39,'multicolor');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('RS-X3 Twill Air Mesh',110,'Nike',3,42,'White');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Type 0-6 OAMC Black',250,'adidas',1,30,'noir');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Type 0-6 OAMC Grey',250,'adidas',4,39,'gris');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Air Force 1 LV8 GS',90,'Nike',2,35,'indigo');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Air Force 1 LV8 PS',70,'Nike',4,39,'Pomegranate');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Dunk SB Low',125,'nike',2,32,'rouge');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('jordan 7',190,'nike',4,32,'blanc');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('kamikaze 2',120,'reebok',4,37,'noir');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('yeezy 500',200,'adidas',3,30,'orange');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Kyrie 7',130,'nike',3,41,'gris');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('MTA X 992',400,' new balance',1,41,'gris');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('jordan 11 low', 135,' nike',3,40,'blanc');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('dunk low free 99', 160,' nike',1,41,' jaune');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('terrex swift', 130,' adidas',3,33,' noir');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('TMC x Suede', 80,' puma',4,43,' brun');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Palace x Classic Clog', 200,' Crocs',2,43,'bleu');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('Gel lyte 3', 110,' asics',3,44,' brun');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('question low', 120,' reebok',4,37,' vert');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('free metcon 4', 120,' nike',2,34,' bleu');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('court vapor', 80,' nike',3,37,' blanc');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('fresh foam', 130,' new balance',3,34,' vert');
INSERT INTO Produit (model,prix,marque,quantite,pointure,couleur) VALUES ('ultra 1.2', 200,' puma',1,44,' noir');

INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-1-14',265,23,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-6-9',190,1,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-5-28',600,17,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-3-29',380,4,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-11-24',335,20,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-5-16',270,21,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-11-8',310,22,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-10-14',245,25,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-1-7',330,25,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-5-3',230,17,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-7-16',320,1,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-4-29',305,27,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-2-10',250,28,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-10-7',320,4,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-9-15',190,5,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-1-24',280,27,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-9-3',380,16,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-6-27',350,18,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-2-28',310,27,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-9-23',300,21,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-3-2',390,13,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-8-1',255,1,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-3-10',380,18,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-1-17',325,10,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-4-18',330,6,0);
INSERT INTO Panier (date_commande,prix,idClient,etat) VALUES ('2021-3-14',320,24,0);

INSERT INTO Item (idPanier,idProduit,quantite) VALUES (1,1,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (1,19,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (2,5,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (2,19,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (3,13,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (3,15,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (4,7,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (4,25,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (5,13,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (5,16,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (6,3,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (6,24,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (7,4,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (7,18,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (8,10,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (8,22,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (9,7,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (9,24,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (10,12,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (10,21,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (11,3,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (11,25,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (12,1,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (12,22,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (13,8,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (13,17,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (14,1,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (14,16,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (15,5,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (15,24,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (16,12,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (16,17,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (17,6,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (17,18,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (18,3,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (18,17,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (19,3,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (19,23,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (20,3,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (20,21,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (21,11,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (21,20,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (22,2,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (22,24,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (23,4,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (23,20,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (24,10,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (24,20,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (25,7,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (25,19,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (26,1,1);
INSERT INTO Item (idPanier,idProduit,quantite) VALUES (26,16,1);
