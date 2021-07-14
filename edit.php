<?php
  $title = "Edit Record";
  require_once "includes/header.php"; 
  require_once "includes/auth_check.php";
  require_once "db/conn.php";

  $results = $crud->getSpecialties();

  if (!isset($_GET['id'])) {
    // echo "error";
    include "includes/errormessage.php";
    header("Location: viewrecords.php");
  } else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);
?>

  <h1 class="text-center">Edit Record</h1>
  
  <form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
    <div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstName" aria-describedby="firstName" name="firstName">
    </div>
    <div class="mb-3">
      <label for="lastName" class="form-label">Last Name</label>
      <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastName" aria-describedby="lastName" name="lastName">
    </div>
    <div class="mb-3">
      <label for="dob" class="form-label">Date of Birth</label>
      <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" aria-describedby="dob" name="dob">
    </div>
    <div class="mb-3">
      <label for="specialty" class="form-label">Area of Expertise</label>
      <select class="form-select" aria-label="specialty" id="specialty" name="specialty">
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?php echo $r['specialty_id'] ?>" <?php if($r['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
            <?php echo $r['name']; ?>
          </option>
        <?php } ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" aria-describedby="emailHelp" name="email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Contact Number</label>
      <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone">
      <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>
    
    <div class="d-grid gap-2 col-6 mx-auto">
      <a href="viewrecords.php" class="btn btn-default">Back to List</a>
      <button type="submit" name="submit" class="btn btn-success">Save Changes</button>
    </div>

</form>

<?php } ?>

<br><br><br><br>
    
<?php require_once "includes/footer.php"; ?>
