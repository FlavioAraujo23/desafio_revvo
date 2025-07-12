-- Criar database se não existir
CREATE DATABASE IF NOT EXISTS desafio_revvo;
USE desafio_revvo;

-- Tabela de cursos
CREATE TABLE IF NOT EXISTS cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    link VARCHAR(255),
    imagem VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de slides
CREATE TABLE IF NOT EXISTS slides (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    link VARCHAR(255),
    imagem VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO slides (titulo, descricao, link, imagem) VALUES 
('Bem-vindo ao Leo Learning', 'Plataforma completa de cursos online para seu desenvolvimento profissional', '#', 'uploads/exemplo-slide1.jpg'),
('Cursos Certificados', 'Obtenha certificações reconhecidas no mercado de trabalho', '#', 'uploads/exemplo-slide2.jpg');


INSERT INTO cursos (titulo, descricao, link, imagem) VALUES 
('PHP Básico', 'Aprenda os fundamentos da linguagem PHP do zero', 'https://exemplo.com/php-basico', 'uploads/exemplo-curso1.jpg'),
('JavaScript Avançado', 'Domine conceitos avançados de JavaScript e ES6+', 'https://exemplo.com/js-avancado', 'uploads/exemplo-curso2.jpg');