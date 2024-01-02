<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>Digitalshakha</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        .email_1 {
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .email_1 .img {
            width: 300px;
            margin-bottom: 1rem;
        }

        .email_1 .img img {
            width: 100%;
            width: 100%;
        }

        .email_1 .text_box {
            border: 1px solid #BB5327;
            padding: 4rem;
            text-align: left;
        }

        .email_1 .text_box ul {
            list-style: none;
            text-align: left;
            margin: 2rem 0;
            /* padding-left: 2rem; */
        }

        .email_1 .text_box ul li {
            list-style: none;
        }

        .email_1 .text_box p:first-child {
            font-size: 1rem;
            font-weight: 600;
            line-height: 22px;
            /* text-align: center; */
        }

        .email_1 .text_box p {
            font-size: 1rem;
            font-weight: 500;
            line-height: 22px;
            /* text-align: center; */
            margin-bottom: 1rem;
        }
        .email_1 .text_box h2 {
            font-size: 1.5rem;
            font-weight: 600;
            line-height: 30px;
        }
        .email_1 .text_box h3 {
            font-size: 1.2rem;
            font-weight: 600;
            line-height: 22px;
        }

        .email_2 {
            padding: 1rem;
            background-color: #BB532733;
        }

        .email_2 .social_links {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .email_2 .social_links h1 {
            font-size: 1.4rem;
            font-weight: 400;
            line-height: 30px;
            color: #5C2109;
        }

        .email_2 .social_links .links {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0 1rem;
        }

        .email_2 .social_links .links a {
            text-decoration: none;
        }

        .email_2 .social_links .links a img {
            width: 30px;
        }

        .email_3 {
            padding: 2rem;
            background-color: #1A0E09;
            color: #FFFFFF;
            text-align: center;
        }

        .email_3 .footer .text1 {
            padding: 2rem;
        }

        .email_3 .footer .text1 p {
            font-size: 1rem;
            font-weight: 600;
            line-height: 24px;
        }

        .email_3 .footer .text1 p a {
            color: #FFFFFF;
            text-decoration: none;
        }

        .email_3 .footer .end_text p {
            font-size: 1rem;
            font-weight: 600;
            line-height: 24px;
        }

        .email_3 .footer .end_text p a {
            color: #FFFFFF;
            text-decoration: none;
        }

        @media(max-width:500px) {
            .email_2 .social_links {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .email_1 .img {
                width: 200px;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="#mailBody">
        <section class="email_1">
            <div class="img">
                <img src="./assets/images/digital_logo.png" alt="">
            </div>
            <div class="text_box">
                <h2>Thank you for your interest in DigitalShakha's upcoming batch! We've received your details and are excited to have you on board.</h2>
                <ul>
                    <li style="margin-bottom: .5rem;">
                        <h3>Details:</h3>
                    </li>
                    <li><span>Name</span>:</li>
                    <li><span>Number</span>: [User's Name]</li>
                    <li><span>Email</span>: [User's Name]</li>
                    <li><span>Designation</span>: [User's Name]</li>
                    <li><span>Location</span>: [User's Name]</li>
                </ul>

                <p>Our team is reviewing your request, and we'll get back to you soon. In the meantime, feel free to reach out if you have any questions.
                    By submitting the form, you agree to our privacy policy. We're committed to supporting your success.
                </p>

                <p>Stay tuned for more details about the upcoming batch schedule and curriculum.</p>

                <p>Thank you for choosing DigitalShakha</p>
            </div>
        </section>
        <section class="email_2">
            <div class="social_links">
                <h3>Follow Digitalshakha on:</h3>
                <div class="links">
                    <a href="#!"><img src="./assets/images/Instagram.svg" alt=""></a>
                    <a href="#!"><img src="./assets/images/Behance.svg" alt=""></a>
                    <a href="#!"><img src="./assets/images/Facebook.svg" alt=""></a>
                    <a href="#!"><img src="./assets/images/YouTube.svg" alt=""></a>
                    <a href="#!"><img src="./assets/images/LinkedIn_link.svg" alt=""></a>
                    <a href="#!"><img src="./assets/images/Pinterest.svg" alt=""></a>
                </div>
            </div>
        </section>
        <section class="email_3">
            <div class="footer">
                <div class="text1">
                    <p><a href="#!">Unsubscribe</a> or manage preferences</p>
                </div>
                <div class="end_text">
                    <p> © 2023 <a href="https://www.digitalshakha.in">Digitalshakha</a>, All Rights Reserved | PLOT - 490-B, cross, Street 25, main road, Smriti Nagar, Bhilai, Chhattisgarh 490020</p>
                </div>
            </div>
        </section>
    </div>
</body>

</html>