<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Policy</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-icons.css" rel="stylesheet">

    <style>
        .nav-link.active {
            color: #0073e6 !important;
        }

        @font-face {
            font-family: "Marmelad";
            src: url("Fonts/Marmelad/Marmelad-Regular.ttf");
        }

        .para {
            font-family: "Marmelad";
        }
    </style>


</head>

<body style="background-color: rgba(43, 45, 66, 0.93); ">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="display: flex; justify-content: center; align-items: center;">
        <div class="container-fluid">


            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <a class="link text-black" href="#">Back</a>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" onclick="showContent('return-policy', this)">Return Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('privacy-policy', this)">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('terms-conditions', this)">Terms & Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="col-12">
        <div class="row" style="justify-content: center; margin-top: 125px;">
            <!-- Return Policy Paragraph -->
            <div id="return-policy" class="col-8 rounded-5 content-box" style="height: 400px; display: flex; justify-content: center; align-items: center; 
        background-color: white; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                <p class="mx-5 fs-4 para">We accept returns within 7 days of the delivery date for most items in new,
                    unused condition with all original packaging and accessories.
                    Certain items such as opened software or items like earphones are non-returnable.
                    We are not responsible for the return shipping fees. Once we receive and inspect the item, we will issue a refund or replacement within 7 business days.
                    Please contact our customer service to initiate a return.
                </p>
            </div>

            <!-- Privacy Policy Paragraph  -->
            <div id="privacy-policy" class="col-8 rounded-5 content-box" style="height: 400px; display: none; justify-content: center; align-items: center; 
        background-color: white; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                <p class="mx-5 fs-4 para">We collect personal information such as name, email, shipping address,
                    and payment information to process orders and improve your shopping experience.
                    We use third-party payment processors like PayHere, who receive necessary payment information for transaction purposes.
                    We use cookies to track user activity and enhance website functionality.
                    We take appropriate measures to safeguard your personal information, including encryption and secure data storage.
                    You have the right to request access, modification, or deletion of your data by contacting us.

                </p>
            </div>

            <!-- Terms and Conditions Paragraph -->
            <div id="terms-conditions" class="col-8 rounded-5 content-box" style="height: 400px; display: none; justify-content: center; align-items: center; 
        background-color: white; box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25) inset;">
                <p class="mx-5 fs-4 para">By using our website, you agree to comply with the following terms.<br>
                    You must be at least 18 years old to create an account.
                    We accept payments via credit card and PayHere, and orders are subject to applicable taxes.
                    Shipping costs are calculated based on the destination. We are not responsible for delays caused by third-party carriers.
                    Our platform prohibits fraudulent activities, and users who violate our rules may have their accounts suspended.
                </p>
            </div>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>

    <script>
        function showContent(id, element) {

            const contentBoxes = document.querySelectorAll('.content-box');
            contentBoxes.forEach(box => box.style.display = 'none');


            document.getElementById(id).style.display = 'flex';

            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => link.classList.remove('active'));

            element.classList.add('active');
        }
    </script>
</body>

</html>