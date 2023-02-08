<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <title>Adidas</title>
  </head>
  <body>
    <?php
      $servername = "localhost:3307";
      $username = "admin";
      $password = "thangdoggy";
      $dbname = "shop";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      // echo "Connected successfully";
    ?>

    <!-- Navbar -->
    <nav class="navbar bg-light navbar-expand-lg">
      <div class="container-lg gap-5">
        <!-- Logo -->
        <a href="#" class="navbar-brand"
          ><img src="./img/adidas_logo.png" alt="" style="width: 6rem"
        /></a>

        <!-- Toggle -->

        <button
          class="navbar-toggler px-3 py-2 ms-auto"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#searchbar"
        >
          <span class="">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-search"
              viewBox="0 0 16 16"
            >
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
              />
            </svg>
          </span>
        </button>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"> </span>
        </button>

        <!-- NavLink -->
        <div class="collapse navbar-collapse gap-5" id="navmenu">
          <ul class="navbar-nav ms-auto gap-3">
            <li>
              <a href="#contact" class="nav-link text-uppercase fw-bold"
                >Community</a
              >
            </li>
            <li>
              <a href="#follow" class="nav-link text-uppercase fw-bold">Cart</a>
            </li>
            <li class="">
              <a href="#login" class="nav-link text-uppercase fw-bold">
                Login
              </a>
            </li>
          </ul>
        </div>

        <!-- Search bar -->
        <div
          class="collapse navbar-collapse col-lg-1 position-relative"
          id="searchbar"
        >
          <input
            type="text"
            class="form-control rounded-5 px-5 fst-italic"
            placeholder="Search"
          /><i
            class="fa-sharp fa-solid fa-magnifying-glass position-absolute"
            style="margin-left: 20px"
          ></i>
        </div>
      </div>
    </nav>

    <!-- Body -->
    <section class="mt-4">
      <div class="container bg-body">
        <div class="row">
          <!-- Sidebar -->
          <div class="col-lg-2 container">
            <div class="text-uppercase fw-bold mb-2">Category</div>
            <ul class="navbar-nav" id="category">
              <li><a href="" class="text-capitalize nav-link">men</a></li>
              <li><a href="" class="text-capitalize nav-link">women</a></li>
              <li><a href="" class="text-capitalize nav-link">kids</a></li>
              <li><a href="" class="text-capitalize nav-link">gifts</a></li>
              <li><a href="" class="text-capitalize nav-link">sale</a></li>
            </ul>
            <div class="text-uppercase fw-bold mt-4 mb-2">Top product</div>
            <ul class="navbar-nav">
              <li><a href="" class="text-capitalize nav-link">shoes</a></li>
              <li><a href="" class="text-capitalize nav-link">clothing</a></li>
              <li>
                <a href="" class="text-capitalize nav-link fw-bold"
                  >best seller</a
                >
              </li>
              <li>
                <a href="" class="text-capitalize nav-link">new arrivals</a>
              </li>
            </ul>
          </div>

          <!-- Product -->
          <div class="col-lg px-5">
            <h1 class="fw-bold text-uppercase mb-4">
              BEST SELLING SHOES, CLOTHING & MORE
            </h1>
            <!--  -->
            <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php 
              $sql = "SELECT id, name, price, image FROM products";
              $products = $conn->query($sql);

              if ($products->num_rows > 0) {
                while($row = $products->fetch_assoc()) {
            ?>

              <div class="col">
                <div class="card">
                <a href="detail.php?prd_id=<?php echo $row["id"] ?>">
                  <img src="<?php echo $row["image"] ?>" alt="" class="card-img-top" />
                </a>  
                  <div class="card-body">
                    <div class="card-title text-capitalize"
                      ><?php echo $row["name"] ?></div
                    >
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                      <span class="card-text text-danger"><?php echo $row["price"] . "$" ?></span>
                      <button
                        type="button"
                        class="btn btn-outline-dark rounded-5"
                      >
                        Buy
                      </button>
                    </div>
                  </div>
                </div>
              </div>       


            <?php
                    
                }
              } else {
                  echo "No products available";
              }
            
            ?>
               
            </div>
            <!-- Pagination -->
            <nav class="mt-4">
              <ul class="pagination justify-content-end">
                <li class="page-item">
                  <a class="page-link text-secondary" href="#"
                    ><i class="fa-solid fa-arrow-left"></i
                  ></a>
                </li>
                <li class="page-item">
                  <a class="page-link text-secondary fw-bold" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link text-secondary" href="#">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link text-secondary" href="#">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link text-secondary" href="#"
                    ><i class="fa-solid fa-arrow-right"></i
                  ></a>
                </li>
              </ul>
            </nav>
          </div>

          <!-- Advertisement banner-->
          <div class="col-lg-2">
            <img
              src="./img/banner1.jpg"
              alt=""
              class="mb-4"
              style="width: 100%"
            />
            <img
              src="./img/banner2.jpg"
              class="mb-4"
              alt=""
              style="width: 100%"
            />
            <img src="./img/banner3.jpg" alt="" style="width: 100%" />
          </div>
        </div>
      </div>
    </section>

    <!-- Footer section -->
    <footer class="mt-4 bg-dark text-white p-4">
      <div class="container-lg">
        <div class="d-flex justify-content-between align-items-start">
          <div class="d-flex flex-column">
            <span class="text-uppercase fw-bold mb-2">Support</span>
            <a href="" class="nav-link">Help</a
            ><a href="" class="nav-link">Returns and Exchanges</a
            ><a href="" class="nav-link">Order Tracker</a
            ><a href="" class="nav-link">Size Charts</a
            ><a href="" class="nav-link">How to clean</a>
          </div>
          <div class="d-flex flex-column">
            <span class="text-uppercase fw-bold mb-2">Company Info</span
            ><a href="" class="nav-link">About Us</a
            ><a href="" class="nav-link">Student Discount</a
            ><a href="" class="nav-link">adidas Apps</a
            ><a href="" class="nav-link">adiClub</a>
          </div>
          <div>
            <span class="text-uppercase fw-bold">Contact us</span>
            <div class="mt-3">
              <i class="fa-brands fa-facebook fs-1 mx-2"></i
              ><i class="fa-brands fa-instagram fs-1 mx-2"></i
              ><i class="fa-brands fa-twitter fs-1 mx-2"></i>
              <i class="fa-brands fa-tiktok fs-1 mx-2"></i
              ><i class="fa-brands fa-youtube fs-1 mx-2"></i>
            </div>
          </div>
        </div>
        <div class="text-secondary text-center">@2022 By QT</div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
