-- =====================================================
--  ACTUALIZACIÓN TABLA USUARIOS - TRUEBUILD PC
-- =====================================================

-- Backup de la tabla anterior (opcional)
-- CREATE TABLE usuarios_backup AS SELECT * FROM usuarios;

-- Eliminar tabla anterior si existe
DROP TABLE IF EXISTS `usuarios`;

-- Crear tabla usuarios con estructura correcta
CREATE TABLE `usuarios` (
  `id_Usuario` int(20) NOT NULL AUTO_INCREMENT,
  `nombreU` varchar(50) NOT NULL,
  `apellidoU` varchar(50) NOT NULL,
  `emailU` varchar(100) NOT NULL UNIQUE,
  `contraseñaU` varchar(255) NOT NULL,
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_Usuario`),
  KEY `idx_emailU` (`emailU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1;

-- Insertar usuarios de ejemplo (opcional)
INSERT INTO `usuarios` (`nombreU`, `apellidoU`, `emailU`, `contraseñaU`) VALUES
('Juan', 'Pérez', 'juan@example.com', '123456'),
('María', 'García', 'maria@example.com', 'password123');

-- =====================================================
--  ÍNDICES PARA MEJOR RENDIMIENTO
-- =====================================================
ALTER TABLE `usuarios` ADD INDEX `idx_email_contraseña` (`emailU`, `contraseñaU`);
