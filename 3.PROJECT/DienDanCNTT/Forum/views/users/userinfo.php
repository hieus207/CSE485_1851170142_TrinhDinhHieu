<?php include_once("path.php");
global $ROOT_PATH; ?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
<link rel="stylesheet" href="assets/css/user.css">
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
                <div class="col-md-12">
                    <?php include($ROOT_PATH . "/supports/message.php");?>
                    <div class="user-content border border-dark rounded bg-white">
                        
                        <img src="<?php echo $BASE_URL.'/assets/images/avt/'.$user['avt'];?>" alt="image nao do" class="rounded-circle">
                        <div class="user-info">
                            <div class="fullname"><h1><?php echo $user['fullname'];?></h1></div>
                            <div class="username"><h4><?php echo $user['username'];?></h4></div>
                            <div class="role"><?php $role=$user['admin']==0?"Thành viên":"Quản trị viên";echo $role;?></div>
                            <div class="create_at">Joined: <?php echo $user['create_at'];?></div>
                            <div class="email"><?php echo $user['email'];?></div>
                            <?php if(isset($_SESSION['id'])&&$user['user_id']==$_SESSION['id']):?>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Sửa thông tin
                            </button>
                            <div class="collapse" id="collapseExample">
                                <form action="<?php echo $URL."users&action=index&u_id=".$user['user_id'];?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="fullname">Fullname</label>
                                      <input type="text" class="form-control" name="fullname" aria-describedby="helpId" value="<?php echo $user['fullname'];?>">
                                    </div>

                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" name="email" aria-describedby="helpId" value="<?php echo $user['email'];?>">
                                    </div>

                                    <div class="form-group">
                                    <label for="avt">Avatar</label>
                                    <input type="file" name="avatar">
                                    </div>

                                    <div class="form-group">
                                      <label for="signature">Chữ ký</label>
                                      <textarea class="form-control" name="signature" rows="3" value=""></textarea>
                                    </div>

                                    <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" class="form-control" name="password" aria-describedby="helpId" value="">
                                    </div>

                                    <button type="submit" name="update" class="btn btn-primary" onclick="return confirm('Bạn có chắc muốn cập nhật thông tin?')">Update</button>
                                </form>
                            </div>
                            <?php endif;?>
                        </div>

                        <div class="user-signature">
                            <?php echo $user['signature'];?>
                        </div>
                    </div>

                    <div class="list-posted">
                        Các bài post
                        <ul class="list-group">
                            <?php foreach($posts as $post):?>
                                
                            <li class="list-group-item"><a href="<?php echo $URL."posts&action=index&p_id=".$post['post_id'];?>"><?php echo $post['title'];?></a>
                                <br>
                                <span><?php echo $post['create_at'];?></span>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>
