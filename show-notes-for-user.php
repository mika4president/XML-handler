<?php
//username is sent from submitted form @ send-username.html


$messages = simplexml_load_file('test.xml');


//Check if POST request is done;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {



      //Checken if username is sent
      //Reminder to self: POST is used in cases of "send this page data" and GET is used in cases of "read this page"
      if (isset($_POST['user'])){
        $username = $_POST['user'];
      } else {
        //TO-DO: What if no username was provided? Should we redirect, or set username to some value?
        echo "hmmm empty user-name?";
          }



foreach ($messages as $value) {
  $vars = get_object_vars ( $value );
  if ( ($vars["to"]) == $username){
   //message is direct to user, so proceeding
   echo "<b><span>Date: ";
   echo $vars["date"];
   echo "</span>";
   echo " Time: ";
   echo $vars["time"];
   echo "<br>";
   echo "To: ";
   echo $vars["to"];
   echo "<br>";
   echo "From: ";
  echo $vars["from"];
   echo "<br>";
echo "Subject: ";
  echo $vars["heading"];
   echo "<br></b>";
  echo $vars["body"];
  echo "<br><a href='reply.php?to=";
  echo $vars["from"];
  echo "'>Send Reply</a>";
   echo "<br><br>";
 }
 else{
  // message is not directed to user, ignoring
 }

}
}

?>
