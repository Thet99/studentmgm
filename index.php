<?php 
session_start();
include('dbcon.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1">
    <link href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>PHP PDO CRUD</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php if(isset($_SESSION["message"])):?>

                    <h5 class="alert alert-success"><?= $_SESSION["message"];?></h5>
                <?php
                  unset($_SESSION['message']);
                  endif;
                  
                ?>
                <div class="card">
                    <div class="card-header">
                    <h3>PHP OPD CRUD
                        <a href="student-add.php" class="btn btn-primary float-end">+Add Student</a>
                    </h3>
                    </div><!--end of card-header-->
                    <div class="card-bordy">
                        <table class="table table-border table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Course</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               
                                $query = "SELECT * FROM students";
                                $statement = $conn->prepare($query);
                                $statement->execute();

                               $statement->setFetchMode(PDO::FETCH_OBJ);//PDO::FETCH_ASSOC
                                $result=$statement->fetchAll();

                                if($result){
                                    // var_dump($result);die();

                                    foreach($result as $row)
                                    { ?>
                                     <tr>
                                        <td><?= $row->id; ?></td>
                                        <td><?= $row->fullname;?></td>
                                        <td><?= $row->email; ?></td>
                                        <td><?= $row->phone; ?></td>
                                        <td><?= $row->course; ?></td>
                                        <td><a href="student-edit.php?id=<?=$row->id;?>" class="btn btn-sm btn-success">Edit</a></td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button onclick="confirm('Are you sure to delete this student!');" class="btn btn-sm btn-danger" type="submit" name="delete_student" value="<?=$row->id;?>">Delete</button>
                                            </form>
                                        </td>
                                     </tr>
                                    <?php
                                    }
                                }else{
                                        ?>
                                    <tr>
                                    <td colspan="5">No Record Found</td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                                
                    </div>

                </div>

            </div>
        </div>
    </div>
    


<script src="assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>


</html>