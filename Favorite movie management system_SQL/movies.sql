DROP TABLE IF EXISTS movies;
CREATE TABLE movies(
    id INT(255) NOT NULL AUTO_INCREMENT,
    username VARCHAR(100),
    channel VARCHAR(100),
    title VARCHAR(255),
    url VARCHAR(255),
    PRIMARY KEY (id)
);

INSERT INTO movies(username, channel, title, url) VALUES("sample", "はなおでんがん", "東大生の店員に理系風に注文したら、賢すぎて返り討ちにされました。東大理三恐るべし、、、", "https://www.youtube.com/watch?v=AMGLJBFkNO4");
