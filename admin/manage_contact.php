<?php require('head_tag.php'); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Manage Contact Messages</h4>
                               <!--    <p class="category">Here is a subtitle for this table</p>   -->
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th># ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Messages</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require('connection.php');
                                            $qry="select * from contact";
                                            $result = mysqli_query($conn,$qry);
                                            if(mysqli_num_rows($result)>0)
                                            {
                                                foreach ($result as $row) {
                                                    echo("<tr>
                                                            <td>".$row['id']."</td>
                                                            <td>".$row['name']."</td>
                                                            <td>".$row['email']."</td>
                                                            <td>".$row['phone']."</td>
                                                            <td>".$row['msg']."</td>
                                                            <td><a href='delete.php?table=contact&id=".$row['id']."'><i class='fa fa-trash' style='color:red;font-size:20px;'></i></a></td>
                                                        </tr>");
                                                }
                                            }else{
                                                echo("<tr><td colspan=6><center> No Records Found !! </center></td></tr>");
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
