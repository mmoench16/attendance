<?php 
  require "vendor/autoload.php";
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'config');
  $dotenv->load();

  class sendemail{
    public static function sendmail($to, $subject, $content) {
      $key = $_ENV['SENDGRIDKEY'];

      $email = new \SendGrid\Mail\Mail();
      $email->setFrom("m.moench16@gmail.com", "Martin Moench");
      $email->setSubject($subject);
      $email->addTo($to);
      $email->addContent("text/plain", $content);

      $sendgrid = new \SendGrid($key);

      try {
        $response = $sendgrid->send($email);
        return $response;
      } catch (Exception $e) {
        echo "Email Exception caught: ".$e->getMessage()."\n";
        return false;
      }
    }
  }
?>