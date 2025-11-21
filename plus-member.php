<?php
include 'actions/db.php';
session_start();
if (isset($_SESSION['username'])) {
    header("Location: ./resort-booking.php");
    exit();
}
$pageTitle = "Plus Member Plans";
include 'inc/header.php';
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
<style>
    .banner-section {
        height: 80vh;
        background-image: url('./assets/img/plus-banner.avif');
        /* Replace image */
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .banner-overlay {
        background: rgba(0, 0, 0, 0.25);
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }

    .pricing-box {
        padding: 40px 20px;
        border-radius: 4px;
        text-align: center;
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        transform: scale(1);
        cursor: pointer;
    }

    /* Hover Animation */
    .pricing-box:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .pricing-box:hover h4,
    .pricing-box:hover p,
    .pricing-box:hover h3 {
        transform: scale(1.05);
    }

    .pricing-box h4,
    .pricing-box p,
    .pricing-box h3 {
        transition: transform 0.3s ease;
    }

    .red-box {
        background-color: #e94e1b;
    }

    .alt-box {
        background-color: #f69a1e;
    }

    .pricing-box h4 {
        font-size: 22px;
        margin-bottom: 5px;
    }

    .pricing-box p {
        margin-bottom: 10px;
        font-size: 16px;
    }

    .pricing-box h3 {
        font-size: 24px;
        margin-top: 10px;
    }

    .pay-btn {
        background-color: #1d2759;
        padding: 12px 40px;
        color: #fff;
        border-radius: 4px;
        text-decoration: none;
        font-size: 18px;
        display: inline-block;
        margin-top: 35px;
        transition: 0.3s ease;
    }

    .pay-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .plan-row {
        border: 5px solid #fff;
    }
</style>

<!-- Banner -->
<section class="banner-section mb-5">
    <div class="banner-overlay"></div>

    <div class="container h-100 d-flex align-items-center">
        <div class="position-relative text-left">
            <div class="heading-line"></div>
            <h1 class="display-4 fw-bold text-dark">
                KNOW OUR <br>
                <span style="color:#ff7a00;">PLANS & PRICING</span>
            </h1>
        </div>
    </div>
</section>

<!-- Popup Background -->
<div class="popup-overlay" id="popupOverlay">

    <!-- Popup Form -->
    <div class="popup-box" id="popupBox">
        <span class="closeBtn" id="closeBtn">×</span>
        <h2>Booking Enquiry</h2>

        <form id="popupForm">
            <div class="form-group">
                <label>Name</label>
                <input type="text" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label>Select Package</label>
                <select required>
                    <option value="">Select Package</option>
                    <option>Studio RED - 5 Years - ₹1,75,000</option>
                    <option>Studio RED - 10 Years - ₹2,75,000</option>
                    <option>Studio RED - 15 Years - ₹3,75,000</option>
                    <option>Studio RED - 25 Years - ₹5,75,000</option>

                    <option>Studio ALT - 5 Years - ₹95,000</option>
                    <option>Studio ALT - 10 Years - ₹1,75,000</option>
                    <option>Studio ALT - 15 Years - ₹2,25,000</option>
                    <option>Studio ALT - 25 Years - ₹3,50,000</option>
                </select>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="tel" placeholder="Enter your phone number" required>
            </div>



            <button type="submit" class="submitBtn">Submit</button>
        </form>
    </div>
</div>
<section class="pb-5">
    <div class="container">

        <!-- Row 1: Studio RED -->
        <div class="row g-0">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="pricing-box red-box plan-row">
                    <h4>Studio RED</h4>
                    <p>5 Years</p>
                    <h3>₹1,75,000</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="pricing-box red-box plan-row">
                    <h4>Studio RED</h4>
                    <p>10 Years</p>
                    <h3>₹2,75,000</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="pricing-box red-box plan-row">
                    <h4>Studio RED</h4>
                    <p>15 Years</p>
                    <h3>₹3,75,000</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="pricing-box red-box plan-row">
                    <h4>Studio RED</h4>
                    <p>25 Years</p>
                    <h3>₹5,75,000</h3>
                </div>
            </div>
        </div>

        <!-- Row 2: Studio ALT -->
        <div class="row g-0">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="pricing-box alt-box plan-row">
                    <h4>Studio ALT</h4>
                    <p>5 Years</p>
                    <h3>₹95,000</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="pricing-box alt-box plan-row">
                    <h4>Studio ALT</h4>
                    <p>10 Years</p>
                    <h3>₹1,75,000</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="pricing-box alt-box plan-row">
                    <h4>Studio ALT</h4>
                    <p>15 Years</p>
                    <h3>₹2,25,000</h3>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="pricing-box alt-box plan-row">
                    <h4>Studio ALT</h4>
                    <p>25 Years</p>
                    <h3>₹3,50,000</h3>
                </div>
            </div>
        </div>

        <!-- Pay Now -->
        <div class="text-center mt-4">
            <a href="javascript:void(0)" id="" class="pay-btn openPopupBtn">PAY NOW</a>
        </div>

    </div>
</section>



<div class="slider">
    <div><img src="./assets/img/sliderimage/1.avif" class="fullsize" alt=""></div>
    <div><img src="./assets/img/sliderimage/2.avif" class="fullsize" alt=""></div>
    <div><img src="./assets/img/sliderimage/3.avif" class="fullsize" alt=""></div>
    <div><img src="./assets/img/sliderimage/4.avif" class="fullsize" alt=""></div>
    <div><img src="./assets/img/sliderimage/5.avif" class="fullsize" alt=""></div>
    <div><img src="./assets/img/sliderimage/6.avif" class="fullsize" alt=""></div>
</div>


<?php
include 'inc/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>



<script>
    $('.slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // const popupOverlay = document.getElementById("popupOverlay");
    const popupBox = document.getElementById("popupBox");
    const openBtn = document.querySelector(".openPopupBtn");
    const closeBtn = document.getElementById("closeBtn");

    /* Open Popup */
    openBtn.addEventListener("click", () => {

        popupOverlay.style.display = "block";
        popupBox.classList.add("show");
    });

    /* Close Popup */
    function closePopup() {
        popupOverlay.style.display = "none";
        popupBox.classList.remove("show");
    }

    closeBtn.addEventListener("click", closePopup);
    //popupOverlay.addEventListener("click", closePopup);


    document.getElementById("popupForm").addEventListener("submit", function(e) {
        e.preventDefault();

        const name = document.querySelector("#popupForm input[type='text']").value;
        const email = document.querySelector("#popupForm input[type='email']").value;
        const phone = document.querySelector("#popupForm input[type='tel']").value;
        const package = document.querySelector("#popupForm select").value;

        fetch("actions/save_enquiry.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    name,
                    email,
                    phone,
                    package
                })
            })

            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert("Your enquiry has been submitted!");
                    closePopup();
                } else {
                    alert(data.message);
                }
            });
    });
</script>