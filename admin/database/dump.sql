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

create table categorie_favoris
(
	id serial not null
		constraint categorie_favoris_pkey
		primary key,
	name varchar(255) not null
)
;

create table bd_magazines
(
	id serial not null
		constraint prk_constraint_bd_magazines
		primary key,
	titre varchar(255) not null,
	numero integer,
	date_magazine date not null
)
;

create table bd_articles
(
	id serial not null
		constraint prk_constraint_bd_articles
		primary key,
	name varchar(255),
	contenu varchar(2000),
	author varchar(255),
	id_bd_magazines integer not null
		constraint fk_bd_articles_id_bd_magazines
		references bd_magazines
)
;

create table bd_tag
(
	id serial not null
		constraint prk_constraint_bd_tag
		primary key,
	name varchar(255) not null,
	description varchar(255)
)
;

create table vg_map
(
	id integer not null
		constraint prk_constraint_vg_map
		primary key,
	name varchar(255) not null
)
;

create table vg_spot
(
	id integer not null
		constraint prk_constraint_vg_spot
		primary key,
	name varchar(255) not null,
	link varchar(2000),
	address varchar(255) not null,
	city varchar(255) not null,
	country varchar(255) not null,
	lat double precision not null,
	lng double precision not null,
	type varchar(30) not null,
	id_vg_map integer not null
		constraint fk_vg_spot_id_vg_map
		references vg_map
)
;

create table vg_categorie
(
	id integer not null
		constraint prk_constraint_vg_categorie
		primary key,
	name varchar(255) not null,
	description varchar(255)
)
;

create table vg_voyage
(
	id integer not null
		constraint prk_constraint_vg_voyage
		primary key,
	name varchar(255) not null,
	place varchar(255),
	content varchar(2000) not null,
	address varchar(255) not null,
	city varchar(255) not null,
	country varchar(255) not null,
	lat double precision not null,
	lng double precision not null,
	date_debut timestamp not null,
	date_fin timestamp not null,
	id_vg_map integer not null
		constraint fk_vg_voyage_id_vg_map
		references vg_map
)
;

create table vg_pictures
(
	id integer not null
		constraint prk_constraint_vg_pictures
		primary key,
	name varchar(255) not null,
	link varchar(255) not null,
	description varchar(2000) not null,
	id_vg_spot integer not null
		constraint fk_vg_pictures_id_vg_spot
		references vg_spot
)
;

create table vg_banners
(
	id integer not null
		constraint prk_constraint_vg_banners
		primary key,
	title varchar(255) not null,
	subtitle varchar(255) not null,
	link varchar(2000) not null,
	urlmedia varchar(2000) not null,
	date_banner timestamp not null
)
;

create table bd_article_tag
(
	id integer not null
		constraint fk_bd_article_tag_id
		references bd_articles,
	id_bd_tag integer not null
		constraint fk_bd_article_tag_id_bd_tag
		references bd_tag,
	constraint prk_constraint_bd_article_tag
	primary key (id, id_bd_tag)
)
;

create table vg_categorie_voyage
(
	id integer not null
		constraint fk_vg_categorie_voyage_id
		references vg_voyage,
	id_vg_categorie integer not null
		constraint fk_vg_categorie_voyage_id_vg_categorie
		references vg_categorie,
	constraint prk_constraint_vg_categorie_voyage
	primary key (id, id_vg_categorie)
)
;

create table vg_voyage_photo
(
	id integer not null
		constraint fk_vg_voyage_photo_id
		references vg_pictures,
	id_vg_voyage integer not null
		constraint fk_vg_voyage_photo_id_vg_voyage
		references vg_voyage,
	constraint prk_constraint_vg_voyage_photo
	primary key (id, id_vg_voyage)
)
;

















INSERT INTO public.articles (id, author, date, title, subtitle, contenu, categorie, img, legend) VALUES (16, 'pfd', '2017-07-10 17:42:31.000000', 'Publication de Debian 9 &#34;Stretch&#34;', 'Une nouvelle version du système universel', 'Publi&eacute;e le 17 Juin 2017 la derni&egrave;re version du syst&egrave;me d&#39;exploitation universel Debian dont le d&eacute;veloppement avait d&eacute;but&eacute; en avril 2015, n&#39;aura pas &agrave; prouver sa stabilit&eacute; ni sa fiabilit&eacute;.
On retient le retour de Firefox et Thunderbird en lieu et place de leurs fork respectifs. Mais &eacute;galement GCC en version 6.3, firefox en version 52 et linux 4.9 comme kernel.
Une am&eacute;lioration bienvenue concerne la possibilit&eacute; d&#39;utiliser le serveur X sans &ecirc;tre root. L&#39;UEFI est de mieux en mieux support&eacute; sur les noyaux 32 et 64 bits et sur la version live CD. Cela permet notamment d&#39;utiliser le secure boot ou encore installer une version 64 bits sur un noyau 32 bits.
Cette version tire son nom d&#39;un personnage du film Toy Story (Wikipedia) tout comme les deux prochaines versions en cours de d&eacute;veloppement, Debian 10 qui portera le nom de &#34;Buster&#34; et Debian 11 qui portera le nom de &#34;Bullseye&#34;.', 2, 'sortie_debian_logo.jpg', 'Logo de Debian');
INSERT INTO public.articles (id, author, date, title, subtitle, contenu, categorie, img, legend) VALUES (15, 'pfd', '2017-07-10 17:35:09.000000', 'Publication de Debian 9 &#34;Stretch&#34;', 'Une nouvelle version du système universel', 'Publi&eacute;e le 17 Juin 2017 la derni&egrave;re version du syst&egrave;me d&#39;exploitation universel Debian dont le d&eacute;veloppement avait d&eacute;but&eacute; en avril 2015, n&#39;aura pas &agrave; prouver sa stabilit&eacute; ni sa fiabilit&eacute;.
On retient le retour de Firefox et Thunderbird en lieu et place de leurs fork respectifs. Mais &eacute;galement GCC en version 6.3, firefox en version 52 et linux 4.9 comme kernel.
Une am&eacute;lioration bienvenue concerne la possibilit&eacute; d&#39;utiliser le serveur X sans &ecirc;tre root. L&#39;UEFI est de mieux en mieux support&eacute; sur les noyaux 32 et 64 bits et sur la version live CD. Cela permet notamment d&#39;utiliser le secure boot ou encore installer une version 64 bits sur un noyau 32 bits.
Cette version tire son nom d&#39;un personnage du film Toy Story (Wikipedia) tout comme les deux prochaines versions en cours de d&eacute;veloppement, Debian 10 qui portera le nom de &#34;Buster&#34; et Debian 11 qui portera le nom de &#34;Bullseye&#34;.', 2, 'sortie_debian_logo.jpg', 'Logo de Debian');
INSERT INTO public.banners (id, title, subtitle, link, mediatype, urlmedia, date) VALUES (1, 'header', 'sous-header', 'null', 'img', '/assets/custom/img/Responsive-Website-Design-Devices.png', '2017-08-01 20:41:27.688000');
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (0, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (0, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (1, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (1, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (2, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (3, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (4, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (5, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (6, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (7, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (8, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (9, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (10, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (11, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (12, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (13, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (14, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (15, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (16, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (17, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (18, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (19, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (20, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (21, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (22, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (23, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (24, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (25, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (26, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (27, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (28, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (29, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (30, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (31, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (32, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (33, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (34, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (35, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (36, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (37, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (38, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (39, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (40, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (41, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (42, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (43, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (44, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (45, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (46, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (47, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (48, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (49, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (50, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (51, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (52, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (53, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (54, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (55, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (56, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (57, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (58, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (59, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (60, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (61, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (62, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (63, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (64, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (65, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (66, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (67, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (68, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (69, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (70, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (71, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (72, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (73, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (74, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (75, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (76, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (77, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (78, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (79, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (80, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (81, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (82, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (83, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (84, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (85, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (86, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (87, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (88, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (89, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (90, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (91, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (92, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (93, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (94, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (95, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (96, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (97, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (98, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (99, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (100, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (101, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (102, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (103, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (104, 3);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (105, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (129, 1);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (129, 2);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (129, 17);
INSERT INTO public.bd_article_tag (id, id_bd_tag) VALUES (129, 18);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (0, 'Langage de programmation Go', 'Comparaison entre le python et le Go ', 'Sébastien Maccagnoni', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (1, 'Cache maven partagé avec NGINX', 'Interaction entre le serveur d''intégration Jenkins et le logiciel Maven', 'Romain Pelisse', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (2, 'Valgrind en C', 'Duke Nukem 3D et Valgrind pour faciliter le debug', 'Sebastien Tricaud', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (3, 'Surveiller dossier de sources avec script inotifywait', 'Surveiller un dossier de sources et exécuter des commandes en conséquence', 'Stéphane Mourey', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (4, 'Utiliser dropbox en python', 'Créer une application python utilisant l''API de dropbox', 'Sébastien Chazallet', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (5, 'PHP-RBAC', 'Gestion des droits et rôles d''une application PHP', 'Stéphane Mourey', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (6, 'Robot Tweete', 'Création d''un robot twitter en python', 'Tristan Colombo', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (7, 'Le test de Peter', 'Récit d''un Hacking', 'Etienne Dublé', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (8, 'Blockchain  : modifier un contrat immuable', 'Modifier des contrats sur des cypto-monnaies telles que Bitcoin et Etherum ', 'Philippe Prados', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (9, 'Art du Reverse avec Radare 2', 'Utilisation de Radare 2 sur linux poiur l''analyse de binaires', 'Sylvain Neyrolles', 1);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (10, 'Ecrans sur Arduino', 'Article sur les Ecrans Nextion, gestion affichage et IHM. ', 'Denis Bodor', 2);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (11, 'LoRaWAN', 'Communication radio longue portée LoRA, réseau étendu flaible consommation', 'Denis Bodor', 2);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (12, 'LoRaWAN sur arduino', 'Utiliser le réseau the Things network communautaire afin de faire communiquer des objets LoRaWAN sans ajouter de concentrateur.', 'Denis Bodor', 2);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (13, 'Emetteur 433 MHz pour remplacer les télécommandes', 'Emetteur 433 MHz a base de SI4021 et d''arduino pour emettre des signaux ', 'Denis Bodor', 2);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (14, 'Convertisseur de tension USB', 'Obtenir des tension 12V, 9V à partir d''une prise USB et d''un MT3608', 'Denis Bodor', 2);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (15, 'Obtenir les information du firmware du raspberry pi', 'Configuration des paramètres du firmware d''un raspberry Pi', 'Laurent Delmas', 2);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (16, 'Bus BSB SIEMENS pompe à chaleur', 'Analyse de la communication entre la PAC et la sonde d''ambiance ', 'Erwan Loaëc', 2);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (17, 'Pilotage pompe à chaleur SIEMENS ', 'Pilotage d''une pompe à chaleur SIEMENS à l''aide d''un Raspberry Pi', 'Erwan Loaëc', 2);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (18, 'Programmateur EPROM avec Raspberry Pi', 'Programmer les mémoires I2C, EPROM, GAL, SRAM… pour applications sur Raspberry Pi', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (19, 'Animation Feu sur matrice de led', 'Applications des matrices de LED WS2812b ou neoplixels pour simuler et animer un feu ', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (20, 'Créer des boutons à copie/coller', 'Utilisation de l''USB avec un arduino pour simuler une touche de clavier avec un bouton', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (21, 'Bouton de volume universel', 'Utilisation de l''USB pour créer un bouton de réglage universel du volume sur un ordinateur ', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (22, 'Transformer vieux clavier en clavier USB', 'Transformer un ancien clavier en un clavier USB avec un Arduino', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (23, 'Clavier bluetooth pour Raspberry Pi', 'Configurationet connexion d''un clavier bluetooth pour un Raspberry Pi', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (24, 'Modifier la signification des leds du Raspberry Pi', 'Modifier la signification des leds intégrées aux Raspberry Pi', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (25, 'Utiliser Arduino comme périphérique USB', 'Utilisation de HoodLoader2 pour transformer un arduino en périphérique USB', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (26, 'Application sur les codes tournants ', 'Application sur Arduino des codes tournants, utilisation des générateurs de nombres pseudo-aléatoire', 'Denis Bodor', 3);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (27, 'Launchpad MSP432 de TI', 'Utilisation multi-tâche à l''aide du lauchpad MSP432 de Texas Instruments pour l''expérimentation', 'Denis Bodor', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (28, 'Programmateur arduino ISP', 'Utilisation d''un arduino pour programmer un ATTINY85 qui servira de programmateur ATMEGA168', 'Denis Bodor', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (29, 'Programmation arduino avec les registres', 'Programmation d''un microcontrôleur ATMEGA328 en C/AVR pour économiser de la mémoire', 'Denis Bodor', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (30, 'Réseau de capteurs de température', 'Réalisation d''un réseau de capteurs DS18B20 en WIFI', 'Denis Bodor', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (31, 'Réseau de capteurs de température sur Raspberry Pi', 'Implémentation sur Raspberry Pi du réseau de capteurs DS18B20 reliés en WIFI', 'Denis Bodor', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (32, 'Contrôle chaudière à partir de Raspberry Pi', 'Réalisation d''un système de pilotage à distance d''une chaudière sur Raspberry Pi', 'Axelle et Ludovic Apvrille', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (33, 'Téléinformation compteur électrique sur Raspberry Pi', 'Supervision de la consommation électrique d''un logement avec un Raspberry Pi', 'Sébastien Maccagnoni', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (34, 'OpenEVSE pour recharger un véhicule électrique', 'Fabriquer un chargeur de voiture électrique avec OpenEVSE et Raspberry Pi', 'Sébastien Maccagnoni', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (35, 'Pygame et Ecran tactile sur Raspberry Pi', 'Exploiter un écran tactile sur Raspberry Pi avec Pygame ', 'Sébastien Maccagnoni', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (36, 'Ligne de commande dans navigateur sur Raspberry Pi 2', 'Administrer un Raspberry Pi en ligne de commande via un navigateur', 'Denis Bodor', 4);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (37, 'Dessoudage et récupération des composants', 'Découvrir les différentes techniques de dessoudage', 'Denis Bodor', 5);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (38, 'Démarrer un pc à distance avec Arduino', 'Contrôler le démarrage d''un PC avec un ESP8266 via le réseau local', 'Denis Bodor', 5);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (39, 'Utiliser un écran VGA avec arduino', 'Utiliser un écran VGA pour afficher des images à partir d''une carte Arduino', 'Denis Bodor', 5);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (40, 'Portier Sonnette connectée ', 'Câbler un interphone pour le transformer en portier connecté sur Raspberry Pi', 'Eric Le Bras', 5);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (41, 'Portier Sonnette connectée ', 'Configuration et utilisation d''un portier connecté sur Raspberry Pi à l''aide du protocole SIP', 'Eric Le Bras', 5);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (42, 'Sortie ausio bluetooth sur Raspberry Pi', 'Ajout d''une sortie audio bluetooth sur Raspberry Pi', 'Denis Bodor', 5);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (43, 'Découverte du DOS', 'Utilisation d''une carte ebc569 de nexcom pour installer DOS', 'Denis Bodor', 5);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (44, 'Garder Raspbian à jour et jongler entre les versions', 'Apprendre à migrer un système Raspbian et gérer les différentes versions de l''OS', 'Denis Bodor', 5);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (45, 'Les écrans OLED sur Arduino', 'Utilisation d''écrans OLED sur Arduino pour tous les projets avec U8glib', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (46, 'Simulateur de présence avec Arduino', 'Fabriquer un simulateur de TV avec des leds WS2812b sur Arduino', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (47, 'Simulateur de présence avec Arduino', 'Ajouter l''extraction d''images réelles et la programation horaire sur le simulateur de TV', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (48, 'Utilisation des bubble light sur Arduino', 'Contrôler l''ébullition de bubble lights avec des résistances contrôlées par Arduino', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (49, 'Régulation thermique sur Arduino avec Processing', 'Application de la régulation thermique sur le chauffage des bubble lights avec Arduino et Processing', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (50, 'Régulation thermique PID sur Arduino', 'Application de la régulation PID sur Arduino ', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (51, 'Ecran tactile 7 pouces sur Raspberry Pi', 'Utilisation d''un écran tactile 7 pouces sur Raspberry Pi ', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (52, 'Deux écrans lcd miniatures sur Raspberry Pi', 'Utilisation de deux écrans miniatures sur Raspberry Pi avec le device tree', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (53, 'Surveiller le rayonnement électromagnétique avec RTL Power', 'Surveiller la puissance du rayonnement électromagnétique avec un récepteur RTL-SDR', 'Denis Bodor', 6);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (54, 'Récepteur GPS sur Arduino', 'Utilisation d''un arduino et d''un récepteur USB GPS pour récupérer les positions', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (55, 'Communication par lumière visible sur Arduino', 'Utilisation de la lumière visible pour établir une communication entre deux arduinos', 'Jonathan Piat', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (56, 'Horloge avec des ampèremètres', 'Utilisation d''ampèremètres à aiguille pour afficher l''heure avec Arduino et un DS1307 ', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (57, 'Découverte de la NFC et RFID', 'Bases sur les protocoles NFC et RFID ', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (58, 'NFC et RFID sur Android', 'Choisir une application Android pour lire les tags RFID et NFC', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (59, 'Configurer le NFC sur Raspberry Pi', 'Ajouter un périphérique de lecture/écriture de tags NFC sur Raspberry Pi', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (60, 'Utiliser le NFC sur Raspberry Pi', 'Découvrir les possibilités d''utilisation des tags NFC et RFID sur Raspberry Pi', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (61, 'Utilisation du NFC sur Arduino', 'Configuration et utilisation d''un module NXP PN532 sur Arduino', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (62, 'Energie solaire et stockage sur LIPO RIDER PRO', 'Stocker l''énergie solaire en toute sécurité sur des batteries LIPO pour alimenter des projets avec LIPO RIDER PRO', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (63, 'Exécution de code atomique sur Arduino', 'Exécution de code atomique sur Arduino afin de faciliter les interruptions', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (64, 'Compiler un Noyau pour Raspberry Pi', 'Recompilation de Raspbian pour concevoir un nouveau noyau sur Raspberry Pi ', 'Denis Bodor', 7);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (65, 'Utilisation du port USB OTG du Raspberry Pi zéro ', 'Utilisation du port USB OTG du Raspberry Pi zéro et émulation de périphériques USB', 'Denis Bodor', 8);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (66, 'Fabrication d''un afficheur 7 segments géant', 'Fabrication d''un afficheur 7 segments géant avec des bandeau de LED', 'Denis Bodor', 8);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (67, 'Utilisation de LED comme capteurs de lumière', 'Utilisation de LED comme capteurs de lumière sur Arduino', 'Denis Bodor', 8);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (68, 'Serrure à carte RFID', 'Exploitation des tags RFID 125 kHz  EM4100 sur Arduino', 'Denis Bodor', 8);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (69, 'Ventilation contôlée par Raspberry Pi', 'Contrôler la ventilation d''une maison grâce à des relais pilotés sur Raspberry Pi et interface sur site web', 'Ludovic & Axelle Apvrille', 8);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (70, 'Gérer installations et désistallations sur raspbian', 'Gestion de base des paquets sur la distribution raspbian', 'Denis Bodor', 8);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (71, 'Gestion avancée des paquets sur raspbian', 'Gestion avancée de l''installation des paquets sur la distribution raspbian sur Raspberry Pi', 'Denis Bodor', 8);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (72, 'Octoprint sur Raspberry Pi', 'Exploitation d''un module caméra sur Raspberry Pi avec Octoprint pour superviser l''impression 3D', 'Yann Morère ', 8);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (73, 'Contrôler une imprimante thermique avec arduino', 'Connexion d''une imprimante thermique série sur arduino', 'Denis Bodor', 9);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (74, 'Générer des QR Code avec arduino', 'Générer et imprimer des QR Codes avec Arduino et qrduino', 'Denis Bodor', 9);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (75, 'Créer une borne d''arcade avec Raspberry Pi', 'Créer une mini-borne d''arcade imprimée en 3D avec un Raspberry Pi et un écran', 'Yann Morère ', 9);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (76, 'Remplacer une télécommande par un arduino : collecte des données', 'Analyser les données envoyées par une télécommande à fréquence RF avec un module RTL-SDR', 'Denis Bodor', 9);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (77, 'Remplacer une télécommande par un arduino : Emulation et emission', 'Utilisation d''un module SI4021 pour envoyer des données en RF depuis l''arduino en SPI', 'Denis Bodor', 9);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (78, 'Théorie et applications des MOSFET', 'Utilisation des transistors MOSFET ', 'Yann Guidon', 9);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (79, 'Choix de CONST ou #DEFINE', 'Choix de CONST ou #DEFINE sur Arduino', 'Denis Bodor', 9);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (80, 'Garder Raspbian à jour sans internet', 'Réplication d''un miroir Raspbian sur une clé pour mise à jour d''un Raspberry Pi sans internet', 'Denis Bodor', 9);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (81, 'Maker faire Paris 2016', 'Retour sur l''événement maker de l''année ', 'Denis Bodor', 10);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (82, 'Raspberry Pi 3', 'Découverte de la nouvelle carte Raspberry Pi 10 fois plus performantes qu''un Raspberry Pi 1', 'Denis Bodor', 10);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (83, 'Modules radio ACP220', 'Utilisation des modules radio ACP220 sur Arduino', 'Denis Bodor', 10);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (84, 'Utilisation d''un module caméra V2 sur Raspberry Pi', 'Utilisation du module caméra V2 NoIR sur Raspberry Pi', 'Denis Bodor', 10);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (85, 'Théorie sur l''infrarouge et application', 'Théorie sur l''infrarouge et l''utilisation de filtres IR, utilisation d''une LED infrarouge', 'Denis Bodor', 10);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (86, 'Contrôler une imprimante thermique avec raspberry Pi', 'Utilisation de la bibliothèque adafruit thermal pour imprimer sur une imprimante thermique avec Raspberry Pi', 'Denis Bodor', 10);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (87, 'Convertir une réglette lumineuse en afficheur multicolore', 'Convertir une réglette lumineuse en afficheur multicolore avec des leds WS2812b et Arduino', 'Denis Bodor', 10);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (88, 'Apprendre a déchiffrer une datasheet', 'Déchiffrer une datasheet pour comprendre et trier les informations sur un composant', 'Yann Guidon', 10);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (89, 'Tizen, plate-forme mobile open source', 'Découverte de la plateforme mobile Tizen développée par Samsung ', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (90, 'Découverte du CHIP un micro-ordinateur', 'Découverte du CHIP, un micro-ordinateur concurrent du Raspberry Pi', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (91, 'Papier électronique sur Arduino', 'Utilisation du papier électronique sur arduino', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (92, 'Moniteur de température et hygrométrie', 'affichage de la température et de l''humidité sur des afficheurs 16 segments avec Arduino', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (93, 'Contrôler un appareil photo avec un Raspberry Pi', 'Pilotage d''un APN à partir d''un Raspberry Pi avec gPhoto', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (94, 'Manipuler et traiter automatiquement des photos sur Raspberry Pi', 'Utilisation de Image Magick et gphoto pour traiter des photos sur Raspberry Pi', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (95, 'Programmer la prise de photo en cas de détection de mouvement', 'Utilisation d''un capteur PIR pour commander le déclenchement d''une prise de photo', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (96, 'Créer un bridge WIFI/ETHERNET avec Raspberry Pi', 'Utilisation d''un Raspberry Pi pour créer un Bridge réseau ou point d''accès internet', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (97, 'Alimentation d''une carte Arduino', 'Possibilités d''alimentation d''une carte arduino et application à une réglette lumineuse ', 'Denis Bodor', 11);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (98, 'Contrôle d''appareils de mesure avec Raspberry Pi', 'Utilisation des interfaces d''une alimentation de laboration pour la piloter avec un Raspberry Pi', 'Denis Bodor', 12);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (99, 'Enregistreur de température humidité et pression sur Arduino', 'Enregistrer sur une EEPROM des mesures environnementales avec des capteurs sur Arduino', 'Denis Bodor', 12);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (100, 'Créer une lanterne qui réagit au toucher', 'Utilisation de la détection capacitive pour commander des LEDs', 'Denis Bodor', 12);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (101, 'Connecter en bluetooth un arduino', 'Branchement et implémentation d''un module bluetooth sur Arduino', 'Denis Bodor', 12);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (102, 'Piloter un arduino avec un smartphone en bluetooth', 'Utilisation d''un module bluetooth pour contrôler un arduino avec un smartphone', 'Denis Bodor', 12);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (103, 'Connecter un écran LCD sur un Raspberry Pi', 'Afficher l''adresse IP d''un Raspberry Pi sur un écran LCD ', 'Denis Bodor', 12);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (104, 'Partager ses projets sur Github', 'Utiliser github pour partager des projets à l''aide du gestionnaire de version git ', 'Denis Bodor', 12);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (105, 'Alimentation d''un Arduino ou Raspberry Pi avec une batterie externe', 'Utilisation d''une batterie externe pour alimenter des projets sur Raspberry Pi ou arduino', 'Denis Bodor', 12);
INSERT INTO public.bd_articles (id, name, contenu, author, id_bd_magazines) VALUES (129, 'tag', 'content', 'pierre', 1);
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (1, 'Linux Magazine', 206, '2017-07-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (2, 'Hackable', 19, '2017-07-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (3, 'Hackable', 17, '2017-03-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (4, 'Hackable', 8, '2015-09-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (5, 'Hackable', 18, '2017-05-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (6, 'Hackable', 9, '2015-11-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (7, 'Hackable', 10, '2016-01-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (8, 'Hackable', 11, '2016-03-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (9, 'Hackable', 12, '2016-05-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (10, 'Hackable', 13, '2016-07-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (11, 'Hackable', 14, '2016-09-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (12, 'Hackable', 15, '2016-11-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (13, 'Hackable', 16, '2017-01-01');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (14, 'toto', 3265, '1996-09-17');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (15, 'iooi', 12, '2017-09-21');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (16, 'iooi', 12, '2017-09-21');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (17, 'iooi', 12, '2017-09-21');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (18, 'iooi', 12, '2017-09-21');
INSERT INTO public.bd_magazines (id, titre, numero, date_magazine) VALUES (19, 'iooi', 12, '2017-09-21');
INSERT INTO public.bd_tag (id, name, description) VALUES (1, 'tag1', 'tag1');
INSERT INTO public.bd_tag (id, name, description) VALUES (2, 'tag2', 'tag2');
INSERT INTO public.bd_tag (id, name, description) VALUES (3, 'tag3', 'tag3');
INSERT INTO public.bd_tag (id, name, description) VALUES (5, 'tag4', 'tag5');
INSERT INTO public.bd_tag (id, name, description) VALUES (16, 'tag', 'tag');
INSERT INTO public.bd_tag (id, name, description) VALUES (17, 'iooi', 'grgr');
INSERT INTO public.bd_tag (id, name, description) VALUES (18, 'tag', 'ioio');
INSERT INTO public.categorie_article (id, name, description, img, legend) VALUES (1, 'elec', 'elec', '/elec/elec.png', 'No legend provided');
INSERT INTO public.categorie_article (id, name, description, img, legend) VALUES (2, 'info', 'infogggg
', '/info/info.png', 'No legend provided');
INSERT INTO public.categorie_favoris (id, name) VALUES (1, 'informatique');
INSERT INTO public.categorie_projects (id, name, description, img, legend, subject) VALUES (1, 'raspi', 'raspi', 'rl', 're', 'élec');
INSERT INTO public.categorie_projects (id, name, description, img, legend, subject) VALUES (2, 'C', 'C', 'C', 'C', 'info');
INSERT INTO public.favoris (id, name, link, categorie_id, description) VALUES (46, 'lien', 'https://github.com/mouse0270/bootstrap-notify/blob/master/bootstrap-notify.js', 1, 'lien');
INSERT INTO public.favoris (id, name, link, categorie_id, description) VALUES (47, 'lien', 'https://github.com/mouse0270/bootstrap-notify/blob/master/bootstrap-notify.js', 1, 'lien');
INSERT INTO public.favoris (id, name, link, categorie_id, description) VALUES (48, 'lien', 'https://github.com/mouse0270/bootstrap-notify/blob/master/bootstrap-notify.js', 1, 'lien');
INSERT INTO public.favoris (id, name, link, categorie_id, description) VALUES (49, 'lien', 'https://github.com/mouse0270/bootstrap-notify/blob/master/bootstrap-notify.js', 1, 'lien');
INSERT INTO public.favoris (id, name, link, categorie_id, description) VALUES (50, 'lien', 'https://github.com/mouse0270/bootstrap-notify/blob/master/bootstrap-notify.js', 1, 'lien');
INSERT INTO public.favoris (id, name, link, categorie_id, description) VALUES (51, 'lien', 'https://github.com/mouse0270/bootstrap-notify/blob/master/bootstrap-notify.js', 1, 'lien');
INSERT INTO public.favoris (id, name, link, categorie_id, description) VALUES (52, 'lien', 'https://github.com/mouse0270/bootstrap-notify/blob/master/bootstrap-notify.js', 1, 'lien');
INSERT INTO public.favoris (id, name, link, categorie_id, description) VALUES (53, 'lien', 'https://github.com/mouse0270/bootstrap-notify/blob/master/bootstrap-notify.js', 1, 'lien');
INSERT INTO public.projects (title, date, subtitle, contenu, img, legend, id, subject, id_categorie) VALUES ('titleinfo', '2017-07-31 21:12:21.291000', 'subtitle', 'conten', 'url', 'legend', 3, 'info', 2);
INSERT INTO public.projects (title, date, subtitle, contenu, img, legend, id, subject, id_categorie) VALUES ('titleélec', '2017-07-31 19:07:49.090000', 'subtitle', 'contenu', 'url', 'legend', 2, 'élec', 1);

