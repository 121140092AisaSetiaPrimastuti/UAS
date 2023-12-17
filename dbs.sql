
CREATE TABLE `user` (
   `id_lagu` INT PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `full_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE movies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    genre VARCHAR(20) NOT NULL,
    release_year INT NOT NULL,
    rating DECIMAL(3,1) NOT NULL
);

INSERT INTO movies (name, genre, release_year, rating) VALUES
('The Matrix', 'Action', 1999, 8.7),
('Inception', 'Sci-Fi', 2010, 8.8),
('The Dark Knight', 'Action', 2008, 9.0),
('Pulp Fiction', 'Action', 1994, 8.9),
('Interstellar', 'Sci-Fi', 2014, 8.6),
('The Silence of the Lambs', 'Horror', 1991, 8.6),
('The Shawshank Redemption', 'Action', 1994, 9.3),
('Aliens', 'Sci-Fi', 1986, 8.3),
('The Shining', 'Horror', 1980, 8.4),
('Avatar', 'Sci-Fi', 2009, 7.8),
('Die Hard', 'Action', 1988, 8.2),
('Blade Runner', 'Sci-Fi', 1982, 8.1),
('The Conjuring', 'Horror', 2013, 7.5),
('Jurassic Park', 'Sci-Fi', 1993, 8.1),
('The Terminator', 'Action', 1984, 8.0),
('Get Out', 'Horror', 2017, 7.7),
('Mad Max: Fury Road', 'Action', 2015, 8.1),
('E.T. the Extra-Terrestrial', 'Sci-Fi', 1982, 7.8),
('A Nightmare on Elm Street', 'Horror', 1984, 7.5),
('Gladiator', 'Action', 2000, 8.5);
