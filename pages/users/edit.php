<?php
require_once("../../includes/db.php");
require_once("../../includes/functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST['user_id'];
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

    $sql = "UPDATE users SET username = '$username', 
                email = '$email', 
                full_name = '$full_name', 
                address = '$address', 
                city = '$city', 
                state = '$state', 
                country = '$country', 
                phone_number = '$phone_number' ,
                is_admin = '$is_admin' 
            WHERE user_id = $user_id";
    if (mysqli_query($conn, $sql)) {
        echo "success !";
    } else {
        echo "there was a problem while submitting the query\n";
        echo "Error: " . mysqli_error($conn);
    }
}
$user_id = $_GET['id'];

if (!isset($_GET['id'])) {
    header("Location: view.php");
}
$sql = "SELECT * FROM `users` WHERE `user_id`=$user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
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

                <form class="row g-3" action="edit.php" method="post">
                    <input type="hidden" name="user_id" />
                    <div class="col-md-4">
                        <label for="validationDefault01" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="validationDefault01" value="<?php echo $user['full_name']; ?>" name="full_name" required>
                    </div>
                    <div class="col-md-4">
                        <label for="validationDefault02" class="form-label">Username</label>
                        <input type="text" class="form-control" id="validationDefault02" value="<?php echo $user['user_id']; ?>" name="username" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Email</label>
                        <input type="email" class="form-control" id="validationDefaultUsername" value="<?php echo $user['email']; ?>" name="email" aria-describedby="inputGroupPrepend2" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefaultUsername" class="form-label">Password</label>
                        <input type="password" class="form-control" id="validationDefaultUsername" value="<?php echo $user['password']; ?>" name="password" aria-describedby="inputGroupPrepend2" required>
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault03" class="form-label">City</label>
                        <input type="text" class="form-control" id="validationDefault03" value="<?php echo $user['city']; ?>" name="city">
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="validationDefault05" value="<?php echo $user['state']; ?>" name="state">
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault03" class="form-label">Address</label>
                        <textarea type="text" class="form-control" id="validationDefault03" value="<?php echo $user['address']; ?>" name="address"></textarea>
                    </div>


                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Country</label>
                        <input type="text" class="form-control" id="validationDefault05" value="<?php echo $user['country']; ?>" name="country">
                    </div>

                    <div class="col-md-4">
                        <label for="validationDefault05" class="form-label">Phone number</label>
                        <input type="text" class="form-control" id="validationDefault05" value="<?php echo $user['phone_number']; ?>" name="phone_number">
                    </div>
                                            <!-- <div class="col-md-3">
                            <label for="validationDefault04" class="form-label">State</label>
                            <select class="form-select" id="validationDefault04" required>
                            <option selected disabled value="">Choose...</option>
                            <option>...</option>
                            </select>
                        </div> -->
                    <div class="chkgroup">
                        <span class="label-in">Admin</span>
                        <input type="hidden" name="is_admin" value="0" />
                        <input type="checkbox" name="is_admin" value="1" <?php if ($user['is_admin']) echo "is admin"; ?> />
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