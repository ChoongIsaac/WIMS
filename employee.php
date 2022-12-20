<?php
session_start();
require_once "pdo.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
    #intro {
      background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
      height: 100vh;
    }

    /* Height for devices larger than 576px */
    @media (min-width: 992px) {s
      #intro {
        margin-top: -58.59px;
      }
    }

    .navbar .nav-link {
      color: #fff !important;
    }
    </style>
    <meta charset="utf-8">
    <title>Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <?php require_once "navbar.php"; ?>
  </head>
  <body>
    <div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
    <div class="container mt-5 pt-5">
      <div class="row">
        <div class="card">
          <div class="card-body">

            <table id="employee" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                $sql = "SELECT name,depart_name FROM employee JOIN department on employee.depart_id = department.depart_id" ;
                $stmt = $pdo->query($sql);

                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo "<tr><td>";
                  echo (htmlentities($row['name']));
                  echo "</td><td>";
                  echo (htmlentities($row['depart_name']));
                  echo "</td></tr>";
                }
                 ?>
                </tbody>
                <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Department</th>
                    </tr>
                </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="app.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

     <!-- CSS LINK FOR DROPDOWN PROFILE -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
