<?php
include '../actions/db.php';
session_start();
if (!(isset($_SESSION) && $_SESSION['role'] == 'admin')) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            background-color: #f4f6f8;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: #1e293b;
            color: white;
            display: flex;
            flex-direction: column;
            transition: width 0.3s ease;
        }

        .sidebar .logo {
            display: flex;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar .logo img {
            width: 40px;
            height: 40px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .sidebar nav {
            flex: 1;
            padding: 20px 0;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.2s;
            cursor: pointer;
        }

        .sidebar nav a:hover,
        .sidebar nav a.active {
            background: #334155;
            color: #fff;
        }

        .sidebar nav a .material-icons {
            margin-right: 10px;
            font-size: 20px;
        }

        /* Main Area */
        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        header {
            background: white;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .search-box {
            width: 300px;
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px 10px;
            background: #fafafa;
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            background: none;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .profile img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .card h3 {
            font-size: 16px;
            color: #555;
        }

        .card p {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
            margin-top: 5px;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f8fafc;
            color: #555;
            font-weight: 600;
        }

        tr:hover {
            background: #f1f5f9;
        }

        .add-user-form {
            display: none;
            background: white;
            padding: 20px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 95%;
            margin: 20px auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #444;
            font-size: 14px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        .submit-btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #1d4ed8;
        }

        .toggle-btn {
            display: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }

            .sidebar.active {
                width: 220px;
                position: fixed;
                z-index: 1000;
                height: 100%;
            }

            .toggle-btn {
                display: block;
            }
        }
    </style>

    <style>
        .content-section {
            padding: 25px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        .content-section h2 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        .form-container {
            max-width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #007bff;
        }

        .submit-btn {
            background: #007bff;
            color: #fff;
            padding: 10px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #0056b3;
        }

        .submit-btn:hover {
            background: #0056b3;
        }

        #blog-content table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        #blog-content th,
        #blog-content td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        #blog-content th {
            background-color: #f8f9fa;
        }

        .btn {
            padding: 6px 12px;
            margin: 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
            font-size: 13px;
        }

        .btn.view {
            background-color: #17a2b8;
        }

        .btn.edit {
            background-color: #007bff;
        }

        .btn.delete {
            background-color: #dc3545;
        }

        .toggle-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            color: #fff;
        }

        .toggle-btn.active {
            background-color: #28a745;
        }

        .toggle-btn.inactive {
            background-color: #6c757d;
        }

        .toggle-btn:hover {
            opacity: 0.85;
        }
    </style>

    <style>
        .table-container {
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table-title {
            margin-bottom: 15px;
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
        }

        .custom-table thead {
            background: #2c3e50;
            color: #fff;
        }

        .custom-table th,
        .custom-table td {
            padding: 12px 14px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .custom-table tbody tr:hover {
            background: #f5f6fa;
        }

        .btn-view {
            padding: 6px 12px;
            font-size: 14px;
            border: none;
            background: #3498db;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-view:hover {
            background: #217dbb;
        }

        /* Responsive */
        @media(max-width: 768px) {
            .custom-table thead {
                display: none;
            }

            .custom-table,
            .custom-table tbody,
            .custom-table tr,
            .custom-table td {
                display: block;
                width: 100%;
            }

            .custom-table tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px;
            }

            .custom-table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            .custom-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                font-weight: 600;
                color: #333;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="https://dummyimage.com/40x40/fff/000&text=A" alt="Logo">
            <h2>Admin Panel</h2>
        </div>
        <nav>
            <a id="dashboard-link" class="active"><span class="material-icons">dashboard</span> Dashboard</a>
            <a id="users-link"><span class="material-icons">people</span> Users</a>
            <a class="menu-link" id="booking-link">
                <span class="material-icons">book</span>
                Bookings
            </a>

            <a class="menu-link" id="plan-enquiry-link">
                <span class="material-icons">help_outline</span>
                Plan Enquiry
            </a>

            <a id="leads-link"><span class="material-icons">assignment</span> Leads</a>
            <a id="add-user-link"><span class="material-icons">person_add</span> Add User</a>
            <a id="add-lead-link"><span class="material-icons">person_add</span> Add Blog Post</a>
            <a id="blog-link"><span class="material-icons">article</span> Blog Posts</a>
            <a href="#"><span class="material-icons">settings</span> Settings</a>
            <a href="../actions/logout.php"><span class="material-icons">logout</span> Logout</a>
        </nav>
    </div>

    <!-- Main Area -->
    <div class="main">
        <header>
            <div class="toggle-btn" id="toggle-btn">
                <span class="material-icons">menu</span>
            </div>
            <div class="search-box">
                <span class="material-icons">search</span>
                <input type="text" placeholder="Search...">
            </div>
            <div class="profile">
                <img src="https://dummyimage.com/40x40/ccc/000&text=U" alt="User">
                <span><?php echo $_SESSION['name']; ?></span>
            </div>
        </header>

        <!-- Dashboard -->
        <div class="content" id="dashboard-content">
            <h2>Dashboard Overview</h2>
            <div class="cards">
                <div class="card">
                    <h3>Total Users</h3>
                    <p>1,204</p>
                </div>
                <div class="card">
                    <h3>Total Leads</h3>
                    <p>320</p>
                </div>
                <div class="card">
                    <h3>Blog Posts</h3>
                    <p>58</p>
                </div>
                <div class="card">
                    <h3>Messages</h3>
                    <p>18</p>
                </div>
            </div>
        </div>
        <?php
        // Handle update request
        if (isset($_POST['update_user'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $role = $_POST['role'];
            $status = $_POST['status'];

            $update = "UPDATE users SET name='$name', email='$email', phone='$phone', role='$role', status='$status' WHERE id='$id'";
            if (mysqli_query($conn, $update)) {
                $msg = "User updated successfully.";
            } else {
                $msg = "Error updating user: " . mysqli_error($conn);
            }
        }

        // Fetch all users
        $users = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
        ?>

        <!-- USERS SECTION -->
        <section id="users-content" style="display:none; padding:20px;">
            <h2 style="font-size:22px; margin-bottom:20px;">All Users</h2>

            <?php if (isset($msg)): ?>
                <p style="color:green; font-weight:bold;"><?php echo $msg; ?></p>
            <?php endif; ?>

            <table border="1" width="100%" cellspacing="0" cellpadding="10" style="border-collapse:collapse;">
                <thead style="background:#f4f4f4;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($users) > 0): ?>
                        <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($users)): ?>
                            <?php if (($row['role'] == 'admin') && ($row['username'] == 'altaf604')) continue; ?>
                            <tr>
                                <form method="POST" action="">
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required style="width:100%;">
                                    </td>
                                    <td>
                                        <input type="text" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required style="width:100%;" readonly>
                                    </td>
                                    <td>
                                        <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required style="width:100%;">
                                    </td>
                                    <td>
                                        <input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required style="width:100%;">
                                    </td>
                                    <td>
                                        <select name="role" style="width:100%;">
                                            <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>User</option>
                                            <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="status" style="width:100%;">
                                            <option value="active" <?php if ($row['status'] == 'active') echo 'selected'; ?>>Active</option>
                                            <option value="pending" <?php if ($row['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                            <option value="inactive" <?php if ($row['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="update_user" style="background:#2563eb; color:white; border:none; padding:5px 10px; border-radius:4px;">Save</button>
                                    </td>
                                </form>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" style="text-align:center;">No users found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>


        <?php

        $leadsQuery = "SELECT * FROM query ORDER BY submitted_at DESC";
        $leads = mysqli_query($conn, $leadsQuery);
        ?>

        <div class="content" id="booking-content" style="display:none;">
            <h2 style="font-size:22px; margin-bottom:20px;">All Bookings</h2>
            <table border="1" width="100%" cellspacing="0" cellpadding="10" style="border-collapse:collapse;">
                <thead style="background:#f4f4f4;">
                    <tr>
                        <th>#</th>
                        <th>Member Name</th>
                        <th>Membership No.</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Resort</th>
                        <th>Location</th>
                        <th>Check-In</th>
                        <th>Check-Out</th>
                        <th>Booked At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $bookingQuery = "SELECT * FROM booking_enquiries ORDER BY created_at DESC";
                    $bookings = mysqli_query($conn, $bookingQuery);
                    if (mysqli_num_rows($bookings) > 0):
                        $i = 1;
                        while ($booking = mysqli_fetch_assoc($bookings)): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($booking['member_name']); ?></td>
                                <td><?php echo htmlspecialchars($booking['membership_no']); ?></td>
                                <td><?php echo htmlspecialchars($booking['email']); ?></td>
                                <td><?php echo htmlspecialchars($booking['member_phone']); ?></td>
                                <td><?php echo htmlspecialchars($booking['resort']); ?></td>
                                <td><?php echo htmlspecialchars($booking['location']); ?></td>
                                <td><?php echo htmlspecialchars($booking['check_in']); ?></td>
                                <td><?php echo htmlspecialchars($booking['check_out']); ?></td>
                                <td><?php echo date("Y-m-d H:i", strtotime($booking['created_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" style="text-align:center;">No bookings found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>

        <div class="content" id="plan-enquiry-content" style="display:none;">
            <h2 style="font-size:22px; margin-bottom:20px;">All Plan Enquiries</h2>
            <table border="1" width="100%" cellspacing="0" cellpadding="10" style="border-collapse:collapse;">
                <thead style="background:#f4f4f4;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Package </th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $planEnquiryQuery = "SELECT * FROM enquiries ORDER BY created_at DESC";
                    $enquiries = mysqli_query($conn, $planEnquiryQuery);
                    if (mysqli_num_rows($enquiries) > 0):
                        $i = 1;
                        while ($enquiry = mysqli_fetch_assoc($enquiries)): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($enquiry['name']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['email']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['phone']); ?></td>
                                <td><?php echo htmlspecialchars($enquiry['package_name']); ?></td>
                                <td><?php echo date("Y-m-d H:i", strtotime($enquiry['created_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center;">No enquiries found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Leads Section -->
        <div class="content" id="leads-content" style="display:none;">
            <h2 style="font-size:22px; margin-bottom:20px;">All Leads</h2>

            <table border="1" width="100%" cellspacing="0" cellpadding="10" style="border-collapse:collapse;">
                <thead style="background:#f4f4f4;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($leads) > 0): ?>
                        <?php $i = 1;
                        while ($lead = mysqli_fetch_assoc($leads)): ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($lead['name']); ?></td>
                                <td><?php echo htmlspecialchars($lead['email']); ?></td>
                                <td><?php echo htmlspecialchars($lead['phone']); ?></td>
                                <td><?php echo date("Y-m-d H:i", strtotime($lead['submitted_at'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">No leads found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>


        <!-- Blog Posts -->
        <div class="content" id="blog-content" style="display:none;">
            <h2>Blog Posts</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Exploring the Mountains</td>
                        <td>Admin</td>
                        <td>Travel</td>
                        <td>2025-11-08</td>
                        <td><button class="toggle-btn active">Active</button></td>
                        <td>
                            <button class="btn view">View</button>
                            <button class="btn edit">Edit</button>
                            <button class="btn delete">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Top 10 Beach Destinations</td>
                        <td>Admin</td>
                        <td>Tourism</td>
                        <td>2025-11-05</td>
                        <td><button class="toggle-btn inactive">Inactive</button></td>
                        <td>
                            <button class="btn view">View</button>
                            <button class="btn edit">Edit</button>
                            <button class="btn delete">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="add-blog-form" class="content-section" style="display:none;">
            <h2>Add Blog Post</h2>
            <form id="blogForm" action="actions/add-blog.php" method="POST" enctype="multipart/form-data" class="form-container">
                <div class="form-group">
                    <label for="title">Blog Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter blog title" required>
                </div>

                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" placeholder="Slug will appear here..." required readonly>
                    <small id="slug-preview" style="color:#555;display:block;margin-top:5px;font-size:13px;"></small>
                </div>

                <div class="form-group">
                    <label for="image">Featured Image</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="content">Blog Content</label>
                    <textarea id="content" name="content" rows="6" placeholder="Write your blog here..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" required>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="submit-btn">Add Blog</button>
            </form>
        </div>



        <!-- Add User Form -->
        <div class="content add-user-form" id="add-user-form">
            <h3>Add New User</h3>
            <form action="../actions/add-user-action.php" method="POST">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group" style="position: relative;">
                    <label>Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter or generate username">
                    <button type="button" id="generate-username-btn"
                        style="display:none;position:absolute;right:10px;top:32px;
                background:#2563eb;color:white;border:none;padding:6px 10px;
                border-radius:4px;cursor:pointer;font-size:12px;">
                        Generate
                    </button>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" required>
                </div>

                <div class="form-group" style="position: relative;">
                    <label>Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter password">
                    <span id="togglePassword"
                        style="position:absolute;right:12px;top:36px;cursor:pointer;color:#555;font-size:14px;">
                        👁️
                    </span>
                </div>

                <button type="submit" class="submit-btn">Create User</button>
            </form>
        </div>




    </div>
    <script>
        // Sidebar section toggling
        const toggleBtn = document.getElementById("toggle-btn");
        const sidebar = document.getElementById("sidebar");

        const dashboardContent = document.getElementById("dashboard-content");
        const addUserForm = document.getElementById("add-user-form");
        const usersContent = document.getElementById("users-content");
        const leadsContent = document.getElementById("leads-content");
        const blogContent = document.getElementById("blog-content");
        const addBlogForm = document.getElementById("add-blog-form");
        const bookingContent = document.getElementById("booking-content");
        const planEnquiryContent = document.getElementById("plan-enquiry-content");

        const dashboardLink = document.getElementById("dashboard-link");
        const addUserLink = document.getElementById("add-user-link");
        const usersLink = document.getElementById("users-link");
        const leadsLink = document.getElementById("leads-link");
        const blogLink = document.getElementById("blog-link");
        const addLeadLink = document.getElementById("add-lead-link");
        const bookingLink = document.getElementById("booking-link");
        const planEnquiryLink = document.getElementById("plan-enquiry-link");


        const allSections = [dashboardContent, addUserForm, usersContent, leadsContent, blogContent, addBlogForm, bookingContent, planEnquiryContent];
        const allLinks = [dashboardLink, addUserLink, usersLink, leadsLink, blogLink, addLeadLink, bookingLink, planEnquiryLink];

        toggleBtn.addEventListener("click", () => sidebar.classList.toggle("active"));

        function showSection(section, link) {
            allSections.forEach(s => s.style.display = "none");
            allLinks.forEach(l => l.classList.remove("active"));
            section.style.display = "block";
            link.classList.add("active");
        }

        dashboardLink.onclick = () => showSection(dashboardContent, dashboardLink);
        addUserLink.onclick = () => showSection(addUserForm, addUserLink);
        usersLink.onclick = () => showSection(usersContent, usersLink);
        leadsLink.onclick = () => showSection(leadsContent, leadsLink);
        blogLink.onclick = () => showSection(blogContent, blogLink);
        addLeadLink.onclick = () => showSection(addBlogForm, addLeadLink);
        planEnquiryLink.onclick = () => showSection(planEnquiryContent, planEnquiryLink);
        bookingLink.onclick = () => showSection(bookingContent, bookingLink);

        // Live slug generation (editable + no domain preview)
        const titleInput = document.getElementById("title");
        const slugInput = document.getElementById("slug");

        let userEditedSlug = false; // detect if user manually edits slug

        titleInput.addEventListener("input", function() {
            if (!userEditedSlug) {
                const slug = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '') // remove special chars
                    .replace(/\s+/g, '-') // replace spaces with -
                    .replace(/-+/g, '-'); // collapse multiple hyphens
                slugInput.value = slug;
            }
        });

        // If user types in slug field manually, stop auto-updating
        slugInput.addEventListener("input", function() {
            userEditedSlug = true;
            this.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        });
    </script>


    <script>
        // Username auto generator
        const nameInput = document.getElementById("name");
        const usernameInput = document.getElementById("username");
        const generateBtn = document.getElementById("generate-username-btn");

        nameInput.addEventListener("input", function() {
            generateBtn.style.display = this.value.trim() ? "block" : "none";
        });

        generateBtn.addEventListener("click", function() {
            const name = nameInput.value.trim().toLowerCase().replace(/\s+/g, ".");
            const randomNum = Math.floor(Math.random() * 1000);
            usernameInput.value = name ? name + randomNum : "";
        });

        // Show / Hide Password
        const passwordInput = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", () => {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            togglePassword.textContent = type === "password" ? "👁️" : "🙈";
        });

        // Status toggle (blog part)
        document.querySelectorAll(".toggle-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                this.classList.toggle("active");
                this.classList.toggle("inactive");
                this.textContent = this.classList.contains("active") ? "Active" : "Inactive";
            });
        });

        // Action buttons (blog part)
        document.querySelectorAll(".btn.view").forEach(btn => btn.addEventListener("click", () => alert("Viewing blog details...")));
        document.querySelectorAll(".btn.edit").forEach(btn => btn.addEventListener("click", () => alert("Editing blog post...")));
        document.querySelectorAll(".btn.delete").forEach(btn => {
            btn.addEventListener("click", () => {
                if (confirm("Are you sure you want to delete this blog?")) {
                    alert("Blog deleted successfully.");
                }
            });
        });
    </script>
</body>

</html>