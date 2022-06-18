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
select * from produits_ordinateur