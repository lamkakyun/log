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