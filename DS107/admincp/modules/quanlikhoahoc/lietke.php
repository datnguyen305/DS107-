<?php
// Kết nối cơ sở dữ liệu
include dirname(__DIR__, 3) . '/admincp/config/config.php';

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Truy vấn danh sách khóa học
$sql_lietke_kh = "SELECT * FROM courses ORDER BY course_id DESC";
$query_lietke_kh = mysqli_query($conn, $sql_lietke_kh);

?>
<p class="text-2xl font-bold text-gray-800 mb-4 mt-4">Liệt kê các môn học</p>
<div class="overflow-x-auto">
    <table class="product-table table-auto min-w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Mã khóa học</th>
                <th class="px-4 py-2 border">Tên khóa học</th>
                <th class="px-4 py-2 border">Giáo viên</th>
                <th class="px-4 py-2 border">Thao tác</th> <!-- Thêm cột thao tác -->
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query_lietke_kh)) { ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['course_id']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['course_name']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['lecturer_id']); ?></td>
                    <td class="px-4 py-2 border">
                        <a href="modules/quanlikhoahoc/xuli.php?course_id=<?php echo $row['course_id']; ?>" class="text-blue-500 hover:underline">Xóa</a> |
                        <a href="?action=quanlikhoahoc&query=sua&course_id=<?php echo $row['course_id']; ?>" class="text-blue-500 hover:underline">Sửa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
