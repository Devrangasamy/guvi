<?php
//MYSQL


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

$servername = "localhost";
$username = "root";
$password = "";
$database = "guvi1";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS  loginregister (
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (email)
)";
$email=$_POST['email'];
$password=$_POST['password'];
// $password=password_hash($password, PASSWORD_DEFAULT);
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$age=$_POST['age'];
$dob=$_POST['dob'];

if (mysqli_query($conn, $sql)) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
$sql = "INSERT INTO loginregister (email, password) VALUES ('$email', '$password')";
if(mysqli_query($conn,$sql))
{
    echo "Data inserted successfully";
}
else{
    echo "Data inserted ";
}

// MONGO DB CONNECTION


$uri = 'mongodb+srv://dev:devjojo1234$$$@cluster0.8a5qvvj.mongodb.net/';

$manager = new MongoDB\Driver\Manager($uri);

$database = "guvi";

$collection = "loginorg";

$bulk = new MongoDB\Driver\BulkWrite;

$document = [
    'name' => $name,

    'email' => $email,

    'age' => $age,

    'dob'=> $dob,

    'password' => $password,

    'mobile' => $mobile,
];

$bulk = new MongoDB\Driver\BulkWrite;

$bulk->insert($document);

$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

$result = $manager->executeBulkWrite("$database.$collection", $bulk, $writeConcern);

printf("Inserted %d document(s)\n", $result->getInsertedCount());


//END OF THE FILE
 ?>