<?php

define("ROOT", dirname(__DIR__) . DIRECTORY_SEPARATOR);

require(ROOT . "core/config.php");
require(ROOT . "core/route.php");
require(ROOT . "core/core.php");

session_set_cookie_params(86400,"/");
session_start();

route();