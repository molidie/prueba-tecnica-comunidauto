CREATE TABLE vehiculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    anio INT NOT NULL,
    precio DECIMAL(12,2) NOT NULL,
    estado ENUM('disponible','vendido') DEFAULT 'disponible'
);

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    telefono VARCHAR(20)
);

CREATE TABLE forma_pago (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(30) NOT NULL
);

CREATE TABLE ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    vehiculo_id INT NOT NULL,
    forma_pago_id INT NOT NULL,
    fecha_venta DATE NOT NULL,
    
    FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id),
    FOREIGN KEY (forma_pago_id) REFERENCES forma_pago(id)
);

-- insert de formas de pago

INSERT INTO forma_pago (descripcion) VALUES
('Efectivo'),
('Transferencia');

-- insert de clientes

INSERT INTO clientes (nombre, apellido, email, telefono) VALUES
('Juan', 'Pérez', 'juan@gmail.com', '1111-1111'),
('Ana', 'Gómez', 'ana@gmail.com', '2222-2222'),
('Luis', 'Martínez', 'luis@gmail.com', '3333-3333'),
('María', 'López', 'maria@gmail.com', '4444-4444'),
('Carlos', 'Ramos', 'carlos@gmail.com', '5555-5555'),
('Lucía', 'Fernández', 'lucia@gmail.com', '6666-6666'),
('Pedro', 'Torres', 'pedro@gmail.com', '7777-7777'),
('Sofía', 'Silva', 'sofia@gmail.com', '8888-8888'),
('Miguel', 'Duarte', 'miguel@gmail.com', '9999-9999'),
('Julieta', 'Sosa', 'julieta@gmail.com', '1010-1010');

-- insert de vehiculos

INSERT INTO vehiculos (marca, modelo, anio, precio) VALUES
('Toyota', 'Corolla', 2019, 9000000),
('Ford', 'Fiesta', 2018, 6500000),
('Chevrolet', 'Cruze', 2021, 11000000),
('Volkswagen', 'Gol', 2020, 7200000),
('Honda', 'Civic', 2022, 15000000),
('Renault', 'Clio', 2017, 5800000),
('Peugeot', '208', 2023, 13000000),
('Fiat', 'Cronos', 2022, 12500000),
('Ford', 'Focus', 2020, 10000000),
('Nissan', 'Versa', 2021, 11200000);


-- insert de ventas

INSERT INTO ventas (cliente_id, vehiculo_id, forma_pago_id, fecha_venta) VALUES
(1, 3, 1, '2024-01-10'),
(2, 5, 2, '2024-02-15'),
(3, 1, 1, '2024-02-20'),
(4, 7, 1, '2024-03-05'),
(5, 2, 2, '2024-03-18'),
(6, 4, 1, '2024-03-20'),
(7, 9, 2, '2024-04-01'),
(8, 6, 1, '2024-04-02'),
(9, 8, 1, '2024-04-10'),
(10, 10, 2, '2024-04-15');



-- 1️⃣ Todas las ventas realizadas por un mismo cliente
SELECT * FROM ventas
WHERE cliente_id = 1;

-- 2️⃣ Todos los vehículos con año mayor a 2020
SELECT * FROM vehiculos
WHERE anio > 2020;

-- 3️⃣ Todas las ventas con forma de pago "Efectivo"
SELECT v.*
FROM ventas v
JOIN forma_pago fp ON v.forma_pago_id = fp.id
WHERE fp.descripcion = 'Efectivo';
