<?php
$config = array(
  // 'DB_HOST'     => 'localhost',
  // 'DB_NAME'     => 'checkin_server',
  // 'DB_USER'     => 'root',
  // 'DB_PSWD'     => '',
  // 'DB_PORT'     => 3306,
  // 'DB_PREFIX'   => 'tcapps_checkin_',
  // 'DB_CHARSET'  => 'utf8'
  'DB_HOST'     => $_ENV['MYSQL_HOST'],
  'DB_NAME'     => $_ENV['MYSQL_DBNAME'],
  'DB_USER'     => $_ENV['MYSQL_USERNAME'],
  'DB_PSWD'     => $_ENV['MYSQL_PASSWORD'],
  'DB_PORT'     => $_ENV['MYSQL_PORT'],
  'DB_PREFIX'   => 'tcapps_checkin_',
  'DB_CHARSET'  => 'utf8'
);
?>
