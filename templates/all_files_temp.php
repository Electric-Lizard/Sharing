<?php require "header.php"; ?>
<table class="list">
	<tr>
		<th>Filename</th><th>Size</th><th>Uploading time</th>
	</tr>
<?php foreach ($files as $file): ?>
	<tr>
		<td class="filename"><a href="<?php echo $file['id']; ?>"><?php echo $file['fileName']; ?></a></td>
		<td class="size">
			<?php if ($file['size'] >= 1024*1024) {
				echo round($file['size']/(1024*1024), 2).' MB';
				} elseif ($file['size'] >= 1024) {
					echo round($file['size']/1024, 2).' KB';
				} else {
					echo $file['size'].' bytes';
				} ; ?>
		</td>
		<td class="time"><?php echo $file['uploadingDatetime']; ?></td>
	</tr>
<?php endforeach; ?>
</table>
<?php require "footer.php"; ?>