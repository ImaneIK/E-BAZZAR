<?php

require_once("../../includes/db.php");
require_once("../../includes/functions.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = prep_input($_POST['username'], $conn);
    $email = prep_input($_POST['email'], $conn);
    $password = prep_input($_POST['password'], $conn);
    $full_name = prep_input($_POST['full_name'], $conn);
    $address = prep_input($_POST['address'], $conn);
    $city = prep_input($_POST['city'], $conn);
    $state = prep_input($_POST['state'], $conn);
    $country = prep_input($_POST['country'], $conn);
    $phone_number = prep_input($_POST['phone_number'], $conn);
    $is_admin = prep_input($_POST['is_admin'], $conn);


    // echo $title; echo $content; echo $important;

    $sql = "INSERT INTO users (username, email, password, full_name, address, city, state, country, phone_number, is_admin) VALUES ('$username', '$email', '$password', '$full_name', '$address', '$city', '$state', '$country', '$phone_number', '$is_admin')";

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
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="validationDefault01" name="full_name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Username</label>
                        <input type="text" class="form-control" id="validationDefault02" name="username" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Email</label>
                        <input type="email" class="form-control" id="validationDefaultUsername" name="email" aria-describedby="inputGroupPrepend2" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Password</label>
                        <input type="password" class="form-control" id="validationDefaultUsername" name="password" aria-describedby="inputGroupPrepend2" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault03" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationDefault03" name="city">
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="validationDefault05" name="state">
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault03" class="form-label">Address</label>
                        <textarea type="text" class="form-control" id="validationDefault03" name="address"></textarea>
                    </div>

                
                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Country</label>
                        <input type="text" class="form-control" id="validationDefault05" name="country">
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Phone number</label>
                        <input type="text" class="form-control" id="validationDefault05" name="phone_number">
                    </div>

                    <!-- <div class="col-md-3">
    <label for="validationDefault04" class="form-label">State</label>
    <select class="form-select" id="validationDefault04" required>
      <option selected disabled value="">Choose...</option>
      <option>...</option>
    </select>
  </div> -->

                    <div class="chkgroup">
                        <input type="hidden" name="is_admin" value="0" />
                        <input type="checkbox" name="is_admin" value="1" />
                        <span class="label-in">Admin role</span>
                    </div>


                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Add new user</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php require_once("../../includes/footer.php"); ?>