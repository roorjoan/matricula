create database matricula;
use matricula;

create table users(
    id serial primary key,
    name varchar(255) not null,
    email varchar(255) unique not null,
    password varchar(255) not null,
    is_admin boolean default 0
);

create table students(
    
);

create table matriculas(
    
);

create table movimientos(

);