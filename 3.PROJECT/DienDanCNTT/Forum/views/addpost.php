<?php include_once("path.php");
global $ROOT_PATH;?>
<?php include($ROOT_PATH."/includes/headerp1.php");?>
    <title>Forum CSE</title>
<?php include($ROOT_PATH."/includes/headerp2.php");?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">

                        <div class="form-group">
                          <label for="title"><h3>Tiêu đề</h3></label>
                          <input type="text" class="form-control" name="title" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="form-group">
                          <label for="body">Nội dung</label>
                          <textarea class="form-control" name="body" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                          <label for="tags">Tags</label>
                          <input type="text" class="form-control" name="tags" aria-describedby="helpId" placeholder="">
                        </div>

                        <button type="submit" name="add_post" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include($ROOT_PATH."/includes/footer.php");?>