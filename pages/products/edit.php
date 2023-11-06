<?php
require_once("../../includes/db.php");
require_once("../../includes/functions.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $product_name = prep_input($_POST['product_name'], $conn);
    $category_id = prep_input($_POST['category_id'], $conn);
    $description = prep_input($_POST['description'], $conn);
    $price = prep_input($_POST['price'], $conn);
    $stock_quantity = prep_input($_POST['stock_quantity'], $conn);
    $image_url = prep_input($_POST['image_url'], $conn);

    // echo $title; echo $content; echo $important;

    $sql = "UPDATE products SET product_name = '$product_name', category_id = '$category_id', description = '$description', price = '$price', stock_quantity = '$stock_quantity', image_url = '$image_url' WHERE product_id = $product_id";
    if (mysqli_query($conn, $sql)) {
        error_log("success !");
        echo "success !";
    } else {
        echo "there was a problem while submitting the query\n";
        echo "Error: " . mysqli_error($conn);
    }
}
$product_id = $_GET['id'];

if (!isset($_GET['id'])) {
    header("Location: view.php");
}
$sql = "SELECT * FROM `products` WHERE `product_id`=$product_id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
mysqli_free_result($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="">
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
            <form class="row g-3" action="edit.php" method="post"  enctype="multipart/form-data">
                <input type="hidden" class="form-control" id="validationDefault01" value=<?php echo $product['product_id']; ?> name="product_id" />
                    <div class="col-md-12">
                        <label for="validationDefault01" class="form-label">Product name</label>
                        <input type="text" class="form-control" id="validationDefault01" value=<?php echo $product['product_name']; ?> name="product_name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Category</label>
                        <input type="text" class="form-control" id="validationDefault02" value="<?php echo $product['category_id']; ?>" name="category_id" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Price</label>
                        <input type="text" class="form-control" id="validationDefaultUsername" value="<?php echo $product['price']; ?>" name="price" aria-describedby="inputGroupPrepend2" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault03" class="form-label">Quantity in stock</label>
                        <input type="text" class="form-control" id="validationDefault03" value="<?php echo $product['stock_quantity']; ?>" name="stock_quantity">
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="validationDefaultUsername"  name="description" aria-describedby="inputGroupPrepend2" ><?php echo $product['description']; ?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Choose image</label>
                        <input type="file" class="form-control" id="validationDefault05" value="<?php echo $product['image_url']; ?>" name="image_url">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Update changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>