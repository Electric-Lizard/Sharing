<?php require "header.php"; ?>
<?php if (count($responseArray) == 1 && $responseArray[0]->isSuccess) {
	header("Location: files/".$responseArray[0]->id);
	die();
}?>	
<?php foreach ($responseArray as $response): ?>
	<?php if ($response->isSuccess): ?>
		<div>
			Link to <a href="files/<?php echo $response->id; ?>"><?php echo $response->fileName; ?></a>
		</div>
	<?php else: ?>
		<div>
			Errors occured while uploading <?php echo $response->fileName; ?>:<br>
			<?php foreach ($response->errors as $error): ?>
				<span><?php echo $error; ?></span><br>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
<?php endforeach; ?>
<?php require "footer.php"; ?>