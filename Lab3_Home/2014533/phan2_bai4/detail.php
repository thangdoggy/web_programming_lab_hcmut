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
            class="fa-sharp fa-solid fa-magnifying-glass position-absolute text-secondary"
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
          <?php
            $prd_id = $_GET['prd_id'];
            $sql = "SELECT * FROM products WHERE id = $prd_id";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
          ?>

          <div class="col-lg">
            <div>
              <a href="#" class="text-decoration-none text-black">Home</a>
              /
              <a href="#" class="text-decoration-none text-black"
                >Best seller</a
              >
            </div>
            <div class="row mt-3">
              <div class="col-lg">
                <img src="<?php echo $row["image"] ?>" alt="" class="w-100" />
                <div class="d-flex justify-content-between mt-2">
                  <img src="<?php echo $row["image"] ?>" alt="" style="width: 24%" class="" />
                  <img src="<?php echo $row["image"] ?>" alt="" style="width: 24%" />
                  <img src="<?php echo $row["image"] ?>" alt="" style="width: 24%" />
                  <img src="<?php echo $row["image"] ?>" alt="" style="width: 24%" />
                </div>
              </div>
              <div class="col-lg-5">
                <h2 class="fst-italic"><?php echo $row["name"] ?></h2>
                <p class="fw-bold fs-5"><?php echo $row["price"] . "$" ?></p>
                <p>
                <?php echo $row["description"] ?>
                </p>

                <select class="form-select w-50 mb-3">
                  <option selected>Select size</option>
                  <option value="38">38</option>
                  <option value="39">39</option>
                  <option value="40">40</option>
                  <option value="41">41</option>
                  <option value="42">42</option>
                  <option value="43">43</option>
                  <option value="44">44</option>
                  <option value="45">45</option>
                </select>
                <div class="d-flex justify-content-between align-items-center">
                  <input
                    type="number"
                    name="quantity"
                    id="quantity"
                    style="width: 60px; height: 35px"
                    class="px-2"
                  />
                  <button
                    class="bg-black text-white px-4 shadow-lg fw-bold"
                    style="height: 35px"
                  >
                    ADD TO CART
                  </button>
                  <i class="fa-regular fa-heart fs-3"></i>
                  <i class="fa-sharp fa-solid fa-pipe"></i>
                </div>
              </div>
              <div class="mt-5">
                <div>
                  <h3>Description</h3>
                  <hr />
                  <div class="row">
                    <div class="col-lg">
                      <?php echo $row["description"] ?>
                    </div>
                    <div class="col-lg">
                      <img src="<?php echo $row["image"] ?>" alt="" style="width: 100%" />
                    </div>
                  </div>
                </div>
                <div class="mt-3">
                  <h3>Details</h3>
                  <hr />
                  <div class="row px-4 lh-lg">
                    <ul class="col-lg">
                      <li>Lace closure</li>
                      <li>Leather upper</li>
                      <li>Textile lining</li>
                      <li>Rubber outsole</li>
                    </ul>
                    <ul class="col-lg">
                      <li>Imported</li>
                      <li>
                        Product color: Collegiate Green / Core White / Gum
                      </li>
                      <li>Product code: HP7902</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
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
