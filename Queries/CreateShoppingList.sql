CREATE TABLE IF NOT EXISTS `dbShoppingList`.`tblShoppingList` (
  `intShopingID` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `strStoreName` VARCHAR(45) NOT NULL COMMENT '',
  `intItemID` INT NOT NULL COMMENT '',
  `strLocation` VARCHAR(45) NOT NULL COMMENT '',
  `douPrice` DOUBLE NOT NULL COMMENT '',
  `strSymbol` VARCHAR(5) NOT NULL COMMENT '',
  PRIMARY KEY (`intShopingID`)  COMMENT '',
  UNIQUE INDEX `intShopingID_UNIQUE` (`intShopingID` ASC)  COMMENT '',
  INDEX `fkc_intItemID_idx` (`intItemID` ASC)  COMMENT '',
  CONSTRAINT `fkc_intItemID`
    FOREIGN KEY (`intItemID`)
    REFERENCES `dbShoppingList`.`tblItems` (`intItemID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;