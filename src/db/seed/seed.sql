-- Crear la base de datos
CREATE DATABASE salas_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE salas_db;

-- Crear la tabla roles
CREATE TABLE roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(45) NOT NULL
);

-- Crear la tabla usuarios
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    telefono VARCHAR(15),
    estado BOOLEAN,
    fk_rol INT NOT NULL,
    FOREIGN KEY (fk_rol) REFERENCES roles(id_rol)
);

-- Crear la tabla salas
CREATE TABLE salas (
    id_sala INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    capacidad INT NOT NULL,
    precio_hora DECIMAL(10, 2) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    foto VARCHAR(255)
);

-- Crear la tabla reservas
CREATE TABLE reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATETIME NOT NULL,
    horas_reservadas INT NOT NULL,
    estado ENUM('Confirmada', 'Pendiente', 'Cancelada', 'Completada') NOT NULL,
    fk_usuario INT NOT NULL,
    fk_sala INT NOT NULL,
    FOREIGN KEY (fk_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (fk_sala) REFERENCES salas(id_sala)
);

-- Crear la tabla equipos
CREATE TABLE equipos (
    id_equipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fk_sala INT NOT NULL,
    foto VARCHAR(255),
    FOREIGN KEY (fk_sala) REFERENCES salas(id_sala)
);

-- Crear la tabla imagenes_salas
CREATE TABLE imagenes_salas (
    id_imagen INT AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(255) NOT NULL,
    fk_sala INT NOT NULL,
    FOREIGN KEY (fk_sala) REFERENCES salas(id_sala)
);

-- Crear la tabla reseñas
CREATE TABLE reseñas (
    id_resena INT AUTO_INCREMENT PRIMARY KEY,
    comentario TEXT NOT NULL,
    puntaje INT CHECK (puntaje BETWEEN 1 AND 5),
    fecha DATETIME NOT NULL,
    fk_usuario INT NOT NULL,
    fk_sala INT NOT NULL,
    FOREIGN KEY (fk_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (fk_sala) REFERENCES salas(id_sala)
);

-- Crear la tabla horarios_disponibles
CREATE TABLE horarios_disponibles (
    id_horario INT AUTO_INCREMENT PRIMARY KEY,
    dia_semana VARCHAR(20) NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fin TIME NOT NULL,
    fk_sala INT NOT NULL,
    FOREIGN KEY (fk_sala) REFERENCES salas(id_sala)
);


-- Insertar datos en la tabla salas
INSERT INTO salas (nombre, descripcion, capacidad, precio_hora, direccion, foto) VALUES
('Sala Rock', 'Espacio ideal para bandas de rock con batería y amplificadores', 10, 1500.00, 'Av. Libertad 123, Buenos Aires', '../public/imgs/rooms/01.jpg'),
('Sala Jazz', 'Sala acondicionada acústicamente para ensayos de jazz y blues', 8, 1200.00, 'Calle San Martín 456, Córdoba', '../public/imgs/rooms/02.webp'),
('Sala Acústica', 'Perfecta para ensayos íntimos y acústicos', 5, 800.00, 'Av. Rivadavia 789, Rosario', '../public/imgs/rooms/03.jpg'),
('Sala Electrónica', 'Sala equipada con controladores MIDI y sintetizadores para música electrónica', 6, 1000.00, 'Calle Independencia 234, Buenos Aires', '../public/imgs/rooms/04.webp'),
('Sala Pop', 'Espacio diseñado para ensayos de pop y música ligera', 8, 1100.00, 'Av. Callao 345, Mendoza', '../public/imgs/05.jpg'),
('Sala Experimental', 'Un espacio único con efectos de sonido y atmósfera inmersiva', 7, 1300.00, 'Calle Belgrano 567, La Plata', '../public/imgs/rooms/06.jpg'),
('Sala Metal', 'Sala robusta para bandas de metal con doble pedal y amplificadores de alta potencia', 12, 1700.00, 'Av. Santa Fe 678, Buenos Aires', '../public/imgs/rooms/07.jpg'),
('Sala Clásica', 'Sala insonorizada con piano de cola, ideal para ensayos de música clásica', 4, 2000.00, 'Calle Córdoba 123, Rosario', '../public/imgs/rooms/08.avif'),
('Sala Urbana', 'Espacio versátil para rap, trap y freestyle con micrófonos de alta calidad', 6, 900.00, 'Av. Corrientes 345, Buenos Aires', '../public/imgs/rooms/09.jpg');

-- Insertar datos en la tabla roles
INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'admin'),
(2, 'usuario');

-- Insertar datos en la tabla usuarios
INSERT INTO usuarios (nombre, email, contrasena, telefono, estado, fk_rol) VALUES
('Juan Pérez', 'juan.perez@example.com', '1234', '1234567890', true, 2),
('Ana López', 'ana.lopez@example.com', 'abcd', '0987654321', true, 2),
('Carlos Gómez', 'carlos.gomez@example.com', 'qwerty', '1122334455', true, 2),
('Administrador', 'admin@gmail.com', '123456', '', true, 1);



-- Insertar datos en la tabla reservas
INSERT INTO reservas (fecha, horas_reservadas, estado, fk_usuario, fk_sala) VALUES
('2024-11-25 10:00:00', 2, 'Confirmada', 1, 1),
('2024-11-26 14:00:00', 3, 'Pendiente', 2, 2),
('2024-11-27 18:00:00', 1, 'Cancelada', 3, 3);

-- Insertar datos en la tabla equipos
INSERT INTO equipos (nombre, descripcion, fk_sala, foto) VALUES
('Amplificador Marshall', 'Amplificador de guitarra con excelente calidad de sonido', 1,'../public/imgs/equipos/marshall.jpeg'),
('Batería Pearl', 'Batería completa con platos Zildjian', 1,'../public/imgs/equipos/bateria-pearl.jpg'),
('Micrófono Shure SM58', 'Micrófono vocal dinámico ideal para presentaciones en vivo', 2 ,'../public/imgs/equipos/shure-sm58.jpg'),
('Piano Eléctrico Yamaha', 'Teclado eléctrico con varias configuraciones de sonido', 3,'../public/imgs/equipos/yamaha.jpg');

-- Insertar datos en la tabla imagenes_salas
INSERT INTO imagenes_salas (url, fk_sala) VALUES
('https://example.com/sala1.jpg', 1),
('https://example.com/sala2.jpg', 2),
('https://example.com/sala3.jpg', 3);

-- Insertar datos en la tabla reseñas
INSERT INTO reseñas (comentario, puntaje, fecha, fk_usuario, fk_sala) VALUES
('Excelente sala, muy bien equipada', 5, '2024-11-25 12:00:00', 1, 1),
('Buena acústica, pero faltaban algunos equipos', 4, '2024-11-26 16:30:00', 2, 2),
('Demasiado pequeña para bandas grandes', 3, '2024-11-27 20:00:00', 3, 3);

-- Insertar datos en la tabla horarios_disponibles
INSERT INTO horarios_disponibles (dia_semana, hora_inicio, hora_fin, fk_sala) VALUES
('Lunes', '09:00:00', '21:00:00', 1),
('Martes', '10:00:00', '22:00:00', 2),
('Miércoles', '08:00:00', '20:00:00', 3);
