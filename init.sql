CREATE DATABASE Servers;

Use Servers;

CREATE TABLE Servers (
        `ServerID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
        `ServerName` varchar(255) DEFAULT NULL,
        `ServerAddress` varchar(255) DEFAULT NULL,
        `ServerWorking` tinyint(1) DEFAULT 1,
        `LastUpdated` datetime DEFAULT NOW(),
        PRIMARY KEY (`ServerID`)
);

CREATE TABLE MongoDatabases (
        `DatabaseID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
        `DatabaseName` varchar(255) DEFAULT NULL,
        `DatabaseAddress` varchar(255) DEFAULT NULL,
        `DatabaseWorking` tinyint(1) DEFAULT 1,
        `LastUpdated` datetime DEFAULT NOW(),
        PRIMARY KEY (`DatabaseID`)
);

CREATE TABLE MSSQLDatabases (
        `DatabaseID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
        `DatabaseName` varchar(255) DEFAULT NULL,
        `DatabaseAddress` varchar(255) DEFAULT NULL,
        `DatabaseWorking` tinyint(1) DEFAULT 1,
        `LastUpdated` datetime DEFAULT NOW(),
        PRIMARY KEY (`DatabaseID`)
);
