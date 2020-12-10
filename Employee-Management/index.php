<?php
  session_start();
  require 'auth.php';
  $sql = query("SELECT * FROM employees");

  if (isset($_POST['login'])) {
    header("Location:login.php");
  }

  if(isset($_SESSION['login'])) {
    header('LOCATION:admin_page.php');
  }
?>


<!DOCTYPE html>
<html>

  <head>
    <title>DATA EMPLOYEER</title>

    <div>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </div>

    <style type="text/css">
        body {
            background-color: #f7f7f7;
        }
    </style> 
  </head>

  <body>

    <div class="container pt-5 mt-4">
      <div class="float-left">
        <h3 class="text-primary"><b>EMPLOYEER DATA</b></h3>
      </div>
      <div class="float-right">
        <form method="POST">
            <input type="submit" name="login" class="btn btn-primary" value="Login">
        </form>
      </div>
      <div class="float-right pr-3">
        <a href="teams.php" class="btn btn-dark">TEAMS</a>
      </div>
    </div>

    <!-- Table Data -->
    <div class="container pt-5 mt-3">
      <div class="card">
        <div class="card-body">
            <div class="form-inline d-flex float-left md-form form-sm pt-1">
                <a class="btn btn-info">Date : <?php echo date("F j, Y"); ?></a>
            </div>
          <form class="form-inline d-flex float-right md-form form-sm pt-1">
            <div class="form-group">
                <input class="form-control mb-4" id="tableSearch" type="text" placeholder="search...">
            </div>
          </form>

          <table class="table mt-5 text-center">
            <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Salary</th>
                      <th scope="col">Position</th>
                      <th scope="col">Allowance</th>
                      <th scope="col">Data Departement</th>
                  </tr>
              </thead>

              <?php foreach ($sql as $data) : ?>
                <tbody id="myTable">
                  <tr>
                    <th><?php echo $data['id'] ?></th>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['address'] ?></td>
                    <td><?php echo $data['salary'] ?></td>
                    <td><?php echo $data['position'] ?></td>
                    <td><?php echo $data['allowance'] ?></td>
                    <td><?php echo $data['data_departement'] ?></td>
                  </tr>
                </tbody>
              <?php endforeach; ?>

          </table>

        </div>
      </div>
    </div>

    <script>
      $(document).ready(function(){
        $("#tableSearch").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
  </body>

</html>
