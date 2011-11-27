<?php
// Ajax back end for Train overlord control
// expects commands in the cmd[] array
// created 2011-04-18 by alaina
// last updated 2011-04-18 by alaina

function de($str)
// debugging code
{
	if (false)
	{
		echo $str . "<br />";
		flush();
	}
}


de("here");
// wait one second if the command is in this array
$oneSecondCommands = array('f', 'b', 'u', 'm');
// wait five seconds if the command is in this array
$fiveSecondCommands = array('M', 'l');
// return text status
$returnTextCommands = array('q', 'Q');


// open the USB serial port for the Xbee
$fp = fopen("/dev/ttyUSB1", "w+");

//Report an error if failed
if (!$fp)
{
	echo "Open failed!";
	exit;
}

if (isset($_REQUEST['cmd']))
// if $_REQUEST['cmd'] is set, loop through the array and get the commands; otherwise, default to 'q', the status
// command
{
	de("cmd is set");
	foreach($_REQUEST['cmd'] as $c)
	{
		de($c);
		$command[] = $c;
	}
} else {
	de ("cmd is not set");
	$command[] = "q"; // status
}
de ("size of array: " . count($command));
//stream_set_blocking($fp, false);

// now loop through the commands and execute them, then push the returned text into an array
//
//while (true)
//{
	foreach ($command as $c)
	{
		// execute the command
		fwrite($fp, $c);
		if (in_array($c, $oneSecondCommands)) // wait one second for this command to execute before executing the next one
		{
				sleep (1);
		} else if (in_array($c, $fiveSecondCommands)) // wait five seconds for this command to execute before executing the next one
		{
				sleep (5);
		}
		$retStrings[] = "'" . $c . "': done";
		
	}
//	reset($command);
//}

foreach ($retStrings AS $r)
{
	echo $r . "<br />";
}
?>
