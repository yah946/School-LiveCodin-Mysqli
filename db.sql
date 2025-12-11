create database school;
use school;
create table student(
    id int AUTO_INCREMENT PRIMARY key,
    FirstName varchar(50),
    LastName varchar(50),
    email varchar(100) not null
);
RENAME TABLE student TO students;
insert into students (FirstName,LastName,email)
VALUES ("Mohamed","Ayt Jam3","mohamedl683298@gamil.com"),
       ("Otman","Mallouuuki","Delegueotman@youcode.com"),
       ("AbdeArahman","Orari","abdearaham324321@gmail.com"),
       ("Ahmed","SoLani","ahmed123987@gmail.com"),
       ("Sami","sami","sami12384923@gmail.com"),
       ("Hamza","Hmizan","hmoooze@gmail.com");