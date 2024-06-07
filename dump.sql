CREATE DATABASE IF NOT EXISTS ekatte;

USE ekatte;

DROP TABLE IF EXISTS `areas`;

CREATE TABLE `areas`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `raion`      varchar(20)  NOT NULL,
    `name`       varchar(100) NOT NULL,
    `name_en`    varchar(100) NOT NULL,
    `document`   int          NOT NULL,
    `created_at` timestamp    NOT NULL,
    `updated_at` timestamp    NULL     DEFAULT NULL,
    `is_deleted` tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `areas_level_one`;

CREATE TABLE `areas_level_one`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `region`     varchar(10)  NOT NULL,
    `nuts1`      varchar(10)  NOT NULL,
    `name`       varchar(255) NOT NULL,
    `name_en`    varchar(255) NOT NULL,
    `document`   int          NOT NULL,
    `created_at` timestamp    NOT NULL,
    `updated_at` timestamp    NULL     DEFAULT NULL,
    `is_deleted` tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `areas_level_two`;

CREATE TABLE `areas_level_two`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `region`     varchar(10)  NOT NULL,
    `nuts1`      varchar(10)  NOT NULL,
    `nuts2`      varchar(10)  NOT NULL,
    `name`       varchar(100) NOT NULL,
    `name_en`    varchar(100) NOT NULL,
    `document`   int          NOT NULL,
    `created_at` timestamp    NOT NULL,
    `updated_at` timestamp    NULL     DEFAULT NULL,
    `is_deleted` tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `documents`;

CREATE TABLE `documents`
(
    `id`          int          NOT NULL AUTO_INCREMENT,
    `document`    int          NOT NULL,
    `doc_kind`    varchar(255) NOT NULL,
    `doc_name`    varchar(255) NOT NULL,
    `doc_name_en` varchar(255) NOT NULL,
    `doc_inst`    varchar(255) NOT NULL,
    `doc_num`     varchar(50)  NOT NULL,
    `doc_date`    date                  DEFAULT NULL,
    `doc_act`     date                  DEFAULT NULL,
    `dv_danni`    varchar(10)  NOT NULL,
    `dv_date`     date                  DEFAULT NULL,
    `created_at`  timestamp    NOT NULL,
    `updated_at`  timestamp    NULL     DEFAULT NULL,
    `is_deleted`  tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `municipalities`;

CREATE TABLE `municipalities`
(
    `id`            int          NOT NULL AUTO_INCREMENT,
    `obshtina`      varchar(10)  NOT NULL,
    `ekatte`        varchar(20)  NOT NULL,
    `name`          varchar(100) NOT NULL,
    `name_en`       varchar(100) NOT NULL,
    `nuts1`         varchar(10)  NOT NULL,
    `nuts2`         varchar(10)  NOT NULL,
    `nuts3`         varchar(10)  NOT NULL,
    `category`      int          NOT NULL,
    `document`      int          NOT NULL,
    `full_name_bul` varchar(255) NOT NULL,
    `created_at`    timestamp    NOT NULL,
    `updated_at`    timestamp    NULL     DEFAULT NULL,
    `is_deleted`    tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions`
(
    `id`            int          NOT NULL AUTO_INCREMENT,
    `oblast`        varchar(10)  NOT NULL,
    `ekatte`        varchar(50)  NOT NULL,
    `name`          varchar(100) NOT NULL,
    `name_en`       varchar(100) NOT NULL,
    `region`        varchar(20)  NOT NULL,
    `nuts1`         varchar(10)  NOT NULL,
    `nuts2`         varchar(10)  NOT NULL,
    `nuts3`         varchar(10)  NOT NULL,
    `document`      int          NOT NULL,
    `full_name_bul` varchar(255) NOT NULL,
    `created_at`    timestamp    NOT NULL,
    `updated_at`    timestamp    NULL     DEFAULT NULL,
    `is_deleted`    tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `sof_territorial_units`;

CREATE TABLE `sof_territorial_units`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `ekatte`     varchar(10)  NOT NULL,
    `t_v_m`      varchar(10)  NOT NULL,
    `name`       varchar(100) NOT NULL,
    `name_en`    varchar(100) NOT NULL,
    `raion`      varchar(10)  NOT NULL,
    `kind`       int          NOT NULL,
    `document`   int          NOT NULL,
    `created_at` timestamp    NOT NULL,
    `updated_at` timestamp    NULL     DEFAULT NULL,
    `is_deleted` tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `territorial_formations`;

CREATE TABLE `territorial_formations`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `ekatte`     varchar(10)  NOT NULL,
    `kind`       int          NOT NULL,
    `name`       varchar(255) NOT NULL,
    `name_en`    varchar(255) NOT NULL,
    `area1`      varchar(100) NOT NULL,
    `area2`      varchar(100) NOT NULL,
    `document`   int          NOT NULL,
    `abc`        varchar(100) NOT NULL,
    `created_at` timestamp    NOT NULL,
    `updated_at` timestamp    NULL     DEFAULT NULL,
    `is_deleted` tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `territorial_units`;

CREATE TABLE `territorial_units`
(
    `id`            int          NOT NULL AUTO_INCREMENT,
    `ekatte`        varchar(50)  NOT NULL,
    `t_v_m`         varchar(50)  NOT NULL,
    `name`          varchar(255) NOT NULL,
    `name_en`       varchar(255) NOT NULL,
    `oblast`        varchar(10)  NOT NULL,
    `obshtina`      varchar(10)  NOT NULL,
    `kmetstvo`      varchar(10)  NOT NULL,
    `kind`          int          NOT NULL,
    `category`      int          NOT NULL,
    `altitude`      int          NOT NULL,
    `document`      int          NOT NULL,
    `abc`           varchar(100) NOT NULL,
    `nuts1`         varchar(10)  NOT NULL,
    `nuts2`         varchar(10)  NOT NULL,
    `nuts3`         varchar(10)  NOT NULL,
    `text`          varchar(255) NOT NULL,
    `oblast_name`   varchar(255) NOT NULL,
    `obshtina_name` varchar(255) NOT NULL,
    `created_at`    timestamp    NOT NULL,
    `updated_at`    timestamp    NULL     DEFAULT NULL,
    `is_deleted`    tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `town_halls`;

CREATE TABLE `town_halls`
(
    `id`         int          NOT NULL AUTO_INCREMENT,
    `kmetstvo`   varchar(50)  NOT NULL,
    `name`       varchar(255) NOT NULL,
    `name_en`    varchar(255) NOT NULL,
    `ekatte`     varchar(50)  NOT NULL,
    `document`   int          NOT NULL,
    `category`   int          NOT NULL,
    `nuts1`      varchar(10)  NOT NULL,
    `nuts2`      varchar(10)  NOT NULL,
    `nuts3`      varchar(10)  NOT NULL,
    `created_at` timestamp    NOT NULL,
    `updated_at` timestamp    NULL     DEFAULT NULL,
    `is_deleted` tinyint(1)   NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_0900_ai_ci;