<?php

session_start();
if (isset($_SESSION['username'])) {
	$x = $_SESSION["userid"];
}

include_once "master/header.php";
include_once "master/dbconnection.php";
$sql = "SELECT * FROM tbl_banner ORDER BY id DESC";
$result = mysqli_query($connection, $sql);
$query = "SELECT * FROM tbl_song order by id desc limit 4";
$response = mysqli_query($connection, $query);

$qu= "SELECT * FROM tbl_song";
$re = mysqli_query($connection, $qu);



if (isset($_SESSION['username'])) {
	$q = "SELECT * FROM tbl_recent t1 INNER JOIN tbl_users t2 ON t1.user_id = t2.id JOIN tbl_song t3 ON t1.song_id = t3.id
	WHERE t1.user_id = $x order by t1.id desc limit 4";
	$r = mysqli_query($connection, $q);
}

$x = "SELECT * FROM tbl_recent";
$a = mysqli_query($connection, $x);


$song = "SELECT * FROM tbl_song ORDER BY COUNT DESC LIMIT 4";
$s = mysqli_query($connection,$song);


// foreach ($re as $song) { 
// 	$x=  $song['id'];
// 	echo $x;
// 		// echo $song['id'].'   ';
// 		$sq = "SELECT COUNT(song_id) FROM tbl_recent WHERE song_id = $x";
// 		$abc = mysqli_query($connection,$sq);

// 		}

// 		foreach ($abc as $demo){
// 			echo $demo;
// 		}
?>



<!-- Start slides -->
<div id="slides" class="cover-slides">
	<ul class="slides-container">
		<?php foreach ($result as $banner) { ?>
			<li class="text-center">
				<img src="../../Pages/Backend/images/<?= $banner['image'] ?>" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><?= $banner['name'] ?></h1>
							<p class="m-b-40"><?= $banner['description'] ?></p>
							<?php if ($banner['btntext']) { ?>
								<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="<?= $banner['link'] ?>"><?= $banner['btntext'] ?></a></p>

							<?php } ?>

						</div>
					</div>
				</div>
			</li>
		<?php } ?>
	</ul>
	<div class="slides-navigation">
		<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
		<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
	</div>
</div>
<!-- End slides -->

<!-- Start About -->

<div class="about-section-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<img src="images/listening_music.jpg" alt="" class="img-fluid">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 text-center">
				<div class="inner-column">

					<h1>Welcome To <span>CHORDS</span></h1>
					<p>

						Remember the first time you went to a show and saw your favorite band. You wore their shirt, and sang every word.
						You didn't know anything about scene politics, haircuts, or what was cool. All you knew was that this music made
						you feel different from anyone you shared a locker with. Someone finally understood you. This is what music is about.
					</p>
					<!-- <p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p> -->
					<!-- <a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a> -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End About -->
<style>
	.myBox {
		cursor: pointer;
	}
</style>

<!-- for recent post  start-->
<?php if (isset($_SESSION['username'])) { ?>
	<div class="text-center text"><a href="songs.php?name=recentlyplayed?">RECENTLY PLAYED</a></div>
	<div class="box" style="color: white;">
		<?php foreach ($r as $key => $song) { ?>
			<?php if (isset($_SESSION['username'])) : ?>
				<form method="post" action="#">
					<input type="text" value="<?= $song['id'] ?>" name="data" class="form" hidden>
					<input type="text" value="<?= $_SESSION["userid"] ?>" name="user" class="user" hidden>
				</form>
				<!-- <?= $song['id'] ?> -->
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

			<?php else : ?>
				<div class="player " onclick="location.href = 'login.php'" ; style="cursor: pointer;">
					<div class="imgbx" style="margin-top: 0;">
						<img src="../View/images/pause.jpg" class="img">
					</div>

					<div class="song"><?= $song['name'] ?></div>
					<div class="singer"><?= $song['singer'] ?></div>
					<audio class="audio">
						<source src="../Backend/songs/<?= $song['song'] ?>">
					</audio>
				</div>


			<?php endif; ?>
		<?php } ?>
	</div>

<?php } ?>
<!-- for recently played end -->



<!-- for new updates start -->
<div class="text-center text"><a href="songs.php?name=newupdates?">New Updates</a></div>
<div class="box" style="color: white;">

	<?php foreach ($response as $key => $song) { ?>
		<?php if (isset($_SESSION['username'])) : ?>
			<form method="post" action="#">
				<input type="text" value="<?= $song['id'] ?>" name="data" class="form" hidden>
				<input type="text" value="<?= $_SESSION["userid"] ?>" name="user" class="user" hidden>
			</form>
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

		<?php else : ?>
			<div class="player " onclick="location.href = 'login.php'" ; style="cursor: pointer;">
				<div class="imgbx" style="margin-top: 0;">
					<img src="../View/images/pause.jpg" class="img">
				</div>

				<div class="song"><?= $song['name'] ?></div>
				<div class="singer"><?= $song['singer'] ?></div>
				<audio class="audio">
					<source src="../Backend/songs/<?= $song['song'] ?>">
				</audio>
			</div>

		<?php endif; ?>
	<?php } ?>
</div>
<!-- for new updates end -->
<!-- for top hits start -->


<div class="text-center text"><a href="songs.php?name=tophits?">TOP HITS</a></div>
<div class="box" style="color: white;">

	<?php foreach ($s as $key => $song) { ?>
		<?php if (isset($_SESSION['username'])) : ?>
			<form method="post" action="#">
				<input type="text" value="<?= $song['id'] ?>" name="data" class="form" hidden>
				<input type="text" value="<?= $_SESSION["userid"] ?>" name="user" class="user" hidden>
			</form>
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

		<?php else : ?>
			<div class="player " onclick="location.href = 'login.php'" ; style="cursor: pointer;">
				<div class="imgbx" style="margin-top: 0;">
					<img src="../View/images/pause.jpg" class="img">
				</div>

				<div class="song"><?= $song['name'] ?></div>
				<div class="singer"><?= $song['singer'] ?></div>
				<audio class="audio">
					<source src="../Backend/songs/<?= $song['song'] ?>">
				</audio>
			</div>

		<?php endif; ?>
	<?php } ?>
</div>




<!-- for top hits end -->












<?php
include_once "master/footer.php";
?>

<script>
	let data = document.getElementsByClassName("myBox");
	let audio = document.getElementsByClassName("audio");
	let img = document.getElementsByClassName("img");

	// let tt = document.getElementsByTagName("audio");



	for (let x = 0; x < data.length; x++) {
		data[x].addEventListener("click", function(e) {
			var current = document.getElementsByClassName("active");
			var form = document.getElementsByClassName("form");
			var user = document.getElementsByClassName("user");
			if (current.length > 0) {
				var a = audio[x];
				var b = img[x];
				var c = form[x];
				var d = user[x];
				// for (let i = 0; i < audio.length; i++) {
				// 	if (!audio[i].paused) {
				// 		audio[i].pause();
				// 		img[i].src = "../View/images/pause.jpg"
				// 	}

				// }

				if (a.paused) {
					a.play();
					b.src = "../View/images/play.jpg"
					var name = $(c).val();

					var user = $(d).val();
					// console.log(user);

					var formData = {
						song_id: name,
						user_id: user,
					};
					$.ajax({
						url: "http://localhost/phpcore/Pages/view/submit.php",
						type: 'POST',
						data: formData,
						success: function(response) {

						}

					});


				} else {
					a.pause();
					b.src = "../View/images/pause.jpg"
				}

			}






		})
	}
</script>