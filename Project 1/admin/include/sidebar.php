<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Sidebar Menu | Side Navigation Bar</title>
    <!-- CSS -->
    <link rel="stylesheet" href="asset/style.css" />
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">Admin Dashboard</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon"></i>
          <span class="logo-name">Dashboard</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="dashboard.php" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Dashboard</span>
              </a>
            </li>
            <li class="list">
              <a href="createTeacher.php" class="nav-link">
                <i class="bx bx-edit icon"></i>
                <span class="link">Create Teacher</span>
              </a>
            </li>
            <li class="list">
              <a href="createStudent.php" class="nav-link">
                <i class="bx bx-edit icon"></i>
                <span class="link">Create Student</span>
              </a>
            </li>
            <li class="list">
              <a href="student.php" class="nav-link">
                <i class="bx bx-edit icon"></i>
                <span class="link">Student</span>
              </a>
            </li>
            <li class="list">
              <a href="teachers.php" class="nav-link">
                <i class="bx bx-edit icon"></i>
                <span class="link">Teacher</span>
              </a>
            </li>    
          <div class="bottom-cotent">
            <li class="list">
              <a href="../logout.php" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"></section>

    <script src="asset/script.js"></script>
  </body>
</html>