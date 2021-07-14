<!-- this includes the session start to resume the session on this page, it identifies the session that needs to be destroyed -->
<?php include_once 'includes/session.php' ?>

<!-- Destroys session and redirects to index -->
<?php 
  session_destroy();
  header("Location: index.php");
?>