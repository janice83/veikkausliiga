DROP DATABASE IF EXISTS veikkausliiga;
CREATE DATABASE veikkausliiga DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE veikkausliiga;
DROP TABLE IF EXISTS sarjataulukko;
CREATE TABLE sarjataulukko (
  id int(10) auto_increment,
  joukkue text NOT NULL, 
  ottelut int NOT NULL,
  voitot int NOT NULL,
  tasapelit int NOT NULL,
  tappiot int NOT NULL,
  pisteet int NOT NULL, 
  PRIMARY KEY  (id)
);
--
-- Dumping data for table `sarjataulukko`
--
INSERT INTO sarjataulukko (joukkue,ottelut,voitot,tasapelit,tappiot,pisteet) 
VALUES  ('HJK', 33, 23, 7, 3, 76),
('KuPS', 33, 16, 8, 9, 56),
('Ilves', 33, 15, 11, 7, 56),
('FC Lahti', 33, 12, 13, 8, 49)