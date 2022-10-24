<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD-Operation</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
<body>


    
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8" offset-md-2>

            <table class="table" border ="1">
                <thead>
                    <tr>
                        <th>SL No.</th>
                        <th>Student Name</th>
                        <th>Fathers Name</th>
                        <th>Mothers Name</th>
                        <th>Email</th>
                        <th>Status</th>
                    </tr>
                </thead>
                
              <?php
              include "functions.php";
              $data = show();
             while( $array = $data-> fetch_assoc()){
                var_dump($array);
             }
             

              ?>

            </table>
            </div>
        </div>
    </div>
   
</body>
</html