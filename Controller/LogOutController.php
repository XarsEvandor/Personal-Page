<?php
session_start();
session_unset();
session_destroy();

header('Location: __DIR__./../../View/HTML/HomePage.html');