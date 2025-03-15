<main id="main-news-page">
    <section class="link">
        <div class="container">
            <a href="#">Trang chủ</a>
            <img src="img/icon/arrow-right-2.svg" alt="arrow">
            Tin Tức
        </div>
    </section>

    <div class="container">
        <section id="frst-session">
            <div class="content">
                <div class="title">
                    <h3>Hãy trải nghiệm một ngày tuyệt vời trong không gian sang trọng hòa quyện với thiên nhiên của
                        chúng tôi!</h3>
                </div>
                <div class="desc">
                    Một bãi cát trắng trải dài tuyệt đẹp, một vị trí đắc địa và một khu nghỉ dưỡng bãi biển độc đáo tại
                    Mũi Né, Phan Thiết, Việt Nam. Đây là những yếu tố làm nên The Sailing Bay Beach Resort, một trong
                    những khu nghỉ dưỡng 4 sao tốt nhất được xây dựng và trang trí theo phong cách châu Âu. Tầm nhìn ra
                    biển là giải pháp tốt nhất để thư giãn. Toàn bộ khu vực được thiết kế theo hình dạng cánh buồm để
                    thu trọn toàn bộ quang cảnh bãi biển dài.
                </div>
                <button><a href="?page=detailNews?id=0">Đọc thêm</a></button>
            </div>
            <img src="img/news-page/frst-session-img.png" alt="">
        </section>

        <section id="news">
            <div id="head">
                <nav>
                    <ul>
                        <li>Tất cả</li>
                        <li>Thông tin hoạt động</li>
                        <li>Tin khuyến mãi</li>
                    </ul>
                </nav>
                <div class="dropdown">
                    <!-- Dropdown sẽ hiển thị trên tablet/mobile -->
                    <button class="dropdown-toggle">Tất cả <img src="img/icon/arrow-down.svg" alt=""></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item active">Tất cả</a></li>
                        <li><a href="#" class="dropdown-item">Thông tin hoạt động</a></li>
                        <li><a href="#" class="dropdown-item">Tin khuyến mãi</a></li>
                    </ul>
                </div>
                <div class="search_field">
                    <img src="img/icon/search-icon.svg" alt="">
                    <input type="text" placeholder="Tìm kiếm theo khu vực">
                </div>
            </div>

            <div class="content">
                <?php if (!empty($data['news'])): ?>
                    <?php foreach ($data['news'] as $new): ?>
                        <div class="item" data-event='<?php echo $new['type'] ?>'>
                            <a href="?page=detailNews&id=<?php echo htmlspecialchars($new['post_id']); ?>" class="item-link">
                                <img src="img/news-page/<?php echo htmlspecialchars($new['image']); ?>"
                                    alt="<?php echo htmlspecialchars($new['title']); ?>" class="item-img">

                                <div class="info">
                                    <div class="date">
                                        <?php echo htmlspecialchars(date("d/m/Y", strtotime($new['published_date']))); ?>
                                    </div>
                                </div>

                                <div class="title">
                                    <h3><?php echo htmlspecialchars($new['title']); ?></h3>
                                </div>

                                <div class="desc">
                                    <p><?php echo htmlspecialchars(substr($new['content'], 0, 302 )); ?>...</p>
                                </div>
                            </a>
                        
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có bài viết nào!</p>
                <?php endif; ?>
            </div>
            <div class="more">
                Xem thêm
                <img src="img/icon/more.svg" alt="">
            </div>
        </section>
        <section class="support --ptop">
            <div class="container">
                <div class="support__heading">
                    <div class="support__heading-title --title">
                        <h2>Bất cứ khi nào bạn muốn, chúng tôi <br>luôn sẵng sàng hỗ trợ bạn</h2>
                    </div>
                    <hr />
                    <div class="support__heading-content">
                        GBOX luôn đồng hành cùng mọi lựa chọn của bạn.
                    </div>
                </div>
                <div class="support__content">
                    <div class="support__content-right">
                        <img src="img/support.png" alt="">
                    </div>
                    <div class="support__content-left">
                        <ul>
                            <li><a href="#">Liên hệ hỗ trợ trực tuyến</a></li>
                            <li><a href="#">Hỗ trợ về chi phí mua studio dài hạn</a></li>
                            <li><a href="#">Hỗ trợ thuê studio ngắn hạn</a></li>
                            <li><a href="#">Dịch vụ chụp ảnh tại studio</a></li>
                            <li><a href="#">Đóng góp ý kiến về dịch vụ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>