<body>
    <div class="container">
        <main class="main-content">
            <header class="header-section">
                <div>
                    <h1 class="page-title">News Management</h1>
                    <p class="page-subtitle">View all status from the dashboard.</p>
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
                            <span class="tab-text"> Commission Invoice</span>
                        </a>
                        <a href="#upcoming" class="tab-link">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text">General Invoice</span>
                        </a>
                        <a href="#upcoming" class="tab-link">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text"></span>
                        </a>
                        <a href="?action=add-news" class="add-product-btn" tabindex="0">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b633fdb76f5b691270eead81d21f22c6900577decef1c1f6a355bcc914dbc0e0?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                alt="" class="add-icon" />
                            <span>Add News</span>
                        </a>

                    </div>
                </div>
            </nav>
            <section class="booking-section" aria-label="Booking List">
                <div class="table-container">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Views</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Pin</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <?php
                        // Kết nối cơ sở dữ liệu
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "studio";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Truy vấn dữ liệu
                        $sql = "SELECT post_id, title, image, views, status, published_date FROM post";
                        $result = $conn->query($sql) or die("Query failed: " . $conn->error);

                        // Hiển thị dữ liệu
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                <td><img class='list-product-img' src='lib/upload/news/" . $row['image'] . "' alt=''></td>
                                <td class='booking-name-studio'>" . $row['views'] . "</td>
                                <td class='booking-name-studio'>" . $row['title'] . "</td>
                                <td class='booking-name-studio'>" . $row['status'] . "</td>
                                <td>" . date('d/m/Y H:i', strtotime($row['published_date'])) . "</td>
                                <td><a href='?action=edit-post&post_id=" . $row['post_id'] . "' class='view-btn' aria-label='View details'>Edit</a></td>
                            </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>Không có bài viết nào</td></tr>";
                        }

                        $conn->close();
                        ?>

                        <!-- <tr>
                                <td class="booking-name-studio">Hãy trải nghiệm...</td>
                                <td class="booking-name-studio">1.250</td>
                                <td class="booking-name-studio">---</td>
                                <td><span class="status-completed">Available</span></td>
                                <td class="booking-name-studio">---</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><button class="view-btn" aria-label="View details"
                                        onclick="openPopup()">Edit</button></td>
                            </tr>

                            <tr>
                                <td class="booking-name-studio">Hãy trải nghiệm...</td>
                                <td class="booking-name-studio">1.250</td>
                                <td class="booking-name-studio">---</td>
                                <td><span class="status-pending">Pending</span></td>
                                <td class="booking-name-studio">---</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><button class="view-btn" aria-label="View details"
                                        onclick="openPopup()">Edit</button></td>
                            </tr>
                            <tr>
                                <td class="booking-name-studio">Hãy trải nghiệm...</td>
                                <td class="booking-name-studio">1.250</td>
                                <td class="booking-name-studio">---</td>
                                <td><span class="status-cancelled">Unavailable</span></td>
                                <td class="booking-name-studio">---</td>
                                <td>
                                    21/09/2024 lúc 8:25 sáng
                                </td>
                                <td><button class="view-btn" aria-label="View details"
                                        onclick="openPopup()">Edit</button></td>
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