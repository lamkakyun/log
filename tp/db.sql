CREATE TABLE money_items
(
  id        INT AUTO_INCREMENT
    PRIMARY KEY,
  item_name VARCHAR(100) NOT NULL,
  CONSTRAINT money_items_item_name_uindex
  UNIQUE (item_name)
)
  ENGINE = InnoDB;


CREATE TABLE money_log
(
  id            INT AUTO_INCREMENT
    PRIMARY KEY,
  money_amount  DECIMAL(10, 2) NOT NULL,
  create_time   INT            NULL,
  money_comment VARCHAR(1000)  NULL,
  money_item    VARCHAR(255)   NULL
)
  ENGINE = InnoDB;


CREATE TABLE mission
(
  id               INT AUTO_INCREMENT
    PRIMARY KEY,
  task             VARCHAR(255) NULL,
  comment          TEXT         NULL,
  status           TINYINT      NULL
  COMMENT '1 start 2 stop 3 bingo 4 deleted',
  create_time      INT          NULL,
  last_update_time INT          NULL
)
  ENGINE = InnoDB;
