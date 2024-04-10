<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
        <title>browse_farmers</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="browse_style.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
        <nav>
            <div class="menu-icon">
                <span class="fas fa-bars"></span>
            </div>
            <div class="logo">
                FARMYETU
            </div>
            <div class="nav-items">
                <li><a href="index_buyer.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Feedback</a></li>
            </div>
            <div class="search-icon">
                <span class="fas fa-search"></span>
            </div>
            <div class="cancel-icon">
                <span class="fas fa-times"></span>
            </div>
            
        </nav>
        <div class="search-container">
            <form action="connect.php" method="GET" class="search-form">
                <div class="search-group">
                    <input type="search" class="search-data" placeholder="Search by crop" name="crop">
                    <button type="submit" class="fas fa-search"></button>
                </div>
            </form>
            <form action="connect.php" method="GET" class="search-form">
                <div class="search-group">
                    <input type="search" class="search-data" placeholder="Search by location" name="location">
                    <button type="submit" class="fas fa-search"></button>
                </div>
            </form>
        </div>



                <style>
                    .search-container {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        margin-top: 200px;
                        max-width: 100%;
                        padding: 50px;
                        max-height: 100%;
                        max-width: 100%;
                    }

                    .search-data {
                        padding: 10px;
                        border-radius: 5px;
                        border: none;
                        width: 300px;
                        font-size: 16px;
                    }

                    .fas.fa-search {
                        padding: 10px;
                        background-color: #007bff;
                        color: #fff;
                        border-radius: 5px;
                        border: none;
                        margin-left: -50px;
                        cursor: pointer;
                    }
                </style>
            </div>
        </div>
        <script>
            const menuBtn = document.querySelector(".menu-icon span");
            const searchBtn = document.querySelector(".search-icon");
            const cancelBtn = document.querySelector(".cancel-icon");
            const items = document.querySelector(".nav-items");
            const form = document.querySelector("form");
            menuBtn.onclick = ()=>{
                items.classList.add("active");
                menuBtn.classList.add("hide");
                searchBtn.classList.add("hide");
                cancelBtn.classList.add("show");
            }
            cancelBtn.onclick = ()=>{
                items.classList.remove("active");
                menuBtn.classList.remove("hide");
                searchBtn.classList.remove("hide");
                cancelBtn.classList.remove("show");
                form.classList.remove("active");
                cancelBtn.style.color = "#ff3d00";
            }
            searchBtn.onclick = ()=>{
                form.classList.add("active");
                searchBtn.classList.add("hide");
                cancelBtn.classList.add("show");
            }
        </script>
    </body>
</html>
