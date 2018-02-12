CREATE TABLE IF NOT EXISTS users (
  userID    INT PRIMARY KEY AUTO_INCREMENT,
  lastName  VARCHAR(128) NOT NULL,
  firstName VARCHAR(128) NOT NULL,
  email     VARCHAR(256) NOT NULL UNIQUE,
  password  CHAR(60)     NOT NULL
);

CREATE TABLE IF NOT EXISTS boards (
  boardID INT PRIMARY KEY AUTO_INCREMENT,
  ownerID INT NOT NULL REFERENCES users (userID)
);

CREATE TABLE IF NOT EXISTS board_lanes (
  laneID  INT PRIMARY KEY AUTO_INCREMENT,
  boardID INT          NOT NULL REFERENCES boards (boardID),
  name    VARCHAR(128) NOT NULL
);

CREATE TABLE IF NOT EXISTS cards (
  cardID      INT PRIMARY KEY       AUTO_INCREMENT,
  title       VARCHAR(128) NOT NULL DEFAULT '',
  description TEXT         NOT NULL,
  tags        BIT(5)       NOT NULL DEFAULT 0,
  cardPosition INT NOT NULL REFERENCES board_lanes(laneID)
);

CREATE TABLE IF NOT EXISTS board_rights (
  boardID INT NOT NULL REFERENCES boards (boardID),
  userID  INT NOT NULL REFERENCES users (userID)
);

