<?php
include ('../../config/config.php');

$sql_sua_sv = "SELECT * FROM students WHERE student_id = '$_GET[student_id]' LIMIT 1";
$query_sua_sv = mysqli_query($conn, $sql_sua_sv);
?>

<p class="text-2xl font-bold text-gray-800 mb-4 text-center">Sửa thông tin sinh viên</p>
<div class="container mx-auto px-4">
    <table class="product-table border border-gray-300 shadow-md rounded-lg overflow-hidden w-full max-w-2xl mx-auto">
        <form action="modules/students/xuli.php?student_id=<?php echo htmlspecialchars($_GET['student_id']); ?>" method="post" class="w-full">
            <?php while ($row = mysqli_fetch_array($query_sua_sv)) { ?>
                <tbody>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Mã sinh viên</th>
                        <td><input type="text" value="<?php echo htmlspecialchars($row['student_id']); ?>" name="student_id" class="border border-gray-300 rounded-lg p-2 w-full" readonly></td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Tên đăng nhập</th>
                        <td><input type="text" value="<?php echo htmlspecialchars($row['username']); ?>" name="username" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Ngành học</th>
                        <td><input type="text" value="<?php echo htmlspecialchars($row['major']); ?>" name="major" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Giới tính</th>
                        <td>
                            <select name="sex" class="border border-gray-300 rounded-lg p-2 w-full">
                                <option value="Nam" <?php echo ($row['sex'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                                <option value="Nữ" <?php echo ($row['sex'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                                <option value="Khác" <?php echo ($row['sex'] == 'Khác') ? 'selected' : ''; ?>>Khác</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Ngày sinh</th>
                        <td><input type="date" value="<?php echo $row['date_of_birth']; ?>" name="date_of_birth" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Email</th>
                        <td><input type="email" value="<?php echo htmlspecialchars($row['email']); ?>" name="email" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Số điện thoại</th>
                        <td><input type="text" value="<?php echo htmlspecialchars($row['phone_number']); ?>" name="phone_number" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th class="bg-gray-200 p-3 text-gray-700 text-left w-1/3">Địa chỉ</th>
                        <td><input type="text" value="<?php echo htmlspecialchars($row['address']); ?>" name="address" class="border border-gray-300 rounded-lg p-2 w-full"></td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center py-4">
                            <button type="submit" name="suastudent" class="bg-green-600 text-white py-2 px-6 rounded-lg text-lg font-semibold hover:bg-green-700 transition-all">Sửa thông tin</button>
                        </th>
                    </tr>
                </tbody>
            <?php } ?>
        </form>
    </table>
</div>
