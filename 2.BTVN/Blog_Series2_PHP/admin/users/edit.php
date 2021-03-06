
<?php include("../../path.php");?>
<?php include($ROOT_PATH . "/app/controllers/users.php");
adminOnly();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Somewhere font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Admin Section - Add Users</title>
</head>
<body>
    <!-- ADmin header include here -->
    <?php include($ROOT_PATH.'/app/includes/adminHeader.php');?>
    <!--PageWrapper-->
    <div class="admin-wrapper">
        <!-- LeftSidebar-->
        <!-- End-LeftSidebar-->

        <?php include($ROOT_PATH.'/app/includes/adminSidebar.php');?>

        <!--Admin content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn_submit">Add User</a>
                <a href="index.php" class="btn btn_submit">Manage Users</a>
            </div>

            <div class="content">

                <h2 class="page-title">Edit User</h2>
                <?php include($ROOT_PATH . "/app/helpers/formErrors.php");?>
                <form action="edit.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $username;?>"class="text-input">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email;?>" class="text-input">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $password;?>" class="text-input">
                    </div>
                    <div>
                        <label>Confirm Password</label>
                        <input type="password" name="passwordConf" value="<?php echo $passwordConf;?>" class="text-input">
                    </div>

                    <?php if($admin):?>
                    <div>
                        <input type="checkbox" name="admin" checked>
                        Admin
                    </div>
                    <?php else: ?>
                    <div>
                        <input type="checkbox" name="admin">
                        Admin
                    </div>
                    <?php endif;?>

                    <div>
                        <button type="submit" name="update-user"class="btn btn_submit">Update User</button>
                    </div>
                </form>
            </div>
        </div>
        <!--END - Admincontent-->
    </div>
    <!--END-PageWrapper-->
    
    <!--Ckeditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <!-- CUSTOM    -->
    <script src="../../assets/js/editor.js"></script>
</body>
</html>