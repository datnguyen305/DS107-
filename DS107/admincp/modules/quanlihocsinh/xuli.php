<?php
include ('../../config/config.php');

$student_id = $_POST['student_id'];
$username = $_POST['username'];
$major = $_POST['major'];
$sex = $_POST['sex'];
$date_of_birth = $_POST['date_of_birth'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

if (isset($_POST['themsinhvien'])) {
    // Thêm sinh viên mới
    $sql_them = "INSERT INTO students (student_id, username, major, sex, date_of_birth, email, phone_number, address) 
                 VALUES ('$student_id', '$username', '$major', '$sex', '$date_of_birth', '$email', '$phone_number', '$address')";

    if (mysqli_query($conn, $sql_them)) {
        header('Location: ../../index.php?action=quanlisinhvien&query=them');
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

} elseif (isset($_POST['suasinhvien'])) {
    // Sửa thông tin sinh viên
    $id = $_GET['student_id'];
    $sql_sua = "UPDATE students 
                SET username = '$username', major = '$major', sex = '$sex', date_of_birth = '$date_of_birth', 
                    email = '$email', phone_number = '$phone_number', address = '$address' 
                WHERE student_id = '$id'";

    if (mysqli_query($conn, $sql_sua)) {
        header('Location: ../../index.php?action=quanlisinhvien&query=them');
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

} else {
    // Xóa sinh viên
    $id = $_GET['student_id'];
    $sql_xoa = "DELETE FROM students WHERE student_id = '$id'";

    if (mysqli_query($conn, $sql_xoa)) {
        header('Location: ../../index.php?action=quanlisinhvien&query=them');
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>
