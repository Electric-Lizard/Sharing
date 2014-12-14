<?php require "header.php"; ?>
<?php if ($fileInfo['size'] >= 1024*1024) {
		$fileSize = round($fileInfo['size']/(1024*1024), 2).' MB';
	} elseif ($fileInfo['size'] >= 1024) {
		$fileSize = round($fileInfo['size']/1024, 2).' KB';
	} else {
		$fileSize = $fileInfo['size'].' bytes';
	} ?>
<script src="../templates/js/file.js"></script>
<?php if(!$fileInfo): ?>
	<div class="error">File not found</div>
<?php else: ?>
	<div class="file-title">
		<span id="filename"><?php echo $fileInfo['fileName']; ?></span>
		<span id="size">(<?php echo $fileSize; ?>)</span>
	</div>
	<div class="file-content">
		<?php if (getimagesize(__DIR__ . "/../uploads/{$fileInfo['id']}/safety_name") !== false): ?>
			<img class="preview" src="<?php echo "{$_SERVER['PHP_SELF']}/../uploads/{$fileInfo['id']}/safety_name"; ?>">
		<?php endif; ?>
		<div id="comment"><?php if (!empty($fileInfo['comment'])) echo $fileInfo['comment']; ?></div>
		<div id="download"><a href="<?php echo "{$_SERVER['PHP_SELF']}/../download/{$fileInfo['id']}"; ?>">Download</a></div>
		<div id="id">id: <span id="id-self"><?php echo $fileInfo['id']; ?></span></div>
	</div>
<?php endif; ?>
<?php require "footer.php"; ?>