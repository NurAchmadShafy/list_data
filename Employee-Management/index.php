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

    if(isset($_POST['search'])) {
        $sql = search_data($_POST['keyword']);
    }
?>

<html>

<head>
    <title>INDEX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style type="text/css">
        body {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <div class="pt-5 mx-sm-5">
      <div class="float-left ml-5 pl-5">
          <h3>EMPLOYEER MANAGEMENT</h3>
      </div>
      <div class="text-center float-right pr-5 mx-sm-2 ">
        <form method="POST">
            <input type="submit" name="login" class="btn btn-primary" value="Login">
        </form>
      </div>
      <div class="text-center float-right pr-1 pt-2">
        <h5 class="float-right text-primary">Have an account??</h5>
      </div>
    </div>

    <!-- LIST TABEL -->
    <div class="container mt-5 pt-2">
      <div class="card text-center">
        <div class="card-body">
          <form class="form-inline d-flex float-right md-form form-sm mt-0 pt-1" method="post">
            <input type="submit" name="search" class="btn btn-link " value="">
            <div class="form-group mx-sm-3 ">
                <input class="form-control form-control-sm w-40" type="text" aria-label="Search" autofocus autocomplete="off" placeholder="Masukkan pencarian..." name="keyword">
            </div>
          </form>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>

</html>
