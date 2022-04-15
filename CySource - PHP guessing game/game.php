<?php
session_start();
if (isset($_GET["data"])) {
	if(!isset ($_SESSION["rand"])) {
		$_SESSION["rand"] = rand(1,10000);
		$_SESSION["count"] = 0;
	}
	
	if($_GET["data"] > $_SESSION["rand"]) {
		echo "menor";
	} else if($_GET["data"] < $_SESSION["rand"]) {
		echo "maior";
	} else {
		echo "Você acertou em " . $_SESSION["count"] . " tentativas.";
	}
	
	$_SESSION["count"]++;
	die();
}
?>

<!DOCTYPE html>
<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	</head>
	<body>

		<input type="text" id="num">
		<button id="btn">Guess the Number!</button>
		<span id="guess"></span>
		
		<script>
			$("#btn").click(function() {
				$.get("game.php", { "data":num.value }, function(data) {
					$("#guess").text(data);
				})
			});
		</script>

	</body>
</html>
