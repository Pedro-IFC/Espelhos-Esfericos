create database fisica;
use fisica;
create table usuario(
	id int auto_increment,
    nome varchar(80),
    senha varchar(30),
	PRIMARY KEY(id)
);
create table aumentoh(
	id int auto_increment,
    idUsuario int,
    ho float,
    hi float,
	dataHora datetime default now(),
	PRIMARY KEY(id),
    foreign key(idUsuario) references usuario(id)
); 
create table aumentod(
	id int auto_increment,
    idUsuario int,
    `do` float,
    `di` float,
    dataHora datetime default now(),
	PRIMARY KEY(id),
    foreign key(idUsuario) references usuario(id)
);
create table gauss(
	id int auto_increment,
    idUsuario int,
    `do` float,
    `di` float,
    F float,
    dataHora datetime default now(),
	PRIMARY KEY(id),
    foreign key(idUsuario) references usuario(id)
);