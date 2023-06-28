USE proveedores;

CREATE TABLE TiposProveedores (
    tipo_id INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

INSERT INTO TiposProveedores (tipo_id, nombre)
VALUES
    (1, 'Hotel'),
    (2, 'Pista'),
    (3, 'Complemento');
    
CREATE TABLE Proveedores (
    proveedor_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    correo_electronico VARCHAR(255) NOT NULL,
    telefono_contacto VARCHAR(20) NOT NULL,
    tipo_id INT NOT NULL,
    activo BOOLEAN NOT NULL DEFAULT true,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (tipo_id) REFERENCES TiposProveedores (tipo_id)
);

-- Insertar proveedores de pruebas
INSERT INTO Proveedores (nombre, correo_electronico, telefono_contacto, tipo_id, activo)
VALUES
    ('Proveedor A', 'proveedora@example.com', '1234567890', 1, true),
    ('Proveedor B', 'proveedorb@example.com', '9876543210', 2, true),
    ('Proveedor C', 'proveedorc@example.com', '5555555555', 3, false),
	('Proveedor D', 'proveedord@example.com', '1234567890', 2, false),
    ('Proveedor E', 'proveedore@example.com', '9876543210', 2, true),
    ('Proveedor F', 'proveedorf@example.com', '5555555555', 3, false),
    ('Proveedor G', 'proveedorg@example.com', '9999999999', 1, true);