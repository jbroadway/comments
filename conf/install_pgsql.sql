create table #prefix#comments (
	id serial not null primary key,
	identifier character(72) not null,
	"user" integer not null,
	status integer not null,
	ts timestamp not null,
	"comment" text not null
);
create index identifier on comments (identifier, status, ts);
create index "user" on comments ("user", status, ts);