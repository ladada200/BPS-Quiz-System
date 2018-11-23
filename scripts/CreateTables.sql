DROP DATABASE IF EXISTS quizdb;
CREATE DATABASE quizdb;

USE quizdb;

create table Quiz
(
	quizID varchar(10) not null ,
	quizTitle varchar(20) not null,
    tags varchar(500) not null,
	primary key (quizID)
);

create table Question
(
    questionID varchar(10) not null ,
    question varchar(500) not null ,
    choices varchar(5000) not null,
    answer varchar(100) not null,
	primary key (questionID)
);

create table QuizQuestions
(
    quizID varchar(40) not null ,
    questionID varchar(10) not null ,
    tags varchar(500) not null,
	primary key (quizID),
	foreign key (quizID) references quiz(quizID) on delete cascade,
    foreign key (questionID) references question(questionID) on delete cascade
);

create table Permission
(
    id varchar(10) not null ,
    permission varchar(10) not null ,
	primary key (permission)
);

create table Users
(
    userID varchar(10) not null ,
    userName varchar(50) not null ,
    password varchar(50) not null ,
    permissionLevel varchar(10) not null ,
	primary key (userID),
	foreign key (permissionLevel) references Permission (permission) on delete cascade
);

create table QuizResult
(
    quizID varchar(10) not null ,
    userID varchar(10) not null ,
    completed varchar(20) not null,
    score int not null,
    started char(1) not null,
	primary key (quizID),
	foreign key (quizID) references quiz(quizID) on delete cascade,
    foreign key (userID) references users(userID) on delete cascade
);