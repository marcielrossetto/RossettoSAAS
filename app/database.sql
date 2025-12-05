
CREATE DATABASE IF NOT EXISTS rossetto_saas;
USE rossetto_saas;

CREATE TABLE empresas (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120) NOT NULL,
 plano VARCHAR(20) NOT NULL,
 criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuarios (
 id INT AUTO_INCREMENT PRIMARY KEY,
 empresa_id INT NOT NULL,
 nome VARCHAR(120) NOT NULL,
 email VARCHAR(120) UNIQUE NOT NULL,
 senha VARCHAR(255) NOT NULL,
 nivel INT DEFAULT 3,
 criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (empresa_id) REFERENCES empresas(id)
);

CREATE TABLE reservas (
 id INT AUTO_INCREMENT PRIMARY KEY,
 empresa_id INT NOT NULL,
 usuario_id INT NOT NULL,
 nome VARCHAR(120),
 telefone VARCHAR(20),
 data DATE,
 horario TIME,
 pessoas INT,
 pagamento VARCHAR(50),
 mesa VARCHAR(20),
 observacoes TEXT,
 criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (empresa_id) REFERENCES empresas(id),
 FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    empresa_id INT NOT NULL,
    usuario_id INT NOT NULL,
    acao VARCHAR(255) NOT NULL,
    detalhes TEXT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO empresas (nome, plano) VALUES
('RossettoSaas','premium');

INSERT INTO usuarios (empresa_id, nome, email, senha, nivel) VALUES
(1,'Marciel Rossetto','marciel@gmail.com','$2y$10$abcdefghijklmnopqrstuv',3);
