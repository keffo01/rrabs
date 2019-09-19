<!DOCTYPE html>
<html>
<head>
	<title></title>
	<head>
		<meta charset="UTF-8">
		<title>estrellas</title>
		<style>

		form{ width:250px; margin:0 auto; padding:10px; border: 1px solid #d9d9d9;}
		form p, form input[type = "submit"]{text-align:center; font-size:20px;}


	input[type = "radio"]{ display:none;/*position: absolute;top: -1000em;*/}
	label{ color:grey;}

	.clasificacion{
		direction: rtl;
		unicode-bidi: bidi-override;
	}

	label:hover,
	label:hover ~ label{color:orange;}
	input[type = "radio"]:checked ~ label{color:orange;}

</style>
</head>
<body>
	<div id="wrapper">


		<form action="" method="post">
			<p>estrellas: 3</p>
			<p class="clasificacion">
				<input id="radio1" type="radio" name="estrellas" value="5"><label for="radio1">★</label>
				<input id="radio2" type="radio" name="estrellas" value="4"><label for="radio2">★</label>
				<input id="radio3" type="radio" name="estrellas" value="3"><label for="radio3">★</label>
				<input id="radio4" type="radio" name="estrellas" value="2"><label for="radio4">★</label>
				<input id="radio5" type="radio" name="estrellas" value="1"><label for="radio5">★</label>
			</p>

			<p><input type="submit" value="submit" name="submit"></p>
		</form>
	</div>
	<div>

	</div>

</body>

</html>