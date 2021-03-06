SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'TRADITIONAL,ALLOW_INVALID_DATES';
SET @@global.innodb_large_prefix = 1;


CREATE TABLE IF NOT EXISTS Personne (
  Prenom VARCHAR(128) NOT NULL,
  Nom    VARCHAR(128) NOT NULL,
  Numero VARCHAR(10),
  Genre  CHAR(2)      NOT NULL,
  PRIMARY KEY (Prenom, Nom, Numero)
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Auteur (
  Prenom VARCHAR(128) NOT NULL,
  Nom    VARCHAR(128) NOT NULL,
  Numero VARCHAR(10),
  PRIMARY KEY (Prenom, Nom, Numero),
  FOREIGN KEY (Prenom, Nom, Numero) REFERENCES Personne (Prenom, Nom, Numero)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Directeur (
  Prenom VARCHAR(128) NOT NULL,
  Nom    VARCHAR(128) NOT NULL,
  Numero VARCHAR(10),
  PRIMARY KEY (Prenom, Nom, Numero),
  FOREIGN KEY (Prenom, Nom, Numero) REFERENCES Personne (Prenom, Nom, Numero)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Acteur (
  Prenom VARCHAR(128) NOT NULL,
  Nom    VARCHAR(128) NOT NULL,
  Numero VARCHAR(10),
  PRIMARY KEY (Prenom, Nom, Numero),
  FOREIGN KEY (Prenom, Nom, Numero) REFERENCES Personne (Prenom, Nom, Numero)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS EcritPar (
  Prenom VARCHAR(128) NOT NULL,
  Nom    VARCHAR(128) NOT NULL,
  Numero VARCHAR(10),
  OID    VARCHAR(512) NOT NULL,
  PRIMARY KEY (Prenom, Nom, Numero, OID),
  FOREIGN KEY (Prenom, Nom, Numero) REFERENCES Auteur (Prenom, Nom, Numero)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY (OID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS DirigePar (
  Prenom VARCHAR(128) NOT NULL,
  Nom    VARCHAR(128) NOT NULL,
  Numero VARCHAR(10),
  OID    VARCHAR(512) NOT NULL,
  PRIMARY KEY (Prenom, Nom, Numero, OID),
  FOREIGN KEY (Prenom, Nom, Numero) REFERENCES Directeur (Prenom, Nom, Numero)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY (OID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Role (
  Prenom VARCHAR(128) NOT NULL,
  Nom    VARCHAR(128) NOT NULL,
  Numero VARCHAR(10),
  OID    VARCHAR(512) NOT NULL,
  Role   VARCHAR(128) NOT NULL,
  PRIMARY KEY (Prenom, Nom, Numero, OID, Role),
  FOREIGN KEY (Prenom, Nom, Numero) REFERENCES Acteur (Prenom, Nom, Numero)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY (OID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Oeuvre (
  ID          VARCHAR(512) NOT NULL,
  Titre       VARCHAR(256) NOT NULL,
  AnneeSortie INT          NOT NULL,
  Note        FLOAT,
  PRIMARY KEY (ID)
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Film (
  FilmID VARCHAR(512) NOT NULL,
  PRIMARY KEY (FilmID),
  FOREIGN KEY (FilmID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Serie (
  SerieID  VARCHAR(512) NOT NULL,
  AnneeFin INT,
  PRIMARY KEY (SerieID),
  FOREIGN KEY (SerieID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Episode (
  EpisodeID VARCHAR(512) NOT NULL,
  NumeroE   INT,
  Saison    INT,
  SID       VARCHAR(256) NOT NULL,
  PRIMARY KEY (EpisodeID),
  FOREIGN KEY (EpisodeID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
  FOREIGN KEY (SID) REFERENCES Serie (SerieID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Pays (
  ID   VARCHAR(512) NOT NULL,
  Pays VARCHAR(256) NOT NULL,
  PRIMARY KEY (ID, Pays),
  FOREIGN KEY (ID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Genre (
  ID    VARCHAR(512) NOT NULL,
  Genre VARCHAR(64)  NOT NULL,
  PRIMARY KEY (ID, Genre),
  FOREIGN KEY (ID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Langue (
  ID     VARCHAR(512) NOT NULL,
  Langue VARCHAR(256) NOT NULL,
  PRIMARY KEY (ID, Langue),
  FOREIGN KEY (ID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS Administrateur (
  AdresseMail VARCHAR(64) NOT NULL,
  motDePasse  VARCHAR(64) NULL,
  PRIMARY KEY (AdresseMail)
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Plots (
  ID   VARCHAR(512) NOT NULL,
  Plot TEXT         NOT NULL,
  PRIMARY KEY (ID),
  FOREIGN KEY (ID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS Commentaires (
  OID          VARCHAR(512) NOT NULL,
  Texte        TEXT         NOT NULL,
  Auteur       VARCHAR(512) NOT NULL,
  Etoiles      FLOAT        NOT NULL,
  DateComplete DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (OID, Auteur, DateComplete),
  FOREIGN KEY (OID) REFERENCES Oeuvre (ID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
)
  CHARACTER SET latin1
  COLLATE latin1_bin
  ENGINE = InnoDB;


DELIMITER $$
CREATE TRIGGER check_end_date_serie_update
BEFORE UPDATE ON Serie
FOR EACH ROW
  BEGIN
    DECLARE beginDate INT;
    DECLARE msg VARCHAR(255);
    SET beginDate = (SELECT AnneeSortie
                     FROM Oeuvre
                     WHERE ID = NEW.SerieID);
    IF NEW.AnneeFin < beginDate || NEW.AnneeFin < 0
    THEN
      SET msg = "La date de fin doit être inférieur à la date de sortie et positive";
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = msg;
    END IF;
  END;
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER check_end_date_serie_insert
BEFORE INSERT ON Serie
FOR EACH ROW
  BEGIN
    DECLARE beginDate INT;
    DECLARE msg VARCHAR(255);
    SET beginDate = (SELECT AnneeSortie
                     FROM Oeuvre
                     WHERE ID = NEW.SerieID);
    IF NEW.AnneeFin < beginDate || NEW.AnneeFin < 0
    THEN
      SET msg = "La date de fin doit être inférieur à la date de sortie et positive";
      SIGNAL SQLSTATE '45000'
      SET MESSAGE_TEXT = msg;
    END IF;
  END;
$$
DELIMITER ;



