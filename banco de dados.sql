create database hotelflex;

use hotelflex;


CREATE TABLE clientes (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    documento_identificacao VARCHAR(20) UNIQUE,
    data_nascimento DATE
);
CREATE TABLE quartos (
    id SERIAL PRIMARY KEY,
    numero_quarto VARCHAR(10) UNIQUE NOT NULL,
    tipo VARCHAR(50) NOT NULL, -- Ex: solteiro, casal, suíte
    capacidade INT NOT NULL,
    preco_diaria DECIMAL(10, 2) NOT NULL,
    disponivel BOOLEAN DEFAULT TRUE
);
CREATE TABLE reservas (
    id SERIAL PRIMARY KEY,
    cliente_id INT NOT NULL,
    quarto_id INT NOT NULL,
    data_checkin DATE NOT NULL,
    data_checkout DATE NOT NULL,
    status VARCHAR(20) DEFAULT 'reservada',
    valor_total DECIMAL(10, 2),

    CONSTRAINT fk_cliente FOREIGN KEY (cliente_id) REFERENCES clientes(id),
    CONSTRAINT fk_quarto FOREIGN KEY (quarto_id) REFERENCES quartos(id)
);
