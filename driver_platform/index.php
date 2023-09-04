<?php
require('../model/database.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = '';
    }
}

//instantiate variable(s)
$a = '';
$b = '';
$c = NULL;
$d = array();

switch($action) {
    case 'a':
        break;
    case 'b':
        break;
    case 'c':
        break;
}
