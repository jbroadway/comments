create table #prefix#comments (
	id serial not null primary key,
	identifier character(255) not null,
	"user" integer not null,
	status integer not null,
	ts timestamp not null,
	"comment" text not null
);
create index identifier on #prefix#comments (identifier, status, ts);
create index "user" on #prefix#comments ("user", status, ts);