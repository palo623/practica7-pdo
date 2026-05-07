-- Creació de la base de dades
USE asix;

-- Esborrem les taules si ja existeixen per poder re-executar l'script en net
DROP TABLE IF EXISTS videojoc;
DROP TABLE IF EXISTS desenvolupador;

-- ==========================================
-- MODEL 1: DESENVOLUPADORS (Taula Pare)
-- ==========================================
CREATE TABLE desenvolupador (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    pais VARCHAR(50) DEFAULT NULL
);

-- ==========================================
-- MODEL 2: VIDEOJOCS (Taula Filla)
-- ==========================================
CREATE TABLE videojoc (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titol VARCHAR(150) NOT NULL,
    genere VARCHAR(50) NOT NULL,
    preu DECIMAL(5,2) NOT NULL,
    data_llancament DATE NOT NULL,
    desenvolupador_id INT,
    -- Clau forana: Si s'esborra un desenvolupador, el joc es queda sense assignar (NULL)
    CONSTRAINT fk_desenvolupador 
        FOREIGN KEY (desenvolupador_id) 
        REFERENCES desenvolupador(id) 
        ON DELETE SET NULL
);

-- ==========================================
-- INSERCIÓ DE DADES DE PROVA
-- ==========================================

-- 1. Inserim primer els desenvolupadors (necessitem que existeixin per assignar-los els jocs)
INSERT INTO desenvolupador (nom, pais) VALUES 
('Nintendo', 'Japó'),
('CD Projekt Red', 'Polònia'),
('Team Cherry', 'Austràlia'),
('Naughty Dog', 'EUA'),
('FromSoftware', 'Japó');

-- 2. Inserim els videojocs vinculant-los amb el seu desenvolupador
-- Nota: L'ID del desenvolupador dependrà de l'ordre d'inserció anterior (Nintendo=1, CD Projekt=2, etc.)
INSERT INTO videojoc (titol, genere, preu, data_llancament, desenvolupador_id) VALUES 
('The Legend of Zelda: Breath of the Wild', 'Aventura', 59.99, '2017-03-03', 1),
('Super Mario Odyssey', 'Plataformes', 49.99, '2017-10-27', 1),
('The Witcher 3: Wild Hunt', 'RPG', 29.99, '2015-05-19', 2),
('Cyberpunk 2077', 'RPG / Acció', 39.99, '2020-12-10', 2),
('Hollow Knight', 'Metroidvania', 14.99, '2017-02-24', 3),
('The Last of Us Part I', 'Acció / Supervivència', 69.99, '2022-09-02', 4),
('Elden Ring', 'RPG / Acció', 59.99, '2022-02-25', 5);

-- Opcional: Inserim un joc sense desenvolupador assignat per comprovar que el LEFT JOIN de la vista funciona bé
INSERT INTO videojoc (titol, genere, preu, data_llancament, desenvolupador_id) VALUES 
('Joc Indie Desconegut', 'Puzles', 4.99, '2023-11-15', NULL);
