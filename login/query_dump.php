/*
$query = 'CREATE TABLE users (id INT(6) AUTO_INCREMENT PRIMARY KEY,
																										name VARCHAR(50),
																										nickname VARCHAR(12),
																										rank INT(2))';

if( $db_connect->dbh->query($query) ) {
  echo 'Success.';
} else { echo 'Dumb shit.'; }

 $db_connect->insertRow('users',
																			array('name','nickname','rank'),
																			array('Davud','davud4ik','1'));
*/
$salt = rand(10000, 99999);
$password = md5('password'.$salt);

$db_connect->update("users","password",$password,"name = 'Aydin'");
$db_connect->update("users","salt",$salt,"name = 'Aydin'");
$db_connect->query("users");
