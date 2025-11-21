
<?php

function bookedholidayTemplate(
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
   $template = '
<html>
<head>
    <title>Booking Enquiry Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .wrapper {
            width: 100%;
            padding: 20px 0;
        }

        .container {
            max-width: 620px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .header {
            background: #0d47a1;
            color: #fff;
            text-align: center;
            padding: 28px 18px;
        }

        .header h1 {
            margin: 0;
            font-size: 26px;
            letter-spacing: 0.5px;
        }

        .banner img {
            width: 100%;
            display: block;
        }

        .content {
            padding: 28px 26px;
            color: #333;
            line-height: 1.6;
        }

        .content h2 {
            text-align: center;
            color: #0d47a1;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .info-box {
            background: #f8faff;
            border-left: 4px solid #0d47a1;
            padding: 14px 18px;
            margin-bottom: 18px;
            border-radius: 6px;
        }

        .info-box p {
            margin: 4px 0;
            font-size: 15px;
        }

        .details-title {
            margin-top: 30px;
            font-size: 17px;
            font-weight: bold;
            border-bottom: 2px solid #eee;
            padding-bottom: 6px;
        }

        ul {
            margin: 12px 0 20px;
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .thanks {
            background: #e3f2fd;
            padding: 12px 16px;
            border-radius: 6px;
            margin-top: 18px;
            font-size: 15px;
        }

        .footer {
            text-align: center;
            padding: 14px;
            background: #0d47a1;
            color: #fff;
            font-size: 14px;
            margin-top: 20px;
        }

        @media(max-width:600px) {
            .content { padding: 20px; }
            .header h1 { font-size: 22px; }
        }
    </style>
</head>

<body>
<div class="wrapper">
    <div class="container">

        <div class="header">
            <h1>Beatrix Holiday</h1>
        </div>

        <div class="banner">
            <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=1200" alt="Holiday Banner">
        </div>

        <div class="content">
            <h2>Your Booking Enquiry</h2>

            <div class="info-box">
                <p><strong>Name:</strong> ' . $member_name . '</p>
                <p><strong>Phone:</strong> ' . $member_phone . '</p>
                <p><strong>Membership No:</strong> ' . $membership_no . '</p>
                <p><strong>Email:</strong> ' . $email . '</p>
            </div>

            <p class="details-title">Booking Details</p>

            <ul>
                <li><strong>Check-In Date:</strong> ' . $check_in . '</li>
                <li><strong>Check-Out Date:</strong> ' . $check_out . '</li>
                <li><strong>Resort:</strong> ' . $resort . '</li>
                <li><strong>Location:</strong> ' . $location . '</li>
                <li><strong>Rooms:</strong> ' . $rooms . '</li>
                <li><strong>Adults:</strong> ' . $adults . '</li>
                <li><strong>Children:</strong> ' . $children . '</li>
                <li><strong>Additional Information:</strong> ' . $additional_info . '</li>
            </ul>

            <div class="thanks">
                Thank you for submitting your enquiry. Our team will get in touch with you soon.
            </div>

            <p style="margin-top: 22px;">Warm regards,<br><strong>Beatrix Holiday Team</strong></p>
        </div>

        <div class="footer">
            &copy; ' . date("Y") . ' Beatrix Holiday. All rights reserved.
        </div>
    </div>
</div>
</body>
</html>
';


    return $template;
}
