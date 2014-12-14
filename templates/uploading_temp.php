<?php require "header.php"; ?>
<script src="templates/js/upload.js"></script> 
<div class="uploading">
	<form enctype="multipart/form-data" action="upload" method="POST">
		<div class="file-field">
			<input type="hidden" name="MAX_FILE_SIZE" value="62914560">
			Select file: <input class="file-change" name="userFiles[]" type="file"><br>
			Comment: <br>
			<textarea class="comment" name="comments[]"></textarea>
		</div>
		<span id="add-more-button">(Add more)</span><br>
		<input class="submit" type="submit" value="Upload">
	</form>
</div>
<?php require "footer.php"; ?>