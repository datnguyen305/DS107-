<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "teest";
$api_key = "frODoSgK49DGCERzISaFbyYFRyrnUVOqYzcwbkkjsABJNixCN9JM7ZidJjLmJxgypIpx9Y76T3BlbkFJVZKFnetZimD1OHO6m3U3W5Zm8jttg7TJTlTaG46croKKuVlLY_CkVaI13Lm7Qm6yrrqgvRJGQA";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>