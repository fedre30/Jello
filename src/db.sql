/*CREATE DATABASE jello;*/

CREATE TABLE users (
  userId    INT,
  lastName  VARCHAR(255),
  firstName VARCHAR(255),
  email     VARCHAR(320),
  password  CHAR(56)
);

CREATE TABLE cards (
  cardID          INT,
  cardTitle       VARCHAR(255),
  cardDescription VARCHAR(255),
  cardTags        CHAR(12)
);