<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Swiftsum</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<div id="mask">
		<div class="cont">
			<h1>Swiftsum</h1>
			<h3>A less shit Lorem Ipsum</h3>


			@if(count($albums) >= 1)
			<form action="/generate">
				<input type="text" name="pcount" placeholder="number of paragraphs xox" max-length="2"><br><br>
				@foreach($albums as $album)
					<input type="radio" name="album" value="{{ $album->slug }}">{{ $album->name }}</input>
				@endforeach
				<br>
				<button type="submit" class value="Shake it off!">Shake it off!</button>
			@endif
		</div>
	</div>
		
		<video autoplay loop class="bgvid">
			<source src="assets/baelor-home.mp4" type="video/mp4">
			Nope.
		</video>
		<section class="main">
			@foreach($paragraphs as $paragraph)
				<p>{{ $paragraph }}</p>
			@endforeach
		</section>
		<footer>
		<div class="main">
			<p>built in the last 30 minutes by <a href="http://twitter.com/_shadj">@_shadj</a>,<a href="http://twitter.com/duffleman">@duffleman</a>, <a href="http://twitter.com/_emmacorlett">@_emmacorlett</a> and <a href="http://twitter.com/0xdeafcafe">@0xdeafcafe</a></p>
		</div>
			
		</footer>
	</body>
</html>