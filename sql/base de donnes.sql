create database ecommerce;

use ecommerce;

create table produits_ordinateur (
id_ordinateur int primary key auto_increment,
nom_ordinateur varchar(225) not null,
img_ordinateur varchar(1000) not null,
marque_ordinateur varchar(225) ,
type_ordinateur varchar(50),
prix_ordinateur int not null ,
dscription_ordinateur varchar(1000) not null
);

create table blog (
id_blog int primary key auto_increment,
nom_blog varchar(225) not null,
tag_blog varchar(225) not null ,
img_blog varchar(1000) not null ,
dateNew_blog date ,
description_blog varchar(1000)
);

create table fornisseur(
id_fornisseur int primary key auto_increment ,
nom_fornisseur varchar(225),
img_fornisseur varchar(1000),
description_fornisseur varchar(1000)
);

create table nos_Couffre (
id_nos_Couffre int primary key auto_increment,
nom_nos_Couffre varchar(225),
img_nos_Couffre varchar(1000),
prix_nos_Couffre decimal(2),
description_nos_Couffre varchar(1000)
);

create table produit_panier(
id_produit_panier int primary key,
nom_produit_panier varchar(225),
img_produit_panier varchar(1000),
prix_produit_panier int,
dscription_produit_panier varchar(1000)
);

create table admin (
a_id	int(11)	 primary key auto_increment,
a_name	varchar(255)		,
a_pass	varchar(255)	
);

create table clien(
id int(11)	primary key auto_increment ,		
firstName	varchar(45)	,		
lastName	varchar(45)	,		
email	varchar(100)	,		
passworde	varchar(45)
);

create Table comande(
id_comande int(11) primary key auto_increment ,
nom_clien varchar(225) ,
id_clien int(11) ,
comande varchar(500) ,
prix_total int(11) ,
adresse_client varchar(500) ,
payer varchar(50)
);

create table commentes(
id_client int ,
foreign key(id_client) references clien(id) ,
id_ordinateur int ,
foreign key(id_ordinateur) references produits_ordinateur(id_ordinateur) ,
commente varchar(1000),
date_pub date
);

