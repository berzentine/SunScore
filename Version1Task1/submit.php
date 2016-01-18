<?php


$conn = new mysqli("localhost","root","root","SunScore");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//if(isset($_POST['firstC1']) && isset($_POST['firstC2']) && isset($_POST['secondC1']) && isset($_POST['secondC2']) && isset($_POST['answer'])){
        $latHouse=$_POST["firstC1"];
        $lngHouse=$_POST["firstC2"];
        $latObs=$_POST["secondC1"];
        $lngObs=$_POST["secondC2"];
        $ans=$_POST["answer"];
        $address=$_POST["address"];
        


$sql = "INSERT INTO TestData (Id,Address, Lat_of_house, Long_of_house, Lat_of_obs, Long_of_obs, ans ) VALUES ('1',$address, $latHouse, $lngHouse,$latObs,$lngObs, $ans)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?> 