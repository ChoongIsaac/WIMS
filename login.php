<?php
session_start();
require_once "pdo.php";
if (isset($_POST['back'])) {
  header("Location:index.php");
  return;
}
if(isset($_POST['login'])){
  if(isset($_POST['username'])&&isset($_POST['password'])){
    if($_POST['username']<1 || $_POST['password'] <1){
      $_SESSION['error'] =  "Username and password are required";
      header("Location:login.php");
      return;
    }else {
      $stmt = $pdo->prepare("Select * from employee where username = :username");
      $stmt->execute(array(':username' => $_POST['username']));
      $row =  $stmt->fetch(PDO::FETCH_ASSOC);
      if(password_verify($_POST['password'],$row['password'])){
        if($row['role'] == 'Admin'){
          $_SESSION['user_status'] = 1;
        }else if($row['role'] == 'Worker'){
          $_SESSION['user_status'] = 2;
        }
        $_SESSION['username'] = $row['username'];
        $_SESSION['success'] = 'Logged in';
        header("Location:home.php");
        return;
      }else{
      $_SESSION['error'] =  "Incorrect password";
        header("Location:login.php");
        return;

      }
    }
  }
}
 ?>

<!Doctype html>
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
  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
    <div class="container">
    <a href="#" class="navbar-brand mb-0 h1"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
      <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
    </svg>WIMS</a>
    </div>
    </nav>

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
                  <?php if(isset($_SESSION['error'])){
                    echo '<p style = "color:red;">'.htmlentities($_SESSION['error']).'</p>';
                    unset($_SESSION['error']);
                  } ?>
                </div>
                  <div class="text-center mt-3">
                    <form method="post">
                    <input type="text" name="username" class="form-control my-3 py-2" placeholder="Username">
                    <input type="password" name="password" class="form-control my-3 py-2" placeholder="Password">
                    <input class="btn btn-primary" type="submit" name="login" value="Login">
                    <input class="btn btn-secondary" type="submit" name="back" value="Back">
                    <p class="mt-4 mb-3 text-muted">© 2021-2022</p>
                  </div>
                </form>
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
</html>
