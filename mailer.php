<?php
//Including SMTP Configuaration
require 'config.php';

//Create SQL Connection 
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Query for Today's Birthday Baby
$sql = "SELECT * FROM B_Day_Greeter.raw WHERE DATE_FORMAT(DOB,'%m-%d') = DATE_FORMAT(CURDATE(),'%m-%d')";
$result = $conn->query($sql);

//Mailing Routine
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        $toid = $row["Email_ID"];
        $name = $row["Name"];

        $card = sprintf("%03d.html",rand(1,$cards));

        $mail->addAddress($toid,$name);
        $mail->msghtml($card,__DIR__."/cards");

        if(!$mail->send()){
            echo $mail->ErrorInfo;
        }
    }
} else {
    echo "0 results";
}

$mail->close();
$conn->close();
?>