create database pizza;

use pizza;

create table customer(
id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
customername varchar(10) not null,
phonenumber varchar(10) not null,
nic varchar(20) not null,
deliverydate varchar(15) not null,
pizzatype varchar(15)not null,
pizzasize varchar(15) not null,
quantity int not null,
price double not null,
deliverystatus varchar(20) not null,
primary key(id)
);
 
 
 create table userdata(
 username varchar(10) not null,
 password varchar(10)not null
 );
 
 insert into userdata values
 ('admin','abc'),
 ('pizza','1234');
 

create table pricelist(
pizzatype varchar(20) not null,
Small double not null,
Medium double not null,
Large double not null
);

insert into pricelist values
('Classic',500.00,975.00,1720.00),
('Signature',540.00,1000.00,1820.00),
('Favourite',580.00,1100.00,1990.00),
('Supereme',640.00,1240.00,2200.00);