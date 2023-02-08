$(document).ready(function () {
  // show html form when 'create product' button was clicked
  $(document).on("click", ".create-product-button", function () {
    // categories api call will be here
    // load list of categories

    var create_product_html = `<!-- 'create product' html form -->
<form id='create-product-form' action='#' method='post' border='0'>
    <table class='table table-hover table-responsive table-bordered'>
 
        <!-- name field -->
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control' required /></td>
        </tr>
 
        <!-- price field -->
        <tr>
            <td>Price</td>
            <td><input type='number' min='1' name='price' class='form-control' required /></td>
        </tr>
 
        <!-- description field -->
        <tr>
            <td>Description</td>
            <td><textarea name='description' class='form-control' required></textarea></td>
        </tr>

        <!-- image field -->
        <tr>
            <td>Image</td>
            <td><input type='text' name='image' class='form-control' required /></td>
        </tr>
 
 
        <!-- button to submit form -->
        <tr>
            <td></td>
            <td>
                <button type='submit' class='btn btn-primary'>
                    <span class='glyphicon glyphicon-plus'></span> Create Product
                </button>
            </td>
        </tr>
 
    </table>
</form>`;

    // inject html to 'page-content' of our app
    $("#page-content").html(create_product_html);

    // chage page title
    changePageTitle("Create Product");
  });

  // 'create product form' handle will be here
  // will run if create product form was submitted
  $(document).on("submit", "#create-product-form", function () {
    // form data will be here
    // get form data
    var form_data = JSON.stringify($(this).serializeObject());
    // submit form data to api
    $.ajax({
      url: "http://localhost/lab4_home/phan2_bai2/b.php",
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
