<?php

  session_start();
$pageTitle = "Resort Booking";
include 'inc/header.php';
?>

<section class="resort-booking-banner">
  <div class="overlay"></div>
  <div class="container text-left banner-content">
    <h2 class="heading-line"></h2>
    <h1><span class="text-dark-blue">RESORT</span> <span class="text-orange">BOOKING</span></h1>
  </div>
</section>

<section class="resort-category-section text-center pb-5 pt-3">
  <?php
  if (isset($_SESSION['username'])) {
    echo '
<a href="javascript:void(0)" id="" class="btn btn-primary btn-lg popupbtn mb-4 showFormBtn">Book Now</a>';
  } else {
    echo '<p class="text-muted mb-4">Please log in to access resort booking options.  <a href="login.php" class="">Login</a></p>';
  }
  ?>
  <div class="container">
    <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
      <button class="btn-category dark-blue" data-type="domestic_exchange">DOMESTIC EXCHANGE RESORTS</button>
      <button class="btn-category orange" data-type="domestic_affiliated">DOMESTIC AFFILIATED RESORTS</button>
      <button class="btn-category red" data-type="international_exchange">INTERNATIONAL EXCHANGE RESORTS</button>
    </div>
  </div>
</section>

<section class="resort-list-section py-0">
  <div class="container">
    <div id="resortData" class="text-center">
      <p class="text-muted">Select a category to load resorts.</p>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('.btn-category').on('click', function() {
      const $this = $(this);
      const type = $this.data('type');

      // Highlight selected button
      $('.btn-category').removeClass('active');
      $this.addClass('active');

      // Show loading message
      $('#resortData').html('<p class="text-secondary py-3">Checking login status...</p>');

      // Step 1: Check if user is logged in
      $.ajax({
        url: 'actions/check-login.php',
        type: 'GET',
        success: function(response) {
          if (response.trim() === 'not_logged_in') {
            window.location.href = 'login.php';
            return;
          }

          // Step 2: Fetch resorts data
          $('#resortData').html('<p class="text-secondary py-3">Loading resorts...</p>');

          $.ajax({
            url: 'data/resorts-data.php',
            type: 'GET',
            data: {
              type: type
            },
            dataType: 'json',
            success: function(resorts) {

              if (resorts.length === 0) {
                $('#resortData').html('<p class="text-muted py-3">No resorts found for this category.</p>');
                return;
              }

              // Build table + search input
              let tableHTML = `
              <div class="search-bar mb-3 text-end">
                <input type="text" id="liveSearch" class="form-control w-50 d-inline-block" placeholder="Search by resort name or state...">
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle w-100" id="resortTable">
                  <thead class="table-dark">
                    <tr>
                      <th>SR NO.</th>
                      <th>PROPERTY NAME</th>
                      <th>LOCATION</th>
                      ${type === 'international_exchange' ? '' : '<th>STATE</th>'}
                    </tr>
                  </thead>
                  <tbody>
            `;

              resorts.forEach((resort, index) => {
                tableHTML += `
                <tr>
                  <td>${index + 1}</td>
                  <td>${resort.name}</td>
                  <td>${resort.location}</td>
                  `
                if (type === 'international_exchange') {
                  tableHTML += ``;
                } else {
                  tableHTML += `<td>${resort.state}</td>`;
                }

                tableHTML += `  
                </tr>
              `;
              });

              tableHTML += `</tbody></table></div>`;
              $('#resortData').html(tableHTML);

              // Live search filter
              $('#liveSearch').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                $('#resortTable tbody tr').filter(function() {
                  const name = $(this).find('td:nth-child(2)').text().toLowerCase();
                  const state = $(this).find('td:nth-child(4)').text().toLowerCase();
                  $(this).toggle(name.includes(value) || state.includes(value));
                });
              });
            },
            error: function() {
              $('#resortData').html('<p class="text-danger py-3">Failed to load resort data.</p>');
            }
          });
        },
        error: function() {
          $('#resortData').html('<p class="text-danger py-3">Error checking login status.</p>');
        }
      });
    });
  });
</script>

<?php include 'inc/footer.php'; ?>

<style>
  .btn-category {
    border: none;
    padding: 20px 50px;
    color: #fff;
    cursor: pointer;
    border-radius: 25px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .btn-category.dark-blue {
    background-color: #1a237e;
  }

  .btn-category.orange {
    background-color: #ef6c00;
  }

  .btn-category.red {
    background-color: #c62828;
  }

  .btn-category.active {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .search-bar input {
    max-width: 350px;
    border-radius: 8px;
    padding: 8px 15px;
  }
</style>