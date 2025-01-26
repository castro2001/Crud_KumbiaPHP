DROP DATABASE IF EXISTS test_Kumbia;
CREATE DATABASE test_Kumbia CHARACTER SET utf8mb4 DEFAULT COLLATE utf8mb4_general_ci;
USE test_Kumbia;

CREATE TABLE productos(
    id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    descripcion TEXT DEFAULT '----',
    precio FLOAT(6,2),
    imagen VARCHAR(200) DEFAULT '----',
    fecha_alta DATETIME,
    estado TINYINT(1) NOT NULL DEFAULT 1
)ENGINE=innoDB;

CREATE TABLE categorias(
    id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoria VARCHAR(200) NOT NULL
)ENGINE=innoDB;

CREATE TABLE categorizacion(
    fkProductos INT UNSIGNED NOT NULL,
    fkCategorias TINYINT(3) UNSIGNED NOT NULL,

    PRIMARY KEY(fkProductos,fkCategorias),

    CONSTRAINT categorizacion_producto FOREIGN KEY
    (fkProductos) REFERENCES productos(id)  ON DELETE
    CASCADE ON UPDATE CASCADE,
    
     CONSTRAINT categorizacion_categoria FOREIGN KEY
    (fkCategorias) REFERENCES categorias(id) ON DELETE
    CASCADE ON UPDATE CASCADE
)ENGINE=innoDB;

CREATE TABLE usuarios(
    id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(200) NOT NULL,
    email VARCHAR(200) DEFAULT '----',
    password VARCHAR(50) DEFAULT '**',
    rol VARCHAR(50) NOT NULL,
    estado TINYINT(1) NOT NULL DEFAULT 1

)ENGINE=innoDB;

INSERT INTO usuarios(nombre,email,password,rol) VALUES('Juan Velazque','velJuan21@gmail.com','2001','usuario de prueba')

INSERT INTO categorias(categoria) VALUES
        ('pizzas'), ('bebidas'),('postres'),('cafeterias'),('pastas');

    INSERT INTO productos(nombre, precio,fecha_alta,imagen) VALUES
        ('pizzas de muzzarela',3500,NOW(),''),
           ('pizzas de amana',3800,NOW(),''),
              ('bebida cola',500,NOW(),'');

INSERT INTO categorizacion(fkProductos,fkCategorias) VALUES
        (1,1),(2,1),(3,2)