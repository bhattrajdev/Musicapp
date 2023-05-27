

let data = document.getElementsByClassName("myBox");
	let audio = document.getElementsByClassName("audio");
	let img = document.getElementsByClassName("img");

	// let tt = document.getElementsByTagName("audio");

	for (let x = 0; x < data.length; x++) {
		data[x].addEventListener("click", function(e) {
			var current = document.getElementsByClassName("active");
			if (current.length > 0) {
				var a = audio[x];
				var b = img[x];
				if(a.paused && b.src.match("pause")) {			
				a.play();
				b.src = "../View/images/play.jpg"
					
				}
				else{
				a.pause();
				b.src = "../View/images/pause.jpg"
				}
		

			}

		})

	}