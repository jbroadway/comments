create table #prefix#comments (
	id integer primary key,
	identifier char(72) not null,
	user int not null,
	status int not null,
	ts datetime not null,
	comment text not null
);

create index comments_identifier on comments (identifier, status, ts);
create index comments_user on comments (user, status, ts);
