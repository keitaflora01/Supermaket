CREATE TABLE Produit(
    Code SERIAL NOT NULL PRIMARY KEY,
    Designation VARCHAR(50) NOT NULL,
    Prix_Unitaire INT not NULL,
    Quantite INT NOT NULL,
    Minimum INT NOT NULL
);

CREATE TABLE Fournisseur(
    Id SERIAL NOT NULL PRIMARY KEY,
    Nom VARCHAR(20) NOT NULL,
    Telephone VARCHAR(20) NOT NULL,
    Ville VARCHAR(20) NOT NULL
);

CREATE TYPE order_status AS ENUM ('Done', 'Pending');

CREATE TABLE Commande(
    Id SERIAL NOT NULL PRIMARY KEY,
    Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status order_status,
    Id_Fournisseur INT NOT NULL,
    FOREIGN KEY(Id_Fournisseur) REFERENCES Fournisseur(Id)
);

CREATE TABLE Reception(
    Id SERIAL NOT NULL PRIMARY KEY, 
    Date_Reception TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Id_Commande INT NOT NULL,
    FOREIGN KEY (Id_Commande)REFERENCES Commande(Id)
);

CREATE TABLE Facture(
    Id SERIAL NOT NULL PRIMARY KEY,
    Date_Creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status order_status,
    Montant INT NOT NULL,
    Id_Reception INT NOT NULL,
    FOREIGN KEY (Id_Reception) REFERENCES Reception(Id)
);

CREATE TABLE Detail_Commande (
    Id SERIAL NOT NULL PRIMARY KEY,
    Quantite INT NOT NULL,
    Id_Produit INT NOT NULL,
    Id_Commande INT NOT NULL,
    FOREIGN KEY (Id_Produit) REFERENCES Produit(code),
    FOREIGN KEY (Id_Commande) REFERENCES Commande(Id)
);

CREATE TABLE Detail_Reception(
    Id SERIAL NOT NULL PRIMARY KEY,
    Quantite INT NOT NULL,
    Prix_Unitaire INT NOT NULL,
    Id_Produit INT NOT NULL,
    Id_Commande INT NOT NULL,
    FOREIGN KEY (Id_Produit) REFERENCES Produit(code),
    FOREIGN KEY (Id_Commande) REFERENCES Commande(Id)
);