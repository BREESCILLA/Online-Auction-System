<?php require('head_tag.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Manage Products</h4>
                            <!--    <p class="category">Here is a subtitle for this table</p>   -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Image 1</th>
                                        <th>Image 2</th>
                                        <th>Image 3</th>
                                        <th># ID</th>
                                        <th>Name</th>
                                        <th>End Time</th>
                                        <th>Bid Amount</th>
                                        <th>Description</th>
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
                                            $qry="select * from product";
                                            $result = mysqli_query($conn,$qry);
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                foreach ($result as $row) {
                                                    echo("<tr>                            
<td><img src='/project_adi/admin/assets/img/products/".$row['img_1']."' width='80px' alt='".$row['img_1']."'></td>
<td><img src='/project_adi/admin/assets/img/products/".$row['img_2']."' width='80px' alt='".$row['img_2']."'></td>
<td><img src='/project_adi/admin/assets/img/products/".$row['img_3']."' width='80px' alt='".$row['img_3']."'></td>
                                                            <td>".$row['proid']."</td>
                                                            <td>".$row['proname']."</td>
                                                            <td>".$row['endtime']."</td>
                                                            <td>".$row['bidamnt']."</td>
                                                            <td>".$row['descr']."</td>
                                                            <td><a href='delete.php?table=product&id=".$row['proid']."'><i class='fa fa-trash' style='color:red;font-size:20px;'></i></a></td>
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
                    </div>
                </div>
            </div>
        </div>
    
<?php require('footer.php'); ?>
