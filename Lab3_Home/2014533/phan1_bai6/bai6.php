<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sign up</title>
  </head>
  <body>

  <?php
  // define variables and set to empty values
  $fnameErr = $lnameErr = $emailErr = $genderErr = $passwordErr = $birthdayErr = $countryErr = $aboutErr =
    "";
  $fname = $lname = $email = $gender = $password = $birthday = $country = $about =
    "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (strlen($_POST["fname"]) < 2 || strlen($_POST["fname"]) > 30) {
      $fnameErr = "First Name is required 2-30 characters";
    } else {
      $fname = test_input($_POST["fname"]);
    }

    if (strlen($_POST["lname"]) < 2 || strlen($_POST["lname"]) > 30) {
      $lnameErr = "Last Name is required 2-30 characters";
    } else {
      $lname = test_input($_POST["lname"]);
    }

    if (strlen($_POST["password"]) < 2 || strlen($_POST["password"]) > 30) {
      $passwordErr = "Password is required 2-30 characters";
    } else {
      $password = test_input($_POST["password"]);
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["dob"])) {
      $birthdayErr = "Birthday is required";
    } else {
      $birthday = test_input($_POST["dob"]);
    }

    if ($_POST["country"] == "Choose country") {
      $countryErr = "Country is required";
    } else {
      $country = test_input($_POST["country"]);
    }

    if (empty($_POST["dob"])) {
      $birthdayErr = "Birthday is required";
    } else {
      $birthday = test_input($_POST["dob"]);
    }

    if (strlen($_POST["comment"]) > 10000) {
      $aboutErr = "About not over 10000 characters";
    } else {
      $about = test_input($_POST["comment"]);
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

    
    <section class="bg-white">
      <div class="max-w-2xl px-4 py-8 mx-auto">
        <h2 class="mb-4 text-3xl font-bold">Sign up</h2>

        <form id="sign-up" method="post" action="<?php echo htmlspecialchars(
          $_SERVER["PHP_SELF"]
        ); ?>">
          <div class="grid gap-4 mb-4">
            <div class="w-full">
              <label
                for="fname"
                class="block mb-2 text-sm font-medium text-gray-900"
                >First Name</label
              >
              <input
                type="text"
                name="fname"
                id="fname"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                value="<?php echo $fname;?>"
                placeholder="First Name"
              />
              <span class="text-red-600"><?php echo $fnameErr; ?></span>

            </div>

            <div class="w-full">
              <label
                for="lname"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Last Name</label
              >
              <input
                type="text"
                name="lname"
                id="lname"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                value="<?php echo $lname;?>"

                placeholder="Last Name"
              />
              <span class="text-red-600"><?php echo $lnameErr; ?></span>

            </div>

            <div class="w-full">
              <label
                for="email"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Email</label
              >
              <input
                type="text"
                name="email"
                id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                value="<?php echo $email;?>"
                placeholder="Email"
              />

              <span class="text-red-600"><?php echo $emailErr; ?></span>

            </div>

            <div class="w-full">
              <label
                for="password"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Password</label
              >
              <input
                type="password"
                name="password"
                id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                value=""
                placeholder="Password"
              />
              <span class="text-red-600"><?php echo $passwordErr; ?></span>

            </div>

            <div>
              <label
                for="dob"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Birthday</label
              >
              <input
                type="date"
                name="dob"
                id="dob"
                value="<?php echo $birthday;?>"

                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="Birthday"
              />
              <span class="text-red-600"><?php echo $birthdayErr; ?></span>

            </div>
            <div>
              <label
                for="gender"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Gender</label
              >
              <div class="flex gap-2 mt-4">
                <input type="radio" name="gender" id="male" value="Male" <?php if (isset($gender) && $gender=="Male") echo "checked";?>/>
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="Female" <?php if (isset($gender) && $gender=="Female") echo "checked";?>/>
                <label for="female">Female</label>
                <input type="radio" name="gender" id="others" value="Others" <?php if (isset($gender) && $gender=="Others") echo "checked";?>/>
                <label for="others">Others</label>
              </div>

              <span class="text-red-600"><?php echo $genderErr; ?></span>

            </div>

            <div>
              <label
                for="country"
                class="block mb-2 text-sm font-medium text-gray-900"
                >Country</label
              >
              <select
                name="country"
                id="country"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
              >
                <option value="Choose country">Choose country</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Australia">Australia</option>
                <option value="United States">United States</option>
                <option value="India">India</option>
                <option value="Others">Others</option>
              </select>

              <span class="text-red-600"><?php echo $countryErr; ?></span>

            </div>

            <div class="sm:col-span-2">
              <label
                for="comment"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >About</label
              >
              <textarea
                id="comment"
                name="comment"                
                rows="5"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                placeholder="Write about you ...."
              ><?php echo $about;?></textarea>

              <span class="text-red-600"><?php echo $aboutErr; ?></span>

            </div>

          </div>

          <div class="flex items-center space-x-4">
            <button
              type="submit"
              id="submit"
              class="text-green-700 border border-solid border-green-700 hover:bg-green-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            >
              Submit
            </button>
            <button
              type="submit"
              id="reset-button"
              class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
            >
              Reset
            </button>
          </div>
        </form>
      </div>
    </section>
      

  </body>
</html>