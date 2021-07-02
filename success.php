<?php
  $title = "Success";
  require_once "includes/header.php"; 
  require_once "db/conn.php";

  if (isset($_POST['submit'])) {
    // extract values from the $_POST array
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $contact = $_POST["phone"];
    $specialty = $_POST["specialty"];

    // Call function to insert and track if success or not
    $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $specialty);

    if ($isSuccess) {
      // echo "<h1 class='text-center text-success'>You have been registered.</h1>";
      include "includes/successmessage.php";
    } else {
      // echo "<h1 class='text-center text-danger'>There was an error in processing.</h1>";
      include "includes/errormessage.php";
    }
  }
?>

<!-- Using GET method -->
<!-- <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php //echo $_GET["firstName"]." ".$_GET["lastName"]; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php //echo $_GET["specialty"]; ?></h6>
    <p class="card-text"><b>Date of Birth: </b><?php //echo $_GET["dob"]; ?></p>
    <p class="card-text"><b>Email: </b><?php //echo $_GET["email"]; ?></p>
    <p class="card-text"><b>Phone: </b><?php //echo $_GET["phone"]; ?></p>
  </div>
</div> -->

<!-- Using POST -->
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST["firstName"]." ".$_POST["lastName"]; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_POST["specialty"]; ?></h6>
    <p class="card-text"><b>Date of Birth: </b><?php echo $_POST["dob"]; ?></p>
    <p class="card-text"><b>Email: </b><?php echo $_POST["email"]; ?></p>
    <p class="card-text"><b>Phone: </b><?php echo $_POST["phone"]; ?></p>
  </div>
</div>

<br><br><br><br>
    
<?php require_once "includes/footer.php"; ?>