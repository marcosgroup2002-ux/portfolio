<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $receiving_email_address = 'josiasdev@gmail.com';

      if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
        include( $php_email_form );
      } else {
        die( 'Unable to load the "PHP Email Form" Library!');
      }
      $contact = new PHP_Email_Form(); 
      $contact->ajax = true;
      
      $contact->to = $receiving_email_address;
     
      $contact->from_name = $_POST['name'] ?? 'Non renseigné';
      $contact->from_email = $_POST['email'] ?? 'Non renseigné';
      $contact->subject = $_POST['subject'] ?? 'Nouveau message du portfolio';

      $contact->add_message( $_POST['name'] ?? '', 'From');
      $contact->add_message( $_POST['email'] ?? '', 'Email');
      $contact->add_message( $_POST['message'] ?? '', 'Message', 10);

      echo $contact->send();
      
  } else {
      die('Accès refusé. Veuillez soumettre le formulaire.');
  }
?>