-- creation de la table
CREATE TABLE `KandT`.`PAGE` (
  `id` INT UNSIGNED AUTO_INCREMENT,
  `slug` VARCHAR(120),
  `title` VARCHAR(110),
  `h1` VARCHAR(60),
  `p` VARCHAR(3000),
  `span-class` VARCHAR(50),
  `span-text` VARCHAR(100),
  `img-alt` VARCHAR(100),
  `img-src` VARCHAR(2048),
  `nav-title` VARCHAR(25),
  PRIMARY KEY (`id`)
);

-- generation de la nav
SELECT
  `slug`,
  `nav-title`
FROM
  `PAGE`
;
-- affichage page teletubbies
SELECT
  `h1`,
  `p`,
  `span-class`,
  `span-text`,
  `img-alt`,
  `img-src`
FROM
  `PAGE`
WHERE
  `slug` = 'teletubbies'
;
-- creation page teletubbies
INSERT INTO
  `PAGE`
  (
    `slug`,
    `title`,
    `h1`,
    `p`,
    `span-class`,
    `span-text`,
    `img-alt`,
    `img-src`,
    `nav-title`
  )
VALUES
  (
    'teletubbies',
    'Teletubbies',
    'teletubbies',
    'Teletubbies',
    'danger',
    'artung',
    'teletubbies',
    'teletubbies.jpg',
    'Teletubbies'
  )
;
-- mise a jour
UPDATE
  `PAGE`
SET
  `slug` = 'chatons',
  `title` = 'chatons',
  `h1` = 'chatons',
  `p` = 'chatons',
  `span-class` = 'success',
  `span-text` = 'chatons',
  `img-alt` = 'chatons',
  `img-src` = 'three_kittens.jpg',
  `nav-title` = 'chatons'
WHERE
  id = 1
;
-- suppression
DELETE FROM
  `PAGE`
WHERE
  id = 1
;