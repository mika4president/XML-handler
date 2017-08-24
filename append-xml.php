
<?php
$url = 'test.xml';
$desserts = simplexml_load_file($url);

$note = $desserts->addChild('note');
$date  = $note->addChild('date', "datum");
$time  = $note->addChild('time', "tijd");
$to  = $note->addChild('to', "receiver");
$from  = $note->addChild('from', "sender");
$heading = $note->addChild('heading', "This is my Heading");
$body = $note->addChild('body', "And this is my body");


//echo $desserts->asXML(); // of print_r is eigenlijk beter


//writing to file:
//$desserts->asXML($url);

//writing to new file with indented tags, anders wordt het maar 1 line
$domxml = new DOMDocument('1.0');
$domxml->preserveWhiteSpace = false;
$domxml->formatOutput = true;
/* @var $xml SimpleXMLElement */
$domxml->loadXML($desserts->asXML());
$domxml->save($url);


?>

<center>
  <h1>Append 2 xml</h1>
  This text is just here to tell you that all the processing happens without any output to the browser.<br>
   Check the results in <b><?php echo $url; ?></b>
</center>
