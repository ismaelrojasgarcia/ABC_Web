Drop table CatalogoEmpleados;


CREATE TABLE CatalogoEmpleados(
				NumEmpleado int not null,
				Nombre varchar(25) not null,
				ApellidoPaterno varchar(25) not null,
				ApellidoMaterno varchar(25) not null,
				Direccion varchar(25) not null,
				Centro int not null,
				CURP varchar(18) not null,
				primary key (NumEmpleado)
				);


INSERT INTO CatalogoEmpleados VALUES(98561006,'Ismael','Rojas','García','Av. del nogal',230149,'ROGI950914HSLJRS00');
INSERT INTO CatalogoEmpleados VALUES(98561007,'Alejandro','Rojas','García','Av. del nogal',230149,'ROGI950914HSLJRS00');
INSERT INTO CatalogoEmpleados VALUES(98561008,'Paladín','Rojas','García','Av. del nogal',230149,'ROGI950914HSLJRS00');
INSERT INTO CatalogoEmpleados VALUES(98561009,'Hades','Rojas','García','Av. del nogal',230149,'ROGI950914HSLJRS00');
INSERT INTO CatalogoEmpleados VALUES(98561000,'GodMaster','Rojas','García','Av. del nogal',230149,'ROGI950914HSLJRS00');


select * from CatalogoEmpleados