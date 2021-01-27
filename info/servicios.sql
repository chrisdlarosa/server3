CREATE TABLE usuarios(
	id int auto_increment,
	folio varchar(11) not null unique,
	nombre varchar(33) not null,
	apellidos varchar(55) not null,
	correo varchar(44) not null unique,
	telefono varchar(11) not null unique,
	password varchar(555) not null,
	tipo int(2) not null,
	registrado date,
	primary key (id)
);

INSERT INTO usuarios VALUES (1998,'031198', 'CHRIS', 'DELAROCU', 'admin@server.com', '0000000000' 'administrador03', 1, '2021-01-01');

CREATE TABLE clientes (
	id int auto_increment,
	folio varchar(11) not null unique,
	nombre varchar(111) not null,
	razonsocial varchar(155) unique,
	rfc varchar(22) unique,
	registrado date,
	primary key(id)
);

CREATE TABLE contactos (
	id int auto_increment,
	nombre varchar(33) not null,
	apellidos varchar(55),
	telefono varchar(11) unique,
	correo varchar(44) unique,
	registrado date,
	cliente int not null,
	foreign key(cliente) references clientes(id),
	primary key(id)
);

CREATE TABLE direcciones(
	reg int auto_increment,
	calle varchar(44) not null,
	numero varchar(8) not null,
	colonia varchar(44) not null,
	cliente int not null,
	foreign key(cliente) references clientes(id),
	primary key(reg)
); 

CREATE TABLE servicios(
	cve int auto_increment,
	nombre varchar(22) not null unique,
	descripcion varchar(44),
	primary key (cve)
);

CREATE TABLE tareas(
	folio int auto_increment,
	cliente int not null,
	usuario int not null,
	asignado int not null,
	servicio int not null,
	nota varchar(255) not null,
	estado int(2) not null,
	registrado date not null,
	fecha date,
	foreign key(cliente) references clientes(id),
	foreign key(usuario) references usuarios(id),
	foreign key(servicio) references servicios(cve),
	foreign key(asignado) references usuarios(id),
	primary key (folio)
);

CREATE TABLE respuestas(
	reg int auto_increment,
	usuario int not null,
	tarea int not null,
	respuesta varchar(255) not null,
	registrado date,
	foreign key(usuario) references usuarios(id),
	foreign key(tarea) references tareas(folio),
	primary key(reg)
);