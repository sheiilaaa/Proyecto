CREATE DATABASE coaching;

use coaching;

create table clientes(
	ID_Cliente int auto_increment primary key,
    DNI_Cliente varchar(100),
    Tel_Cliente varchar(100),
    Correo_Cliente varchar(100), 
    Nombre_Cliente varchar(60),
    Apellido_Cliente varchar(60),
    NombreVia_Cliente varchar(100),
    Nv_Cliente varchar(10),
    TipoVia_Cliente varchar(100),
    FechaNacimiento_Cliente date
);


insert into clientes(DNI_Cliente, Tel_Cliente)
values (md5('23867227n'), '634973323');

describe clientes;
select * from clientes;

drop table clientes;