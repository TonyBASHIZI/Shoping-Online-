<?php



	include ( "src/NexmoMessage.php" );


	/**
	 * To send a text message.
	 *
	 */

	// Step 1: Declare new NexmoMessage.
	$nexmo_sms = new NexmoMessage('d932915b', '2miNaSrdsLFOEenA');

	// Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	$info = $nexmo_sms->sendText( '+243999480308', 'Mapasa_Car', 'Bonjour Muderhwa, vous avez un colis,votre code est de retrait est:08, veillez passer retirer.');

	// Step 3: Display an overview of the message
	echo $nexmo_sms->displayOverview($info);

	// Done!

?>