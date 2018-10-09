<?php

// database connection

define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','oop_project_db');

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


if($connection): echo 'true';
else: echo 'no connection';
endif;