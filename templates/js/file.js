onload = function() {
	//adding players
	var filename = $("#filename").html();
	var filenameArray = filename.split(".");
	var extension;
	var fileId = document.getElementById("id-self").innerHTML;
	if( filenameArray.length === 1 || ( filenameArray[0] === "" && filenameArray.length === 2 ) ) {
	    extension = "";
	} else extension = filenameArray.pop();

	var video = document.createElement("video");
	video.setAttribute("controls", "controls");
	video.src = "../uploads/" + fileId + "/safety_name";
	if (video.canPlayType("video/" + extension).length) {
		document.getElementById("content").appendChild(video);
	} else {
		var audio = document.createElement("audio");
		audio.setAttribute("controls", "controls");
		audio.src = "../uploads/" + fileId + "/safety_name";
		if (audio.canPlayType("audio/" + extension).length) document.getElementById("content").appendChild(audio);

	}
}