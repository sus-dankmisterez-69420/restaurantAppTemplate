<?php
require "defines.php";

require "model/Router.php";

session_start();

(new Router())->route();