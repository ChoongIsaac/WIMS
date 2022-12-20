 <?php
session_start();
require_once "pdo.php";
if(!isset($_SESSION['username'])||$_SESSION['username'] < 0){
  header("Location: index.php");
  return;
}
try{
$sql = "SELECT username,name,depart_name FROM employee JOIN department on employee.depart_id = department.depart_id where employee.username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':username' => $_GET['username']));
$resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(Exception $ex){
  echo "Internal error, can't connect to the database!";
  error_log("profile.php, SQL error = ".$ex->getMessage() );
}
 ?>

<!doctype html>
<html lang="en">
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Waterland Inventory Management System</title>
    <?php require_once "navbar.php"; ?>
  </head>
  <body>
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-5 m-auto">
            <div class="card border-0 shadow">
              <div class="card-body">
                <div class="text-center">
                  <svg class="my-3" xmlns="http://www.w3.org/2000/svg" width="51" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                  </svg>
                  <div class="text-center mt-3">
                    <table class="container mb-5 pb-5">
                      <tr>
                        <td>Username: </td>
                        <td><input type="text" name="username" value="<?= htmlentities($resultSet['username'])?>" disabled></td>
                      </tr>
                      <tr>
                        <td>Name: </td>
                        <td><input type="text" name="name" value="<?= htmlentities($resultSet['name'])?>" disabled></td>
                      </tr>
                      <tr>
                        <td>Department: </td>
                        <td><input type="text" name="department" value="<?= htmlentities($resultSet['depart_name'])?>" disabled></td>
                      </tr>
                    </table>
                    <p class="mt-4 mb-3 text-muted">© 2021-2022</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
