create table #prefix#comments (
	id int unsigned not null auto_increment primary key,
	identifier char(72) not null,
	user int not null,
	status int not null,
	ts datetime not null,
	comment text not null,
	index (identifier, status, ts),
	index (user, status, ts)
);
