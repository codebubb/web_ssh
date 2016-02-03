<?php
include('vendor/autoload.php');
use \phpseclib\Net\SSH2;

echo <<< HTML
	<form action="ssh.php" method="POST">
		<label for="host">Host</label>
		<input name="host">
		<label for="user">Username</label>
		<input name="user">
		<label for="pass">Password</label>
		<input name="pass">
		<label for="port">Port</label>
		<input name="port" value="22">
		<input type="submit">
	</form>
HTML;
extract($_POST);
if(isset($host, $user, $pass)){
	$ssh = new SSH2($host, $port);
	if (!$ssh->login($user, $pass)) {
	    exit('Login Failed');
	}

	echo "<pre>" . $ssh->exec('ls -la') . "</pre>";
}


?>