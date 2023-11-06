<?php
require_once("../../includes/db.php");
require_once("../../includes/functions.php");

$sql = "SELECT * FROM users";
$users = mysqli_query($conn, $sql);
$usersArray = [];
while ($user = mysqli_fetch_assoc($users)) {
    $usersArray[] = $user;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Notes App</title>
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <!-- viewport -->
    <div style="display: flex; min-height:100vh; overflow:hidden;">

        <!-- sidenav -->
        <?php require('../../components/sideNav.php'); ?>

        <div style="min-width:75vw; overflow:hidden;">
            <?php require('../../components/navBar.php'); ?>

            <!-- content -->
            <div style="padding: 0 50px; position:relative; height:90vh; overflow-y: auto;">
                <div style="width: 100%; display:flex; justify-content:end;">
                    <button style="margin:25px 5px;" type="button" class="btn btn-light" id="toggle-button"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z" />
                        </svg></button>
                    <a href="./new.php" class="m-4 btn btn-primary">create new user</a>
                </div>

                <div id="grid-container" style="display: block;">
                    <div style="display: grid; grid-template-columns: auto auto auto; gap:1vw;">
                        <?php foreach ($usersArray as $user) { ?>

                            <div class="card" style="width:20vw; border-radius:5px; display:flex;">
                            <div class="nav-item dropdown" style="width: 100%; display:flex; justify-content:end;">
                                    <span style="cursor: pointer; padding:5px 20px;" id="navbarDropdown"  data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </span>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="<?php echo "./edit.php?id=" . $user['user_id']; ?>">Edit product</a></li>
                                        <li>  <hr class="dropdown-divider"> </li>
                                        <li><a class="dropdown-item" href="<?php echo "./delete.php?id=" . $user['user_id']; ?>">Delete product</a></li>
                                    </ul>
                                </div>
                                <div style=" display:flex; justify-content:center; padding:10px;">
                                    <img src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fgenslerzudansdentistry.com%2Fwp-content%2Fuploads%2F2015%2F11%2Fanonymous-user.png&f=1&nofb=1&ipt=aac2e5da9558e7ead4684c5adb10a8a50b7bf2f4947b4f1cd49a8d0de4f450eb&ipo=images" alt="" width="82" height="82" class="rounded-circle me-2">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $user['full_name']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $user['username']; ?></h6>
                                    <p class="card-text"><?php echo $user['email']; ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div id="table-container" style="display: none;">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usersArray as $user) { ?>
                                <tr>
                                    <th scope="row"><?php echo $user['user_id']; ?></th>
                                    <td><?php echo $user['full_name']; ?></td>
                                    <td><?php echo $user['username']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td>
                                        <a style="cursor:pointer;" href="<?php echo "./edit.php?id=" . $user['user_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                            </svg></a>
                                        <a style="cursor:pointer;" href="<?php echo "./delete.php?id=" . $user['user_id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const gridContainer = document.getElementById('grid-container');
        const tableContainer = document.getElementById('table-container');
        const toggleButton = document.getElementById('toggle-button');

        toggleButton.addEventListener('click', function() {
            if (tableContainer.style.display === 'none') {
                tableContainer.style.display = 'block';
                gridContainer.style.display = 'none';
            } else {
                tableContainer.style.display = 'none';
                gridContainer.style.display = 'block';
            }
        });
    });
</script>
</script>

</html>
<?php
require_once("../../includes/footer.php");

?>