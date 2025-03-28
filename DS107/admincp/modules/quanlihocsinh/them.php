<form action="modules/students/xuli.php" method="post">
    <table class="product-table">
        <thead>
            <tr>
                <p class="text-2xl font-bold text-gray-800 mb-4">Thêm sinh viên</p>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Mã sinh viên</th>
                <td><input type="text" id="student_id" name="student_id" class="border border-gray-300 rounded-lg p-2 w-full" placeholder="Nhập mã sinh viên" required></td>
            </tr>
            <tr>
                <th>Tên đăng nhập</th>
                <td><input type="text" id="username" name="username" class="border border-gray-300 rounded-lg p-2 w-full" placeholder="Nhập tên đăng nhập" required></td>
            </tr>
            <tr>
                <th>Ngành học</th>
                <td><input type="text" id="major" name="major" class="border border-gray-300 rounded-lg p-2 w-full" placeholder="Nhập ngành học" required></td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td>
                    <select id="sex" name="sex" class="border border-gray-300 rounded-lg p-2 w-full">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td><input type="date" id="date_of_birth" name="date_of_birth" class="border border-gray-300 rounded-lg p-2 w-full" required></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" id="email" name="email" class="border border-gray-300 rounded-lg p-2 w-full" placeholder="Nhập email" required></td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td><input type="text" id="phone_number" name="phone_number" class="border border-gray-300 rounded-lg p-2 w-full" placeholder="Nhập số điện thoại" required></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><input type="text" id="address" name="address" class="border border-gray-300 rounded-lg p-2 w-full" placeholder="Nhập địa chỉ" required></td>
            </tr>
            <tr>
                <th colspan="2" class="text-center py-4">
                    <button type="submit" name="themstudent" class="bg-green-600 text-white py-2 px-6 rounded-lg text-lg font-semibold hover:bg-green-700 transition-all">Thêm sinh viên</button>
                </th>
            </tr>
        </tbody>
    </table>
</form>
