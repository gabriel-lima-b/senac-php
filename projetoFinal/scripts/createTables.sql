create table usuario(
    id integer NOT NULL AUTO_INCREMENT,
    login varchar(20),
    senha varchar(20),
    tipo varchar(20),
    PRIMARY KEY (id)
    );

create table livros(id integer NOT NULL AUTO_INCREMENT, titulo varchar(50), autor varchar(20), PRIMARY KEY (id));