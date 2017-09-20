INSERT INTO public.articles (id, author, date, title, subtitle, contenu, categorie, img, legend) VALUES (16, 'pfd', '2017-07-10 17:42:31.000000', 'Publication de Debian 9 &#34;Stretch&#34;', 'Une nouvelle version du système universel', 'Publi&eacute;e le 17 Juin 2017 la derni&egrave;re version du syst&egrave;me d&#39;exploitation universel Debian dont le d&eacute;veloppement avait d&eacute;but&eacute; en avril 2015, n&#39;aura pas &agrave; prouver sa stabilit&eacute; ni sa fiabilit&eacute;.
On retient le retour de Firefox et Thunderbird en lieu et place de leurs fork respectifs. Mais &eacute;galement GCC en version 6.3, firefox en version 52 et linux 4.9 comme kernel.
Une am&eacute;lioration bienvenue concerne la possibilit&eacute; d&#39;utiliser le serveur X sans &ecirc;tre root. L&#39;UEFI est de mieux en mieux support&eacute; sur les noyaux 32 et 64 bits et sur la version live CD. Cela permet notamment d&#39;utiliser le secure boot ou encore installer une version 64 bits sur un noyau 32 bits.
Cette version tire son nom d&#39;un personnage du film Toy Story (Wikipedia) tout comme les deux prochaines versions en cours de d&eacute;veloppement, Debian 10 qui portera le nom de &#34;Buster&#34; et Debian 11 qui portera le nom de &#34;Bullseye&#34;.', 2, 'sortie_debian_logo.jpg', 'Logo de Debian');
INSERT INTO public.articles (id, author, date, title, subtitle, contenu, categorie, img, legend) VALUES (15, 'pfd', '2017-07-10 17:35:09.000000', 'Publication de Debian 9 &#34;Stretch&#34;', 'Une nouvelle version du système universel', 'Publi&eacute;e le 17 Juin 2017 la derni&egrave;re version du syst&egrave;me d&#39;exploitation universel Debian dont le d&eacute;veloppement avait d&eacute;but&eacute; en avril 2015, n&#39;aura pas &agrave; prouver sa stabilit&eacute; ni sa fiabilit&eacute;.
On retient le retour de Firefox et Thunderbird en lieu et place de leurs fork respectifs. Mais &eacute;galement GCC en version 6.3, firefox en version 52 et linux 4.9 comme kernel.
Une am&eacute;lioration bienvenue concerne la possibilit&eacute; d&#39;utiliser le serveur X sans &ecirc;tre root. L&#39;UEFI est de mieux en mieux support&eacute; sur les noyaux 32 et 64 bits et sur la version live CD. Cela permet notamment d&#39;utiliser le secure boot ou encore installer une version 64 bits sur un noyau 32 bits.
Cette version tire son nom d&#39;un personnage du film Toy Story (Wikipedia) tout comme les deux prochaines versions en cours de d&eacute;veloppement, Debian 10 qui portera le nom de &#34;Buster&#34; et Debian 11 qui portera le nom de &#34;Bullseye&#34;.', 2, 'sortie_debian_logo.jpg', 'Logo de Debian');

INSERT INTO public.projects (title, date, subtitle, contenu, img, legend, id, subject, id_categorie) VALUES ('titleinfo', '2017-07-31 21:12:21.291000', 'subtitle', 'conten', 'url', 'legend', 3, 'info', 2);
INSERT INTO public.projects (title, date, subtitle, contenu, img, legend, id, subject, id_categorie) VALUES ('titleélec', '2017-07-31 19:07:49.090000', 'subtitle', 'contenu', 'url', 'legend', 2, 'élec', 1);

INSERT INTO public.categorie_projects (id, name, description, img, legend, subject) VALUES (1, 'raspi', 'raspi', 'rl', 're', 'élec');
INSERT INTO public.categorie_projects (id, name, description, img, legend, subject) VALUES (2, 'C', 'C', 'C', 'C', 'info');

INSERT INTO public.categorie_article (id, name, description, img, legend) VALUES (1, 'elec', 'elec', '/elec/elec.png', 'No legend provided');
INSERT INTO public.categorie_article (id, name, description, img, legend) VALUES (2, 'info', 'infogggg
', '/info/info.png', 'No legend provided');

INSERT INTO public.banners (id, title, subtitle, link, mediatype, urlmedia, date) VALUES (1, 'header', 'sous-header', 'null', 'img', '/assets/custom/img/Responsive-Website-Design-Devices.png', '2017-08-01 20:41:27.688000');

create table articles
(
	id serial not null
		constraint article_pkey
			primary key,
	author varchar(255),
	date timestamp,
	title varchar(255),
	subtitle varchar(255),
	contenu text,
	categorie integer,
	img text,
	legend varchar(255)
)
;

create table categorie_article
(
	id integer not null
		constraint categorie_pkey
			primary key,
	name varchar(255),
	description text,
	img varchar(255),
	legend varchar(255) default 'No legend provided'::character varying not null
)
;

create table projects
(
	title varchar(255) not null,
	date timestamp not null,
	subtitle varchar(255) not null,
	contenu text not null,
	img varchar(255) not null,
	legend varchar(255) not null,
	id serial not null
		constraint projects_id_pk
			primary key,
	subject varchar(4),
	id_categorie integer default 0 not null
)
;

create unique index projects_id_uindex
	on projects (id)
;

create table banners
(
	id serial not null
		constraint banners_id_pk
			primary key,
	title varchar(255) not null,
	subtitle varchar(255) not null,
	link text,
	mediatype varchar(3) not null,
	urlmedia text not null,
	date timestamp not null
)
;

create unique index banners_id_uindex
	on banners (id)
;

create table categorie_projects
(
	id serial not null
		constraint categorie_projects_id_pk
			primary key,
	name varchar(255) not null,
	description text not null,
	img varchar(255) not null,
	legend varchar(255) not null,
	subject varchar(4)
)
;


create table favoris
(
	id serial not null
		constraint favoris_pkey
		primary key,
	name varchar(255),
	link text,
	categorie_id integer,
	description text
)
;

create unique index favoris_id_uindex
	on favoris (id)
;













create table travels
(
	id serial not null
		constraint travels_pkey
		primary key,
	name varchar(60) not null,
	address varchar(60) not null,
	lat real not null,
	lng real,
	type varchar(30) not null
)
;

INSERT INTO public.travels (id, name, address, lat, lng, type) VALUES (1, 'Love.Fish', '580 Darling Street, Rozelle, NSW', -33.861034, 151.17194, 'restaurant');
INSERT INTO public.travels (id, name, address, lat, lng, type) VALUES (2, 'Young Henrys', '76 Wilford Street, Newtown, NSW', -33.898113, 151.17447, 'bar');
INSERT INTO public.travels (id, name, address, lat, lng, type) VALUES (3, 'Hunter Gatherer', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', -33.840282, 151.20747, 'bar');
INSERT INTO public.travels (id, name, address, lat, lng, type) VALUES (4, 'The Potting Shed', '7A, 2 Huntley Street, Alexandria, NSW', -33.91075, 151.19417, 'bar');
INSERT INTO public.travels (id, name, address, lat, lng, type) VALUES (5, 'Nomad', '16 Foster Street, Surry Hills, NSW', -33.879917, 151.21045, 'bar');
INSERT INTO public.travels (id, name, address, lat, lng, type) VALUES (7, 'Single Origin Roasters', '60-64 Reservoir Street, Surry Hills, NSW', -33.881123, 151.20966, 'restaurant');
INSERT INTO public.travels (id, name, address, lat, lng, type) VALUES (8, 'Red Lantern', '60 Riley Street, Darlinghurst, NSW', -33.874737, 151.21553, 'restaurant');
INSERT INTO public.travels (id, name, address, lat, lng, type) VALUES (6, 'Three Blue bar', '43 Macpherson Street, Bronte, NSW', -33.906357, 151.26376, 'restaurant');