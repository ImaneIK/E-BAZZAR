<?php

require_once("../../includes/db.php");
require_once("../../includes/functions.php");

// product_id INT PRIMARY KEY AUTO_INCREMENT,
//     product_name VARCHAR(255) NOT NULL,
//     category_id INT,
//     description TEXT,
//     price DECIMAL(10, 2) NOT NULL,
//     stock_quantity INT NOT NULL,
//     image_url VARCHAR(255),

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = prep_input($_POST['product_name'], $conn);
    $category_id = prep_input($_POST['category_id'], $conn);
    $description = prep_input($_POST['description'], $conn);
    $price = prep_input($_POST['price'], $conn);
    $stock_quantity = prep_input($_POST['stock_quantity'], $conn);
    $image_url = prep_input($_POST['image_url'], $conn);

    // echo $title; echo $content; echo $important;

    $sql = "INSERT INTO products (product_name, category_id, description, price, stock_quantity, image_url) 
    VALUES ('$product_name', '$category_id', '$description', '$price', '$stock_quantity', '$image_url')";

    if (mysqli_query($conn, $sql)) {
        // echo "success !";
        header('Location: view.php');
    } else {
        echo "there was a problem while submitting the query";
        echo "Error: " . mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html>

<head>
    <title>User management</title>
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- viewport -->
    <div style="display: flex; min-height:100vh; ">
        <!-- sideNav -->
        <?php require('../../components/sideNav.php'); ?>

        <div>
            <!-- navbar -->
            <?php require('../../components/navBar.php'); ?>

            <!-- content -->
            <div style="padding:30px 70px;">

                <form class="row g-3" action="new.php" method="post">
                    <div class="col-md-12">
                        <label for="validationDefault01" class="form-label">Product name</label>
                        <input type="text" class="form-control" id="validationDefault01" name="product_name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Category</label>
                        <input type="text" class="form-control" id="validationDefault02" name="category_id" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Price</label>
                        <input type="text" class="form-control" id="validationDefaultUsername" name="price" aria-describedby="inputGroupPrepend2" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault03" class="form-label">Quantity in stock</label>
                        <input type="text" class="form-control" id="validationDefault03" name="stock_quantity">
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="validationDefaultUsername" name="description" aria-describedby="inputGroupPrepend2" ></textarea>
                    </div>

                    

                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Choose image</label>
                        <input type="file" class="form-control" id="validationDefault05" name="image_url">
                    </div>

                    

                    <!-- <div class="col-md-3">
    <label for="validationDefault04" class="form-label">State</label>
    <select class="form-select" id="validationDefault04" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
  </div> -->

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Add new product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php require_once("../../includes/footer.php"); ?>