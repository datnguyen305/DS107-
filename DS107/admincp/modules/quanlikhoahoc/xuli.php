<?php
include ('../../config/config.php');
$course_id = $_POST['course_id'];
$course_name = $_POST['course_name'];
$lecturer_id = $_POST['lecturer_id'];
if(isset($_POST['themkhoahoc'])){
    $sql_them = "INSERT INTO courses (course_id, course_name, lecturer_id) VALUES ('$course_id', '$course_name', '$lecturer_id')";
    if (mysqli_query($conn, $sql_them)) {
        header('Location: ../../index.php?action=quanlikhoahoc&query=them');
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
}elseif(isset($_POST['suakhoahoc'])){
    $course_id = $_GET['course_id'];
    $sql_sua = "UPDATE courses SET course_id = '".$course_id."', course_name = '".$course_name."', lecturer_id = '".$lecturer_id."' WHERE course_id = '".$course_id."'";
    mysqli_query($conn, $sql_sua);
    header('Location: ../../index.php?action=quanlikhoahoc&query=them');
}else{
    $course_id = $_GET['course_id'];
    $sql_xoa = "DELETE FROM courses WHERE course_id = '".$course_id."'";
    mysqli_query($conn, $sql_xoa);
    header('Location: ../../index.php?action=quanlikhoahoc&query=them');
}
?>