$(function() {
$("#add-more-button").click(function() {
	var fileField = '<div class="file-field"> <input type="hidden" name="MAX_FILE_SIZE" value="30000"> Select file: <input class="file-change" name="userFiles[]" type="file"><br> Comment: <br><textarea class="comment" name="comments[]"></textarea><br><br></div>';
	$(".file-field").eq(-1).after(fileField);
})
//end
});