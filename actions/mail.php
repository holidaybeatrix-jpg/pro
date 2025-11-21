<?php
include '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private $mail;

    function __construct()
    {
        $mail = new PHPMailer(true);
        $this->mail = $mail;

        // Enable debug during testing
        // 0 = Off, 2 = Debug
        // $mail->SMTPDebug = 2;

        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'reservation@beatrixholiday.com';
        $mail->Password   = 'Beatrix$123';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

    }

    function sendMail($to, $toName, $subject, $body, $altBody)
    {
        try {
            $this->mail->setFrom('reservation@beatrixholiday.com', 'Beatrix Holiday');

            // FIXED: now email goes to the provided address
            $this->mail->addAddress($to, $toName);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->AltBody = $altBody;

            $this->mail->send();
        } catch (Exception $e) {
            echo "Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}

class sendToAdmin extends Mailer
{
    function bookingTemplate(
        $member_name,
        $member_phone,
        $membership_no,
        $email,
        $check_in,
        $check_out,
        $resort,
        $location,
        $rooms,
        $adults,
        $children,
        $additional_info
    ) {
        return '
        <html>
        <head>
            <title>Booking Enquiry Confirmation</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <style>
                body { margin:0; background:#f4f4f4; font-family:Arial,sans-serif; }
                .container {
                    width:100%; max-width:600px; margin:0 auto; background:#fff;
                    border-radius:8px; overflow:hidden;
                    box-shadow:0 4px 12px rgba(0,0,0,0.1);
                }
                .header-img { width:100%; display:block; }
                .content { padding:25px; color:#333; }
                h2 { margin:0; color:#1a73e8; text-align:center; font-size:22px; }
                ul { padding-left:18px; }
                ul li { margin-bottom:8px; font-size:15px; }
                .footer {
                    background:#1a73e8; padding:12px; text-align:center; color:#fff; font-size:14px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200" class="header-img">

                <div class="content">
                    <h2>New Booking Enquiry</h2>

                    <p><strong>Name:</strong> ' . $member_name . '</p>
                    <p><strong>Phone:</strong> ' . $member_phone . '</p>
                    <p><strong>Membership No:</strong> ' . $membership_no . '</p>
                    <p><strong>Email:</strong> ' . $email . '</p>

                    <ul>
                        <li><strong>Check-In:</strong> ' . $check_in . '</li>
                        <li><strong>Check-Out:</strong> ' . $check_out . '</li>
                        <li><strong>Resort:</strong> ' . $resort . '</li>
                        <li><strong>Location:</strong> ' . $location . '</li>
                        <li><strong>Rooms:</strong> ' . $rooms . '</li>
                        <li><strong>Adults:</strong> ' . $adults . '</li>
                        <li><strong>Children:</strong> ' . $children . '</li>
                        <li><strong>Additional Info:</strong> ' . $additional_info . '</li>
                    </ul>

                    <p>Submitted from Beatrix Holiday website.</p>
                </div>

                <div class="footer">
                    © ' . date("Y") . ' Beatrix Holiday. All rights reserved.
                </div>
            </div>
        </body>
        </html>';
    }

    function sendBookingNotification(
        $member_name,
        $member_phone,
        $membership_no,
        $email,
        $check_in,
        $check_out,
        $resort,
        $location,
        $rooms,
        $adults,
        $children,
        $additional_info
    ) {
        $subject = "Booking Enquiry from " . $member_name;

        $body = $this->bookingTemplate(
            $member_name,
            $member_phone,
            $membership_no,
            $email,
            $check_in,
            $check_out,
            $resort,
            $location,
            $rooms,
            $adults,
            $children,
            $additional_info
        );

        $altBody = "A new booking enquiry was received.";

        // Send to admin inbox
        $this->sendMail(
            'reservation@beatrixholiday.com',
            'Beatrix Holiday',
            $subject,
            $body,
            $altBody
        );
    }
}
