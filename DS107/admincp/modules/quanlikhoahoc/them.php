<table class="product-table">
<form action="modules/quanlikhoahoc/xuli.php" method="post">
        <thead>
            <tr>
            <p class="text-2xl font-bold text-gray-800 mb-4">Thêm khóa học</p>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Mã khóa học</th>
                <td><input type="text" name="course_id" placeholder="Nhập mã khóa học" class="border border-gray-300 rounded-lg p-2 w-full"></td>
            </tr>
            <tr>
                <th>Tên khóa học</th>
                <td><input type="text" name="course_name" placeholder="Nhập tên khóa học" class="border border-gray-300 rounded-lg p-2 w-full"></td>
            </tr>
            <tr>
                <th>Giáo viên</th>
                <td><input type="text" name="lecturer_id" placeholder="Nhập giáo viên" class="border border-gray-300 rounded-lg p-2 w-full"></td>
            </tr>
            <tr>
            <th colspan="2" class="text-center py-4">
                <button type="submit" name="themkhoahoc" class="bg-green-600 text-white py-2 px-6 rounded-lg text-lg font-semibold hover:bg-green-700 transition-all">Thêm khóa học</button>
            </th>
            </tr>
        </tbody>
    </form>
</table>