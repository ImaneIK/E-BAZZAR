<?php
// require_once("includes/db.php");
// require_once("includes/functions.php");

// $sql = "SELECT * FROM users";
// $users = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Notes App</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>


<body >
    <!-- viewport -->
    <div style="display: flex; min-height:100vh; overflow:hidden;">

        <!-- sidenav -->
        <?php require('./components/sideNav.php'); ?>

        <div style="min-width:75vw; overflow:hidden;">
            <?php require('./components/navBar.php'); ?>

            <!-- content -->
            <div style="padding: 0 50px; position:relative; height:90vh; overflow-y: auto;">
                <a class="btw btn-primary" href="/notes/pages/users/view.php"> User management</a>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
<?php
// require_once("includes/footer.php");

?>