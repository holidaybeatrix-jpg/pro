<?php
$pageTitle = "Blog";
include 'inc/header.php';
?>

<main class="container-fluid p-0">

  <!-- Hero Section -->
  <section class="blog-hero d-flex align-items-center justify-content-center text-center">
    <div class="overlay"></div>
    <div class="content text-white">
      <h1>Travel Stories & Tips from <span class="highlight">Beatrix Holiday</span></h1>
      <p>Inspiration, guides, and travel ideas to make your next vacation unforgettable.</p>
    </div>
  </section>

  <!-- Featured Blog Section -->
  <section class="featured-blog container py-5">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <img src="./assets/img/blog/featured.jpg" alt="Featured Blog" class="img-fluid rounded shadow-sm">
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Top 10 Beach Destinations to Visit This Year</h2>
        <p class="mb-3">
          Looking for the perfect blend of sun, sand, and serenity? Discover our handpicked list of beach destinations that promise breathtaking views, water adventures, and pure relaxation.
        </p>
        <a href="#" class="btn btn-read-more">Read More</a>
      </div>
    </div>
  </section>

  <!-- Recent Blogs Section -->
  <section class="recent-blogs bg-light py-5">
    <div class="container text-center">
      <h2 class="fw-bold mb-5">Latest from Our Blog</h2>
      <div class="row gy-4">

        <div class="col-md-4">
          <div class="card blog-card h-100 shadow-sm border-0">
            <img src="./assets/img/blog/blog1.jpg" class="card-img-top" alt="Blog 1">
            <div class="card-body">
              <h5 class="card-title fw-bold">Exploring Goa: Beyond the Beaches</h5>
              <p class="card-text">Goa is more than just beaches — discover hidden waterfalls, spice farms, and vibrant local culture with Beatrix Holiday.</p>
              <a href="#" class="btn btn-read-more mt-2">Read More</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card blog-card h-100 shadow-sm border-0">
            <img src="./assets/img/blog/blog2.jpg" class="card-img-top" alt="Blog 2">
            <div class="card-body">
              <h5 class="card-title fw-bold">How to Plan the Perfect Family Vacation</h5>
              <p class="card-text">From choosing destinations to managing bookings, here’s how to plan a stress-free family getaway that everyone enjoys.</p>
              <a href="#" class="btn btn-read-more mt-2">Read More</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card blog-card h-100 shadow-sm border-0">
            <img src="./assets/img/blog/blog3.jpg" class="card-img-top" alt="Blog 3">
            <div class="card-body">
              <h5 class="card-title fw-bold">Top 5 Luxury Resorts for a Romantic Escape</h5>
              <p class="card-text">Rekindle romance at some of the most beautiful resorts handpicked by Beatrix Holiday for couples who love elegance and privacy.</p>
              <a href="#" class="btn btn-read-more mt-2">Read More</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php include 'inc/footer.php'; ?>

<style>

.blog-hero .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.55);
}

.blog-hero .content {
  position: relative;
  z-index: 2;
  animation: fadeInUp 1s ease-in-out;
}

.blog-hero h1 {
  font-size: 2.5rem;
  font-weight: bold;
  animation: slideIn 1s ease-in-out;
}

.blog-hero p {
  animation: fadeIn 1.5s ease-in-out;
}

/* Featured Blog Hover Animation */
.featured-blog img {
  transition: transform 0.5s ease, box-shadow 0.5s ease;
  border-radius: 10px;
}

.featured-blog img:hover {
  transform: scale(1.05);
  box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

/* Blog Cards Hover */
.blog-card {
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  border-radius: 10px;
  overflow: hidden;
  background-color: #fff;
}

.blog-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

/* Blog Card Image Hover */
.blog-card img {
  transition: transform 0.5s ease;
}

.blog-card:hover img {
  transform: scale(1.08);
}

/* Button Animation */
.btn-read-more {
  background-color: #007bff;
  color: white;
  padding: 8px 18px;
  border-radius: 25px;
  transition: all 0.3s ease;
}

.btn-read-more:hover {
  background-color: #0056b3;
  transform: scale(1.05);
  color: #fff;
}

/* Animations */
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideIn {
  from { opacity: 0; transform: translateY(-30px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
