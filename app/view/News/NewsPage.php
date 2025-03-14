<main id="main-news-page">
    <div id="link"><a href="#">Trang chủ</a><img src="img/icon/arrow-right-2.svg">Studio</div>
    <div class="container">

        <section id="frst-session">
            <div class="content">
                <div class="title">
                    <h3>Hãy trải nghiệm một ngày tuyệt vời trong không gian sang trọng hòa quyện với thiên nhiên của chúng tôi!</h3>
                </div>
                <div class="desc">
                    Một bãi cát trắng trải dài tuyệt đẹp, một vị trí đắc địa và một khu nghỉ dưỡng bãi biển độc đáo tại Mũi Né, Phan Thiết, Việt Nam. Đây là những yếu tố làm nên The Sailing Bay Beach Resort, một trong những khu nghỉ dưỡng 4 sao tốt nhất được xây dựng và trang trí theo phong cách châu Âu. Tầm nhìn ra biển là giải pháp tốt nhất để thư giãn. Toàn bộ khu vực được thiết kế theo hình dạng cánh buồm để thu trọn toàn bộ quang cảnh bãi biển dài.
                </div>
                <button><a href="?page=detailNews">Đọc thêm</a></button>
            </div>
            <img src="img/news-page/frst-session-img.png" alt="">
        </section>

        <section id="news">
            <div id="head">
                <nav>
                    <ul>
                        <li>Tất cả</li>
                        <li>Thông tin hoạt động - sự kiện</li>
                        <li>Tin khuyến mãi</li>
                    </ul>
                </nav>
                <div class="dropdown">
                    <!-- Dropdown sẽ hiển thị trên tablet/mobile -->
                    <button class="dropdown-toggle">Tất cả <img src="img/icon/arrow-down.svg" alt=""></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item active">Tất cả</a></li>
                        <li><a href="#" class="dropdown-item">Thông tin hoạt động - sự kiện</a></li>
                        <li><a href="#" class="dropdown-item">Tin khuyến mãi</a></li>
                    </ul>
                </div>
                <div class="search_field">
                    <img src="img/icon/search-icon.svg" alt="">
                    <input type="text" placeholder="Tìm kiếm theo khu vực">
                </div>
            </div>

            <div class="content">
                <!-- <div class="left-wrapper"> -->
                <!-- 1 -->
                <?php
                // Kết nối đến cơ sở dữ liệu
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "studio";

                $conn = new mysqli($servername, $username, $password, $database);

                // Kiểm tra kết nối
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                // Truy vấn dữ liệu
                $sql = "SELECT post_id, title, content, published_date, image FROM post";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Lỗi truy vấn SQL: " . $conn->error); // Hiển thị lỗi cụ thể
                }

                // Hiển thị dữ liệu
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="item" data-link="?page=detailPost&id=<?php echo $row['post_id']; ?>">
                            <img src="img/news-page/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">

                            <div class="info">
                                <div class="date"><?php echo $row['published_date']; ?></div>
                            </div>

                            <div class="title">
                                <h3><?php echo $row['title']; ?></h3>
                            </div>
                            <div class="desc">
                                <p><?php echo $row['content']; ?></p>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "Không có bài viết nào!";
                }
                // Đóng kết nối
                $conn->close();
                ?>

                <!-- <div class="item" data-link="?page=detailNews">
                    <img src="img/news-page/news-img-1-l.png" alt="">
                    <div class="info">
                        <div class="date">11.11.2024</div>
                        <div class="owner">by Admin</div>
                    </div>
                    <div class="title">
                        <h3>Xu hướng nhà ở tiện ích: Những thiết kế hiện đại và đa năng cho căn hộ nhỏ</h3>

                        </div>
                        <div class="desc">
                            <p>Trong bối cảnh đô thị hóa ngày càng gia tăng, không gian sống ngày càng trở nên khan hiếm. Nhu cầu về nhà ở tiện ích, đặc biệt là trong các căn hộ nhỏ, đang trở thành một xu hướng nổi bật. Thiết kế hiện đại không chỉ tập trung vào việc tối ưu hóa diện tích mà còn tạo ra những không gian sống đa năng, đáp ứng nhu cầu sử dụng của người dân.</p>
                        </div>
                    </div>
                    <div class="item" data-event="Tin khuyến mãi" data-link="?page=detailNews">
                        <img src="img/news-page/news-img-4-l.png" alt="">
                        <div class="info">
                            <div class="date">11.11.2024</div>
                            <div class="owner">by Admin</div>
                        </div>
                        <div class="title">
                            <h3>Xu hướng nhà ở tiện ích: Những thiết kế hiện đại và đa năng cho căn hộ nhỏ</h3>

                        </div>
                        <div class="desc">
                            Với sự gia tăng nhu cầu về không gian sống linh hoạt và tiện nghi, thiết kế studio hiện đại đang trở thành xu hướng phổ biến. Dưới đây là một số xu hướng nổi bật trong thiết kế studio cho những người mua đang tìm kiếm không gian sống lý tưởng.
                        </div>
                    </div>
                    <div class="item" data-event="Tin khuyến mãi" data-link="?page=detailNews">
                        <img src="img/news-page/news-img-5-l.png" alt="">
                        <div class="info">
                            <div class="date">11.11.2024</div>
                            <div class="owner">by Admin</div>
                        </div>
                        <div class="title">
                            <h3>Xu hướng nhà ở tiện ích: Những thiết kế hiện đại và đa năng cho căn hộ nhỏ</h3>

                        </div>
                        <div class="desc">
                            <p>Studio cổ điển không chỉ đơn thuần là một không gian làm việc; nó còn là một tác phẩm nghệ thuật sống động mang đậm dấu ấn lịch sử. Mỗi chi tiết trong studio đều được chăm chút tỉ mỉ, từ thiết kế tinh tế cho đến các yếu tố trang trí độc đáo, tạo nên một bầu không khí ấm cúng và thân thiện. Điều này không chỉ mang lại sự thoải mái mà còn tạo ra cảm hứng cho các nghệ sĩ, nhiếp ảnh gia và nhà làm phim.
                                Không gian trong studio cổ điển thường được thiết kế với những đường nét thanh thoát, những họa tiết trang trí công phu và chất liệu cao cấp, giúp thể hiện vẻ đẹp của thời gian.</p>
                        </div>
                    </div>

                </div>

                <div class="right-column">
                    <div class="item" data-event="Thông tin hoạt động - sự kiện" data-link="?page=detailNews">
                        <img src="img/news-page/news-img-2.png" alt="">
                        <div class="info">
                            <div class="date">11.11.2024</div>
                            <div class="owner">by Admin</div>
                        </div>
                        <div class="title">
                            <h3>Xu hướng nhà ở tiện ích: Những thiết kế hiện đại và đa năng cho căn hộ nhỏ</h3>

                        </div>
                        <div class="desc">
                            <p>Sống trong các căn nhà tiện ích được quản lý chuyên nghiệp mang lại nhiều lợi ích đáng kể cho cư dân. Dưới đây là những ưu điểm nổi bật của loại hình nhà ở này...</p>
                        </div>
                    </div>
                    <div class="desc">
                        <p>Trong thời đại số hóa hiện nay, nhu cầu tạo ra nội dung hình ảnh và video ngày càng cao. Một studio hướng biển không chỉ mang lại không gian làm việc thoải mái mà còn tạo ra những khung cảnh tuyệt đẹp cho việc chụp ảnh và quay video. Dưới đây là những lý do tại sao studio hướng biển là lựa chọn hoàn hảo cho các nhiếp ảnh gia và nhà làm phim.</p>
                    </div>
                </div>
                
                <div class="item --responsive" data-link="?page=detailNews">
                    <img src="img/news-page/news-img-7.png" alt="">
                    <div class="info">
                        <div class="date">11.11.2024</div>
                        <div class="owner">by Admin</div>
                    </div>
                    <div class="title">
                        <h3>Xu hướng nhà ở tiện ích: Những thiết kế hiện đại và đa năng cho căn hộ nhỏ</h3>

                    </div> -->
                <!-- <div class="desc">
                        <p>Khi tìm kiếm một studio để chụp ảnh hay quay video, bạn có thể gặp phải nhiều khó khăn trong việc lựa chọn. Từ việc xác định vị trí, phong cách thiết kế cho đến các tiện ích đi kèm, có rất nhiều yếu tố cần xem xét. Dưới đây là một số thách thức phổ biến mà nhiều người gặp phải và lý do tại sao bạn nên liên hệ với chúng tôi để được tư vấn.</p>
                    </div> -->
            </div>
            <div class="more">
                Xem thêm
                <img src="img/icon/more.svg" alt="">
            </div>
    </div>
    </section>

    <section id="support">
        <div class="title">
            <h3>
                Bất cứ khi nào bạn muốn, chúng tôi luôn sẵng sàng hỗ trợ bạn
            </h3>
            <hr>
            <p>GBOX luôn đồng hành cùng mọi lựa chọn của bạn. </p>
        </div>
        <div class="content">
            <img src="img/product-page/support_foot.png" alt="">
            <nav>
                <ul>
                    <li>Liên hệ hỗ trợ trực tuyến</li>
                    <li>Hỗ trợ về chi phí mua studio dài hạn</li>
                    <li>Hỗ trợ thuê studio ngắn hạn</li>
                    <li>Dịch vụ chụp ảnh tại studio</li>
                    <li>Đóng góp ý kiến về dịch vụ</li>
                </ul>
            </nav>
        </div>
    </section>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const dropdownToggle = document.querySelector(".dropdown-toggle");
            const dropdownMenu = document.querySelector(".dropdown-menu");
            const dropdownItems = document.querySelectorAll(".dropdown-menu .dropdown-item");

            // Xử lý toggle menu
            dropdownToggle.addEventListener("click", () => {
                dropdownMenu.classList.toggle("show"); // Thêm/xóa class `show`
            });

            // Đóng menu khi nhấp ra ngoài
            document.addEventListener("click", (e) => {
                if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove("show");
                }
            });

            // Xử lý hiệu ứng active cho các item
            dropdownItems.forEach((item) => {
                item.addEventListener("click", (e) => {
                    e.preventDefault(); // Ngăn hành động mặc định (nếu là thẻ a)

                    // Xóa active từ các item khác
                    dropdownItems.forEach((i) => i.classList.remove("active"));

                    // Thêm active cho item được click
                    item.classList.add("active");

                    // Cập nhật text cho nút toggle
                    dropdownToggle.textContent = item.textContent;

                    // Đóng menu sau khi chọn
                    dropdownMenu.classList.remove("show");
                });
            });
        });


        function renderProducts(filterEvent = 'Tất cả') {
            const productWrapper = document.querySelector("#news .content");
            const allProducts = productWrapper.querySelectorAll('.item');

            console.log(allProducts); // Để kiểm tra xem có đúng các phần tử không

            allProducts.forEach(product => {
                const productEvent = product.getAttribute('data-event');
                if (filterEvent === 'Tất cả' || productEvent === filterEvent) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
        }


        function setupFilters() {
            const navItems = document.querySelectorAll('#head nav ul li');
            const dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');


            navItems.forEach(item => {
                item.addEventListener('click', () => {
                    renderProducts(item.textContent);
                    highlightActive(item);
                });
            });

            dropdownItems.forEach(item => {
                item.addEventListener('click', () => {
                    renderProducts(item.textContent);
                    highlightActive(item);
                });
            });

            function highlightActive(selectedItem) {

                navItems.forEach(item => item.classList.remove('active'));
                dropdownItems.forEach(item => item.classList.remove('active'));


                selectedItem.classList.add('active');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            setupFilters();
            renderProducts();

        });
        document.addEventListener('DOMContentLoaded', () => {
            setupFilters();


            const firstNavItem = document.querySelector('#head nav ul li:first-child');
            const firstDropdownItem = document.querySelector('.dropdown-menu .dropdown-item:last-child');

            if (firstNavItem) firstNavItem.classList.add('active');
            if (firstDropdownItem) firstDropdownItem.classList.add('active');

            renderProducts();
        });
    </script>
</main>
