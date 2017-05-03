<?php

echo 'test test !';


require '/phpmailer/class.phpmailer.php';
// require_once('/PHPMailer/class.phpmailer.php');


// if(!$_POST) exit;
//
// 		$civilite = $_POST['civilite'];
// 		$name     = $_POST['nom']);
// 		$email    = $_POST['email'];
// 		$subject  = $_POST['sujet'];
// 		$message  = $_POST['message'];
//
// 		$mailto = 'lapierre.bruno@outlook.com';
//
// 		// carriage return type (RFC)
//     $eol = "\r\n";
//
//     /* wordwrap ave $message */
// 		$e_body = "Vous avez été contatcté par $civilite $name, voici le message : " . $eol . $eol;
// 		$e_content = "\"$message\"" . $eol . $eol;
// 		$e_reply = "Vous pouvez contacter $civilite $name via email à cette adresse,\n" .  $email;
//
// 		$msg = wordwrap( $e_body . $e_content . $e_reply, 80 );
//     $lecontenudumail = parse_str($msg);
//
//     //objet mail
// 		$mail = new PHPMailer();
//
// 		//On précise que notre E-Mail sera au format HTML (si c'est du texte, ne pas ajouter) :
// 		$mail->IsHTML(true);
//
// 		//On donne l'encodage :
// 		$mail->CharSet = "utf-8";
//
//     //On ajoute l'expéditeur :
// 		$mail->SetFrom($email, 'Expéditeur');
//
// 		//L'objet du mail :
// 		$mail->Subject = $subject;
//
// 		//Son contenu :
// 		$mail->Body = $lecontenudumail;
//
// 		//On ajoute le ou les destinataires (si vous avez plusieurs destinataires, il suffit de dupliquer la ligne) :
// 		$mail->AddAddress($mailto);
// 		// $mail->AddAddress('nvilla@simplon.co');
//     // $mail->AddAddress('pbelaire@simplon.co');
//
// 		//Et il ne reste plus qu'à envoyer.
//     $mail->Send();


		//$mailto = 'pbelaire@simplon.co';

		// $filename = basename($_FILES["fileToUpload"]["name"]);
		// // make a moveuploaded file
    // $path = 'uploads';
    // $file = $path . "/" . $filename;
		// // On peut valider le fichier et le stocker définitivement
		// move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$file);


echo 'test 1 !';

		if(!$_POST) exit;
echo 'test 2 !';
				$civilite = $_POST['civilite'];
				$name     = $_POST['nom']);
				$email    = $_POST['email'];
				$subject  = $_POST['sujet'];
				$message  = $_POST['message'];
echo 'test 3 !';
				$toSendTomail = 'lapierre.bruno@outlook.com';
echo 'test 4 !';
				// // carriage return type (RFC)
		    // $eol = "\r\n";
				//
		    // /* wordwrap ave $message */
				// $e_body = "Vous avez été contatcté par $civilite $name, voici le message : " . $eol . $eol;
				// $e_content = "\"$message\"" . $eol . $eol;
				// $e_reply = "Vous pouvez contacter $civilite $name via email à cette adresse,\n" .  $email;
				//
				// $msg = wordwrap( $e_body . $e_content . $e_reply, 80 );
		    // $lecontenudumail = parse_str($msg);


				// $mail = new PHPMailer;
				// $mail->setFrom($email, $name);
				// $mail->addAddress($toSendTomail, 'My Friend');
				// $mail->Subject  = 'First PHPMailer Message';
				// $mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
				// if(!$mail->send()) {
				//   echo 'Message was not sent.';
				//   echo 'Mailer error: ' . $mail->ErrorInfo;
				// } else {
				//   echo 'Message has been sent.';
				// }



echo 'test 5 !';
				$mail = new PHPMailer();
				$mail->Host = 'smtp.domaine.fr';
				$mail->SMTPAuth   = false;
				$mail->Port = 25; // Par défaut
echo 'test 6 !';
				// Expéditeur
				$mail->SetFrom($email, $nom);
				// Destinataire
				$mail->AddAddress($toSendTomail, 'Lapierre Bruno');
				// Objet
				$mail->Subject = $subject;
echo 'test 7 !';
				// Votre message
				$mail->MsgHTML('Contenu du message en HTML');
echo 'test 8 !';
				// Envoi du mail avec gestion des erreurs
				if(!$mail->Send()) {
					echo 'Erreur : ' . $mail->ErrorInfo;

					echo 'test 9 !';
				} else {
					echo 'Message envoyé !';

					echo 'test 10 !';
				}











?>
