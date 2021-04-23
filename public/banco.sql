CREATE SCHEMA `crudfatec` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;

CREATE TABLE `crudfatec`.`notes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(200) NULL,
  `texto` LONGTEXT NULL,
  PRIMARY KEY (`id`));


  INSERT INTO `crudfatec`.`notes`
(
`titulo`,
`texto`)
VALUES
(
'Contas',
'It is a long established fact that a reader will be distracted
 by the readable content of a page when looking at its layout.
The point of using Lorem Ipsum is that it has a more-or-less
normal distribution of letters, as opposed to using Content here,
content here, making it look like readable English. Many desktop 
publishing packages and web page editors now use Lorem Ipsum as 
their default model text, and a search for lorem ipsum will uncove]
many web sites still in their infancy. Various versions have 
evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).');


SELECT * FROM crudfatec.new_table;

INSERT INTO crudfatec.notes (id, titulo, texto) VALUES ('Contas','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using');
INSERT INTO crudfatec.notes ('id','titulo','texto') VALUES ('Contas','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using');


CREATE TABLE `crudfatec`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `email` VARCHAR(100) NULL,
  `senha` VARCHAR(100) NULL,
  PRIMARY KEY (`id`));


  INSERT INTO `crudfatec`.`users`
(
`nome`,
`email`,
`senha`)
VALUES
('Sandro','sandro@gmail.com','$2y$10$0EtkzkCCqg8CLeFbOs9m7uXuISt.sOXMEcfweXo0k05ngJ6g4fi9m');