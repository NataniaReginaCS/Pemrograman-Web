<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        body, html {
            height: 100%;
            margin: 0;
            font-family: "Roboto", sans-serif;  
            overflow: hidden; 
        }
        #video-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translate(-50%, -50%);
            object-fit: cover; 
        }
        .overlay-content {
            position: relative;
            z-index: 1;
            color: white; /* Text color */
            text-align: center;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
        }

        nav.navbar {
            z-index: 2;
        }
        .navbar .nav-link.active {
            color: black; 
        }

        .navbar .nav-link {
            color: slategray; 
        }

        .offcanvas-header h5 {
            color: black; 
        }

        .offcanvas-transparent {
            background-color: transparent !important;
        }
        .navbar-toggler {
            border: none; 
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-transparent fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler p-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                  <i class="bi bi-apple " style="font-size: 20px" ></i>
                </button> 
                <h1 class="navbar-brand">Apple.</h1>    
                <div class="offcanvas offcanvas-start text-bg-light" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body text">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('product')}}">Product</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <video autoplay muted loop id="video-bg" class="video-background">
        <source src="{{ asset('video/apple.mp4') }}" type="video/mp4">
    </video>

    <div class="overlay-content">
      <div class="d-flex justify-content-center mb-3">
        <div class="d-flex align-items-center mx-2">
          <i class="bi bi-apple " style="font-size: 60px" ></i>
          
        </div>
      </div>
        <a href="{{url('product')}}" class="btn btn-outline-light">See more about me</a>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
