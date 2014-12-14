<?php
define('APP_ROOT', __FILE__.'/../');
$appFolder = "/Slim_Sharing/";
define('APP_URL', 'http://'.$_SERVER['SERVER_NAME'].$appFolder);
require_once "vendor/autoload.php";
require_once "includes/sharing.php";
$app = new \Slim\Slim(array(
	"debug" => "true"
));
$app->sharing = new Sharing;
$app->get('/', function () use ($app) {
    $app->render('uploading_temp.php');
});
$app->get('/files/', function() use ($app) {
	$files = $app->sharing->listFiles();
	$app->render('all_files_temp.php', array('files' => $files));
});
$app->get('/files/(:id)', function($id) use ($app) {
	$fileInfo = $app->sharing->getFileInfo($id);
	$app->render('file_temp.php', array('fileInfo' => $fileInfo));
});
$app->post('/upload/', function() use ($app) {
	$responseArray = $app->sharing->uploadFiles($_FILES['userFiles']);
	$app->render('uploading_response_temp.php', array('responseArray' => $responseArray));
});
$app->get('/download/(:id)', function($id) use ($app) {
	$fileInfo = $app->sharing->getFileInfo($id);
	header("Content-Disposition: attachment; filename=\"{$fileInfo['fileName']}\"");
	header("Location: ./uploads/{$fileInfo['id']}/safety_name");
});
$app->run();