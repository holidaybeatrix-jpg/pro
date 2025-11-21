<?php
$pageTitle = "Home Page";
include 'inc/header.php';
?>
<main class="container-fluid p-0">
  <!-- Hero / Banner Section -->
  <section class="home-section d-flex align-items-center text-start px-5">
    <div class="text-box">
      <a href="./about-us.php" class="btn btn-banner mb-4">Learn More About Us</a>
      <h1 class="display-2 fw-bold mb-3">
        <span>GET AN</span> <span class="text-yellow">ADVENTURE,</span><br>
        <span>GET A</span> <span class="text-yellow">LIFE!</span>
      </h1>
      <a class="buy membership mt-4" href="plus-member.php">BUY MEMBERSHIP</a>
    </div>
  </section>

  <!-- About Section -->
  <section class="about-section bg-light">
    <div class="container text-center about-text-box">
      <h2 class="fw-bold display-4 mb-3">
        WHERE EVERY <span class="text-yellow">ADVENTURE </span>IS A <span class="text-yellow">DISTINCTIVE</span> EXPERIENCE
      </h2>
      <p class="custom-word-spacing">
        Set out on an extraordinary voyage with Beatrix Holiday, where uniqueness blends with unmatched service. Our Exclusive Invitation-Only Membership is crafted for sophisticated travelers who value luxury and personalized attention ensuring that only a privileged few families experience the exceptional world of <strong> Beatrix Holiday.</strong>
      </p>
    </div>

    <div class="row gy-4 text-center stats-section ">
      <div class="col-6 col-md-3">
        <h2 class="fw-bold stat-number text-sky">100+</h2>
        <p class="fw-semibold">Countries Worldwide</p>
      </div>
      <div class="col-6 col-md-3">
        <h2 class="fw-bold stat-number text-orange">200+</h2>
        <p class="fw-semibold">Partner Hotels & Resorts</p>
      </div>
      <div class="col-6 col-md-3">
        <h2 class="fw-bold stat-number text-sky">6000+</h2>
        <p class="fw-semibold">Members Across India</p>
      </div>
      <div class="col-6 col-md-3">
        <h2 class="fw-bold stat-number text-orange">3+</h2>
        <p class="fw-semibold">Star Rated Properties</p>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services-section">
    <div class="container-fluid p-0">
      <div class="row g-0 text-center">

        <div class="col-12 col-md-6 col-lg-3 service-card bg-navy text-white">
          <div class="p-5">
            <i class="fa-solid fa-plane fa-3x mb-4"></i>
            <h5 class="fw-bold text-uppercase mb-3">FLIGHT RESERVATIONS
              & VISA SUPPORT
            </h5>
            <p>Enjoy seamless flight reservations for both domestic and international destinations, offering you the most suitable travel choices. Our dedicated visa support makes documentation simple and stress-free, ensuring your journey begins smoothly.</p>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 service-card bg-sky text-white">
          <div class="p-5">
            <i class="fa-solid fa-dollar-sign fa-3x mb-4"></i>
            <h5 class="fw-bold text-uppercase mb-3">FOREX SERVICES & TRAVEL PROTECTION</h5>
            <p>Get the best currency exchange rates and convenient foreign money solutions for all your travels. Our comprehensive travel insurance safeguards you against flight delays, medical emergencies, and lost luggage — giving you complete peace of mind on every journey.</p>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 service-card bg-orange text-dark">
          <div class="p-5">
            <i class="fa-solid fa-ship fa-3x mb-4"></i>
            <h5 class="fw-bold text-uppercase mb-3">CRUISE RESERVATIONS</h5>
            <p>Allow us to arrange your dream cruise — from luxurious ocean liners to picturesque river escapes. We’ll guide you in choosing the ideal route and cabin to create a truly memorable sailing experience.</p>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3 service-card bg-maroon text-white">
          <div class="p-5">
            <i class="fa-solid fa-car fa-3x mb-4"></i>
            <h5 class="fw-bold text-uppercase mb-3">CAB SERVICES
              & RENTALS
            </h5>
            <p>Our trusted cab network provides safe, comfortable, and budget-friendly rides for every trip. With skilled drivers and a fleet of well-maintained vehicles, you can count on a smooth, convenient, and worry-free travel experience every time.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Membership Banner Section -->
  <section class="membership-banner text-center text-white">
    <div class="container py-5">
      <h5 class="fw-semibold mb-3">Join as a member with</h5>
      <h1 class="fw-bold display-5">BEATRIX HOLIDAY</h1>
      <p class="lead mb-0">
        and start planning your next getaway at our handpicked, exclusive destinations.
      </p>
    </div>
  </section>

  <!-- Property Gallery Section -->
  <section class="property-gallery bg-light">
    <div class="gallery-scroll">
      <div class="me-1 mobile_1">
        <div class="mb-1">
          <img src="assets/img/gallery/1.avif" alt="Property 1">
          <img src="assets/img/gallery/3.avif" alt="Property 3">
        </div>
        <img src="assets/img/gallery/2.avif" alt="Property 2">
      </div>
      <div class="d-flex flex-column me-1 mobile_2">
        <img src="assets/img/gallery/4.avif" alt="Property 4" class="mb-1">
        <img src="assets/img/gallery/5.avif" alt="Property 5">
      </div>
      <div class="me-1 mobile_3">
        <div class="mb-1">
          <img src="assets/img/gallery/6.avif" alt="Property 6">
        </div>
        <img src="assets/img/gallery/7.avif" alt="Property 7">
        <img src="assets/img/gallery/8.avif" alt="Property 8">
      </div>

      <div class="mobile_4">
        <div class="mb-1">
          <img src="assets/img/gallery/9.avif" alt="Property 9">
          <img src="assets/img/gallery/10.avif" alt="Property 10">
        </div>
        <img src="assets/img/gallery/11.avif" alt="Property 11">
      </div>
      <img src="assets/img/gallery/12.avif" alt="Property 12">
    </div>
  </section>

  <section class="badimg">
    <div class="container-fluid exclusive">
      <div class="membership-info">
        <h2>MEMBERSHIP
          PLANS
        </h2>
        <p>Discover our range of exclusive membership options, available for different durations — each designed to offer unique benefits, premium experiences, and exceptional value for every traveler.</p>
        <a href="about-us.php" class="btn btn-membership-info mt-3">Learn More</a>
      </div>
      <div class="popular-destinations-section text-center py-5"></div>

      <div class="popular-holiday">
        <h2>POPULAR HOLIDAY TIPS & TRICKS</h2>
        <p>With over 300+ stunning properties featured on our platform, each one is an irresistible getaway choice. Here’s a glimpse into some of the favorite destinations our members have been exploring recently — perfect inspiration for your next vacation!</p>
        <a href="#" class="btn btn-membership-info mt-3">Read More</a>
      </div>
    </div>
  </section>

  <section class="position-relative container-fluid p-0 m-0">
    <div class="bg-section">
      <div class="bg_1"></div>
      <div class="bg_2"></div>
    </div>

    <div class="why-us-section">
      <div class="container">
        <h2>WHY CHOOSE US?</h2>
        <p>
          At <strong>Beatrix Holiday</strong>, we’ve refined our membership services to eliminate every travel hassle, letting you focus solely on the joy of your journey. From your very first interaction, each booking is managed with precision by our experienced team, ensuring your preferences are catered to with personal attention. Our mission is to deliver a smooth, worry-free experience that offers exceptional value — so you can truly enjoy every moment of your adventure.
        </p>
      </div>
    </div>

    <div class="info-section">
      <div class="info-box testimonials">
        <h2>CUSTOMER

          <br> TESTIMONIALS
        </h2>
        <p>Discover what our valued members have to say about their unforgettable experiences with Beatrix Holiday. These genuine stories reflect the joy, comfort, and satisfaction of being part of our exclusive travel community.</p>
        <a href="#" class="btn">Read Now</a>
      </div>

      <div class="info-box about">
        <h2>GET TO KNOW US </h2>
        <p>Learn more about the story behind <strong>Beatrix Holiday</strong> and the passionate team that drives the success of our brand — dedicated to creating unforgettable travel experiences for our members.</p>
        <a href="#" class="btn">Contact Us</a>
      </div>
    </div>
  </section>
</main>

<?php
include 'inc/footer.php';
?>

<script>
  // Animate elements when they come into view
  document.addEventListener("scroll", () => {
    document.querySelectorAll(".text-box, .about-text-box, .stats-section div, .service-card, .membership-banner, .property-gallery img, .membership-info, .popular-holiday, .why-us-section, .info-box").forEach(el => {
      const rect = el.getBoundingClientRect();
      if (rect.top < window.innerHeight - 80) {
        el.classList.add("animate-visible");
      }
    });
  });

  // Trigger animation for visible elements on page load
  window.addEventListener("load", () => {
    document.dispatchEvent(new Event("scroll"));
  });
</script>