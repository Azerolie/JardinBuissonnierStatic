<head>

<?php
// La variable $verif va nous permettre d'analyser si la sémantique de l'e-mail est bonne
$verif="!^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$!";
  
// On assigne et protège nos variables
$votremail=$_POST["mail"];
$from='Content-Type: text/plain; charset="utf-8"'." ";
$from.=htmlspecialchars("From: ".$votremail."\r\n");
$message="Message envoyé par : " . $_POST["nom"]."\r\n";
$message.="Numéro de téléphone : " . $_POST["numero"]."\r\n";
date_default_timezone_set('France/Paris');
$date = date('m/d/Y h:i:s a', time());
$message.= "Date : " . $date."\r\n";
$message.= "Email : " . $votremail."\r\n";
$message.="Message : " . stripslashes(htmlspecialchars($_POST["message"]));
  
// On met ici notre e-mail
$destinataire="emma.prudent@laposte.net";
  
/* On place le sujet du message qui, ici, sera toujours le même
puisque dans la partie Html, on l'a mis en caché grâce au type="hidden"<gras><couleur nom="rouge">  </couleur></gras> avec comme valeur "Vous avez un nouveau message"  */
$objet=$_POST['objet'];
  
// C'est bon : on est ok, vérifions si l'e-mail est valide, grâce à notre sympathique REGEX
mail($destinataire,$objet,$message,$from);
header("Location: contact_envoye.html#FormulaireContact" );
  
?>
</head><br />