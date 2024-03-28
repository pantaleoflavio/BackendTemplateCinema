<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require __DIR__ . '/../../vendor/autoload.php';

    class SendMailer {
        protected $mailer;

        public function __construct() {
            $this->mailer = new PHPMailer(true);
            $this->configure();
        }

        protected function configure() {
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = getenv('SMTP_USERNAME'); //use your email
            $this->mailer->Password = getenv('SMTP_PASSWORD'); //use your password from your host generate
            $this->mailer->SMTPSecure = 'tls';
            $this->mailer->Port = 587;
            // $this->mailer->SMTPDebug = 2; // Abilita l'output di debug dettagliato

            
            // Mittente
            $this->mailer->setFrom('cinema@vision.com', 'Cinema Fake Vision'); //example of sender
        }

        public function sendPDFTicket($recipientEmail, $filePathName) {
            try {
                // Imposta il destinatario
                $this->mailer->addAddress($recipientEmail); 

                // Contenuto dell'email
                $this->mailer->isHTML(true);
                $this->mailer->Subject = 'Your Ticket is here';
                $this->mailer->Body    = 'You can find your Ticket as PDF attachment <b>in this email</b>! <br> Enjoy the show';
                $this->mailer->AltBody = 'You can find your Ticket as PDF attachment in this email! Enjoy the show';

                // Allega il PDF
                $this->mailer->addAttachment($filePathName);

                $this->mailer->send();
                echo 'Email sent successfully ' . $recipientEmail;
            } catch (Exception $e) {
                echo "Email not sent to $recipientEmail. Mailer Error: {$this->mailer->ErrorInfo}";

            }
        }
    }
?>