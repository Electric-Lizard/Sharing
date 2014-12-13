<?php require "header.php"; ?>
<?php if(!$fileInfo): ?>
	<div>File not found</div>
<?php else: ?>
	<div><?php echo $fileInfo['fileName']; ?></div>
	<div><a href='<?php echo "{$_SERVER['PHP_SELF']}/../uploads/{$fileInfo['id']}/safety_name"; ?>' download="<?php echo $fileInfo['fileName']; ?>">Download</a></div>
<?php endif; ?>
<?php require "footer.php"; ?>