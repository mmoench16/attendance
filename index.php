<?php
  $title = "Index";
  require_once "includes/header.php"; 
  require_once "db/conn.php";

  $results = $crud->getSpecialties();
?>
  <!-- 
    Things we want to collect from attendee.
    - First name
    - Last name
    - DOB (Use DatePicker)
    - Specialty
    - Email Address
    - Contact Number
   -->
  <h1 class="text-center">Registration for IT Conference</h1>
  
  <form method="post" action="success.php" enctype= "multipart/form-data">
    <div class="mb-3">
      <label for="firstName" class="form-label">First Name</label>
      <input required type="text" class="form-control" id="firstName" aria-describedby="firstName" name="firstName">
    </div>
    <div class="mb-3">
      <label for="lastName" class="form-label">Last Name</label>
      <input required type="text" class="form-control" id="lastName" aria-describedby="lastName" name="lastName">
    </div>
    <div class="mb-3">
      <label for="dob" class="form-label">Date of Birth</label>
      <input type="text" class="form-control" id="dob" aria-describedby="dob" name="dob">
    </div>
    <div class="mb-3">
      <label for="specialty" class="form-label">Area of Expertise</label>
      <select class="form-select" aria-label="specialty" id="specialty" name="specialty">
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
          <option value="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Contact Number</label>
      <input type="text" class="form-control" id="phone" name="phone">
      <div id="phoneHelp" class="form-text">We'll never share your number with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="avatar" class="form-label">Profile Picture</label>
      <input type="file" accept="image/*" class="form-control" id="avatar" name="avatar">
      <div id="avatarHelp" class="form-text">The file upload is optional.</div>
    </div>
    
    <div class="d-grid gap-1">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<br><br><br><br>
    
<?php require_once "includes/footer.php"; ?>
