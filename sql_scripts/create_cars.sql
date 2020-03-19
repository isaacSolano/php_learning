create table cars(
	brand varchar(25) not null,
	color varchar(25) not null,
	id_car varchar(10) not null primary key,
	id_user number(10) not null references users(id_user)
)
/
