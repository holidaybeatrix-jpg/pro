<!-- Header -->
<?php
$pageTitle = "About Us";
include 'inc/header.php';
?>

<!-- Add AOS (Animate On Scroll) Library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<!-- Hero Section -->
<section class="about-hero d-flex align-items-center justify-content-center text-center" data-aos="fade-in">
  <div class="overlay"></div>
  <div class="content text-white">
    <h1 data-aos="zoom-in" data-aos-delay="200">About <span class="highlight">Beatrix Holiday</span></h1>
    <p data-aos="fade-up" data-aos-delay="400">Discover who we are and why travelers trust us for unforgettable experiences.</p>
  </div>
</section>

<!-- About Description -->
<section class="about-section container py-5">
  <div class="row align-items-center">
    <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
      <img src="./assets/img/about/about-travel.jpg" alt="About Beatrix Holiday" class="img-fluid rounded shadow-sm">
    </div>
    <div class="col-lg-6" data-aos="fade-left">
      <h2 class="fw-bold mb-3">Who We Are</h2>
      <p class="mb-3">
        At Beatrix Holiday, we believe travel is more than visiting places — it’s about creating stories that last forever.
        Founded with a passion for adventure and hospitality, we’ve been curating personalized trips across breathtaking destinations.
      </p>
      <p>
        Whether you're looking for a quick getaway, a family adventure, or a luxury vacation, our team ensures every detail
        is perfectly planned, so you can focus on what matters most — enjoying your journey.
      </p>
    </div>
  </div>
</section>

<!-- Mission and Vision -->
<section class="mission-section py-5 text-center">
  <div class="container">
    <h2 class="fw-bold mb-4" data-aos="fade-up">Our Mission & Vision</h2>
    <div class="row gy-4">
      <div class="col-md-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="card shadow-sm border-0 p-4 h-100">
          <h4 class="text-primary mb-3">Our Mission</h4>
          <p>To provide travelers with seamless, inspiring, and memorable experiences through honest service and personalized attention.</p>
        </div>
      </div>
      <div class="col-md-6" data-aos="zoom-in" data-aos-delay="400">
        <div class="card shadow-sm border-0 p-4 h-100">
          <h4 class="text-success mb-3">Our Vision</h4>
          <p>To become the most trusted name in travel by connecting people with destinations in meaningful and responsible ways.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose-us py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-5" data-aos="fade-up">Why Choose Beatrix Holiday?</h2>
    <div class="row gy-4">
      <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
        <div class="p-4 shadow-sm bg-white rounded h-100 hover-box">
          <img src="./assets/img/about/expert.png" alt="Expert Icon" width="60" class="mb-3">
          <h5>Experienced Experts</h5>
          <p>Our travel experts craft itineraries with deep destination knowledge and care.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="flip-left" data-aos-delay="300">
        <div class="p-4 shadow-sm bg-white rounded h-100 hover-box">
          <img src="./assets/img/about/support.png" alt="Support Icon" width="60" class="mb-3">
          <h5>24/7 Support</h5>
          <p>We’re always here for you — before, during, and after your trip.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="flip-left" data-aos-delay="500">
        <div class="p-4 shadow-sm bg-white rounded h-100 hover-box">
          <img src="./assets/img/about/value.png" alt="Value Icon" width="60" class="mb-3">
          <h5>Best Value</h5>
          <p>We ensure quality experiences at the most competitive prices.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include 'inc/footer.php'; ?>

<!-- Animation and Hover Effects -->
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>

<style>
.hover-box {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-box:hover {
  transform: translateY(-10px) scale(1.03);
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.about-hero .overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.4);
}

img:hover {
  transform: scale(1.05);
  transition: transform 0.3s ease;
}
</style>
