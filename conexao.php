<?php
define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASS', '');
define('DB', 'login');

$conexao = mysqli_connect(HOST, USER, PASS, DB) or die ('http://127.0.0.1:5500/login.html');