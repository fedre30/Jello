CREATE TABLE IF NOT EXISTS users (
  userID    INT PRIMARY KEY AUTO_INCREMENT,
  lastName  VARCHAR(128) NOT NULL,
  firstName VARCHAR(128) NOT NULL,
  email     VARCHAR(255) NOT NULL UNIQUE,
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

DROP TRIGGER IF EXISTS new_user;
DELIMITER //
CREATE TRIGGER new_user AFTER INSERT ON users FOR EACH ROW
BEGIN
    INSERT INTO boards(ownerID) VALUES (NEW.userID);
END; //
DELIMITER ;

DROP TRIGGER IF EXISTS new_board;
DELIMITER //
CREATE TRIGGER new_board AFTER INSERT ON boards FOR EACH ROW
  BEGIN
    INSERT INTO board_lanes(boardID, name) VALUES (NEW.boardID, 'To do'), (NEW.boardID, 'In progress'), (NEW.boardID, 'Done');
  END; //
DELIMITER ;

# Example requests:

#SELECT boards.* from users
#  JOIN boards ON users.userID = boards.ownerID
#  WHERE email = 'alfanofederica95@gmail.com';

#SELECT cards.*, board_lanes.name FROM users
#  JOIN boards ON users.userID = boards.ownerID
#  JOIN board_lanes ON boards.boardID = board_lanes.boardID
#  JOIN cards ON board_lanes.laneID = cards.cardPosition
#  WHERE email = 'alfanofederica95@gmail.com';