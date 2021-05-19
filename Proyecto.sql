create table usuario(
Nit int primary key not null,
Nombre varchar(45),
Contra varchar(45)
);

drop table usuario;

insert into usuario values (4245487,'mariangela', '123456');
commit;

create table cuenta(
Id int primary key not null,
Nombre varchar(45),
Saldo float not null
);


create table Cliente (
Id int primary key not null,
id_cuenta int not null,
Nombre varchar(45),
Cuenta varchar(45),
Dpi varchar(45),
Telefono int not null,
Email varchar (45)
);
insert into Cliente values(852465, 569847, 'Danilo Castillo', 'ahorro', 5469854, 748521454, 'dancas5.com');
commit;
/*cada que se ingrese un nuevo cliente se hara una cuenta de forma automatica*/
create or replace trigger t1
after insert on Cliente
for each row
begin
insert into cuenta values(:new.id_cuenta,:new.Nombre,0);
end;

create table Transferencia(
Id int primary key not null,
Cuenta_salida int not null,
Cuenta_entrada int not null,
Cantidad float not null
);
create or replace trigger trans
after insert on Transferencia
for each row
begin
update cuenta set Saldo = Saldo - :new.Cantidad where Id = :new.Cuenta_salida;
update cuenta set Saldo = Saldo + :new.Cantidad where Id = :new.Cuenta_entrada;
end;
create table depositos_retiro(
id int primary key not null,
cuenta int not null,
monto float not null,
tipo varchar(35)
);
create or replace trigger dep
after insert on depositos_retiro
for each row
begin 
if :new.tipo = 'deposito' then
update cuenta set Saldo = Saldo + :new.monto where Id = :new.cuenta;
else
update cuenta set Saldo = Saldo - :new.monto where Id = :new.cuenta;
end if;
end;

select *from usuario;
commit;
select user
from dual;


create or replace trigger upclh
after update on Cliente
for each row 
begin 
update cuenta set Nombre = :new.Nombre where Id = :old.id_cuenta; 
end;

create or replace trigger dele
before delete on Cliente
for each row
begin 
delete from cuenta where Id = :old.id_cuenta;
end;

delete from cuenta where Id=569847;
commit;