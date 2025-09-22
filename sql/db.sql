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
  location VARCHAR(120),
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
INSERT INTO accommodations (title,description,location,price,image) VALUES
('Apartamento moderno','Apartamento equipado con aire acondicionado, cocina integral y balcón.','San Salvador','85.00','https://i.pinimg.com/736x/2f/18/97/2f1897f16249be03f008baa391eb61bf.jpg'),
('Villa con piscina privada','Villa exclusiva con piscina y terraza, ideal para grupos o familias.','La Libertad','150.00','https://stillframerender.com/wp-content/uploads/2023/11/04-Hotel-boutique-65-Fachada-General-Servicio-de-Renders-fotorrealistas.jpg'),
('Hotel boutique en el centro','Pequeño hotel con habitaciones modernas, WiFi y desayuno incluido.','San Miguel','110.00','https://stillframerender.com/wp-content/uploads/2023/11/04-Hotel-boutique-65-Fachada-General-Servicio-de-Renders-fotorrealistas.jpg'),
('Casa familiar amplia','Casa de 5 habitaciones, garaje, jardín y cocina equipada.','Ahuachapán','130.00','https://casasyfachadas.com/wp-content/uploads/2014/08/Vetra-MK2-by-Carlisle-Homes-800x445.jpg'),
('Royal Decameron Salinitas','Resort todo incluido frente al mar, con piscinas, restaurantes y actividades acuáticas.','Sonsonate','180.00','https://multivacaciones.com/wp-content/uploads/hotel-grand-decameron-salinitas-8.jpg'),
('Hotel de Montaña Cerro Verde','Hotel ubicado dentro del Parque Nacional Cerro Verde, con vistas al volcán Izalco y Santa Ana.','Santa Ana','95.00','https://www.mitur.gob.sv/wp-content/uploads/2021/10/DJI_0177.jpg'),
('Hotel Miraflores','Hotel cómodo y con buena vista al mar, ofrece desayuno incluido.','San Miguel','55.00','https://images.trvl-media.com/lodging/7000000/6620000/6614800/6614748/f3653150.jpg?impolicy=resizecrop&amp;rw=575&amp;rh=575&amp;ra=fill');
