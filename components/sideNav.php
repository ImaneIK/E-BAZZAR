<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>



/* Apply styles for active link */
.nav a.active {
    background-color: #555; /* Highlight background color */
    font-weight: bold; /* Text style for active link */
}

</style>
<body>
    <!-- sidenav -->
    <div style="background: black; position:relative; min-width:25vw; display:flex; flex-direction:column; justify-content:space-between;">
        <div >
        <a href="/" class="d-flex p-1 align-items-center text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="40">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-3" >E-BAZZAR</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
            <a href="/notes/" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"> </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/notes/pages/users/view.php" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"> </svg>
                    User management
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Orders
                </a>
            </li>
            <li>
                <a href="/notes/pages/products/view.php" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    Products
                </a>
            </li>
         
        </ul>
        <hr>
        </div>
        <div class="dropdown p-4" >
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">New project...</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
    <script>
        // Get the current page URL
var currentURL = window.location.href;

// Select all anchor elements
var links = document.querySelectorAll('.nav a');

// Loop through the links and check if their href matches the current URL
for (var i = 0; i < links.length; i++) {
    if (links[i].href === currentURL) {
        links[i].classList.add('active');
    }
}

    </script>
</body>

</html>