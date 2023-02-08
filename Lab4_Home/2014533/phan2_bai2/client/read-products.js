$(document).ready(function () {
  // show list of product on first load
  showProducts();
});

// showProducts() method will be here
// function to show list of products
function showProducts() {
  // get list of products from the API
  $.getJSON("http://localhost/lab4_home/phan2_bai2/a.php", function (data) {
    // html for listing products
    var read_products_html = `
<!-- when clicked, it will load the create product form -->
<div id='create-product' class='btn btn-primary pull-right m-b-15px create-product-button'>
    <span class='glyphicon glyphicon-plus'></span> Create Product
</div>
<!-- start table -->
<table class='table table-bordered table-hover'>
 
    <!-- creating our table heading -->
    <tr>
        <th class='w-5-pct'>ID</th>
        <th class='w-25-pct'>Name</th>
        <th class='w-80-pct'>Description</th>
        <th class='w-10-pct'>Price</th>
        <th class=''>Image</th>
        <th class='w-10-pct text-align-center'>Action</th>
    </tr>`;

    // rows will be here
    // loop through returned list of data
    $.each(data.records, function (key, val) {
      // creating new table row per record
      read_products_html +=
        `
      <tr>

          <td>` +
        val.id +
        `</td>

        <td>` +
        val.name +
        `</td>

        <td>` +
        val.description +
        `</td>

        <td> $` +
        val.price +
        `</td>

        <td><img style="width:150px" src="` +
        val.image +
        `"></td>
 
            <!-- 'action' buttons -->
            <td>
                
                <!-- edit button -->
                <button class='btn btn-info m-r-10px update-product-button' data-id='` +
        val.id +
        `'>
                    <span class='glyphicon glyphicon-edit'></span> Edit
                </button>
 
                <!-- delete button -->
                <button class='btn btn-danger delete-product-button' data-id='` +
        val.id +
        `'>
                    <span class='glyphicon glyphicon-remove'></span> Delete
                </button>
            </td>
 
        </tr>`;
    });

    // end table
    read_products_html += `</table>`;

    // inject to 'page-content' of our app
    $("#page-content").html(read_products_html);
  });
}

// chage page title
changePageTitle("Read Products");
