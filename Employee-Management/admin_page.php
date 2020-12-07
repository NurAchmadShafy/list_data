<?php
session_start();
require 'auth.php';
$sql = query("SELECT * FROM employees");

function logout()
{
    unset($_SESSION['login']);
    session_destroy();
    header("Location:index.php");
}

if (!isset($_SESSION['login'])) header('LOCATION:login.php');
if (isset($_POST['button'])) logout();

if (isset($_POST['add_data'])) {
    add_data($_POST);
    header('LOCATION:admin_page.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style type="text/css">
        body {
            background-color: #fafafa;
        }
    </style>
</head>

<body>

    <div class="pt-5">
      <div class="float-left ml-5 pl-5">
          <h3>DASHBOARD</h3>
      </div>
      <div class="text-center float-right mr-5 pr-5">
          <form method="POST">
              <input type="submit" name="button" class="btn btn-danger" value="Logout">
          </form>
      </div>
      <div class="text-center float-right mr-4">
          <form method="POST">
              <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal1">Add Data</a>
          </form>
      </div>
    </div>


    <!-- LIST TABEL -->
    <div class="container mt-5">
      <div class="card text-center pt-5">
        <div class="card-body pt-3">
          <table class="table m-0">
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
                  <tbody>
                      <tr>
                          <th id="id"><?php echo $data['id'] ?></th>
                          <form method="POST">
                              <td><a href="" data-toggle="modal" data-target="#modal2"><?php echo $data['name'] ?></a></td>
                          </form>
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

    <!-- POP UP ADD DATA -->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Data Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" action="#">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="text-primary">Name:</label><br>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address" class="text-primary">Address:</label><br>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="salary" class="text-primary">Salary:</label><br>
                            <input type="text" name="salary" id="salary" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Position" class="text-primary">Position:</label><br>
                            <input type="text" name="position" id="position" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="allowance" class="text-primary">Allowance:</label><br>
                            <input type="text" name="allowance" id="allowance" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="data_departement" class="text-primary">data departement:</label><br>
                            <input type="text" name="data_departement" id="data_departement" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add_data" class="btn btn-primary">Add Data</button>
                    </div>
                </form>
            </div>
        </div>
        </form>
      </div>

      <!-- POP UP EDIT / DELETE DATA  -->
      <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Edit Data Employee</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="" method="POST" action="#">
                      <div class="modal-body">
                          <div class="form-group">
                              <label for="name" class="text-primary">Name:</label><br>
                              <input type="text" name="name" id="name" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="address" class="text-primary">Address:</label><br>
                              <input type="text" name="address" id="address" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="salary" class="text-primary">Salary:</label><br>
                              <input type="text" name="salary" id="salary" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="Position" class="text-primary">Position:</label><br>
                              <input type="text" name="position" id="position" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="allowance" class="text-primary">Allowance:</label><br>
                              <input type="text" name="allowance" id="allowance" class="form-control" required>
                          </div>
                          <div class="form-group">
                              <label for="data_departement" class="text-primary">data departement:</label><br>
                              <input type="text" name="data_departement" id="data_departement" class="form-control" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" name="add_data" class="btn btn-danger">Delete</button>
                          <button type="submit" name="add_data" class="btn btn-primary">Save Data</button>
                      </div>
                  </form>
              </div>
          </div>
        </form>
      </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
