<?php

require 'phpmailer/class.phpmailer.php';
require 'fpdf181/fpdf.php';



if(!$_POST) exit;

      $civilite = parse_str($_POST['civilite']);
      $name     = parse_str($_POST['nom']);
      $email    = parse_str($_POST['email']);
      $subject  = parse_str($_POST['sujet']);
      $message  = $_POST['message'];

      $toSendTomail = 'lapierre.bruno@outlook.com';

      // $filename = basename($_FILES["fileToUpload"]["name"]);
      // // make a moveuploaded file
      // $path = 'uploads';
      // $file = $path . "/" . $filename;
      // // On peut valider le fichier et le stocker définitivement
      // move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$file);
      //
      // $content = file_get_contents($file);

      /************************FPDF*************************************/

        class PDF extends FPDF
        {
          // En-tête
          function Header()
          {
              // Logo
              //$this->Image('uploads/logo.png',10,6,30);
              $this->Image('logo.jpg');
              // Police Arial gras 15
              $this->SetFont('Arial','B',15);
              // Décalage à droite
              $this->Cell(80);
              // Titre
              $this->Cell(30,10,'Titre',1,0,'C');
              // Saut de ligne
              $this->Ln(20);
          }

          // Pied de page
          function Footer()
          {
              // Positionnement à 1,5 cm du bas
              $this->SetY(-15);
              // Police Arial italique 8
              $this->SetFont('Arial','I',8);
              // Numéro de page
              $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
          }
        }



      // $pdf = new FPDF('P','mm','A4');
      $pdf=new FPDF();

      //set font for the entire document
      $pdf->SetFont('times','',12);
      $pdf->SetTextColor(50,60,100);

      //set up a page
      $pdf->AddPage('P');
      $pdf->SetDisplayMode(real,'default');

      //Set x and y position for the main text, reduce font size and write content
      $pdf->SetXY (10,60);
      $pdf->SetFontSize(12);
      $pdf->Write(5,"Bonjour M. John Smith \n\n");

      for($i=1;$i<=10;$i++)
      {
        //$pdf->Cell(0,10,'Impression de la ligne numéro '.$i,0,1);
        //$pdf->Cell(0,10,'Impression de la ligne numéro ' . $i,0,1);
        //$pdf->Write(5,'Congratulations! You have generated a PDF. ');
        //$pdf->SetXY(20,80);
        //$pdf->SetFontSize(10);
        $pdf->Write(5,"Congratulations! You have generated a PDF ligne : $i \n\n");
      }
      $pdf->Image('logo.jpg');
      $pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',60,30,90,0,'PNG');


      //Output the document
      $filename="uploads/test.pdf";
      $pdf->Output($filename,'F');



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
