CREATE DATABASE drive_loc;
USE drive_loc;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('client', 'admin') DEFAULT 'client',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE vehicules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modele VARCHAR(100) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    disponibilite BOOLEAN DEFAULT TRUE,
    categorie_id INT,
    FOREIGN KEY (categorie_id) REFERENCES categories(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    vehicule_id INT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    statut ENUM('en attente', 'approuvée', 'refusée') DEFAULT 'en attente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (vehicule_id) REFERENCES vehicules(id)
);

CREATE TABLE avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reservation_id INT,
    user_id INT,
    vehicule_id INT,
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reservation_id) REFERENCES reservations(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (vehicule_id) REFERENCES vehicules(id)
);

CREATE TABLE statistiques (
    id INT AUTO_INCREMENT PRIMARY KEY,
    total_clients INT DEFAULT 0,
    total_reservations INT DEFAULT 0,
    reservations_approuvees INT DEFAULT 0,
    reservations_en_attente INT DEFAULT 0,
    reservations_refusees INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
