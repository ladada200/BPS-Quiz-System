create table CocktailItemCategory
(
	itemCategoryID varchar(3) not null ,
	itemCategoryDescription varchar(20) not null,
	primary key (itemCategoryID)
);

create table CocktailItem
(
	itemID int not null AUTO_INCREMENT,
	itemCategoryID varchar(3) not null,
	description varchar(80) not null,
	price int not null,
	alcoholic boolean not null,
	primary key (itemID),
	foreign key (itemCategoryID) references CocktailItemCategory(itemCategoryID) on delete cascade
);
