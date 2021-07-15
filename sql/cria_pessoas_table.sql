/*
    João Ferreira <jo4o.fds@gmail.com>
    -- SQL para criação da tebela de pessoas.
*/

create table if not exists pessoas
(
    id               int auto_increment primary key,
    nome             varchar(128) not null,
    sexo             varchar(6)   not null,
    data_nascimento  date         not null,
    convenio         varchar(32)  not null
);
