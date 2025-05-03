-- Inicialización de la base de datos
CREATE DATABASE IF NOT EXISTS web_proyect;
USE web_proyect;

-- Eliminar tablas si existen (en orden correcto por dependencias)
DROP TABLE IF EXISTS solicitudes, reservaciones, egresos, pagos, comite_historico, casas, usuarios;

-- Tabla de usuarios
CREATE TABLE usuarios (
    u_rfc VARCHAR(13) PRIMARY KEY,
    u_nombre VARCHAR(100) NOT NULL,
    u_email VARCHAR(100) UNIQUE NOT NULL,
    u_password VARCHAR(255) NOT NULL,
    u_telefono VARCHAR(20),
    u_rol ENUM('inquilino', 'presidente', 'secretario', 'vocal') NOT NULL,
    u_fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    u_activo BOOLEAN DEFAULT TRUE
);

-- Tabla de casas
CREATE TABLE casas (
    c_id SMALLINT(2) PRIMARY KEY,
    c_numero VARCHAR(10) UNIQUE NOT NULL,
    c_calle VARCHAR(50),
    c_ocupada BOOLEAN DEFAULT TRUE,
    fk_u_rfc VARCHAR(13),
    FOREIGN KEY (fk_u_rfc) REFERENCES usuarios(u_rfc) ON DELETE SET NULL
);

-- Tabla de pagos
CREATE TABLE pagos (
    p_id INT AUTO_INCREMENT PRIMARY KEY,
    fk_u_rfc VARCHAR(13) NOT NULL,
    fk_c_id SMALLINT(2) NOT NULL,
    p_monto DECIMAL(10,2) NOT NULL,
    p_recargo DECIMAL(10,2) DEFAULT 0.00,
    p_mes_pagado DATE NOT NULL,  -- Primer día del mes pagado
    p_fecha_pago DATETIME DEFAULT CURRENT_TIMESTAMP,
    p_metodo_pago ENUM('efectivo', 'transferencia', 'tarjeta') NOT NULL,
    p_comprobante VARCHAR(255),
    p_acuse_enviado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (fk_u_rfc) REFERENCES usuarios(u_rfc),
    FOREIGN KEY (fk_c_id) REFERENCES casas(c_id),
    UNIQUE KEY (fk_c_id, p_mes_pagado)
);

-- Tabla de egresos (corregida para usar u_rfc)
CREATE TABLE egresos (
    e_id INT AUTO_INCREMENT PRIMARY KEY,
    e_monto DECIMAL(10,2) NOT NULL,
    e_beneficiario VARCHAR(100) NOT NULL,
    e_fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    e_motivo TEXT NOT NULL,
    e_responsable ENUM('presidente', 'secretario', 'vocal') NOT NULL,
    e_comprobante VARCHAR(255),
    fk_u_rfc VARCHAR(13) NOT NULL,  -- Usuario que registró el egreso
    FOREIGN KEY (fk_u_rfc) REFERENCES usuarios(u_rfc)
);

-- Tabla de reservaciones (corregida)
CREATE TABLE reservaciones (
    r_id INT AUTO_INCREMENT PRIMARY KEY,
    fk_u_rfc VARCHAR(13) NOT NULL,
    fk_c_id SMALLINT(2) NOT NULL,
    r_tipo ENUM('palapa', 'alberca') NOT NULL,
    r_fecha DATE NOT NULL,
    r_hora_inicio TIME NOT NULL,
    r_hora_fin TIME NOT NULL,
    r_estado ENUM('pendiente', 'aprobada', 'rechazada') DEFAULT 'pendiente',
    r_fecha_solicitud DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (fk_u_rfc) REFERENCES usuarios(u_rfc),
    FOREIGN KEY (fk_c_id) REFERENCES casas(c_id),
    UNIQUE KEY (r_tipo, r_fecha, r_hora_inicio)
);

-- Tabla de solicitudes (completamente corregida)
CREATE TABLE solicitudes (
    s_id INT AUTO_INCREMENT PRIMARY KEY,
    fk_u_rfc VARCHAR(13) NOT NULL,
    fk_c_id SMALLINT(2) NOT NULL,
    s_titulo VARCHAR(100) NOT NULL,
    s_descripcion TEXT NOT NULL,
    s_fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    s_estado ENUM('pendiente', 'en_proceso', 'completada', 'rechazada') DEFAULT 'pendiente',
    s_respuesta TEXT,
    s_fecha_respuesta DATETIME,
    fk_responsable_rfc VARCHAR(13),  -- Miembro del comité que respondió
    FOREIGN KEY (fk_u_rfc) REFERENCES usuarios(u_rfc),
    FOREIGN KEY (fk_c_id) REFERENCES casas(c_id),
    FOREIGN KEY (fk_responsable_rfc) REFERENCES usuarios(u_rfc)
);

-- Tabla de notificaciones (nueva)
/*CREATE TABLE notificaciones (
    n_id INT AUTO_INCREMENT PRIMARY KEY,
    fk_u_rfc VARCHAR(13) NOT NULL,
    n_titulo VARCHAR(100) NOT NULL,
    n_mensaje TEXT NOT NULL,
    n_leida BOOLEAN DEFAULT FALSE,
    n_fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    n_tipo ENUM('pago', 'reserva', 'solicitud', 'general') NOT NULL,
    n_referencia_id INT,  -- ID del elemento relacionado
    FOREIGN KEY (fk_u_rfc) REFERENCES usuarios(u_rfc)
);

-- Tabla histórica del comité (corregida)
CREATE TABLE comite_historico (
    ch_id INT AUTO_INCREMENT PRIMARY KEY,
    fk_u_rfc VARCHAR(13) NOT NULL,
    ch_rol ENUM('presidente', 'secretario', 'vocal') NOT NULL,
    ch_fecha_inicio DATE NOT NULL,
    ch_fecha_fin DATE,
    ch_activo BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (fk_u_rfc) REFERENCES usuarios(u_rfc)
)
*/