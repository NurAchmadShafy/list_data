<?php
    $connect = new mysqli("localhost", "root", "", "employee_management");

    if(!$connect) {
        die("Cant Connet to ".mysqli_connect_error());
    }

    function query($query) {
        global $connect;
        $result = mysqli_query($connect, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function add_data($data) {
        global $connect;

        $name = htmlspecialchars($data['name']);
        $address = htmlspecialchars($data['address']);
        $salary = htmlspecialchars($data['salary']);
        $position = htmlspecialchars($data['position']);
        $allowance = htmlspecialchars($data['allowance']);
        $data_departement = htmlspecialchars($data['data_departement']);

        $query = "INSERT INTO employees values ('', '$name', '$address', '$salary', '$position', '$allowance', '$data_departement')";
        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function update_data($data) {
        global $connect;

        $id = $data['id'];
        $name = htmlspecialchars($data['name']);
        $address = htmlspecialchars($data['address']);
        $salary = htmlspecialchars($data['salary']);
        $position = htmlspecialchars($data['position']);
        $allowance = htmlspecialchars($data['allowance']);
        $data_departement = htmlspecialchars($data['data_departement']);

        $query = "UPDATE employees SET name='$name', address='$address', salary='$salary', position='$position', allowance='$allowance', data_departement='$data_departement' where id='$id' ";
        mysqli_query($connect, $query);

        return mysqli_affected_rows($connect);
    }

    function delete_data($id) {
        global $connect;
        mysqli_query($connect, "DELETE FROM employees where id='$id' ");
        return mysqli_affected_rows($connect);
    }

    function search_data($keyword) {
      $query = "SELECT * FROM employees
      WHERE
      name LIKE '%$keyword%' OR
      address LIKE '%$keyword%' OR
      salary LIKE '%$keyword%' OR
      position LIKE '%$keyword%' OR
      allowance LIKE '%$keyword%' OR
      data_departement LIKE '%$keyword%' ";

      return query($query);
    }
?>
