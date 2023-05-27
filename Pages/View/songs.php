<?php
session_start();
$x = $_SESSION["userid"];
include_once "master/header.php";
include_once "master/dbconnection.php";

$name = $_GET['name'];
$name = str_replace('?', '', $name);

if ($name === "newupdates") {
	$query = "SELECT * FROM tbl_song order by id desc limit 8";
	$name = "New Updates";
}
if ($name === "recentlyplayed") {
	$query = "SELECT * FROM tbl_recent t1 INNER JOIN tbl_users t2 ON t1.user_id = t2.id JOIN tbl_song t3 ON t1.song_id = t3.id
	WHERE t1.user_id = $x order by t1.id ";
	$name = "recently played";
}
if($name ==="tophits"){
	$query = "SELECT * FROM tbl_song ORDER BY COUNT DESC LIMIT 8";
	$name = "Top Hits";

}

if ($name === "") {
	$query = "SELECT * FROM tbl_song order by id desc";
	$name = "All songs";
}
$response = mysqli_query($connection, $query);
echo $name;
?>

<style>
	.txt {
		padding-top: 50px;
		font-size: 30px;
		text-transform: uppercase;
		color: black;
		font-weight: 400;
		font-family: 'Times New Roman', Times, serif;
	}

	.myBox {
		cursor: pointer;
	}
</style>





<h1 class="text-center txt"><?= $name ?></h1>

<div class="container-fluid">
	<div class="row">
		<?php foreach ($response as $key => $song) { ?>
			<div class=" col-lg-3 box">
				<div class="player myBox">
					<div class="imgbx" style="margin-top: 0;">
						<img src="../View/images/pause.jpg" class="img">
					</div>
					<div class="song"><?= $song['name'] ?></div>
					<div class="singer"><?= $song['singer'] ?></div>
					<div class="singer" >Views : <?= $song['count'] ?></div>
					<audio controls class="audio">
						<source src="../Backend/songs/<?= $song['song'] ?>">
					</audio>
				</div>

			</div>


		<?php } ?>

	</div>
</div>

<script>
	let data = document.getElementsByClassName("myBox");
	let audio = document.getElementsByClassName("audio");
	let img = document.getElementsByClassName("img");

	// let tt = document.getElementsByTagName("audio");

	for (let x = 0; x < data.length; x++) {
		data[x].addEventListener("click", function(e) {
			var current = document.getElementsByClassName("active");
			if (current.length > 0) {
				console.log(audio[x])
				var a = audio[x];
				var b = img[x];
				if (a.paused && b.src.match("pause")) {
					a.play();
					b.src = "../View/images/play.jpg"
				} else {
					a.pause();
					b.src = "../View/images/pause.jpg"
				}


			}

		})

	}
</script>

<?php
include_once "master/footer.php";
?>