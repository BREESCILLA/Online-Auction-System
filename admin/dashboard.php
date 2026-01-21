<?php require('head_tag.php'); ?>
<style type="text/css">
    .one{
        color:#fff;
    }
</style>
<?php    
    function count_table($table){
        $count=0;
        require('connection.php');
        $qry="select * from $table";
        $result = mysqli_query($conn,$qry);
        $count=mysqli_num_rows($result);
        if($count<10)
            $count='00'.$count;
        elseif($count<100)
            $count='0'.$count;
        
        return $count;
    }
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="alert" style="color:#fff;background:#9368E9">Welcome, Admin</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="alert" style="color:#fff;background:#9368E9">Total Buyers
                                    <p class="one"><?=count_table('buyer');?></p>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="alert" style="color:#fff;background:#9368E9">Total Sellers
                                    <p class="one"><?=count_table('seller');?></p>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                                <h4 class="alert" style="color:#fff;background:#9368E9">Total Producs
                                    <p class="one"><?=count_table('product');?></p>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="header">
                               <h4 class="alert" style="color:#fff;background:#9368E9">Total Contact Messages
                                    <p class="one"><?=count_table('contact');?></p>
                               </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require('footer.php'); ?>
