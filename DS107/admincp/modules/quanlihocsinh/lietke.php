<?php
// Kết nối cơ sở dữ liệu
include dirname(__DIR__, 3) . '/admincp/config/config.php';

// Số sinh viên trên mỗi trang
$so_ban_ghi_moi_tren_trang = 10;

// Lấy giá trị tìm kiếm (nếu có)
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

// Tính toán trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_from = ($page - 1) * $so_ban_ghi_moi_tren_trang;

// Câu truy vấn lấy danh sách sinh viên với tìm kiếm
$sql_lietke_students = "SELECT * FROM students WHERE 1";

if ($search) {
    $sql_lietke_students .= " AND (username LIKE '%$search%' OR major LIKE '%$search%')";
}

$sql_lietke_students .= " ORDER BY student_id DESC LIMIT $start_from, $so_ban_ghi_moi_tren_trang";
$query_lietke_students = mysqli_query($conn, $sql_lietke_students);

// Lấy tổng số bản ghi để tính số trang
$sql_total = "SELECT COUNT(*) FROM students WHERE 1";
if ($search) {
    $sql_total .= " AND (username LIKE '%$search%' OR major LIKE '%$search%')";
}
$query_total = mysqli_query($conn, $sql_total);
$row_total = mysqli_fetch_array($query_total);
$total_records = $row_total[0];
$total_pages = ceil($total_records / $so_ban_ghi_moi_tren_trang);
?>

<p class="text-2xl font-bold text-gray-800 mb-4 mt-4">Danh sách sinh viên</p>

<!-- Thanh tìm kiếm -->
<form method="GET" class="mb-4 flex gap-4">
    <input type="hidden" name="action" value="students">
    <input type="hidden" name="query" value="lietke">
    <input type="text" name="search" placeholder="Tìm theo tên đăng nhập hoặc ngành học" value="<?php echo htmlspecialchars($search); ?>" class="border border-gray-300 rounded-md p-2">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Tìm kiếm</button>
</form>

<div class="overflow-x-auto">
    <table class="product-table table-auto min-w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Mã sinh viên</th>
                <th class="px-4 py-2 border">Tên đăng nhập</th>
                <th class="px-4 py-2 border">Ngành học</th>
                <th class="px-4 py-2 border">Giới tính</th>
                <th class="px-4 py-2 border">Ngày sinh</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Số điện thoại</th>
                <th class="px-4 py-2 border">Địa chỉ</th>
                <th class="px-4 py-2 border">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query_lietke_students)) { ?>
                <tr>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['student_id']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['username']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['major']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['sex']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['date_of_birth']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['email']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['phone_number']); ?></td>
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($row['address']); ?></td>
                    <td class="px-4 py-2 border">
                        <a href="modules/students/xuli.php?student_id=<?php echo $row['student_id']; ?>" class="text-blue-500 hover:underline">Xóa</a> |
                        <a href="?action=students&query=sua&student_id=<?php echo urlencode($row['student_id']); ?>" class="text-blue-500 hover:underline">Sửa</a>
                    </td>   
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Phân trang -->
<div class="pagination mt-4 border border-gray-300 p-2 rounded-lg flex gap-2 justify-center">
    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
        <a href="?action=students&query=lietke&page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>"
           class="pagination-link px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-200 transition <?php echo ($i == $page) ? 'bg-blue-500 text-white' : ''; ?>">
            <?php echo $i; ?>
        </a>
    <?php } ?>
</div>
