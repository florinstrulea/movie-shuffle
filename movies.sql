create database if not exists myMovies;

create table if not exists movies(
id TINYINT PRIMARY KEY,
title VARCHAR(80) NOT NULL,
genres TEXT NOT NULL,
description TEXT NOT NULL,
releaseDate Date NOT NULL,
duration SMALLINT NOT NULL,
video VARCHAR(255),
highlighted VARCHAR (10)
);

INSERT INTO movies(title, genres, description, releaseDate, duration,video) 
VALUES
("Inception","Action, Science-fiction, Aventure", "Dom Cobb est un voleur expérimenté, le meilleur dans l'art dangereux de l'extraction, voler les secrets les plus intimes enfouis au plus profond du subconscient durant une phase de rêve, lorsque l'esprit est le plus vulnérable. Les capacités de Cobb ont fait des envieux dans le monde tourmenté de l'espionnage industriel alors qu'il devient fugitif en perdant tout ce qu'il a un jour aimé. Une chance de se racheter lui est alors offerte. Une ultime mission grâce à laquelle il pourrait retrouver sa vie passée mais uniquement s'il parvient à accomplir l'impossible inception.", 2010-07-21, 148, "https://www.youtube.com/embed/5BW_1D5byw8"),
("Interstellar","Aventure, Science-fiction, Drame", "Dans un futur proche, face à une Terre exsangue, un groupe d'explorateurs utilise un vaisseau interstellaire pour franchir un trou de ver permettant de parcourir des distances jusque-là infranchissables. Leur but : trouver un nouveau foyer pour l'humanité.", 2014-11-07,169,"https://www.youtube.com/embed/eIWs2IUr3Vs"),
("Matrix"),



