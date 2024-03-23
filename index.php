<?php
require_once "./app/config/App.php";

App::install();
header("Location:app/views/index.php");
