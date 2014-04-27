CREATE SEQUENCE acc_ID_seq;
CREATE SEQUENCE user_ID_seq;
CREATE SEQUENCE img_ID_seq;
CREATE SEQUENCE quest_ID_seq;
CREATE SEQUENCE ans_ID_seq;
CREATE SEQUENCE tag_ID_seq;

CREATE TABLE account (
  accID INTEGER NOT NULL default nextval('acc_ID_seq'),
  email VARCHAR(100) NOT NULL,
  password VARCHAR(60) NOT NULL,
  admin BOOLEAN default false,
  userid INT NULL,
  PRIMARY KEY(accID)
);

CREATE TABLE people (
  userID INTEGER NOT NULL default nextval('user_ID_seq'),
  accID INTEGER NOT NULL REFERENCES account ON DELETE RESTRICT ON UPDATE CASCADE,
  name VARCHAR(100) NOT NULL,
  descr TEXT NULL,
  timecreated INTEGER NULL,
  timemodified INTEGER NULL,
  title VARCHAR(30) NULL,
  published BOOLEAN default false,
  defaultimg INTEGER NULL,
  PRIMARY KEY (userID)
);

CREATE TABLE tags (
  tagID INTEGER NOT NULL default nextval('tag_ID_seq'),
  tagname VARCHAR(20) NOT NULL,
  modifiers TEXT NULL,
  PRIMARY KEY(tagID),
  UNIQUE(tagname)
);

CREATE TABLE tagset (
  userID INTEGER NOT NULL,
  tagID INTEGER NOT NULL,
  FOREIGN KEY(userID) REFERENCES people,
  FOREIGN KEY(tagID) REFERENCES tags
);

CREATE TABLE images (
  imgID INTEGER NOT NULL default nextval('img_ID_seq'),
  userID INTEGER NOT NULL REFERENCES people ON DELETE RESTRICT ON UPDATE CASCADE,
  imgpath TEXT NOT NULL,
  created INTEGER NULL,
  PRIMARY KEY(imgID, userID)
);

CREATE TABLE sessions (
  sessID VARCHAR(60) NOT NULL,
  accID INTEGER NOT NULL REFERENCES account ON DELETE CASCADE ON UPDATE CASCADE,
  timecreated INTEGER NULL,
  timeused INTEGER NULL,
  ipaddr CIDR NULL,
  PRIMARY KEY(sessID, accID)
);

CREATE TABLE questions (
  qid INTEGER NOT NULL default nextval('quest_ID_seq'),
  question TEXT NOT NULL,
  PRIMARY KEY(qid)
);

CREATE TABLE answer (
  aid INTEGER NOT NULL default nextval('ans_ID_seq'),
  qid INTEGER NOT NULL REFERENCES questions ON DELETE CASCADE ON UPDATE CASCADE,
  userid INTEGER NOT NULL REFERENCES people,
  answ TEXT NOT NULL,
  PRIMARY KEY(aid)
);

ALTER SEQUENCE user_ID_seq OWNED BY people.userID;
ALTER SEQUENCE acc_ID_seq OWNED BY account.accID;
ALTER SEQUENCE img_ID_seq OWNED BY images.imgID;
ALTER SEQUENCE quest_ID_seq OWNED BY questions.qid;
ALTER SEQUENCE ans_ID_seq OWNED BY answer.aid;
ALTER SEQUENCE tag_ID_seq OWNED BY tags.tagID;
