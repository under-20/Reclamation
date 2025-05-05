<?php
/**
 * Mailer Class
 * 
 * Handles sending emails for claim notifications
 */
class Mailer
{
  private $fromEmail;
  private $fromName;

  /**
   * Constructor
   */
  public function __construct($fromEmail = 'ahmadmkacher@gmail.com', $fromName = '')
  {
    $this->fromEmail = $fromEmail;
    $this->fromName = $fromName;
  }

  /**
   * Send an email when a new claim is created
   */
  public function sendNewClaimNotification($toEmail, $claimId, $subject, $content)
  {
    $subject = "Your Claim Has Been Submitted - Ref #{$claimId}";

    $message = "
        <html>
        <head>
            <title>Your Claim Has Been Submitted</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #2C3E50; color: white; padding: 15px; text-align: center; }
                .content { padding: 20px; background-color: #f9f9f9; }
                .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #777; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>Your Claim Has Been Submitted</h2>
                </div>
                <div class='content'>
                    <p>Dear User,</p>
                    <p>Thank you for submitting your claim. We have received your message and will process it as soon as possible.</p>
                    <p><strong>Claim Reference:</strong> #{$claimId}</p>
                    <p><strong>Subject:</strong> {$subject}</p>
                    <p><strong>Details:</strong></p>
                    <p>" . nl2br(htmlspecialchars($content)) . "</p>
                    <p>You will be notified when there's an update to your claim.</p>
                    <p>Best regards,<br>Claims Management Team</p>
                </div>
                <div class='footer'>
                    <p>This is an automated message. Please do not reply to this email.</p>
                </div>
            </div>
        </body>
        </html>
        ";

    return $this->sendEmail($toEmail, $subject, $message);
  }

  /**
   * Send an email when a response is added to a claim
   */
  public function sendClaimResponseNotification($toEmail, $claimId, $subject, $responseContent)
  {
    $subject = "New Response to Your Claim - Ref #{$claimId}";

    $message = "
        <html>
        <head>
            <title>New Response to Your Claim</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background-color: #2C3E50; color: white; padding: 15px; text-align: center; }
                .content { padding: 20px; background-color: #f9f9f9; }
                .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #777; }
                .response { background-color: #e1f5fe; padding: 15px; border-left: 4px solid #2196f3; margin: 15px 0; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>New Response to Your Claim</h2>
                </div>
                <div class='content'>
                    <p>Dear User,</p>
                    <p>There is a new response to your claim (Ref #{$claimId}) regarding <strong>{$subject}</strong>.</p>
                    <div class='response'>
                        <p><strong>Response:</strong></p>
                        <p>" . nl2br(htmlspecialchars($responseContent)) . "</p>
                    </div>
                    <p>You can view the full details of this claim and response by logging into your account.</p>
                    <p>Best regards,<br>Claims Management Team</p>
                </div>
                <div class='footer'>
                    <p>This is an automated message. Please do not reply to this email.</p>
                </div>
            </div>
        </body>
        </html>
        ";

    return $this->sendEmail($toEmail, $subject, $message);
  }

  /**
   * Core method to send an email
   */
  private function sendEmail($toEmail, $subject, $message)
  {
    // Email headers
    $headers = "From: {$this->fromName} <{$this->fromEmail}>\r\n";
    $headers .= "Reply-To: {$this->fromEmail}\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send the email using PHP's mail function
    $success = mail($toEmail, $subject, $message, $headers);

    // Log the email attempt for debugging purposes
    $logMessage = date('Y-m-d H:i:s') . " - Email to: {$toEmail}, Subject: {$subject}, Success: " . ($success ? 'Yes' : 'No') . "\n";
    file_put_contents(__DIR__ . '/../logs/email.log', $logMessage, FILE_APPEND);

    return $success;
  }
}
?>
