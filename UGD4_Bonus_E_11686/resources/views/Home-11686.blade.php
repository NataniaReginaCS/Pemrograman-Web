<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Home-11686</title>

        <!--CSS-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">`

        <!--Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!--Font Poppins-->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!--Icon logo-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">


    </head>
    <body class="font-poppins antialiased dark:bg-black dark:text-white/50">
        <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Home-11686">Atmarior</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav mx-auto my-2 my-lg-0" style="flex-grow: 1; justify-content: center;">
                    <li class="nav-item" >
                    <a class="nav-link active" aria-current="page" href="/Home-11686" style="font-weight: bold; display: flex; flex-direction: column; align-items: center;">
                            Home 
                            <span id="underline" style="margin-top: 30px; display: flex; flex-direction: column; align-items: center;">
                    </a>
                    </li>
                    <li class="nav-item" style="display: flex; flex-direction: column; align-items: center;">
                        <a class="nav-link" href="/profile-Regina">Profile</a>
                    </li>
                    <li class="nav-item dropdown" style="display: flex; flex-direction: column;align-items: center;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i id="theme-icon" class="bi bi-brightness-high-fill"></i> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-theme-value="dark">
                                    <i class="bi bi-moon-fill"></i> Dark Mode
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-theme-value="light">
                                    <i class="bi bi-brightness-high-fill"></i> Light Mode
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-theme-value="auto">
                                    <i class="bi bi-circle-half"></i> Default Mode
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/images1.jpg')}}" class="d-block w-100" alt="Living Room 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/images2.jpg')}}" class="d-block w-100" alt="Living Room 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/images3.jpg')}}" class="d-block w-100" alt="Living Room 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="logo" style="width: 100%; max-width: 500px; height: 80px; margin: 61px auto; border: 2pt solid #afafaf; border-radius: 5pt; display: flex; align-items: center; justify-content: center; flex-wrap: wrap;">
            <a href="https://instagram.com/" style="color: black; font-size: 32px; margin: 0 50px;" id = "link1" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://linkedin.com/" style="color: black; font-size: 32px; margin: 0 50px;" id = "link2" target="_blank"><i class="bi bi-linkedin"></i></a>
            <a href="https://github.com/" style="color: black; font-size: 32px; margin: 0 50px;" id = "link3" target="_blank"><i class="bi bi-github"></i></a>
        </div>

        <div style="height: 1px; background-color: black; margin-bottom: 20px; margin-top: 50px; "></div>

    </body>

    <script>
        const getStoredTheme = () => localStorage.getItem('theme');
        const setStoredTheme = theme => localStorage.setItem('theme', theme);

        const getPreferredTheme = () => {
            const storedTheme = getStoredTheme();
                return storedTheme ? storedTheme : 'auto';
        };

        const setTheme = theme => {
            let resolvedTheme = theme;
            if (theme === 'auto') {
                resolvedTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                setStoredTheme(resolvedTheme);  
            }
            document.documentElement.setAttribute('data-bs-theme', resolvedTheme);
            updateThemeIconLink(resolvedTheme); 
        };

        const updateThemeIconLink = (theme) => {
            const themeIcon = document.getElementById('theme-icon');
            const warnaLink = document.getElementById('link1');
            const warnaLink2 = document.getElementById('link2');
            const warnaLink3 = document.getElementById('link3');
            const underline = document.getElementById('underline');

                if (theme === 'dark') {
                    themeIcon.classList.replace('bi-brightness-high-fill', 'bi-moon-fill');
                    warnaLink.style.color = "white";
                    warnaLink2.style.color = "white";
                    warnaLink3.style.color = "white";
                    underline.style.backgroundColor = "white";
                } else {
                    themeIcon.classList.replace('bi-moon-fill', 'bi-brightness-high-fill');
                    warnaLink.style.color = "black";
                    warnaLink2.style.color = "black";
                    warnaLink3.style.color = "black";
                    underline.style.backgroundColor = "black";
                }
        };

        setTheme(getPreferredTheme());

        const showActiveTheme = (theme, focus = false) => {
            const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`);

            document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                element.classList.remove('active');
                element.setAttribute('aria-pressed', 'false');
            });

            btnToActive.classList.add('active');
            btnToActive.setAttribute('aria-pressed', 'true');

            if (focus) {
                btnToActive.focus();
            }
        };

        window.addEventListener('DOMContentLoaded', () => {
            showActiveTheme(getPreferredTheme());

            document.querySelectorAll('[data-bs-theme-value]').forEach(toggle => {
                toggle.addEventListener('click', () => {
                const theme = toggle.getAttribute('data-bs-theme-value');
                setStoredTheme(theme);
                setTheme(theme);
                showActiveTheme(theme, true);
                });
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
