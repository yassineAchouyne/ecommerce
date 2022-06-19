create table blog (
id_blog int primary key auto_increment,
nom_blog varchar(225) not null,
tag_blog varchar(225) not null ,
img_blog varchar(1000) not null ,
dateNew_blog date ,
description_blog varchar(1000)
);
select * from blog;
