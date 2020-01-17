<?php
require_once 'config.php';

$templateParams["title"] = "My Events";
$templateParams["navbar"] = "eventsNav.php";
$templateParams["head"] = "head.php";
$templateParams["content"] = "createdEvent.php";

require 'template/base.php';

 ?>
