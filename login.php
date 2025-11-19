<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login with Signup Popup (AJAX)</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: #fff;
            width: 100%;
            max-width: 400px;
            padding: 40px 30px;
            border-radius: 14px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
            text-align: center;
            position: relative;
        }

        h2 {
            margin-bottom: 25px;
            font-size: 26px;
            font-weight: 700;
            color: #1f2937;
        }

        .form-group {
            margin-bottom: 18px;
            text-align: left;
            position: relative;
        }

        label {
            display: block;
            font-size: 14px;
            color: #374151;
            margin-bottom: 6px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 12px 40px 12px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 38px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #6b7280;
        }

        .submit-btn {
            width: 100%;
            background: #2563eb;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #1e40af;
        }

        .footer-text {
            margin-top: 18px;
            font-size: 14px;
            color: #6b7280;
        }

        .footer-text a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        /* Popup Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: #fff;
            padding: 30px 25px;
            border-radius: 12px;
            width: 100%;
            max-width: 420px;
            position: relative;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close-btn {
            position: absolute;
            right: 15px;
            top: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #6b7280;
            background: none;
            border: none;
        }

        .close-btn:hover {
            color: #111827;
        }

        .modal h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #1f2937;
        }

        /* Response message */
        .message {
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
            display: none;
            padding: 8px;
            border-radius: 6px;
        }

        .message.success {
            background: #dcfce7;
            color: #166534;
        }

        .message.error {
            background: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>

<body>

    <!-- Login Card -->
    <div class="login-card">
        <h2>Welcome Back</h2>
        <form action="actions/user-login.php" method="POST">
            <div class="form-group">
                <label>Username or Email</label>
                <input type="text" name="username" required placeholder="Enter your username">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
                <button type="button" class="toggle-password" id="togglePassword">👁️</button>
            </div>

            <button type="submit" class="submit-btn">Login</button>
        </form>

        <div class="footer-text">
            Don’t have an account? <a href="#" id="openSignup">Sign up</a>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal" id="signupModal">
        <div class="modal-content">
            <button class="close-btn" id="closeSignup">&times;</button>
            <h3>Create Your Account</h3>

            <div id="responseMsg" class="message"></div>

            <form id="signupForm">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" required placeholder="Enter your phone number" pattern="[0-9]{10}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="signupPassword" name="password" required placeholder="Create password">
                    <button type="button" class="toggle-password" id="toggleSignupPassword">👁️</button>
                </div>
                <button type="submit" id="signupBtn" class="submit-btn">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Password toggle (login)
            $("#togglePassword").on("click", function() {
                const input = $("#password");
                const type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
                $(this).text(type === "password" ? "👁️" : "🙈");
            });

            // Modal control
            $("#openSignup").click(() => $("#signupModal").addClass("active"));
            $("#closeSignup").click(() => $("#signupModal").removeClass("active"));

            // Password toggle (signup)
            $("#toggleSignupPassword").on("click", function() {
                const input = $("#signupPassword");
                const type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
                $(this).text(type === "password" ? "👁️" : "🙈");
            });

            // Create message popup dynamically
            const msgPopup = $('<div id="msgPopup" class="modal"><div class="modal-content"><h3 id="msgText"></h3></div></div>');
            $("body").append(msgPopup);

            // AJAX signup
            $("#signupForm").on("submit", function(e) {
                e.preventDefault();
                const formData = $(this).serialize();
                const $btn = $("#signupBtn");

                $btn.prop("disabled", true).text("Signing up...");

                $.ajax({
                    url: "actions/user-signup.php",
                    method: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            $("#msgText").text(response.message);
                            $("#msgPopup").addClass("active");

                            setTimeout(() => {
                                $("#msgPopup").removeClass("active");
                                window.location.href = "index.php";
                            }, 6000);

                            $("#signupForm")[0].reset();
                        } else {
                            $("#msgText").text(response.message);
                            $("#msgPopup").addClass("active");
                            setTimeout(() => $("#msgPopup").removeClass("active"), 3000);
                        }
                    },
                    error: function() {
                        $("#msgText").text("Server error. Please try again later.");
                        $("#msgPopup").addClass("active");
                        setTimeout(() => $("#msgPopup").removeClass("active"), 3000);
                    },
                    complete: function() {
                        $btn.prop("disabled", false).text("Sign Up");
                    }
                });
            });
        });
    </script>

</body>

</html>