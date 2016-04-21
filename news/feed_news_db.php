<?php
require "/home/muradikmatritsa1/public_html/atmat.org.au/v2/db_connect.php";
 global $connect;

 if( $connect->query("CREATE TABLE news (
                                        id INT(6) AUTO_INCREMENT PRIMARY KEY,
                                        news_title VARCHAR(100),
                                        news_pic VARCHAR(100),
                                        news_text VARCHAR(8000),
                                        news_author VARCHAR(100),
                                        news_date DATE
                                        )") === TRUE ) {
  echo 'Table news created successfully.';
 } else echo 'Unsuccessful.'.$connect->error;

 if( $connect->query("INSERT INTO news(id, news_title, news_pic, news_text, news_author, news_date) VALUES
                                           ('', 'Title 1', 'news_pic1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                           irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                           Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                           est laborum.', 'Hectic Author', '2016-03-08'),
                                           ('', 'Title 2', 'news_pic1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                           irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                           Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                           est laborum.', 'Second Author', '2016-03-08'),
                                           ('', 'Title 3', 'news_pic1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                           quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                           irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                           Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                           est laborum.', 'Another Author', '2016-01-15')
                                           ") === TRUE ) {
  echo 'Table news fed successfully.';
 } else echo 'Unsuccessful.'.$connect->error;
/*
$date = date('Y-m-d');
$query = 'UPDATE news SET news_date=\'2016-01-15\' WHERE id=3';
if( $connect->query($query) === TRUE ) {
  echo 'Date 3 fixed';
} else echo 'Nothing fixed. Bad luck.';

/*$query = 'UPDATE news SET news_text=\'Buch of funny stuff for the third news goes here\' WHERE id=3';
if( $connect->query($query) === TRUE ) {
  echo 'News 3 text changed';
} else echo 'Nothing fixed. Bad luck.';
*/
?>