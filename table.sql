CREATE TABLE data (
     id INT NOT NULL AUTO_INCREMENT,
     tweetid CHAR(18) NOT NULL,
     text text NOT NULL,
     location text,
     tweet_created_date text,
     created_dt TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (id)
);

CREATE TABLE coordinates (
     tweetid CHAR(18) NOT NULL,
     lat text NOT NULL,
     lng text NOT NULL,
     location text NOT NULL,
     PRIMARY KEY (tweetid)
);
