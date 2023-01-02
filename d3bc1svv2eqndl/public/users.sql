create table session
(
    user_id    serial
        primary key,
    expiration varchar(255) not null
        constraint users_username
            unique,
    email      varchar(255) not null
        constraint users_email
            unique,
    password   varchar(255) not null,
    api_key    varchar(64)
        constraint api_key
            unique
);
