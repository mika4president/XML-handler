
<?php
//usage: Sent receiver, send, heading and body with POST parameters.


//Check if POST request is done;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



      //Checken if username is sent
      //Reminder to self: POST is used in cases of "send this page data" and GET is used in cases of "read this page"
      if (isset($_POST['receiver'])){
        $receiver = $_POST['receiver'];
      } else {
        //TO-DO: What if no username was provided? Should we redirect, or set username to some value?
        echo "hmmm empty user-name?";
          }

          if (isset($_POST['heading'])){
            $heading = $_POST['heading'];
          }

          if (isset($_POST['body'])){
            $body = $_POST['body'];
          }


//configuration
$url = 'test.xml';
$messages = simplexml_load_file($url);
$currentdate = date('d-m-Y');
$currenttime = date('H:i:s');


//adding a new note to the XML
$note = $messages->addChild('note');
$date  = $note->addChild('date', $currentdate);
$time  = $note->addChild('time', $currenttime);
$to  = $note->addChild('to', $receiver);
$from  = $note->addChild('from', "sender");
$heading = $note->addChild('heading', $heading);
$body = $note->addChild('body', $body);


//writing to file with indented tags, to prevent squashing the tags. This makes it more readable.
$domxml = new DOMDocument('1.0');
$domxml->preserveWhiteSpace = false;
$domxml->formatOutput = true;
$domxml->loadXML($messages->asXML());
$domxml->save($url);
}

?>

<center>
  <h1>Append 2 xml</h1>
  This text is just here to tell you that all the processing happens without any output to the browser.<br>
   Check the results in <b><?php echo $url; ?></b>
</center>
