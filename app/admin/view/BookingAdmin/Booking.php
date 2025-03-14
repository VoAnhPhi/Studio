<body>
    <div class="container">
        <main class="main-content">
            <header class="header-section">
                <div>
                    <h1 class="page-title">Booking</h1>
                    <p class="page-subtitle">Manage photography bookings.</p>
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
                <div class="booking-container">
                    <div class="tab-group">
                        <a href="#booking-list" class="tab-link tab-link-black active" aria-current="page">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text">Booking List</span>
                        </a>
                        <a href="#upcoming" class="tab-link">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text">Upcoming</span>
                        </a>
                        <a href="#pending" class="tab-link">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text">Pending Order</span>
                        </a>
                        <a href="#completed" class="tab-link">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text">Completed</span>
                        </a>
                    </div>
                </div>
            </nav>
            <section class="booking-section" aria-label="Booking List">
                <div class="table-container">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th scope="col">Customer</th>
                                <th scope="col">Service</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Detail</th>
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
                            $sql = "SELECT booking_id, start_time, end_time, status, u.name AS user_name, s.name AS studio_name
                        FROM booking b
                        JOIN user u ON b.user_id = u.user_id
                        JOIN studiocategory s ON b.studio_id = s.studio_id";


                            $result = $conn->query($sql);

                            // Kiểm tra nếu có lỗi trong truy vấn
                            if (!$result) {
                                die("Query failed: " . $conn->error); // In ra thông báo lỗi nếu truy vấn thất bại
                            }

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Chuyển đổi thời gian start_time và end_time
                                    $start_time = date('l, j M Y', strtotime($row['start_time']));
                                    $end_time = date('l, j M Y', strtotime($row['end_time']));

                                    // Tạo trạng thái hiển thị theo status
                                    $status_class = '';
                                    $status_text = '';

                                    if ($row['status'] == 'cancelled') {
                                        $status_class = 'status-cancelled';
                                        $status_text = 'Cancelled';
                                    } elseif ($row['status'] == 'available') {
                                        $status_class = 'status-available';
                                        $status_text = 'Available';
                                    } else {
                                        $status_class = 'status-pending';
                                        $status_text = 'Pending';
                                    }

                                    // Hiển thị thông tin booking
                                    echo "<tr>";
                                    echo "<td>{$row['user_name']}</td>";  // Hiển thị tên người dùng từ bảng users
                                    echo "<td>{$row['studio_name']}</td>";  // Hiển thị tên studio từ bảng studios

                                    echo "<td>
                                <div class='date-range'>
                                <span>{$start_time}</span>
                                    <div class='night-indicator'>
                                        <span>1 đêm</span>
                                        <img src='https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f' alt='arrow' width='45' height='1' />
                                            </div>
                                        <span>{$end_time}</span>
                                    </div>
                                </td>";
                                    echo "<td><span class='{$status_class}'>{$status_text}</span></td>";
                                    echo "<td><button class='view-btn' aria-label='View details'>View</button></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Không có dịch vụ nào</td></tr>";
                            }

                            // Đóng kết nối
                            $conn->close();
                            ?>



                            <!-- <tr>
                                <td>Trần Thanh Tú</td>
                                <td class="booking-name-studio">Four Seasons Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-cancelled">Cancelled</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Hoài Dương</td>
                                <td class="booking-name-studio">Banyan Tree Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-pending">Pending</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td>
                            </tr>
                            <tr>
                                <td>Đàm Quốc Đạt</td>
                                <td class="booking-name-studio">Imperial Studio</td>
                                <td>
                                    <div class="date-range">
                                        <span>Thứ 3, 3 thg 12 2024</span>
                                        <div class="night-indicator">
                                            <span>1 đêm</span>
                                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/6c56e31537ae91eb50527c128d9028a3ee65b14e6f56daa5edac5935582e38fc?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                                alt="arrow" width="45" height="1" />
                                        </div>
                                        <span>Thứ 4, 4 thg 12 2024</span>
                                    </div>
                                </td>
                                <td><span class="status-completed">Completed</span></td>
                                <td><button class="view-btn" aria-label="View details">View</button></td> -->
                            </tr>
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

</html>