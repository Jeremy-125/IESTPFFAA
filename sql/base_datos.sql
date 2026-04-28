CREATE DATABASE IF NOT EXISTS crud_iestpffaa;
USE crud_iestpffaa;

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    categoria VARCHAR(100),
    precio DECIMAL(10,2),
    stock INT,
    fecha_registro DATE
);