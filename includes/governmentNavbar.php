<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/sidebar.css">
    <title>Government Dashboard</title>
</head>

<style>
a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}
</style>

<body>
    <header class="header">
        <div class="header__container">
            <img src="images/profile-male.svg" alt="" class="header__img">

            <a href="#" class="header__logo">Welcome <?php echo $_SESSION["user_name"]; ?></a>
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <i class='bx bxs-user nav__icon'></i>
                    <span class="nav__logo-name">Government Dashboard</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Home</h3>

                        <a href="governmentHome.php" class="nav__link active">
                            <i class='bx bx-home nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profile</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="governmentProfile.php" class="nav__dropdown-item">Profile</a>
                                    <a href="updateGovernmentProfile.php" class="nav__dropdown-item">Update Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav__items">
                        <h3 class="nav__subtitle">Menu</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-bell nav__icon'></i>
                                <span class="nav__name">Information</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="governmentPostInformation.php" class="nav__dropdown-item">Post
                                        Information</a>
                                    <a href="viewMyInformation.php" class="nav__dropdown-item">My Information</a>
                                </div>
                            </div>

                        </div>
                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bxs-message-alt-detail nav__icon'></i>
                                <span class="nav__name">Complaints</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="governmentViewComplaint.php" class="nav__dropdown-item">View Complaints</a>
                                    <a href="governmentSetComplaintStatus.php" class="nav__dropdown-item">Complaint
                                        Status</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <a href="logout.php" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <main>
        <section>

        </section>
    </main>

    <script>
    const showMenu = (headerToggle, navbarId) => {
        const toggleBtn = document.getElementById(headerToggle),
            nav = document.getElementById(navbarId)
        if (headerToggle && navbarId) {
            toggleBtn.addEventListener('click', () => {
                nav.classList.toggle('show-menu')
                toggleBtn.classList.toggle('bx-x')
            })
        }
    }
    showMenu('header-toggle', 'navbar')
    const linkColor = document.querySelectorAll('.nav__link');

    function colorLink() {
        linkColor.forEach(l => l.classList.remove('active'))
        this.classList.add('active')
    }

    linkColor.forEach(l => l.addEventListener('click', colorLink))
    </script>
</body>

</html>