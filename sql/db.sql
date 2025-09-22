-- SQL para XAMPP (MySQL)
-- Crear base de datos y tablas
CREATE DATABASE IF NOT EXISTS alojamientos_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE alojamientos_db;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  is_admin TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS accommodations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  price DECIMAL(10,2) DEFAULT 0,
  image VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS user_accommodations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  alojamiento_id INT NOT NULL,
  added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (alojamiento_id) REFERENCES accommodations(id) ON DELETE CASCADE,
  UNIQUE KEY uk_user_aloj (user_id, alojamiento_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed: algunos alojamientos de ejemplo
INSERT INTO accommodations (title,description,price,image) VALUES
('Casa en la playa','Hermosa casa frente al mar, 3 habitaciones, cocina completa.','120.00','https://picsum.photos/seed/1/600/400'),
('Departamento céntrico','Departamento a pasos del centro, ideal para parejas.','75.00','https://picsum.photos/seed/2/600/400'),
('Cabaña en las montañas','Cabaña rústica con vista a la montaña y parrilla.','90.00','https://picsum.photos/seed/3/600/400');
