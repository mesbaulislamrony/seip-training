<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="<?php basepath(); ?>/css/style.css"
</head>
<body>
<?php
echo $_SERVER['DOCUMENT_ROOT']."<br>";
echo $_SERVER['SCRIPT_FILENAME']."<br>";
echo $_SERVER['SERVER_NAME']."<br>";
echo filter_input(INPUT_SERVER, 'DOCUMENT_ROOT')."<br>";
echo dirname(__FILE__)."<br>";
echo basename(__DIR__)."<br>";
echo basename(__FILE__)."<br>";
echo getcwd() . "\n"."<br>";
echo basename(getcwd())."<br>";
function srv_name(){
if ($_SERVER['SERVER_PORT'] != 80) {
    $port = ':'.$_SERVER['SERVER_PORT'];
} else {
    $port = '';
}
$name = $_SERVER['SERVER_NAME'];
if (isset($_SERVER['HTTPS'])) {
    $http = 'https://';  
} else {
    $http = 'http://';
}
return $http.$name.$port;
}
echo srv_name()."<br>";
echo $_SERVER['HTTP_HOST'];
echo $_SERVER['SERVER_NAME'];
echo $_SERVER["REQUEST_URI"];
echo "<br>";

function basepath(){
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
		$dir = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
		$array = explode('/', $dir);
		$pop = array_pop($array);
		echo implode('/', $array);
	}else{
		$dir = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
		$array = explode('/', $dir);
		$pop = array_pop($array);
		echo implode('/', $array);
	}
}
basepath();
?>
<h1>This is heading tag.<h1>
</body>
</html>