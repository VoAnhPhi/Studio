<body>
    <div class="container">
        <main class="main-content">
            <header class="header-section">
                <div>
                    <h1 class="page-title">Services</h1>
                    <p class="page-subtitle">Service</p>
                </div>

                <div class="user-profile">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8bb0745711ce6133076d46e9679fb39046eda8008659709e00d84e588f01f7b1?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                        alt="User Profile" class="profile-image">
                    <div class="profile-info">
                        <span class="profile-name">Nguyen Phuong</span>
                        <span class="profile-email">dsun.agency@gmail.com</span>
                    </div>
                    <button aria-label="User menu" class="profile-menu">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d06db6e006919a5ea636ac00218298dc8ea375846d2fc7f39ffddf2b532ee929?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="">
                    </button>
                </div>
            </header>
            <nav class="booking-nav" aria-label="Booking navigation">
                <div class="booking-container-product">
                    <div class="tab-group-product">
                        <a href="#booking-list" class="tab-link tab-link-black active" aria-current="page">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text">List services</span>
                        </a>
                        <a href="?action=add-services" class="add-product-btn" tabindex="0">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b633fdb76f5b691270eead81d21f22c6900577decef1c1f6a355bcc914dbc0e0?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                alt="" class="add-icon" />
                            <span>Add New Service</span>
                        </a>

                    </div>
                </div>
            </nav>
            <section class="booking-section" aria-label="Booking List">
                <div class="table-container">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Service</th>
                                <th scope="col">Studio</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "studio";

                            // Tạo kết nối
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Truy vấn lấy thông tin dịch vụ
                            $sql = "SELECT service_id, name,  image, studio, date FROM service";
                            $result = $conn->query($sql);

                            // Kiểm tra nếu có lỗi trong truy vấn
                            if (!$result) {
                                die("Query failed: " . $conn->error); // In ra thông báo lỗi nếu truy vấn thất bại
                            }

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td><img class='list-product-img' src='lib/upload/" . $row['image'] . "' alt=''></td>";
                                    echo "<td class='booking-name-studio'>" . $row['name'] . "</td>";
                                    echo "<td>" . date('d/m/Y  H:i ', strtotime($row['date'])) . "</td>";
                                    echo "<td><a href='?action=edit-services&service_id=" . $row['service_id'] . "' class='view-btn' aria-label='View details'>Edit</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Không có dịch vụ nào</td></tr>";
                            }

                            // Đóng kết nối
                            $conn->close();
                            ?>

                            <!-- <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Dịch vụ chụp ảnh</td>
                                <td class="booking-name-studio">All</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><a href="?action=edit-services" class="view-btn" aria-label="View details">Edit</a></td>
                            </tr>
                            <tr>
                                <td><img class=" list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Dịch vụ thuê phòng</td>
                                <td class="booking-name-studio">All</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><a href="?action=edit-services" class="view-btn" aria-label="View details">Edit</a></td>
                            </tr>
                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Dịch vụ chụp ảnh</td>
                                <td class="booking-name-studio">All</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><a href="?action=edit-services" class="view-btn" aria-label="View details">Edit</a></td>
                            </tr>
                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Dịch vụ chụp ảnh</td>
                                <td class="booking-name-studio">All</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><a href="?action=edit-services" class="view-btn" aria-label="View details">Edit</a></td>
                            </tr>
                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Dịch vụ chụp ảnh</td>
                                <td class="booking-name-studio">All</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><a href="?action=edit-services" class="view-btn" aria-label="View details">Edit</a></td>
                            </tr>
                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Dịch vụ chụp ảnh</td>
                                <td class="booking-name-studio">All</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><a href="?action=edit-services" class="view-btn" aria-label="View details">Edit</a></td>
                            </tr> -->
                        </tbody>
                    </table>

                    <nav class="pagination" aria-label="Table navigation">
                        <div class="pagination-info">
                            <span class="current-page">1 -</span>
                            <span class="total-pages">5 of 56</span>
                        </div>
                        <div class="pagination-controls">
                            <span class="page-text">The page you're on</span>
                            <select class="page-select" aria-label="Select page number">
                                <option value="1">1</option>
                            </select>
                            <div class="pagination-divider" aria-hidden="true"></div>
                            <button class="nav-btn prev" aria-label="Previous page"></button>
                            <button class="nav-btn next" aria-label="Next page"></button>
                        </div>
                    </nav>
                </div>
            </section>


        </main>

    </div>




</body>
<div class="popup" id="popup">
    <div class="popup-content">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <div class="inner-box">
            <h2>Scrollable Box with Drop Shadow</h2>
            <p>Nội dung dòng 1</p>
            <p>Nội dung dòng 2</p>
            <p>Nội dung dòng 3</p>
            <p>Nội dung dòng 4</p>
            <p>Nội dung dòng 5</p>
            <p>Nội dung dòng 6</p>
            <p>Nội dung dòng 7</p>
            <p>Nội dung dòng 8</p>
            <p>Nội dung dòng 9</p>
            <p>Nội dung dòng 10</p>
            <p>Nội dung dòng cuối</p>
        </div>
    </div>
</div>

<script>
    // Hàm mở popup
    function openPopup() {
        document.getElementById('popup').style.display = 'flex';
    }

    // Hàm đóng popup
    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</html>