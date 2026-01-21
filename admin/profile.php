<?php require('head_tag.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form action="php_code.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="hidden" class="form-control" name="txt_admin_id" value="<?=$_SESSION['admin_id'];?>">

                                                <input type="text" tabindex="2" class="form-control" placeholder="Username" 
                                                name="txt_name" value="<?=$_SESSION['admin_username'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" tabindex="3" 
                                                placeholder="New Password" name="txt_pass">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" tabindex="4" 
                                                placeholder="Confirm New Password" name="txt_cpass">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <button type="submit" tabindex="5" name="btn_update_admin_profile" class="btn btn-info btn-fill pull-left">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php require('footer.php'); ?>
