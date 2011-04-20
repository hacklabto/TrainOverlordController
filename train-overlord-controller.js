$(document).ready(function() {
	$('#execute-commands').click(function() {
		var cmdarray = [];
		$('#command-list li').each(function() {
			cmdarray.push ($(this).attr('data-cmd'));
		});
		if (cmdarray.length > 0)
		{
			$.post('talk-to-train-overlord.php', {cmd: cmdarray}, function (response) {
				$('#results-content').html(response);
			});
		}
	});
	$('#add-command').click(function() {
		$('#command-list').append(
				'<li data-cmd="' + $('#command-select').val() + '">' +
				$('#command-select option:selected').text() + 
				' <img src="cross16.png" class="delete-item" />' + 
				'</li>'
		);
		$('.delete-item').click(function () {
			$(this).parent('li').remove();
		});
	});
	$('#header-logo').hover(function () {
		$(this).attr('src', 'terminator2.jpg');
	}, function () {
		$(this).attr('src', '110px-Hacklab1.png');
	});
	$('#results-help').qtip ({
		content: 'This shows the text returned by Train Overlord. Each command can return multiple lines.',
		  style: {
			  border: {
				 width: 5,
				 radius: 10
			  },
			  padding: 10, 
			  textAlign: 'center',
			  tip: true, // Give it a speech bubble tip with automatic corner detection
			  name: 'cream' // Style it according to the preset 'cream' style
		   }
	});
});
