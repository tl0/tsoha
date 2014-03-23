CREATE SEQUENCE user_ID_seq;

CREATE TABLE people (
  userID INTEGER NOT NULL default nextval('user_ID_seq'),
  name VARCHAR(100) NOT NULL,
  descr TEXT NULL,
  PRIMARY KEY (userID)
);

CREATE TABLE tags (
  userID INTEGER NOT NULL REFERENCES people ON DELETE RESTRICT ON UPDATE CASCADE,
  tagname VARCHAR(20) NOT NULL,
  modifiers TEXT NULL,
  PRIMARY KEY(userID, tagname)
);

ALTER SEQUENCE user_ID_seq OWNED BY people.userID;
