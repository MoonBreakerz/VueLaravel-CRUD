CREATE DATABASE vuelaravel;
USE vuelaravel;

CREATE TABLE list_tarefas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(255) NOT NULL,
    finalizado ENUM('sim', 'não') NOT NULL DEFAULT 'não',
    PRIMARY KEY (id)
);
