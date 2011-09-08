CREATE TABLE IF NOT EXISTS `conference` (
                `id` INTEGER PRIMARY KEY,
                `name` TEXT,
               `description` TEXT,
                `date` DATE);
|
CREATE TABLE IF NOT EXISTS `session` (
                `id` INTEGER PRIMARY KEY,
                `name` TEXT,
                `speaker` TEXT,
                `time` DATE,
                `conference_id` INTEGER);


