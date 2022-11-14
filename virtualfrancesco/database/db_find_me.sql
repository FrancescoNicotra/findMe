CREATE TABLE IF NOT EXISTS  persona (
    id_persona int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    cognome varchar(255) NOT NULL,
    email varchar (255) NOT NULL,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    numero_tel char(50) NOT NULL,
    PRIMARY KEY (id_persona)
);

CREATE TABLE IF NOT EXISTS  luogo (
    id_luogo int(11) NOT NULL,
    nome_stanza varchar(255) NOT NULL,
    id_mobile int NOT NULL,
    PRIMARY KEY (id_luogo)
    );

CREATE TABLE IF NOT EXISTS  mobile (
    id_mobile int(11) NOT NULL,
    nome_mobile varchar(255) NOT NULL,
    PRIMARY KEY (id_mobile)
);

CREATE TABLE IF NOT EXISTS  oggetto (
    id_oggetto int(11) NOT NULL,
    nome_oggetto varchar (255) NOT NULL,
    data_deposito DATE,
    data_prelievo DATE,
    id_persona int NOT NULL,
    id_mobile int NOT NULL,
    PRIMARY KEY (id_oggetto),
    FOREIGN KEY (id_persona) REFERENCES persona(id_persona),
    FOREIGN KEY (id_mobile) REFERENCES mobile(id_mobile)
);

ALTER TABLE persona
ADD id_luogo int(11);
ALTER TABLE persona
    ADD FOREIGN KEY(id_luogo) REFERENCES luogo(id_luogo);
ALTER TABLE luogo
    ADD id_mobile int(11);
ALTER TABLE luogo
    ADD FOREIGN KEY(id_mobile) REFERENCES mobile(id_mobile);
