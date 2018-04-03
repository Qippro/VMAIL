<?php

if(isset($_POST['submit'])){
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'cbpoorna@gmail.com';
$password = 'password3645';
//$username = $_POST['email'];
//$password = $_POST['pass'];

/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());



/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {
	
	/* begin output var */
	$output = '';
	
	/* put the newest emails on top */
	rsort($emails);
	$x=0;
	/* for every email... */
	foreach($emails as $email_number) {
	
	if($x==1)
		break;

	$x++;
		/* get information specific to this email */
		$overview = imap_fetch_overview($inbox,$email_number,0);
		$message = imap_fetchbody($inbox,$email_number,2);
		
		/* output the email header information */
		$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
		$output.= '<span class="subject">Subject:'.$overview[0]->subject.'<br></span> ';
		$output.= '<span class="from">From:'.$overview[0]->from.'<br></span>';
		$output.= '<span class="date">on '.$overview[0]->date.'</span>';
		$output.= '</div>';
		
		/* output the email body */
		$output.= '<div class="body">'.$message.'</div>';
	}
	
	echo $output;
} 
 $to = $_POST['email'];
    $from = "From: " . $to;
    $subject = "A New Address from  via wedding.joemorrow.org/contact";
    $body = "Here's a new address submissio";
    // If
imap_mail($to, $subject, $body, $from);
/* close the connection */
imap_close($inbox);
}
?>