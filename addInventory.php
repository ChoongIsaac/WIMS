<?php
//add inventory page
session_start();
require_once "pdo.php";

if(isset($_POST['add'])){
  if(isset($_POST['name'])&&isset($_POST['quantity'])
    &&isset($_POST['unitPrice'])&&isset($_POST['des'])){
      if(strlen($_POST['name'])>1 && strlen($_POST['quantity'])>1 &&strlen($_POST['unitPrice'])>1
      &&strlen($_POST['des'])>1){
      $sql = "INSERT INTO inventory (name,quantity,unitPrice,description) VALUES
             (:name,:quantity,:unitPrice,:des)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(':name'=>$_POST['name'],
      ':quantity'=>$_POST['quantity'],':unitPrice'=>$_POST['unitPrice'],'des'=>$_POST['des']));
      $_SESSION['success'] = 'Record Added successfully!';
      header("Location:addInventory.php");
      return;
    }else {
      $_SESSION['error'] = 'All fields are required to be filled!';
        header("Location:addInventory.php");
        return;

    }
  }
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

   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <!-- CSS LINK FOR DROPDOWN PROFILE -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
   <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"> </script>
   <script type = "text/javascript">

   $(document).ready(function () {
     $('#addInventory').submit(function(){
       alert("Item added sucessfully!");
     })
   });

  </script>

   <title>Add new Inventory</title>
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
               <h5 class="card-title">Add a new Inventory</h5>
               <div class="text-center">
                 <svg xmlns="http://www.w3.org/2000/svg" width="51" height="50" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
   <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
                 <?php
                    if(isset($_SESSION['error'])){
                      echo '<p style = "color:red">'.$_SESSION['error']."</P> ";
                      unset($_SESSION['error']);
                      }
                 ?>
                 <div class="text-center mt-3">
                   <table class="container mb-5 pb-5">
                     <form id = "addInventory" method = "POST">
                     <tr>
                       <td>Inventory name: </td>
                       <td><input type="text" name="name" required ></td>
                     </tr>
                     <tr>
                       <td>Quantity: </td>
                       <td><input type="text" name="quantity" required></td>
                     </tr>
                     <tr>
                       <td>Unit price: </td>
                       <td><input type="text" name="unitPrice" required></td>
                     </tr>
                     <tr>
                       <td>Description: </td>
                       <td><textarea name = "des" rows="2.5" cols="25" required></textarea></td>
                     </tr>
                   </table>
                   <input class="btn btn-success" type = "submit" name = "add" id = "add" value = "Add New">
                 </form>
                 <a href = "home.php">
                 <input class="btn btn-secondary" type="button" name="back" value="Back"></a>
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
   </body>
