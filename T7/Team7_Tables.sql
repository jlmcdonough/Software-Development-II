/*Prolog
VERSION: 0.1.0 10/1/19 - Created first three tables and added some test values into them to make sure they work correctly. 
VERSION: 0.1.1 10/3/19 - Updated change log
VERSION: 0.1.2 10/7/19 - Updated change log
VERSION: 0.1.3 10/14/19 - Created 7change table and inserted values.  Updated change log
VERSION: 0.1.4 10/18/19 - 0.1.4 - Updated change log
VERSION: 0.1.5 10/20/19 - 0.1.5 - Updated change log
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
password VARCHAR(24) NOT NULL,
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
location SET("inside", "outside")
);

INSERT INTO 7buildings(name)
VALUES("Byrne House"), ("Cannavino Library"), ("Champagnat Hall"), ("Chapel"), ("Cornell Boathouse"),
("Donnely Hall"), ("Dyson Center"), ("Fern Tor"),("Fontaine Hall"), ("Foy Townhouses"),
("Lower Fulton Townhouses"), ("Upper Fulton Townhouses"), ("Greystone Hall"), ("Hancock Center"),
("Kieran Gatehouse"), ("Kirk House"), ("Leo Hall"), ("Longview Park"), 
("Lowell Thomas Communications Center"), ("Lower Townhouses"), ("Marian Hall"), ("Marist Boathouse"),
("McCann Center"), ("Mid-Rise Hall"), ("North Campus Housing Complex"), ("St. Ann's Hermitage"),
("St. Peters's"), ("Science and Allied Health Building"), ("Sheahan Hall"),
("Steel Plant Studios and Gallery"), ("Student Center"),("Lower West Cedar Townhouses"),
("Upper West Cedar Townhouses"), ("Dining Hall");

CREATE TABLE if not exists 7items(
lost_id INT AUTO_INCREMENT PRIMARY KEY,
cwid DECIMAL(8,0) NOT NULL,	 /* this is the link to the users table */
lost_location VARCHAR(64),    /*This is to link the items table to the buildings table*/
item_type SET("Clothing", "Electronics", "Books", "Wallets/Keys/ID", "Misc.", "Rideables") NOT NULL,
description TEXT NOT NULL,
user_status SET("Loser", "Finder") NOT NULL,
date_lost DATE NOT NULL
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
VALUES("0.1.0",'2019/10/1', "All", "Created all pages- Team7_misc.php, Team7.php, Team7_connection.php - Team7_connection.php 
We tested connection and added a link to misc page - Team7_misc.php only allowed in if connection was aprovced also
 show list and database as well as link all pages"), 
 
 ("0.1.1", '2019/10/3', "Matt and Joeseph", "UPDATED INFO on landing page - 
 Added Comments IN team7_misc.php we restored the connection to the database and got all the back buttons working correctly"), 
 
("0.1.2", '2019/10/7', "All", "Created Contact Info, added a show tables link that shows the current data in the tables
 and added version and date to the bottom left of the screen added functional diagram to the misc page"),
 
 ("0.1.3", '2019/10/14', "All", 
 "Created the changes table and added all changes that we have made."),
 
 ("0.1.4", '2019/10/17', "Matt and Joseph",
 "Modified the team7_misc2.php file so that it would display the tables and all their attributes using a function as opposed to hardcoding everything."),
 
 ("0.1.5", '2019/10/20', "Joseph",
 "Added a style sheet for all styles.  Redid the website look.  Added buttons to top of all pages. ")
 
 ;   
