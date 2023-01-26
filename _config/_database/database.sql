CREATE TABLE utilisateur(
   id_user INT AUTO_INCREMENT,
   nom VARCHAR(255),
   prenom VARCHAR(255),
   date_dn DATETIME,
   PRIMARY KEY(id_user)
);

CREATE TABLE message(
   id_msg INT AUTO_INCREMENT,
   contenu TEXT,
   id_user INT,
   PRIMARY KEY(id_msg),
   FOREIGN KEY(id_user) REFERENCES utilisateur(id_user)
);
 