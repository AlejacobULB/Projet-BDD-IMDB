SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/persons_ok.txt' INTO TABLE Personne FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/oeuvres_ok.txt' INTO TABLE Oeuvre FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/pays_ok.txt' INTO TABLE Pays FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/genres_ok.txt' INTO TABLE Genre FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/langues_ok.txt' INTO TABLE Langue FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/films_ok.txt' INTO TABLE Film FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/series_ok.txt' INTO TABLE Serie FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/auteurs_ok.txt' INTO TABLE Auteur FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/directeurs_ok.txt' INTO TABLE Directeur FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/episodes_ok.txt' INTO TABLE Episode FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";
LOAD DATA LOCAL INFILE '/home/benjamin/PycharmProjects/Projet-BDD-IMDB/SQL_data_files/acteurs_ok.txt' INTO TABLE Acteur FIELDS TERMINATED BY "|" LINES TERMINATED BY "\n";

