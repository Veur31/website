<?php 
$dbcon = @mysqli_connect('localhost', 'fetesiotimothy2', 'fetesiotimothy2', 'members_fetesio')
OR die('Could not connect to MySQL: Error in'.mysqli_connect_error());
mysqli_set_charset($dbcon, 'utf8');

