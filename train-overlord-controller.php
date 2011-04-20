<!DOCTYPE html>
<html>
<head>
	<title>Train Overlord control</title>
	<link rel="stylesheet" type="text/css" href="train-overlord-controller.css" />

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.js"></script>
	<script type="text/javascript" src="jquery.qtip-1.0.0-rc3.min.js"></script>
	<script type="text/javascript" src="train-overlord-controller.js"></script>
</head>
<body>
	<div class="header">
		<div class="header-image">
			<img id="header-logo" class="logo" src="110px-Hacklab1.png" height="100" />
		</div>
		<div class="title-text">
			Train <a class="grey" href="http://www.youtube.com/watch?v=86zPFR4R0Ko#t=0m37s">Overlord</a> controller
		</div>
	</div>
	Command: 
	<select id="command-select" name="command">
		<option value="q">Query status</option>
		<option value="Q">Query verbose status</option>
		<option value="f">Move forward 1 second</option>
		<option disabled="true" value="F">Move forward until stopped - disabled for scripting</option>
		<option value="b">Move backward 1 second</option>
		<option disabled="true" value="B">Move Backwards until stopped - disabled for scripting</option>
		<option value="s">Stop</option>
		<option value="S">Stop ALL (Including winch)</option>
		<option value="u">Winch up for 1 second</option>
		<option value="U">Winch up until home switch reached</option>
		<option value="m">Winch down for 1 second</option>
		<option value="M">Winch down for 5 seconds</option>
		<option value="j">Stop winch</option>
		<option value="i">Toggle IR marker message ("--MARKER--")</option>
		<option value="a">Toggle move until IR hit then reverse</option>
		<option value="R">Reset</option>
	</select>
	<button id="add-command">Add this command</button>
	<p />
	<div id="command-listing-div">
		<strong class="header">Command sequence</strong> <img id="sequence-help" src="black_question_mark.png" height="20" /><button id="execute-commands">Execute sequence</button><p />
		<ol id="command-list">
		
		</ol>
	</div>
	<div id="result-div">
		<strong class="header">Results</strong> <img id="results-help" src="black_question_mark.png" height="20" /><p />
		<div id="results-content">
		</div>
	</div>
	
</body>
</html>
