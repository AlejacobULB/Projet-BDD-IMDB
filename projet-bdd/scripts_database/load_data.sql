SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
\! echo "Inserting data in Persone...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/persons_ok.txt' INTO TABLE Personne FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
ALTER TABLE Personne
  ADD fullname VARCHAR(256);
UPDATE Personne
SET fullname = CONCAT(Prenom, ' ', Nom);
\! echo "Inserting data in Oeuvre...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/oeuvres_ok.txt' INTO TABLE Oeuvre FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Pays...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/pays_ok.txt' INTO TABLE Pays FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Genre...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/genres_ok.txt' INTO TABLE Genre FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Langue...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/langues_ok.txt' INTO TABLE Langue FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Film...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/films_ok.txt' INTO TABLE Film FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Serie...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/series_ok.txt' INTO TABLE Serie FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Episode...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/episodes_ok.txt' INTO TABLE Episode FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting Notes...\n";
CREATE TEMPORARY TABLE Note_temp (ID VARCHAR(512) NOT NULL,Note FLOAT);
LOAD DATA LOCAL INFILE '../SQL_data_files/ratings_ok.txt' INTO TABLE Note_temp FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
UPDATE Oeuvre INNER JOIN Note_temp on Note_temp.ID = Oeuvre.ID SET Oeuvre.Note = Note_temp.Note;
DROP TEMPORARY TABLE Note_temp;
INSERT INTO Administrateur (AdresseMail, motDePasse) VALUES ('admin@imdb.be', '21232f297a57a5a743894a0e4a801fc3');
\! echo "Inserting data in Auteur...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/auteurs_ok.txt' INTO TABLE Auteur FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Directeur...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/directeurs_ok.txt' INTO TABLE Directeur FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Acteur...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/acteurs_ok.txt' INTO TABLE Acteur FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in EcritPar...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/ecritPar.txt' INTO TABLE EcritPar FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in DirigePar...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/dirigePar.txt' INTO TABLE DirigePar FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Role...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/roles.txt' INTO TABLE Role FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserting data in Plots...\n";
LOAD DATA LOCAL INFILE '../SQL_data_files/plots_ok.txt' INTO TABLE Plots FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
\! echo "Inserttion done.\n";