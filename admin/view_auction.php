<?php require('head_tag.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card row">
                            <h4>Search Products Auction</h4>
                            <form method="get" action="">
                                <div class="col-lg-4">
                                    <select name="txt_auction" class="form-control">
                                        <option value="0">SELECT..</option>
                                        <?php
                                            require('connection.php');
                                            $qry="select * from product";
                                            $result = mysqli_query($conn,$qry);
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                foreach ($result as $row) {
                                                    echo('<option value="'.$row['proid'].'">'.$row['proname'].'</option>');
                                                }
                                            }    
                                        ?>
                                            
                                    </select>
                                    <input type="submit" value="Show" class="btn btn-info" name="btn_auction">   
                                </div>
                            </form>
                        </div>
                        

                    <?php if(isset($_REQUEST['btn_auction'])){ ?>
                        <div class="card" style="clear:both"> 
                            <div class="header">
                                <h4 class="title">Auction</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th># ID</th>
                                        <th>Product ID</th>
                                        <th>Buyer ID</th>
                                        <th>Bid Amount</th>
                                        <th>Bid Time</th>
                                        <th>Status</th>                                        
                                        <th>Action</th>                                        
                                    </thead>
                                    <tbody>
                                        <?php
                                            function get_img($name){
                                                 $img=trim($name,"%20");
                                                    //$img="11.jpg";
                                                $img="admin/assets/img/products/".$img;
                                                return $img;
                                            }
                                            require('connection.php');
                                          $qry="select * from auction where product_id=".$_REQUEST['txt_auction'];
                                            //$qry="select * from product";
                                            //print_r($qry);
                                            $result = mysqli_query($conn,$qry);
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                foreach ($result as $row) {
                                                    echo("<tr>                            
                                                            <td>".$row['id']."</td>
                                                            <td>".$row['product_id']."</td>
                                                            <td>".$row['buyer_id']."</td>
                                                            <td>".$row['bid_amount']."</td>
                                                            <td>".$row['bid_time']."</td>
                                                            <td>".$row['status']."</td>
                                                            <td><a href='delete.php?table=auction&id=".
                                                            $row['product_id']."'><i class='fa fa-trash' style='color:red;font-size:20px;'></i></a></td>
                                                        </tr>");
                                                }
                                            }else{
                                                echo("<tr><td colspan=7><center> No Records Found !! </center></td></tr>");
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    
<?php require('footer.php'); ?>
