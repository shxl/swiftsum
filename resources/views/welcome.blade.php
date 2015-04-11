<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Code</title>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

	@include('vendor.flash.message')

  	<h2>Generate SwiftSum</h2>
  	<div>
	  	<select name="songs" id="selectSongs" multiple>
	  		<option value="3" selected>Some song</option>
	  		<option value="3" selected>Some song</option>
	  		<option value="3" selected>Some song</option>
	  	</select>

	  	<br>

	  	<label>Paragraphs: <input type="text" name="paragraphs"></label>

		<br>

	  	<a href="#">Generate</a>
  	</div>

	<br><br>
	<a href="#">Custom build</a>

  </body>
</html>