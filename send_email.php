<?php

require 'phpmailer/class.phpmailer.php';

if(!$_POST) exit;

      $civilite = parse_str($_POST['civilite']);
      $name     = parse_str($_POST['nom']);
      $email    = parse_str($_POST['email']);
      $subject  = parse_str($_POST['sujet']);
      $message  = $_POST['message'];

      $toSendTomail = 'lapierre.bruno@outlook.com';

      $filename = basename($_FILES["fileToUpload"]["name"]);
      // make a moveuploaded file
      $path = 'uploads';
      $file = $path . "/" . $filename;
      // On peut valider le fichier et le stocker définitivement
      move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$file);

      $content = file_get_contents($file);




$mail = new PHPMailer();

//On donne l'encodage :
$mail->CharSet = "utf-8";
$mail->IsHTML(false);
$mail->Host = 'smtp.domaine.fr';
$mail->SMTPAuth   = false;
$mail->Port = 25;


// Expéditeur
$mail->SetFrom($email, 'Lapierre Bruno');
// Destinataire
$mail->AddAddress($toSendTomail, 'Lapierre Bruno');
// Objet
$mail->Subject = $subject;


// Votre message
//$mail->MsgHTML('Contenu du message en HTML');
// $mail->MsgHTML();
// $mail->Body = "<p>$message</p>";
$mail->Body = $message;


// file as an attached file
//$mail->AddAttachment('./mon_fichier_joint.zip');
// $mail->AddAttachment($file);

$mail->AddAttachment($filename);

// Envoi du mail avec gestion des erreurs
if(!$mail->Send()) {
  echo 'Erreur : ' . $mail->ErrorInfo;
} else {
  echo 'Message envoyé !';
}

 ?>
