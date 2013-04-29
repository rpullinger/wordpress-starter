<?php

require_once(dirname(__FILE__).'/mvc/controllers/errors_controller.php');

$errorsController = new errorController();
$errorsController->show404Page();

?>