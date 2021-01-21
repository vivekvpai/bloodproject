<?php
    require("function.php");
    session_start();
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"blood");
    $b_id = "";
    $b_g = "";
    $date = "";
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Blood</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="" href="style.css">
    <script src="https://kit.fontawesome.com/751afc7438.js" crossorigin="anonymous"></script> 

    <style>
         @media only screen and (min-width:992px) {
      .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-blend-mode: screen;
            background-image: url("blood2.jpg");
            background-color: rgb(241, 185, 178);
            min-height : 1000px;
          }
        }

        .pd
        {
            padding-top : 10px;
        }
    </style>

</head>
  <body>

    <div class="vertical-nav bg-red" id="sidebar">

        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <div class="media-body">
                    <h4 class="m-0">Blood Bank</h4>
                </div>
            </div>
        </div>

        <p class="text-black font-weight-bold text-uppercase px-3 small pb-4 mb-0 text-white">Blood Manage</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link text-dark font-weight-bold">
                    home
                </a>
            </li>

            <li class="nav-item">
                <a href="blood.php" class="nav-link text-dark font-weight-bold">
                    Blood
                </a>
            </li>

            <li class="nav-item">
                <a href="donar.php" class="nav-link text-dark font-weight-bold">
                    Donar
                </a>
            </li>
            
            <li class="nav-item">
                <a href="show_register.php" class="nav-link text-dark font-weight-bold">
                    Regester
                </a>
            </li>

            <li class="nav-item">
                <a href="show_request.php" class="nav-link text-dark font-weight-bold">
                    Request
                </a>
            </li>

            <li class="nav-item">
                <a href="logout.php" class="nav-link text-dark font-weight-bold">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </li>
        </ul>

    </div>

    <div class="page-content parallax" id="content">
        <div class="container">
            <div class="col-auto">
                <div class="row">
                    <div class="d-flex p-2 bg-light text-white">
                        <div class="p-2 bg-info">Total no of Blood :</div>
                        <div class="p-2 bg-danger">&nbsp &nbsp<?php echo get_blood_count(); ?> &nbsp &nbsp</div>
                    </div>
                    <div class="offset-1 col-4 pd">
                        <a href="add_blood.php" class="btn btn-success btn-block">Add Blood</a>
                    </div>
                </div>
                <br>
                <table class="table table-hover pd">
                    <thead class="table-danger">
                        <tr>
                            <th> Blood Id </th>
                            <th>Blood Group</th>
                            <th>Date</th>
                            <th> Options </th>
                        </tr>
                    </thead>

                    <?php
                   
                        $query = "select * from store";
                        $query_run = mysqli_query($connection,$query);
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                        $b_id = $row['b_id'];
                        $b_g = $row['b_g'];
                        $date = $row['date'];
                        
                        ?>

                            <tr>
                                <td><?php echo $b_id; ?></td>
                                <td><?php echo $b_g; ?></td>
                                <td><?php echo $date; ?></td>
                                <td>
                                    <a type="button" class="btn btn-success" href="update_blood.php?id=<?php echo $row['b_id'];?>">Update</a> 
                                    <a type="button" class="btn btn-danger" href="delete_blood.php?id=<?php echo $row['b_id'];?>">Delete</a>
                                </td>
                            </tr>

                            <?php
                        } 
                    ?>
                    

                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>