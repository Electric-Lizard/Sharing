<?php
require_once "database.php";
class Sharing {
	public function __construct() {
		$this->database = new Database;
	}
	public function getFileInfo($id) {
		$dbPrepared = $this->database->db->prepare('SELECT * FROM files WHERE id=?');
		$dbPrepared->execute(array($id));
		$fileInfo = $dbPrepared->fetch();
		return $fileInfo;
	}
	public function listFiles() {
		$files = [];
		$dbPrepared = $this->database->db->prepare('SELECT * FROM files ORDER BY id DESC LIMIT 100');
		$dbPrepared->execute();
		while($fileInfo = $dbPrepared->fetch()) $files[] = $fileInfo;
		return $files;
	}
	public function uploadFiles($files) {
		$responseArray = [];
		foreach ($files['name'] as $key => $fileName) {
			if (empty($fileName)) continue;
			$uploadDir = 'uploads/';
			if (!file_exists('uploads')) {
				mkdir('uploads', 0777, true);
			}
			$uploadingFile = $uploadDir . 'safety_name';
			$uploadResponse = new UploadResponse;
			$uploadResponse->fileName = $fileName;
			if ($files['size'][$key] > 62914560 || $files['size'][$key] == 0) $uploadResponse->errors[] = 'Too large file';
			if (empty($uploadResponse->errors)) {
				if (move_uploaded_file($files['tmp_name'][$key], $uploadingFile)) {
					$dbPrepared = $this->database->db->prepare('INSERT INTO files (fileName, uploadingDatetime, size, comment) VALUES (?,?,?,?)');
					$dbPrepared->execute(array($fileName, date("Y-m-d H:i:s"), $files['size'][$key], $_POST['comments'][$key]));
					$id = $this->database->db->lastInsertId();
					mkdir($uploadDir.$id);
					if (!rename($uploadingFile, $uploadDir.$id.'/'.'safety_name')) {
						unlink($uploadingFile);
						$uploadResponse->errors[] = 'Can\'t create a new directory';
					} else {
						$uploadResponse->id = $id;
						$uploadResponse->isSuccess = true;
					}
				} else $uploadResponse->errors[] = "Unknown error";
			}
			$responseArray[] = $uploadResponse;
		}
		return $responseArray;
	}
}
class UploadResponse {
	public function __construct() {
		$this->errors = [];
		$this->isSuccess = false;
	}
	//public $this->fileName;
}