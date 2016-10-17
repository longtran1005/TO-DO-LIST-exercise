<?php
// Include Config
require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/tasks.php');
require('controllers/users.php');
require('controllers/categories.php');

require('models/home.php');
require('models/task.php');
require('models/user.php');
require('models/category.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}