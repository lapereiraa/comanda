drop database banco_comanda; 
create database banco_comanda;
use banco_comanda;

create table cliente(
	idCliente int primary key auto_increment,
	nome varchar (40) not null,
    	data_nascimento date,
    	rg int,
    	telefone int
);


create table categoria(
	idcategoria int primary key auto_increment,
	nome_categoria varchar(40) not null
);


create table produto(
    idproduto int primary key auto_increment,
	descricao varchar (40) not null,
	marca varchar (40) not null,
	preco float not null,
	idcategoria int,
	foreign key(idcategoria) references categoria(idcategoria)
);


create table comanda(
    idcomanda int primary key auto_increment,
	valor int,
	idItem int,
	idCliente int,
	foreign key(iditem) references item_venda(iditem),
	foreign key(idcliente) references cliente(idcliente)
);


create table item_venda(
    iditem int primary key auto_increment,
	quantidade int,
	idproduto int,
	preco float,
	foreign key(idproduto) references produto(idproduto)
);

