create table password_reset
(
    id       serial
        constraint unique_id
            primary key,
    email    varchar(255) not null
        constraint key_email
            unique,
    token    varchar(255) not null
        constraint key_token
            unique,
    selector varchar(255) not null
        constraint key_selector
            unique,
    expires  varchar(255)
);

