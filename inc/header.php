<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Beatrix Holiday - <?php echo $pageTitle; ?></title>
  <link rel="stylesheet" href="./assets/css/color.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>

<body>
  <header class="container-fluid position-sticky top-0">
    <nav class="navbar  bg-body-tertiary">
      <div class="container-fluid d-flex justify-content-between align-items-center">

        <!-- Logo -->
        <div class="logo-box">
          <a class="navbar-brand d-inline-block p-2 element-with-shadow position-absolute z-3 top-0" href="index.php">
            <img src="./assets/img/logos/logo.jpg" alt="Logo" width="230" height="auto" class="d-inline-block align-text-top">
          </a>
        </div>

        <!-- Hamburger Menu (visible only on mobile) -->
        <div class="menu-toggle">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <!-- Nav Links -->
        <div class="nav-links">
          <ul class="nav justify-content-end">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about-us.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="resort-booking.php">Resort Booking</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <div id="bookingForm" class="booking-form container mt-4" style="display: none;">
    <div class="flex justify-content-between align-items-center mb-4">
      <div class="position-relative mb-4">
        <h2 class="form-title mb-4">Booking Enquiry Form</h2>
        <div class="closebtn">X</div>
      </div>

    </div>
  <form action="./actions/save_booking.php" method="POST">

  <div class="row">
    <div class="col-md-6 mb-3">
      <label>Member Name *</label>
      <input type="text" name="member_name" class="form-control custom-input" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Member Ph. No. *</label>
      <input type="text" name="member_phone" class="form-control custom-input" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Membership No. *</label>
      <input type="text" name="membership_no" class="form-control custom-input" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Email *</label>
      <input type="email" name="email" class="form-control custom-input" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Check-In Date *</label>
      <input type="date" name="check_in" class="form-control custom-input" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Check-Out Date *</label>
      <input type="date" name="check_out" class="form-control custom-input" required>
    </div>

    <div class="col-12 mb-3">
      <label>Resort *</label>
      <input type="text" name="resort" class="form-control custom-input" required>
    </div>

    <div class="col-md-6 mb-3">
      <label>Location *</label>
      <select name="location" class="form-control custom-input" required>
        <option value="">Select</option>
        <option>Goa</option>
        <option>Manali</option>
        <option>Udaipur</option>
        <option>Kerala</option>
        <option>Shimla</option>
        <option>Rajasthan</option>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>No. Of Rooms *</label>
      <select name="rooms" class="form-control custom-input" required>
        <option value="">Select</option>
        <option>1 Room</option>
        <option>2 Rooms</option>
        <option>3 Rooms</option>
        <option>4 Rooms</option>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>No. of Adults *</label>
      <select name="adults" class="form-control custom-input" required>
        <option value="">Select</option>
        <option>1 Adult</option>
        <option>2 Adults</option>
        <option>3 Adults</option>
        <option>4 Adults</option>
      </select>
    </div>

    <div class="col-md-6 mb-3">
      <label>No. of Children *</label>
      <select name="children" class="form-control custom-input" required>
        <option value="">Select</option>
        <option>0 Children</option>
        <option>1 Child</option>
        <option>2 Children</option>
        <option>3 Children</option>
      </select>
    </div>

    <div class="col-12 mb-3">
      <label>Additional Information (If Any)</label>
      <textarea name="additional_info" class="form-control custom-input" rows="2"></textarea>
    </div>

    <div class="col-12 text-center mt-3">
      <button type="submit" class="btn btn-submit btn-lg w-100">Submit</button>
    </div>
  </div>

</form>

  </div>