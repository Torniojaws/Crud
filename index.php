<!doctype html>
<html lang="fi">
<head>
	<title>Paste 3</title>
	<meta charset="UTF-8" />
	<link href="tyyli.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
	// Includes
	include('classes/class-bulletin.php');
	include('classes/class-filecrud.php');
	
	// Config
	$separator = '|@|';
	$datafile = 'data.txt';
	
	// Board
	$board = new Bulletin($datafile, $separator);
	$board->display();
	
	// Testing file write
	$test = 'testi.txt';
	$testIndex = 1414567891;
	$crud = new FileCrud($test, $separator);
	echo $crud->readRow($testIndex);
		
?>

</body>
</html>