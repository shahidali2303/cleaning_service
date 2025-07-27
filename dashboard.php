<?php
if (!isset($_COOKIE['user_email'])) {
    // Not logged in, redirect to login page
    header("Location: admin-login.php"); // or login.php or whatever your login page is
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <style>
      body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;
        background: #f0f2f5;
      }

      .dashboard {
        display: flex;
        height: 100vh;
      }

      /* Sidebar */
      .sidebar {
        width: 240px;
        background: #2c3e50;
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px;
      }

      .sidebar-header h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        padding-bottom: 10px;
      }

      .sidebar-menu {
        list-style: none;
        padding: 0;
      }

      .sidebar-menu li {
        margin-bottom: 20px;
      }

      .sidebar-menu a {
        color: white;
        text-decoration: none;
        font-size: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        border-radius: 8px;
        transition: background 0.3s;
      }

      .sidebar-menu a:hover {
        background: #34495e;
      }

      /* Main content */
      .main-content {
        flex-grow: 1;
        padding: 30px;
        background-color: #ecf0f1;
        overflow-y: auto;
      }

      #page-content {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>
  <body>
    <div class="dashboard">
      <!-- Sidebar -->
      <aside class="sidebar">
        <div class="sidebar-header">
          <h2>Dashboard Panel</h2>
        </div>
        <ul class="sidebar-menu">
          <li>
            <a href="#" onclick="loadPage('post-job')"
              ><i class="fas fa-plus-circle"></i> Post New Job</a
            >
          </li>
          <li>
            <a href="#" onclick="loadPage('applied-jobs')"
              ><i class="fas fa-list"></i> Applied Jobs</a
            >
          </li>
          <li>
            <a href="#" onclick="loadPage('profile')"
              ><i class="fas fa-user"></i> Profile</a
            >
          </li>
          <li>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </aside>

      <!-- Main Content -->
      <main class="main-content">
        <div id="page-content">
          <h2>Welcome to your Dashboard</h2>
          <p>Welcome, <?php echo htmlspecialchars($_COOKIE['user_email']); ?>!</p>
          <p>Select a link from the left to get started.</p>
        </div>
      </main>
    </div>
  </body>
</html>
