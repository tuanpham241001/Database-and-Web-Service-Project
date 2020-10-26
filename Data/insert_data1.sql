--Table College 
insert into Colleges(cid, name, address) values (345, 'Krupp', 'College Ring 4');
insert into Colleges(cid, name, address) values (346, 'Nordmetall', 'College Ring 3');
insert into Colleges(cid, name, address) values (567, 'Mercator', 'College Ring 2');
insert into Colleges(cid, name, address) values (987, 'College III', 'College Ring 1');


--Table Rooms
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(1345, 345, 3, '345TR', 0, 345);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(2346, 345, 3, '345TO', 0, 345);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(1230, 231, 2, '231DF', 1, 346);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(3212, 189, 1, '189DS', 0, 346);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(1234, 397, 3, '397WR', 1, 567);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(1235, 256, 2, '256FT', 0, 987);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(1236, 194, 1, '194SA', 1, 345);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(1237, 194, 1, '194SB', 0, 345);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(1238, 213, 2, '213AC', 1, 567);
insert into Rooms(rid, rnumber, floor, mailbox, availability, cid) values(1239, 213, 2, '213AD', 0, 567);

--Table Double_rooms 
insert into Double_rooms(rid, position) values ('2345BG',0);
insert into Double_rooms(rid, position) values ('2346BG',1);
insert into Double_rooms(rid, position) values ('QW34SF',0);
insert into Double_rooms(rid, position) values ('QW35SF',1);
insert into Double_rooms(rid, position) values ('P3X4RW',0);
insert into Double_rooms(rid, position) values ('P3X5RW',1);



-- Table Students
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (1034, 'Nurgun Rafizade', '35674', '24102001', NULL, 2346);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (2356, 'Aoge Bo', '24585', '12041999', NULL, 1230);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (4347, 'Jenni Lo', '33436', '12042001', NULL, 1235);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (1053, 'Wail Bougida', '23454', '12092000', NULL, 1234);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (1035, 'Tuan Pham', '34567', '30082001', 1034, 2346);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (1093, 'John Doe', '34525', '25081998', NULL, 1236);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (3456, 'Jeng Lu', '33145', '12041997', NULL, 1239);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (2345, 'Sergey Lav', '43456', '15072001', NULL, 3212);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (1059, 'Nayan Pradhan', '23384', '30032002', 2356, 1230);
insert into Students(sid, name, mat_num, birthday, rsid, rid) values (1563, 'Jane Doe', '36536', '24082000', 4347, 1235);




-- Table Students_with_special_needs
insert into Students_with_special_need(sickness, special_need, sid) values ('Obesity', 'Bigger room', '1053GF');
insert into Students_with_special_need(sickness, special_need, sid) values ('Too Tall', 'Bigger Bed', '1093QA');
insert into Students_with_special_need(sickness, special_need, sid) values ('Asthma', 'Bigger windows', '2345RD');



-- Table Managers
insert into Managers(mgid, name, age, contact_num, cid) values ('1234DS', 'Laura', 35, '12345678', '345RE');
insert into Managers(mgid, name, age, contact_num, cid) values ('3245AF', 'Lynn', 40, '34567812', '345RE');
insert into Managers(mgid, name, age, contact_num, cid) values ('5778WS', 'John', 43, '12834561', '567WS');
insert into Managers(mgid, name, age, contact_num, cid) values ('9836TR', 'Jane', 42, '22233344', '987TR');
insert into Managers(mgid, name, age, contact_num, cid) values ('5432TR', 'William', 38, '23133449','987TR');
insert into Managers(mgid, name, age, contact_num, cid) values ('3468TW', 'Qestra', 37, '98733456', '346TW');
insert into Managers(mgid, name, age, contact_num, cid) values ('3981TW', 'Qamhia', 29, '23456998', '346TW');

-- Table RM
insert into RM(office_hour, mgid) values('10 to 12', '1234DS');
insert into RM(office_hour, mgid) values('10 to 14', '5778WS');
insert into RM(office_hour, mgid) values('14 to 18', '9836TR');
insert into RM(office_hour, mgid) values('10 to 12', '3468TW');

-- Table RA
insert into RA(availability, mgid) values(0, '3245AF');
insert into RA(availability, mgid) values(1, '5432TR');
insert into RA(availability, mgid) values(1, '3981TW');


