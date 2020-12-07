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

<html>

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
          <h3>EMPLOYEER MANAGEMENT</h3>
      </div>
      <div class="text-center float-right pr-5 mr-1">
        <form method="POST">
            <input type="submit" name="login" class="btn btn-primary" value="Login">
        </form>
      </div>
    </div>

    <!-- LIST TABEL -->
    <div class="container mt-5">
      <div class="card text-center pt-5">
        <div class="card-body pt-3">
          <table class="table m-0 text-center">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>

</html>
