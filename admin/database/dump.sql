CREATE TABLE articles
(
	id INTEGER DEFAULT nextval('articles_id_seq'::regclass) PRIMARY KEY NOT NULL,
	title VARCHAR(255) NOT NULL,
	subtitle VARCHAR(255) NOT NULL,
	contenu TEXT NOT NULL,
	author VARCHAR(255) NOT NULL,
	date_article TIMESTAMP NOT NULL,
	img VARCHAR(2000) NOT NULL,
	legend VARCHAR(255) NOT NULL
);
CREATE TABLE banners
(
	id INTEGER DEFAULT nextval('banners_id_seq'::regclass) PRIMARY KEY NOT NULL,
	title VARCHAR(255) NOT NULL,
	subtitle VARCHAR(255) NOT NULL,
	link VARCHAR(2000) NOT NULL,
	mediatype VARCHAR(3) NOT NULL,
	urlmedia VARCHAR(2000) NOT NULL,
	date_banner TIMESTAMP NOT NULL
);
CREATE TABLE bd_article_tag
(
	id INTEGER NOT NULL,
	id_bd_tag INTEGER NOT NULL,
	CONSTRAINT prk_constraint_bd_article_tag PRIMARY KEY (id, id_bd_tag),
	CONSTRAINT fk_bd_article_tag_id FOREIGN KEY (id) REFERENCES bd_articles (id),
	CONSTRAINT fk_bd_article_tag_id_bd_tag FOREIGN KEY (id_bd_tag) REFERENCES bd_tag (id)
);
CREATE TABLE bd_articles
(
	id INTEGER DEFAULT nextval('bd_articles_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255),
	contenu VARCHAR(2000),
	author VARCHAR(255),
	id_bd_magazines INTEGER NOT NULL,
	CONSTRAINT fk_bd_articles_id_bd_magazines FOREIGN KEY (id_bd_magazines) REFERENCES bd_magazines (id)
);
CREATE TABLE bd_magazines
(
	id INTEGER DEFAULT nextval('bd_magazines_id_seq'::regclass) PRIMARY KEY NOT NULL,
	titre VARCHAR(255) NOT NULL,
	numero INTEGER,
	date_magazine TIMESTAMP NOT NULL
);
CREATE TABLE bd_tag
(
	id INTEGER DEFAULT nextval('bd_tag_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL,
	description VARCHAR(255)
);
CREATE TABLE cat_articles
(
	id INTEGER NOT NULL,
	id_categorie_article INTEGER NOT NULL,
	CONSTRAINT prk_constraint_cat_articles PRIMARY KEY (id, id_categorie_article),
	CONSTRAINT fk_cat_articles_id FOREIGN KEY (id) REFERENCES articles (id),
	CONSTRAINT fk_cat_articles_id_categorie_article FOREIGN KEY (id_categorie_article) REFERENCES categorie_article (id)
);
CREATE TABLE cat_projects
(
	id INTEGER NOT NULL,
	id_categorie_article INTEGER NOT NULL,
	CONSTRAINT prk_constraint_cat_projects PRIMARY KEY (id, id_categorie_article),
	CONSTRAINT fk_cat_projects_id FOREIGN KEY (id) REFERENCES projects (id),
	CONSTRAINT fk_cat_projects_id_categorie_article FOREIGN KEY (id_categorie_article) REFERENCES categorie_article (id)
);
CREATE TABLE categorie_article
(
	id INTEGER DEFAULT nextval('categorie_article_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL,
	description VARCHAR(2000) NOT NULL,
	img VARCHAR(255) NOT NULL,
	legend VARCHAR(255) NOT NULL,
	subject VARCHAR(255) NOT NULL
);
CREATE TABLE categorie_favoris
(
	id INTEGER DEFAULT nextval('categorie_favoris_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL
);
CREATE TABLE favoris
(
	id INTEGER DEFAULT nextval('favoris_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL,
	link VARCHAR(2000) NOT NULL,
	description VARCHAR(2000) NOT NULL,
	id_categorie_favoris INTEGER NOT NULL,
	CONSTRAINT fk_favoris_id_categorie_favoris FOREIGN KEY (id_categorie_favoris) REFERENCES categorie_favoris (id)
);
CREATE TABLE projects
(
	id INTEGER DEFAULT nextval('projects_id_seq'::regclass) PRIMARY KEY NOT NULL,
	title VARCHAR(255) NOT NULL,
	subtitle VARCHAR(255) NOT NULL,
	contenu TEXT NOT NULL,
	date_project TIMESTAMP NOT NULL,
	img VARCHAR(2000) NOT NULL,
	legend VARCHAR(255) NOT NULL
);
CREATE TABLE vg_banners
(
	id INTEGER DEFAULT nextval('vg_banners_id_seq'::regclass) PRIMARY KEY NOT NULL,
	title VARCHAR(255) NOT NULL,
	subtitle VARCHAR(255) NOT NULL,
	link VARCHAR(2000) NOT NULL,
	urlmedia VARCHAR(2000) NOT NULL,
	date_banner TIMESTAMP NOT NULL
);
CREATE TABLE vg_categorie
(
	id INTEGER DEFAULT nextval('vg_categorie_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL,
	description VARCHAR(255)
);
CREATE TABLE vg_categorie_voyage
(
	id INTEGER NOT NULL,
	id_vg_categorie INTEGER NOT NULL,
	CONSTRAINT prk_constraint_vg_categorie_voyage PRIMARY KEY (id, id_vg_categorie),
	CONSTRAINT fk_vg_categorie_voyage_id FOREIGN KEY (id) REFERENCES vg_voyage (id),
	CONSTRAINT fk_vg_categorie_voyage_id_vg_categorie FOREIGN KEY (id_vg_categorie) REFERENCES vg_categorie (id)
);
CREATE TABLE vg_map
(
	id INTEGER DEFAULT nextval('vg_map_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL,
	center_lat REAL NOT NULL,
	center_long REAL NOT NULL,
	zoom INTEGER NOT NULL
);
CREATE TABLE vg_pictures
(
	id INTEGER DEFAULT nextval('vg_pictures_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL,
	link VARCHAR(255) NOT NULL,
	description VARCHAR(2000) NOT NULL,
	id_vg_spot INTEGER NOT NULL,
	CONSTRAINT fk_vg_pictures_id_vg_spot FOREIGN KEY (id_vg_spot) REFERENCES vg_spot (id)
);
CREATE TABLE vg_spot
(
	id INTEGER DEFAULT nextval('vg_spot_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL,
	link VARCHAR(2000),
	address VARCHAR(255) NOT NULL,
	type VARCHAR(30) NOT NULL,
	id_vg_map INTEGER NOT NULL,
	lat REAL,
	lng REAL,
	CONSTRAINT fk_vg_spot_id_vg_map FOREIGN KEY (id_vg_map) REFERENCES vg_map (id)
);
CREATE TABLE vg_voyage
(
	id INTEGER DEFAULT nextval('vg_voyage_id_seq'::regclass) PRIMARY KEY NOT NULL,
	name VARCHAR(255) NOT NULL,
	place VARCHAR(255),
	content VARCHAR(2000) NOT NULL,
	address VARCHAR(255) NOT NULL,
	city VARCHAR(255) NOT NULL,
	country VARCHAR(255) NOT NULL,
	date_debut TIMESTAMP NOT NULL,
	date_fin TIMESTAMP NOT NULL,
	id_vg_map INTEGER NOT NULL,
	picture_on_top VARCHAR(255),
	CONSTRAINT fk_vg_voyage_id_vg_map FOREIGN KEY (id_vg_map) REFERENCES vg_map (id)
);
CREATE TABLE vg_voyage_photo
(
	id INTEGER NOT NULL,
	id_vg_voyage INTEGER NOT NULL,
	CONSTRAINT prk_constraint_vg_voyage_photo PRIMARY KEY (id, id_vg_voyage),
	CONSTRAINT fk_vg_voyage_photo_id FOREIGN KEY (id) REFERENCES vg_pictures (id),
	CONSTRAINT fk_vg_voyage_photo_id_vg_voyage FOREIGN KEY (id_vg_voyage) REFERENCES vg_voyage (id)
);