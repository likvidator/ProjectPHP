CREATE TABLE User (
  id INT NOT NULL AUTO_INCREMENT,
  Name TEXT NOT NULL,
  Password TEXT NOT NULL, 
  email TEXT NOT NULL,
  Phone TEXT NOT NULL,
  PRIMARY KEY  (id)
);

CREATE TABLE City (
  id INT NOT NULL AUTO_INCREMENT,
  Value TEXT NOT NULL,
  PRIMARY KEY  (id)
);

CREATE TABLE Type (
  id INT NOT NULL AUTO_INCREMENT,
  Value TEXT,
  PRIMARY KEY  (`id`)
);
CREATE TABLE Announcement (
  id_Product INT NOT NULL AUTO_INCREMENT,
  Type TEXT NOT NULL,
  Price DOUBLE NOT NULL,
  Name TEXT NOT NULL,
  Description TEXT NOT NULL,
  image TEXT ,
  Type_Product int NOT NULL,
  User int NOT NULL,
  City INT NOT NULL,
  PRIMARY KEY  (id_Product)
);

ALTER TABLE `Announcement` ADD CONSTRAINT `Announcement_fk1` FOREIGN KEY (User) REFERENCES User(id);
ALTER TABLE `Announcement` ADD CONSTRAINT `Announcement_fk2` FOREIGN KEY (City) REFERENCES City(id);
ALTER TABLE `Announcement` ADD CONSTRAINT `Announcement_fk3` FOREIGN KEY (Type_Product) REFERENCES Type(id);
