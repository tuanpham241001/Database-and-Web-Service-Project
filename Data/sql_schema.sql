CREATE DATABASE IF NOT EXISTS Housing;

USE Housing;

CREATE TABLE Colleges(
    cid CHAR(8),
    name CHAR(12),
    address CHAR(30),
    PRIMARY KEY (cid)
);

CREATE TABLE Rooms(
    rid CHAR(8),
    rnumber CHAR(5),
    floor INT,
    mailbox CHAR(5),
    availability BIT,
    cid CHAR(8) NOT NULL,       
    PRIMARY KEY (rid), 
    FOREIGN KEY (cid) REFERENCES Colleges(cid)
);

CREATE TABLE Double_rooms(
    rid CHAR(8),
    position BIT,
    PRIMARY KEY (rid),
    FOREIGN KEY (rid) REFERENCES Rooms(rid)
);

CREATE TABLE Students(
    sid CHAR(8),
    name CHAR(30),
    mat_num CHAR(8),
    birthday CHAR(8),
    rid CHAR(8),
    rsid CHAR (8),
    PRIMARY KEY (sid),
    FOREIGN KEY (rsid) REFERENCES Students (sid),
    FOREIGN KEY (rid) REFERENCES Rooms(rid)
);

CREATE TABLE Students_with_special_need(
    sickness CHAR(12),
    special_need CHAR(30),
    sid CHAR(8),
    PRIMARY KEY (sid),
    FOREIGN KEY (sid) REFERENCES Students(sid)
);



CREATE TABLE Managers(
    mgid CHAR(8),
    name CHAR(30),
    age INT,
    contact_num CHAR(12), 
    cid CHAR(8),
    PRIMARY KEY (mgid),
    FOREIGN KEY (cid) REFERENCES Colleges(cid)
);


CREATE TABLE RA(
    availability BIT,
    mgid CHAR(8),
    PRIMARY KEY (mgid),
    FOREIGN KEY (mgid) REFERENCES Managers(mgid)   
);

CREATE TABLE RM(
    office_hour CHAR(30),
    mgid CHAR(8),
    PRIMARY KEY (mgid),
    FOREIGN KEY (mgid) REFERENCES Managers(mgid)
);
