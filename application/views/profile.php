<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <?php include "components/header.php" ?>
    <?php linkCSS("assets/css/dataTables.bootstrap4.min.css"); ?>
</head>
<body>
<?php include "components/nav.php"; ?>

   <div class="container mt-5">
   <div class="row">
   <div class="col-md-8">
    <?php if(!empty($data)): ?>

      <?php foreach($data as $user): ?>

   <h4>Name:</h4><?php echo $user->name; ?>
   <h4>Email:</h4><?php echo $user->email; ?>
  <h4>Address:</h4><?php echo $user->address; ?>
   <h4>City:</h4><?php echo $user->city; ?>
   <h4>State:</h4><?php echo $user->state; ?>
   <h4>Country:</h4><?php echo $user->country; ?>
   <h4>Pincode:</h4><?php echo $user->pincode; ?>

   <?php endforeach;?>

<?php endif; ?>

   </div>
   <!-- Close col-md-5 -->
   </div>
   <!-- Close row -->
   </div>
   <?php include "components/footer.php"; ?>
   <script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
   </script>

   <?php linkJS('assets/js/jquery.dataTables.min.js');?>
   <?php linkJS('assets/js/dataTables.bootstrap4.min.js');?>

</body>
</html>