<?php
$sql_sua_kh = "SELECT * FROM courses WHERE course_id = '$_GET[course_id]' limit 1";
$query_sua_kh = mysqli_query($conn, $sql_sua_kh);
?>

<p class="text-2xl font-bold text-gray-800 mb-4 text-center">Sửa khóa học</p>
<div class="container mx-auto px-4">
    <table class="product-table border border-gray-300 shadow-md rounded-lg overflow-hidden w-full max-w-2xl mx-auto">
        <form action="modules/quanlikhoahoc/xuli.php?course_id=<?php echo $_GET['course_id']?>" method="post" class="w-full">
            <?php while ($row = mysqli_fetch_array($query_sua_kh)) { ?>
                <tbody>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Mã khóa học</th>
                        <td><input type="text" value="<?php echo $row['course_id'] ?>" name="course_id" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Tên khóa học</th>
                        <td><input type="text" value="<?php echo $row['course_name'] ?>" name="course_name" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Giáo viên</th>
                        <td><input type="text" value="<?php echo $row['lecturer_id'] ?>" name="lecturer_id" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center py-4">
                            <button type="submit" name="suakhoahoc" class="bg-green-600 text-white py-2 px-6 rounded-lg text-lg font-semibold hover:bg-green-700 transition-all">Sửa khóa học</button>
                        </th>
                    </tr>
                </tbody>
            <?php } ?>
        </form>
    </table>
</div>
