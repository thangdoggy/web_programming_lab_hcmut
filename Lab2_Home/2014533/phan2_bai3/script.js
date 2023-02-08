document.getElementById("submit").onclick = () => {
  const firstName = document.getElementById("fname").value;
  if (firstName.length < 2 || firstName.length > 30)
    return alert("First Name should have 2-30 characters");

  const lastName = document.getElementById("lname").value;
  if (lastName.length < 2 || lastName.length > 30)
    return alert("Last Name should have 2-30 characters");

  const email = document.getElementById("email").value;
  var validRegex =
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (!email.match(validRegex)) return alert("Invalid email!");

  const password = document.getElementById("password").value;
  if (password.length != 8) return alert("Password must have 8 character!");

  const dateOfBirth = document.getElementById("dob").value;
  if (dateOfBirth == "") return alert("Please choose your birthday!");

  const genderEle = document.getElementsByName("gender");
  var gender = "";
  var flag = false;
  for (let index = 0; index < genderEle.length; index++) {
    if (genderEle[index].checked) {
      gender = genderEle[index].value;
      flag = true;
    }
  }
  if (flag == false) return alert("Please choose gender!");

  const country = document.getElementById("country").value;
  if (country == "Choose country") return alert("Please choose your country!");

  const about = document.getElementById("about").value;
  if (about.length > 10000) return alert("Maximum 10000 characters!");

  // All data is valid
  document.getElementById("sign-up").reset();
};

document.getElementById("reset-button").onclick = () => {
  document.getElementById("sign-up").reset();
};
