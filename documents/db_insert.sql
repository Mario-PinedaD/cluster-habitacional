-- Insertar usuarios (incluyendo miembros del comité)
INSERT INTO usuarios (u_rfc, u_nombre, u_email, u_password, u_telefono, u_rol) VALUES
-- Comité (3 miembros)
('PRE1234567890', 'Juan Pérez', 'presidente@cluster.com', '$2y$10$abc123', '5551234567', 'presidente'),
('SEC1234567890', 'María López', 'secretaria@cluster.com', '$2y$10$def456', '5552345678', 'secretario'),
('VOC1234567890', 'Carlos García', 'vocal@cluster.com', '$2y$10$ghi789', '5553456789', 'vocal'),

-- Inquilinos (17 registros)
('GAMA800101ABC', 'Ana Martínez', 'ana.martinez@email.com', '$2y$10$jkl012', '5554567890', 'inquilino'),
('ROBL810202DEF', 'Luis Rodríguez', 'luis.rod@email.com', '$2y$10$mno345', '5555678901', 'inquilino'),
('HEGJ820303GHI', 'Jorge Hernández', 'jorge.hdz@email.com', '$2y$10$pqr678', '5556789012', 'inquilino'),
('GOMS830404JKL', 'Sofía Gómez', 'sofia.gomez@email.com', '$2y$10$stu901', '5557890123', 'inquilino'),
('DAPG840505MNO', 'Gabriela Díaz', 'gaby.diaz@email.com', '$2y$10$vwx234', '5558901234', 'inquilino'),
('VASM850606PQR', 'Miguel Vázquez', 'miguel.vz@email.com', '$2y$10$yza567', '5559012345', 'inquilino'),
('LORS860707STU', 'Laura López', 'laura.lpz@email.com', '$2y$10$bcd890', '5550123456', 'inquilino'),
('CARM870808VWX', 'Mario Castro', 'mario.castro@email.com', '$2y$10$efg123', '5551234509', 'inquilino'),
('RERM880909YZA', 'Marcela Reyes', 'marce.reyes@email.com', '$2y$10$hij456', '5552345601', 'inquilino'),
('OIRJ891010BCD', 'José Ortiz', 'jose.ortiz@email.com', '$2y$10$klm789', '5553456702', 'inquilino'),
('MAGM900111EFG', 'Martha Mendoza', 'martha.mdz@email.com', '$2y$10$nop012', '5554567803', 'inquilino'),
('SAGS910212HIJ', 'Salvador Sánchez', 'salvador.s@email.com', '$2y$10$qrs345', '5555678904', 'inquilino'),
('GAPR920313KLM', 'Ricardo García', 'ricardo.g@email.com', '$2y$10$tuv678', '5556789015', 'inquilino'),
('RORM930414NOP', 'Mónica Romero', 'monica.rom@email.com', '$2y$10$wxy901', '5557890126', 'inquilino'),
('FOGL940515QRS', 'Leticia Flores', 'lety.flores@email.com', '$2y$10$zab234', '5558901237', 'inquilino'),
('BARR950616TUV', 'Roberto Bautista', 'roberto.b@email.com', '$2y$10$cde567', '5559012348', 'inquilino'),
('CACJ960717WXY', 'Juan Carlos', 'jc.carlos@email.com', '$2y$10$fgh890', '5550123459', 'inquilino'),
('MARM970818ZAB', 'Manuel Martínez', 'manuel.mtz@email.com', '$2y$10$ijk123', '5551234560', 'inquilino');

-- Insertar las 60 casas del cluster
INSERT INTO casas (c_id, c_numero, c_calle, c_ocupada, fk_u_rfc) VALUES
-- Casas con inquilinos asignados (20 primeras)
(1, '101', 'Calle Principal', TRUE, 'GAMA800101ABC'),
(2, '102', 'Calle Principal', TRUE, 'ROBL810202DEF'),
(3, '103', 'Calle Principal', TRUE, 'HEGJ820303GHI'),
(4, '104', 'Calle Principal', TRUE, 'GOMS830404JKL'),
(5, '105', 'Calle Principal', TRUE, 'DAPG840505MNO'),
(6, '106', 'Calle Principal', TRUE, 'VASM850606PQR'),
(7, '107', 'Calle Principal', TRUE, 'LORS860707STU'),
(8, '108', 'Calle Principal', TRUE, 'CARM870808VWX'),
(9, '109', 'Calle Principal', TRUE, 'RERM880909YZA'),
(10, '110', 'Calle Principal', TRUE, 'OIRJ891010BCD'),
(11, '201', 'Avenida Central', TRUE, 'MAGM900111EFG'),
(12, '202', 'Avenida Central', TRUE, 'SAGS910212HIJ'),
(13, '203', 'Avenida Central', TRUE, 'GAPR920313KLM'),
(14, '204', 'Avenida Central', TRUE, 'RORM930414NOP'),
(15, '205', 'Avenida Central', TRUE, 'FOGL940515QRS'),
(16, '206', 'Avenida Central', TRUE, 'BARR950616TUV'),
(17, '207', 'Avenida Central', TRUE, 'CACJ960717WXY'),
(18, '208', 'Avenida Central', TRUE, 'MARM970818ZAB'),
(19, '209', 'Avenida Central', TRUE, 'PRE1234567890'),  -- Casa del presidente
(20, '210', 'Avenida Central', TRUE, 'SEC1234567890'),  -- Casa del secretario

-- Casas vacías (40 restantes)
(21, '301', 'Calle Norte', FALSE, NULL),
(22, '302', 'Calle Norte', FALSE, NULL),
(23, '303', 'Calle Norte', FALSE, NULL),
(24, '304', 'Calle Norte', FALSE, NULL),
(25, '305', 'Calle Norte', FALSE, NULL),
(26, '306', 'Calle Norte', FALSE, NULL),
(27, '307', 'Calle Norte', FALSE, NULL),
(28, '308', 'Calle Norte', FALSE, NULL),
(29, '309', 'Calle Norte', FALSE, NULL),
(30, '310', 'Calle Norte', FALSE, NULL),
(31, '401', 'Calle Sur', FALSE, NULL),
(32, '402', 'Calle Sur', FALSE, NULL),
(33, '403', 'Calle Sur', FALSE, NULL),
(34, '404', 'Calle Sur', FALSE, NULL),
(35, '405', 'Calle Sur', FALSE, NULL),
(36, '406', 'Calle Sur', FALSE, NULL),
(37, '407', 'Calle Sur', FALSE, NULL),
(38, '408', 'Calle Sur', FALSE, NULL),
(39, '409', 'Calle Sur', FALSE, NULL),
(40, '410', 'Calle Sur', FALSE, NULL),
(41, '501', 'Calle Este', FALSE, NULL),
(42, '502', 'Calle Este', FALSE, NULL),
(43, '503', 'Calle Este', FALSE, NULL),
(44, '504', 'Calle Este', FALSE, NULL),
(45, '505', 'Calle Este', FALSE, NULL),
(46, '506', 'Calle Este', FALSE, NULL),
(47, '507', 'Calle Este', FALSE, NULL),
(48, '508', 'Calle Este', FALSE, NULL),
(49, '509', 'Calle Este', FALSE, NULL),
(50, '510', 'Calle Este', FALSE, NULL),
(51, '601', 'Calle Oeste', FALSE, NULL),
(52, '602', 'Calle Oeste', FALSE, NULL),
(53, '603', 'Calle Oeste', FALSE, NULL),
(54, '604', 'Calle Oeste', FALSE, NULL),
(55, '605', 'Calle Oeste', FALSE, NULL),
(56, '606', 'Calle Oeste', FALSE, NULL),
(57, '607', 'Calle Oeste', FALSE, NULL),
(58, '608', 'Calle Oeste', FALSE, NULL),
(59, '609', 'Calle Oeste', FALSE, NULL),
(60, '610', 'Calle Oeste', FALSE, NULL);

-- Insertar registros de ejemplo en la tabla PAGOS
INSERT INTO pagos (fk_u_rfc, fk_c_id, p_monto, p_recargo, p_mes_pagado, p_fecha_pago, p_metodo_pago, p_comprobante, p_acuse_enviado) VALUES
-- Pagos al corriente
('GAMA800101ABC', 1, 2500.00, 0.00, '2023-01-01', '2023-01-05 10:30:00', 'transferencia', 'comp001.pdf', TRUE),
('ROBL810202DEF', 2, 2500.00, 0.00, '2023-01-01', '2023-01-05 11:15:00', 'efectivo', NULL, TRUE),
('HEGJ820303GHI', 3, 2500.00, 0.00, '2023-01-01', '2023-01-06 09:45:00', 'tarjeta', 'comp003.pdf', TRUE),

-- Pagos con recargo
('GOMS830404JKL', 4, 2500.00, 500.00, '2023-01-01', '2023-01-15 14:20:00', 'transferencia', 'comp004.pdf', TRUE),
('DAPG840505MNO', 5, 2500.00, 750.00, '2023-01-01', '2023-01-20 16:10:00', 'efectivo', NULL, FALSE),

-- Pagos de meses diferentes
('VASM850606PQR', 6, 2500.00, 0.00, '2023-02-01', '2023-02-03 10:00:00', 'transferencia', 'comp006.pdf', TRUE),
('LORS860707STU', 7, 2500.00, 0.00, '2023-02-01', '2023-02-04 12:30:00', 'tarjeta', 'comp007.pdf', TRUE),
('CARM870808VWX', 8, 2500.00, 250.00, '2023-02-01', '2023-02-12 15:45:00', 'transferencia', 'comp008.pdf', TRUE),

-- Pago del presidente (miembro del comité)
('PRE1234567890', 19, 2500.00, 0.00, '2023-01-01', '2023-01-03 08:15:00', 'transferencia', 'comp019.pdf', TRUE);

-- Insertar registros de ejemplo en la tabla EGRESOS
INSERT INTO egresos (e_monto, e_beneficiario, e_fecha, e_motivo, e_responsable, e_comprobante, fk_u_rfc) VALUES
-- Mantenimiento
(1200.50, 'Servicios de Jardinería SA', '2023-01-10 12:00:00', 'Podado de áreas verdes y mantenimiento de jardines', 'presidente', 'egr001.pdf', 'PRE1234567890'),
(850.00, 'Limpieza Profesional', '2023-01-15 13:30:00', 'Limpieza de áreas comunes y alberca', 'secretario', 'egr002.pdf', 'SEC1234567890'),

-- Reparaciones
(3200.00, 'Electricidad y Más', '2023-01-20 14:15:00', 'Reparación de luminarias en calle principal', 'presidente', 'egr003.pdf', 'PRE1234567890'),
(1500.00, 'Fontanería Rápida', '2023-02-05 10:45:00', 'Reparación de fuga en tubería principal', 'vocal', 'egr004.pdf', 'VOC1234567890'),

-- Suministros
(780.50, 'Suministros de Oficina', '2023-02-10 11:20:00', 'Material de oficina para administración', 'secretario', 'egr005.pdf', 'SEC1234567890'),
(450.00, 'Agua Purificada', '2023-02-12 09:30:00', 'Garrafones para reunión de comité', 'vocal', NULL, 'VOC1234567890'),

-- Eventos
(2000.00, 'Fiestas y Eventos', '2023-02-15 16:00:00', 'Organización de reunión vecinal', 'presidente', 'egr007.pdf', 'PRE1234567890');

-- Insertar registros de ejemplo en la tabla RESERVACIONES
INSERT INTO reservaciones (fk_u_rfc, fk_c_id, r_tipo, r_fecha, r_hora_inicio, r_hora_fin, r_estado, r_fecha_solicitud) VALUES
-- Reservas aprobadas
('GAMA800101ABC', 1, 'palapa', '2023-03-05', '14:00:00', '18:00:00', 'aprobada', '2023-02-28 10:15:00'),
('ROBL810202DEF', 2, 'alberca', '2023-03-06', '10:00:00', '12:00:00', 'aprobada', '2023-02-28 11:30:00'),
('HEGJ820303GHI', 3, 'palapa', '2023-03-12', '16:00:00', '20:00:00', 'aprobada', '2023-03-01 09:45:00'),

-- Reservas pendientes
('GOMS830404JKL', 4, 'alberca', '2023-03-18', '11:00:00', '13:00:00', 'pendiente', '2023-03-10 14:20:00'),
('DAPG840505MNO', 5, 'palapa', '2023-03-20', '15:00:00', '19:00:00', 'pendiente', '2023-03-11 16:10:00'),

-- Reservas rechazadas (por horario conflictivo)
('VASM850606PQR', 6, 'alberca', '2023-03-06', '11:30:00', '13:30:00', 'rechazada', '2023-03-01 10:00:00'),
('LORS860707STU', 7, 'palapa', '2023-03-12', '17:00:00', '21:00:00', 'rechazada', '2023-03-02 12:30:00'),

-- Reserva de miembro del comité
('PRE1234567890', 19, 'palapa', '2023-03-25', '12:00:00', '16:00:00', 'aprobada', '2023-03-15 08:15:00');

-- Insertar registros de ejemplo en la tabla SOLICITUDES
INSERT INTO solicitudes (fk_u_rfc, fk_c_id, s_titulo, s_descripcion, s_fecha, s_estado, s_respuesta, s_fecha_respuesta, fk_responsable_rfc) VALUES
-- Solicitudes completadas
('GAMA800101ABC', 1, 'Fuga de agua', 'Hay una fuga de agua en el jardín de mi casa', '2023-01-05 08:30:00', 'completada', 'Reparación completada por fontanero el 06/01/2023', '2023-01-07 10:00:00', 'PRE1234567890'),
('ROBL810202DEF', 2, 'Lámpara rota', 'La lámpara en la entrada de mi casa no funciona', '2023-01-10 09:15:00', 'completada', 'Lámpara reemplazada el 11/01/2023', '2023-01-11 14:30:00', 'SEC1234567890'),

-- Solicitudes en proceso
('HEGJ820303GHI', 3, 'Poda de árbol', 'Las ramas del árbol frente a mi casa están muy largas', '2023-02-15 10:45:00', 'en_proceso', 'Programada para poda en la próxima semana', '2023-02-16 11:20:00', 'VOC1234567890'),
('GOMS830404JKL', 4, 'Ruido excesivo', 'Vecinos hacen ruido excesivo después de las 11pm', '2023-02-20 07:30:00', 'en_proceso', 'Se hablará con los vecinos involucrados', '2023-02-21 09:15:00', 'PRE1234567890'),

-- Solicitudes pendientes
('DAPG840505MNO', 5, 'Bache en calle', 'Hay un bache grande en la calle frente a mi casa', '2023-03-01 14:20:00', 'pendiente', NULL, NULL, NULL),
('VASM850606PQR', 6, 'Solicitud de estacionamiento', 'Necesito un espacio de estacionamiento adicional', '2023-03-05 16:10:00', 'pendiente', NULL, NULL, NULL),

-- Solicitudes rechazadas
('LORS860707STU', 7, 'Cambio de casa', 'Quisiera cambiarme a una casa más grande', '2023-01-25 11:30:00', 'rechazada', 'No hay casas más grandes disponibles actualmente', '2023-01-27 15:00:00', 'SEC1234567890'),
('CARM870808VWX', 8, 'Instalación de alarma', 'Quiero instalar una alarma en mi casa', '2023-02-10 09:45:00', 'rechazada', 'No está permitido modificar las instalaciones eléctricas sin autorización', '2023-02-12 10:30:00', 'VOC1234567890'),

-- Solicitud de miembro del comité
('PRE1234567890', 19, 'Reunión de vecinos', 'Organizar reunión mensual de vecinos', '2023-03-10 08:15:00', 'completada', 'Reunión programada para el 25/03/2023', '2023-03-12 09:00:00', 'SEC1234567890');