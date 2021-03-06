<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/sidebar.css">

    <title>Errand Dashboard</title>
</head>

<body>
    <header class="header">
        <div class="header__container">
            <img src="images/profile-male.svg" alt="" class="header__img">

            <a href="#" class="header__logo">Welcome</a>
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <i class='bx bxs-disc nav__icon'></i>
                    <span class="nav__logo-name">Errand Dashboard</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Home</h3>

                        <a href="#" class="nav__link active">
                            <i class='bx bx-home nav__icon'></i>
                            <span class="nav__name">Dashboard</span>
                        </a>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-user nav__icon'></i>
                                <span class="nav__name">Profile</span>
                            </a>
                        </div>
                    </div>

                    <div class="nav__items">
                        <h3 class="nav__subtitle">Menu</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-bell nav__icon'></i>
                                <span class="nav__name">Notifications</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="#" class="nav__dropdown-item">Blocked</a>
                                    <a href="#" class="nav__dropdown-item">Silenced</a>
                                    <a href="#" class="nav__dropdown-item">Publish</a>
                                    <a href="#" class="nav__dropdown-item">Program</a>
                                </div>
                            </div>

                        </div>

                        <a href="#" class="nav__link">
                            <i class='bx bx-compass nav__icon'></i>
                            <span class="nav__name">Explore</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-bookmark nav__icon'></i>
                            <span class="nav__name">Saved</span>
                        </a>
                    </div>
                </div>
            </div>

            <a href="#" class="nav__link nav__logout">
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