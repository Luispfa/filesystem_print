<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'Folder.php';
require_once 'PrintAll.php';

$subfolder = "";
if (!empty($_GET)) {
    $subfolder = $_GET['s'];
}

$path = '/var/www/html/' . $subfolder;

$print = new Folder($path);

$directories = $print->getDirectories();
$files = $print->getFiles();

echo PrintAll::exec($path, $directories, $files);
