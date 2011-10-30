CREATE TABLE IF NOT EXISTS `conference` (
                `id` INTEGER PRIMARY KEY,
                `name` TEXT,
               `description` TEXT,
                `cdate` DATE);
|
CREATE TABLE IF NOT EXISTS `session` (
                `id` INTEGER PRIMARY KEY,
                `name` TEXT,
                `speaker` TEXT,
                `stime` DATE,
                `conference_id` INTEGER);


