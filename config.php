<?php
$db_url = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'admin';
$db_password = getenv('DB_PASSWORD') ?: 'cafe';
$db_name = getenv('DB_NAME') ?: 'cafe';
$currency = getenv('CURRENCY') ?: '$';
$timeZone = getenv('TIME_ZONE') ?: 'Asia/Kuala_Lumpur';
$server_url=getenv('SERVER_URL') ?: 'secretrecipedb.c1qc6y8aacwe.us-east-1.rds.amazonaws.com';
?>
