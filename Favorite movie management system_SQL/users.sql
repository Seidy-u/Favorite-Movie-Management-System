DROP TABLE IF EXISTS users;
CREATE TABLE users(
    username  VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
    );

INSERT INTO users(username, password) VALUES("sample", "password");
