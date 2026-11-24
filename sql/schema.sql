-- À importer dans Adminer SEULEMENT si les tables n'existent pas déjà.
CREATE DATABASE IF NOT EXISTS parc_info CHARACTER SET utf8mb4;
USE parc_info;

CREATE TABLE IF NOT EXISTS computers (
  id               VARCHAR(100) PRIMARY KEY,   -- nom de la machine
  fabricant        VARCHAR(255),
  modele           VARCHAR(255),
  numero_serie     VARCHAR(255),
  adresse_ip       VARCHAR(45),
  os_nom           VARCHAR(255),
  os_version       VARCHAR(255),
  processeur       VARCHAR(255),
  memoire_ram_go   DECIMAL(6,1),
  disques_libre_go VARCHAR(500),
  date_inventaire  DATETIME
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS software (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  computer_id VARCHAR(100) NOT NULL,
  name        VARCHAR(255) NOT NULL,
  version     VARCHAR(255),
  publisher   VARCHAR(255),
  INDEX (computer_id),
  FOREIGN KEY (computer_id) REFERENCES computers(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Droits minimaux pour l'application (remplacer le mot de passe) :
-- CREATE USER 'techstock'@'localhost' IDENTIFIED BY 'MOT_DE_PASSE_SOLIDE';
-- GRANT SELECT, INSERT, UPDATE, DELETE ON parc_info.* TO 'techstock'@'localhost';
