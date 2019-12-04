/*Prolog
VERSION: 0.1.0 10/1/19 - Created first three tables and added some test values into them to make sure they work correctly. 
VERSION: 0.1.1 10/3/19 - Updated change log
VERSION: 0.1.2 10/7/19 - Updated change log
VERSION: 0.1.3 10/14/19 - Created 7change table and inserted values.  Updated change log
VERSION: 0.1.4 10/18/19 - Updated change log
VERSION: 0.1.5 10/20/19 - Updated change log
VERSION: 0.1.6 10/23/19 - Updated change log
VERSION: 0.1.7 11/06/19 - Updated change log, changed fields for buildings table
VERSION: 0.1.8 11/27/19 - Updated change log
VERSION: 0.1.9 11/29/19 - Updated change log, changed char legnth for passwords in user table for hashed passwords
VERSION: 0.1.10 11/30/19 - Updated change log.  Added matchID and match_time to items.
VERSION: 0.1.11 11/30/19 - Updated change log.
VERSION: 0.1.12 12/04/19 - Updated change log.
*/

DROP TABLE 7users;
DROP TABLE 7buildings;
DROP TABLE 7items;
DROP TABLE 7change;

CREATE TABLE if not exists 7users(
cwid DECIMAL(8,0) PRIMARY KEY,
first_name VARCHAR(16) NOT NULL,
last_name VARCHAR(24) NOT NULL,
email VARCHAR(64) NOT NULL,
password VARCHAR(64) NOT NULL,
phone DECIMAL(10,0) NOT NULL,
reg_id TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO 7users VALUES(20099770, "Chris", "Pellerito", "Christopher.pellerito1@marist.edu",
"password", "9175543044", CURRENT_TIMESTAMP);

INSERT INTO 7users VALUES(99999999, "Andrew", "Tokash", "andrew.tokash@marist.edu",
"password", "9999999999", CURRENT_TIMESTAMP);

INSERT INTO 7users VALUES(44444444, "Joseph", "McDonough", "Joseph.McDonough1@marist.edu", "password",
"9087654321", CURRENT_TIMESTAMP);

INSERT INTO 7users VALUES(33333333, "Matthew", "Parisi", "matthew.parisi1@marist.edu", "password", 
"5679013444", CURRENT_TIMESTAMP);

CREATE TABLE if not exists 7buildings(
id int AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(64) NOT NULL,
minFloor int,
maxFloor int
);

INSERT INTO 7buildings (name, minFloor, maxFloor)
VALUES("Byrne House", 1, 1), ("Cannavino Library",1,3), ("Champagnat Hall",1,9), ("Chapel",1,1), ("Cornell Boathouse",1,2),
("Donnely Hall",-1,2), ("Dyson Center",-1,2), ("Fern Tor",0,0),("Fontaine Hall",1,3), ("Foy Townhouses",1,2),
("Lower Fulton Townhouses",1,3), ("Upper Fulton Townhouses",1,3), ("Greystone Hall",-1,2), ("Hancock Center",-1,3),
("Kieran Gatehouse",1,1), ("Kirk House",1,1), ("Leo Hall",-1,5), ("Longview Park",0,0), 
("Lowell Thomas Communications Center",-1,2), ("Lower Townhouses",1,2), ("Marian Hall",1,2), ("Marist Boathouse",-1,1),
("McCann Center",1,3), ("Mid-Rise Hall",1,5), ("North Campus Housing Complex",-1,4), ("St. Ann's Hermitage",-1,2),
("St. Peters's",1,1), ("Science and Allied Health Building",1,3), ("Sheahan Hall",-1,3),
("Steel Plant Studios and Gallery",1,2), ("Student Center",2,3),("Lower West Cedar Townhouses",1,2),
("Upper West Cedar Townhouses",1,2), ("Dining Hall",1,1);

CREATE TABLE if not exists 7items(
lost_id INT AUTO_INCREMENT PRIMARY KEY,
cwid DECIMAL(8,0) NOT NULL,	 /* this is the link to the users table */
lost_location VARCHAR(64),    /*This is to link the items table to the buildings table*/
insideOrOutside VARCHAR(10),
floorNumber INTEGER,
item_type SET("Clothing", "Electronics", "Books", "Wallets/Keys/ID", "Misc.", "Rideables") NOT NULL,
description TEXT NOT NULL,
user_status SET("Loser", "Finder") NOT NULL,
date_lost DATE NOT NULL,
matchID INT,
matched_time DATETIME
);
INSERT INTO 7items(cwid, lost_location, item_type, description, user_status, date_lost)
VALUES(20099770, "Cannavino Library", "Electronics", "This is a test item.", "Loser", '2019-09-26');

INSERT INTO 7items(cwid, lost_location, item_type, description, user_status, date_lost)
VALUES(20099770, "Cannavino Library", "Electronics", "This is a test item.", "Finder", '2019-09-26'); 

INSERT INTO 7items(cwid, lost_location, item_type, description, user_status, date_lost)
VALUES(20099770, "Dining Hall", "Misc.", "This is a test item.", "Loser", '2019-09-26');

INSERT INTO 7items(cwid, lost_location, item_type, description, user_status, date_lost)
VALUES(20099770, "Hancock", "Books", "This is a test item.", "Finder", '2019-09-26'); 

CREATE TABLE if not exists 7change(
version VARCHAR(8) NOT NULL PRIMARY KEY,
date_of DATE NOT NULL,
person VARCHAR(64),
change_made TEXT
);

INSERT INTO 7change(version, date_of, person, change_made)
VALUES("0.1.00",'2019/10/1', "All", "Created all pages- Team7_misc.php, Team7.php, Team7_connection.php - Team7_connection.php 
We tested connection and added a link to misc page - Team7_misc.php only allowed in if connection was aprovced also
 show list and database as well as link all pages"), 
 
 ("0.1.01", '2019/10/3', "Matt and Joseph", "UPDATED INFO on landing page - 
 Added Comments IN team7_misc.php we restored the connection to the database and got all the back buttons working correctly"), 
 
("0.1.02", '2019/10/7', "All", "Created Contact Info, added a show tables link that shows the current data in the tables
 and added version and date to the bottom left of the screen added functional diagram to the misc page"),
 
 ("0.1.03", '2019/10/14', "All", 
 "Created the changes table and added all changes that we have made."),
 
 ("0.1.04", '2019/10/17', "Matt and Joseph",
 "Modified the team7_misc2.php file so that it would display the tables and all their attributes using a function as opposed to hardcoding everything."),
 
 ("0.1.05", '2019/10/20', "Joseph",
 "Added a style sheet for all styles.  Redid the website look.  Added buttons to top of all pages. "),
 
 ("0.1.06", '2019/10/23', "All",
 "Edited style sheet to center the navbar.  Added an Admin Page link on the misc. page. Created 6 admin functions (check connection, show table definitions, display all change, building, item, and user table). Created new displaytables.php to display the tables and their contents."),
 
 ("0.1.07", '2019/11/06', "All",
 "Added 3 new php files (7buildingsTableInsert, 7itemsTableInsert, 7usersTableInsert) that allow for the database to be modified via forms.  Created new button on header to report lost items, created two buttons on admin page to get to 7buildings... and 7users..."),
 
 ("0.1.08", '2019/11/27', "Joseph",
 "In 7itemsTableInsert.php, updated location part of form such that it pulls from the buildings table.  Added box to enter floor or outsideAdded team7_login.php and team7_logout.php such that admins can log in or out.  Adjusted team7_admin.php so that an admin has to be logged in to view the functions available.  Added sign in/out option to header."), 
  
 ("0.1.09", '2019/11/29', "Joseph",
 "Removed warning messages from team7_login.php and hashed passwords and changed query to check for unhashed or hashed passwords.  Hashed passwords before entering into table in 7usersTableInsert.php.  ") ,
 
 ("0.1.10", '2019/11/30', "Joseph",
 "RENAMED team7_misc2.php to team7_showTables.php.  Added 7itemMatch.php, 7itemMatchUpdate.php, 7itemMatchUpdate2.php, and 7doMatch.php.  Updated style sheet. showTables and Functional Diagram from header to admin page.  Added match items button to admin page.  With addition of four new files, admin can match two items together and the items table gets updated accordingly."), 
 
 ("0.1.11", '2019/11/30', "Joseph",
 "Locked all admin pages behind admin access.  Those users not logged in cannot access any of its contents."),
 
 ("0.1.12", '2019/12/04', "All",
 "Improved all forms, increased error-checking, and ensured fields were sticky")
 ;   

