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
    id serial primary key,
    ci varchar(11) unique not null, 
    name varchar(255) not null,
    last_name varchar(255) not null,
    gender char(1) not null,
    address varchar(255) not null
);