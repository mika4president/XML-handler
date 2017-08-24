
<?php
$url = 'test.xml';
$desserts = simplexml_load_file($url);
$currentdate = date('d-m-Y');
$currenttime = date('H:i:s');

$note = $desserts->addChild('note');
$date  = $note->addChild('date', $currentdate);
$time  = $note->addChild('time', $currenttime);
$to  = $note->addChild('to', "receiver");
$from  = $note->addChild('from', "sender");
$heading = $note->addChild('heading', "This is my Heading");
$body = $note->addChild('body', "And this is my busdy");

//writing to file with indented tags, to prevent 1-line XML
$domxml = new DOMDocument('1.0');
$domxml->preserveWhiteSpace = false;
$domxml->formatOutput = true;
$domxml->loadXML($desserts->asXML());
$domxml->save($url);


?>

<center>
  <h1>Append to XML File</h1>
  This text is just here to tell you that all the processing happens without any output to the browser.<br>
   Check the results in <b><?php echo $url; ?></b>
</center>
