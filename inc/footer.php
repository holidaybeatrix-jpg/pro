<footer>
    <section class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <!-- Left side -->
                <div class="contact-left">
                    <h2>Contact Us</h2>
                    <p>
                        If you have any questions about new memberships, existing memberships, or our resorts,
                        you can get in touch with us by filling out the form below, and our team will get back to you soon!
                    </p>

                    <form action="actions/footer-from-action.php" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>

                        <button type="submit" class="submit-btn">Submit</button>
                    </form>
                </div>

                <!-- Right side -->
                <div class="contact-right">
                    <div class="contact-info">
                        <div>
                            <h4>ADDRESS</h4>
                            <p>
                                Shop No. 166/I-S8, Gr. Floor, Mervana Paradise,<br>
                                Arrias Vaddo, Nagoa, Arpora, Saligao,<br>
                                Goa, INDIA 403516.
                            </p>
                        </div>

                        <div>
                            <h4>PHONE</h4>
                            <p>18002701151</p>
                        </div>

                        <div>
                            <h4>EMAIL</h4>
                            <p>info@beatrixholiday.com</p>
                        </div>

                        <div>
                            <h4>OFFICE TIMINGS</h4>
                            <p>
                                <strong>Mon–Fri:</strong> 10:30 AM – 5:30 PM<br>
                                <strong>Saturday:</strong> 10:30 AM – 1:00 PM<br>
                                <strong>Sunday:</strong> Closed
                            </p>
                        </div>

                        <div>
                            <h4>IMPORTANT LINKS</h4>
                            <ul class="important-links">
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="actions/user-logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4>FOLLOW US</h4>
                            <ul class="social-links">
                                <li><a href="https://www.facebook.com/profile.php?id=61583807490771" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/beatrixholiday" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://x.com/beatrixholiday" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.youtube.com/@BeatrixHoliday" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>

                        <div class="homesocialmedia">
                            <ul class="social-linksf">
                                <li><a href="https://www.facebook.com/profile.php?id=61583807490771" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://www.instagram.com/beatrixholiday" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://x.com/beatrixholiday" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.youtube.com/@BeatrixHoliday" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
<script src="./assets/js/jquery-3.7.1.min.js"></script>
<script src="./assets/js/script.js"></script>

<style>
    @media (max-width: 768px) {
        .homesocialmedia {
            position: fixed;
            right: 10px;
            top: 50%;
            background: white;
        }

        .social-linksf {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 10px;
        }

        .social-linksf li a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #f3f3f3;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* font-size: 16px; */
            color: #333;
            transition: 0.3s ease;
        }

        .social-linksf li a {
            background: #ff6600 !important;
        }

        .social-linksf li a i {
            font-size: 25px;
        }
    }

    @media (min-width:1180px) {
        .homesocialmedia {
            position: fixed;
            right: 10px;
            top: 50%;
            z-index: 999;
            background: tansparent !important;
        }

        .social-linksf {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 10px;
        }

        .social-linksf li a {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: transparent !important;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* font-size: 16px; */
            color: #333;
            transition: 0.3s ease;
        }

        .social-linksf li a {
            background: #ff6600 !important;
        }

        .social-linksf li a i {
            font-size: 25px;
        }
    }

    .social-links {
        list-style: none;
        padding: 0;
        display: flex;
        gap: 12px;
        margin-top: 10px;
    }

    .social-links li a {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: #f3f3f3;
        display: flex;
        align-items: center;
        justify-content: center;
        /* font-size: 16px; */
        color: #333;
        transition: 0.3s ease;
    }

    .social-links li a i {
        font-size: 25px;
    }

    .social-links li a:hover {
        background: #ff6600;
        color: #fff;
    }
</style>
<!-- jQuery -->
<script>
    $(document).on("click", ".showFormBtn", function() {
        const form = document.getElementById("bookingForm");
        form.style.display = "block";

        setTimeout(() => {
            form.classList.add("show");
        }, 20);

    });
    document.querySelector(".closebtn").addEventListener("click", function() {
        document.getElementById("bookingForm").style.display = "none";
    });
</script>

<script>
    $(document).ready(function() {
        $(".menu-toggle").click(function() {
            $(this).toggleClass("active");
            $(".nav-links").toggleClass("active");
        });

        // Close menu when clicking a link
        $(".nav-link").click(function() {
            $(".menu-toggle").removeClass("active");
            $(".nav-links").removeClass("active");
        });
    });
</script>


</body>

</html>