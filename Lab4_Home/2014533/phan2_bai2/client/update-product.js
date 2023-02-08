$(document).ready(function () {
  // show html form when 'update product' button was clicked
  $(document).on("click", ".update-product-button", function () {
    // get product id
    var id = $(this).attr("data-id");

    // read one record based on given product id
    $.getJSON(
      "http://localhost/lab4_home/phan2_bai2/read_one.php?id=" + id,
      function (data) {
        // values will be used to fill out our form
        var name = data.name;
        var price = data.price;
        var description = data.description;
        var image = data.image;

        // store 'update product' html to this variable
        var update_product_html =
          `
 <!-- build 'update product' html form -->
<!-- we used the 'required' html5 property to prevent empty fields -->
<form id='update-product-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
 
        <!-- name field -->
        <tr>
            <td>Name</td>
            <td><input value=\"` +
          name +
          `\" type='text' name='name' class='form-control' required /></td>
        </tr>
 
        <!-- price field -->
        <tr>
            <td>Price</td>
            <td><input value=\"` +
          price +
          `\" type='number' min='1' name='price' class='form-control' required /></td>
        </tr>
 
        <!-- description field -->
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control' required>` +
          description +
          `</textarea></td>
        </tr>

        <tr>
            <td>Image</td>
            <td><input value=\"` +
          image +
          `\" type='text' name='image' class='form-control' required /></td>
        </tr>
        
 
        <tr>
 
            <!-- hidden 'product id' to identify which record to delete -->
            <td><input value=\"` +
          id +
          `\" name='id' type='hidden' /></td>
 
            <!-- button to submit form -->
            <td>
                <button type='submit' class='btn btn-info'>
                    <span class='glyphicon glyphicon-edit'></span> Update Product
                </button>
            </td>
 
        </tr>
 
    </table>
</form>`;

        // inject to 'page-content' of our app
        $("#page-content").html(update_product_html);

        // chage page title
        changePageTitle("Update Product");
      }
    );
  });

  // will run if 'create product' form was submitted
  $(document).on("submit", "#update-product-form", function () {
    // get form data
    var form_data = JSON.stringify($(this).serializeObject());

    // submit form data to api
    $.ajax({
      url: "http://localhost/lab4_home/phan2_bai2/c.php",
      type: "POST",
      contentType: "application/json",
      data: form_data,
      success: function (result) {
        // product was created, go back to products list
        showProducts();
      },
      error: function (xhr, resp, text) {
        // show error to console
        console.log(xhr, resp, text);
      },
    });

    return false;
  });
});
