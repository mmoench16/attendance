<?php 
  // Load environment variables
  // require "vendor/autoload.php";
  // $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  // $dotenv->load();
  // Dev Conn
  // $host = "127.0.0.1";
  // $host = $_ENV['HOST_L'];
  // $db = "attendance_db";
  // $user = "root";
  // $pass = "";
  // $charset = "utf8mb4";

  // Remote DB Conn
  // $host = $_ENV['HOST_A'];
  // $db = $_ENV['DB_A'];
  // $user = $_ENV['USER_A'];
  // $pass = $_ENV['PASS_A'];
  // $charset = "utf8mb4";
  $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

  $host = $url["host"];
  $user = $url["user"];
  $pass = $url["pass"];
  $db = substr($url["path"], 1);
  $charset = "utf8mb4";

  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

  try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    // echo "<h1 class='text-danger'>No Database Found</h1>";
    throw new PDOException($e->getMessage());
  }

  require_once "crud.php";
  require_once "user.php";

  $crud = new crud($pdo);
  $user = new user($pdo);

  $user->insertUser("admin", "password");
?>