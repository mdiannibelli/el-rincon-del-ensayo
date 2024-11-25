-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2024 a las 02:20:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `salas_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fk_sala` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `descripcion`, `fk_sala`, `foto`) VALUES
(1, 'Amplificador Marshall', 'Amplificador de guitarra con excelente calidad de sonido', 1, '../public/imgs/equipos/marshall.jpeg'),
(2, 'Batería Pearl', 'Batería completa con platos Zildjian', 1, '../public/imgs/equipos/bateria-pearl.jpg'),
(3, 'Micrófono Shure SM58', 'Micrófono vocal dinámico ideal para presentaciones en vivo', 2, '../public/imgs/equipos/shure-sm58.jpg'),
(4, 'Piano Eléctrico Yamaha', 'Teclado eléctrico con varias configuraciones de sonido', 3, '../public/imgs/equipos/yamaha.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_disponibles`
--

CREATE TABLE `horarios_disponibles` (
  `id_horario` int(11) NOT NULL,
  `dia_semana` varchar(20) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `fk_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios_disponibles`
--

INSERT INTO `horarios_disponibles` (`id_horario`, `dia_semana`, `hora_inicio`, `hora_fin`, `fk_sala`) VALUES
(1, 'Lunes', '09:00:00', '21:00:00', 1),
(2, 'Martes', '10:00:00', '22:00:00', 2),
(3, 'Miércoles', '08:00:00', '20:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_salas`
--

CREATE TABLE `imagenes_salas` (
  `id_imagen` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `fk_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_salas`
--

INSERT INTO `imagenes_salas` (`id_imagen`, `url`, `fk_sala`) VALUES
(1, 'https://example.com/sala1.jpg', 1),
(2, 'https://example.com/sala2.jpg', 2),
(3, 'https://example.com/sala3.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `horas_reservadas` int(11) NOT NULL,
  `estado` enum('Confirmada','Pendiente','Cancelada','Completada') NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `fecha`, `horas_reservadas`, `estado`, `fk_usuario`, `fk_sala`) VALUES
(1, '2024-11-25 10:00:00', 2, 'Confirmada', 1, 1),
(2, '2024-11-26 14:00:00', 3, 'Pendiente', 2, 2),
(3, '2024-11-27 18:00:00', 1, 'Cancelada', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `id_resena` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `puntaje` int(11) DEFAULT NULL CHECK (`puntaje` between 1 and 5),
  `fecha` datetime NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`id_resena`, `comentario`, `puntaje`, `fecha`, `fk_usuario`, `fk_sala`) VALUES
(1, 'Excelente sala, muy bien equipada', 5, '2024-11-25 12:00:00', 1, 1),
(2, 'Buena acústica, pero faltaban algunos equipos', 4, '2024-11-26 16:30:00', 2, 2),
(3, 'Demasiado pequeña para bandas grandes', 3, '2024-11-27 20:00:00', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'admin'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `capacidad` int(11) NOT NULL,
  `precio_hora` decimal(10,2) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id_sala`, `nombre`, `descripcion`, `capacidad`, `precio_hora`, `direccion`, `foto`) VALUES
(1, 'Sala Rock', 'Espacio ideal para bandas de rock con batería y amplificadores', 10, 1500.00, 'Av. Libertad 123, Buenos Aires', '../public/imgs/rooms/01.jpg'),
(2, 'Sala Jazz', 'Sala acondicionada acústicamente para ensayos de jazz y blues', 8, 1200.00, 'Calle San Martín 456, Córdoba', '../public/imgs/rooms/02.webp'),
(3, 'Sala Acústica', 'Perfecta para ensayos íntimos y acústicos', 5, 800.00, 'Av. Rivadavia 789, Rosario', '../public/imgs/rooms/03.jpg'),
(4, 'Sala Electrónica', 'Sala equipada con controladores MIDI y sintetizadores para música electrónica', 6, 1000.00, 'Calle Independencia 234, Buenos Aires', '../public/imgs/rooms/04.webp'),
(5, 'Sala Pop', 'Espacio diseñado para ensayos de pop y música ligera', 8, 1100.00, 'Av. Callao 345, Mendoza', '../public/imgs/05.jpg'),
(6, 'Sala Experimental', 'Un espacio único con efectos de sonido y atmósfera inmersiva', 7, 1300.00, 'Calle Belgrano 567, La Plata', '../public/imgs/rooms/06.jpg'),
(7, 'Sala Metal', 'Sala robusta para bandas de metal con doble pedal y amplificadores de alta potencia', 12, 1700.00, 'Av. Santa Fe 678, Buenos Aires', '../public/imgs/rooms/07.jpg'),
(8, 'Sala Clásica', 'Sala insonorizada con piano de cola, ideal para ensayos de música clásica', 4, 2000.00, 'Calle Córdoba 123, Rosario', '../public/imgs/rooms/08.avif'),
(9, 'Sala Urbana', 'Espacio versátil para rap, trap y freestyle con micrófonos de alta calidad', 6, 900.00, 'Av. Corrientes 345, Buenos Aires', '../public/imgs/rooms/09.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fk_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `contrasena`, `telefono`, `estado`, `fk_rol`) VALUES
(1, 'Juan Pérez', 'juan.perez@example.com', '1234', '1234567890', 1, 2),
(2, 'Ana López', 'ana.lopez@example.com', 'abcd', '0987654321', 1, 2),
(3, 'Carlos Gómez', 'carlos.gomez@example.com', 'qwerty', '1122334455', 1, 2),
(4, 'Administrador', 'admin@gmail.com', '123456', '', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `fk_sala` (`fk_sala`);

--
-- Indices de la tabla `horarios_disponibles`
--
ALTER TABLE `horarios_disponibles`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `fk_sala` (`fk_sala`);

--
-- Indices de la tabla `imagenes_salas`
--
ALTER TABLE `imagenes_salas`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_sala` (`fk_sala`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_sala` (`fk_sala`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`id_resena`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_sala` (`fk_sala`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_rol` (`fk_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `horarios_disponibles`
--
ALTER TABLE `horarios_disponibles`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes_salas`
--
ALTER TABLE `imagenes_salas`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id_resena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`fk_sala`) REFERENCES `salas` (`id_sala`);

--
-- Filtros para la tabla `horarios_disponibles`
--
ALTER TABLE `horarios_disponibles`
  ADD CONSTRAINT `horarios_disponibles_ibfk_1` FOREIGN KEY (`fk_sala`) REFERENCES `salas` (`id_sala`);

--
-- Filtros para la tabla `imagenes_salas`
--
ALTER TABLE `imagenes_salas`
  ADD CONSTRAINT `imagenes_salas_ibfk_1` FOREIGN KEY (`fk_sala`) REFERENCES `salas` (`id_sala`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`fk_sala`) REFERENCES `salas` (`id_sala`);

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `reseñas_ibfk_2` FOREIGN KEY (`fk_sala`) REFERENCES `salas` (`id_sala`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
