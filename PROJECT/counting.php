  <?php

if(isset($_POST['submit'])){
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = $_POST['email'];
$password = $_POST['pass'];

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
/* grab emails */
$emails = imap_search($inbox,'ALL');
$ct=0;
$e=0;
if($emails)
 {
   rsort($emails);
 }      
 foreach($emails as $email_number) {
     
          $output = '';
           $overview = imap_fetch_overview($inbox,$email_number,0);
          if(!($overview[0]->seen))
          {
           $ct++;
           }
         $e++;
        if($e>50) break;
       }
$c =(string)$ct;
?>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
     <textarea id="t" style="display:none;"><?php  echo( $c); ?></textarea>
      <script>setTimeout(responsiveVoice.speak("Number of unread messages is "),100);</script>
     <script>setTimeout(responsiveVoice.speak($('#t').val()),900);</script>

                            
<?php
	
/* close the connection */
imap_close($inbox);
}
?>