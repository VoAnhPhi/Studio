<main id="main__products">
    <section class="link">
        <div class="container">
            <a href="index.php">Trang chủ</a>
            <img src="img/icon/arrow-right-2.svg" alt="arrow">
            Studio
        </div>
    </section>

    <h3 id="big_title">TRẢI NHGIỆM STUDIO MỚI MẺ, SÁNG TẠO VÀ ĐỘC ĐÁO TẠI GBOX!</h3>

    <div class="product-page-studio-img">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="img/product-page/swiper-img-1.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-2.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-3.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-4.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-5.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-6.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-7.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-8.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-9.png"></div>
            <div class="swiper-slide"><img src="img/product-page/swiper-img-10.png"></div>
        </div>

        <!-- <div class="swiper-pagination"></div> -->
    </div>

    <div class="container">
    <section id="high_rate">
            <h3>Sự lựa chọn hàng đầu của khách hàng</h3>
            <div class="content">
                <?php
                $topProduct = $data['topProduct'];
                foreach ($topProduct as $product): ?>
                    <div class="high_rate_item">
                        <div class="first_seen">
                            <img src="img/product-details/<?php echo htmlspecialchars($product['image']); ?>" alt="">
                            <div class="info">
                                <div class="type">Top Studio</div>
                                <div class="name"><?= htmlspecialchars($product['name']); ?></div>
                                <div class="rate">
                                    <div class="star"><img src="img/icon/five-star.svg" alt="sao"></div>
                                    <div class="quantity">(20 people)</div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden_seen">
                            <div class="content">
                                <div class="title">Best of the Week</div>
                                <div class="desc">
                                    <?= htmlspecialchars($product['name']); ?>
                                    <?= htmlspecialchars(substr($product['description'], 0, 130)); ?>...
                                </div>
                                <div class="number_info">
                                    <div class="first_num">72+
                                        <div class="desc_num">Quốc gia</div>
                                    </div>
                                    <div class="first_num">72+
                                        <div class="desc_num">Quốc gia</div>
                                    </div>
                                    <div class="first_num">72+
                                        <div class="desc_num">Quốc gia</div>
                                    </div>
                                </div>

                                <button><a href="?page=detailProduct&id=<?= htmlspecialchars($product['product_id']); ?>">Xem
                                        ngay</a></button>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </section>


    </div>


    <div class="container">
        <section id="product_list">
            <div id="head">
                <nav>
                    <ul>
                        <li>Tất cả</li>
                        <li>Quảng Nam</li>
                        <li>Thừa Thiên Huế</li>
                        <li>Khánh Hoà</li>
                        <li>Bà Rịa - Vũng Tàu</li>
                        <li>Ninh Thuận</li>
                    </ul>
                </nav>
                <div class="dropdown">
                    <!-- Dropdown sẽ hiển thị trên tablet/mobile -->
                    <button class="dropdown-toggle">Tất cả <img src="img/icon/arrow-down.svg" alt=""></button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item active">Tất cả</a></li>
                        <li><a href="#" class="dropdown-item">Quảng Nam</a></li>
                        <li><a href="#" class="dropdown-item">Thừa Thiên Huế</a></li>
                        <li><a href="#" class="dropdown-item">Khánh Hoà</a></li>
                        <li><a href="#" class="dropdown-item">Bà Rịa - Vũng Tàu</a></li>
                        <li><a href="#" class="dropdown-item">Ninh Thuận</a></li>
                    </ul>
                </div>
                <div class="search_field">
                    <img src="img/icon/search-icon.svg" alt="">
                    <input type="text" placeholder="Tìm kiếm theo khu vực">
                </div>
            </div>

            <div id="product_wrapper">
                <?php
                    function getProvince($location)
                    {
                        $parts = explode(',', $location);
                        return count($parts) > 1 ? trim($parts[1]) : '';
                    }
                $listProduct = $data['products'];

                foreach ($listProduct as $product): ?>
                    <div class="item" data-location="<?= htmlspecialchars(getProvince($product['location'])); ?>">
                        <img src="img/product-details/<?= htmlspecialchars($product['image']); ?>"
                            alt="<?= htmlspecialchars($product['image']); ?>">
                        <div class="row1">
                            <div class="name"><?= htmlspecialchars($product['name']); ?></div>
                            <div class="star">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <img src="img/icon/star.svg" alt="sao">
                                <?php endfor; ?>

                            </div>
                        </div>
                        <div class="desc"><?= htmlspecialchars($product['description']); ?></div>
                        <div class="location">
                            <img src="img/icon/map-pin.svg" alt="Map Pin Icon">
                            <?= htmlspecialchars($product['location']); ?>
                        </div>
                        <div class="last-row">
                            <div class="price">
                                <?= number_format($product['price'], 0, ',', '.'); ?> đ
                                <div class="day">/ ngày</div>
                            </div>
                            <button>
                                <a href="?page=detailProduct&id=<?= htmlspecialchars($product['product_id']); ?>">Đặt
                                    ngay</a>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="more">
                Xem thêm
                <img src="img/icon/more.svg" alt="">
            </div>
        </section>
    </div>


    <section class="similar__studios">
        <div class="similar__studios-list">
            <h3>Một vài gợi ý studio tương tự</h3>
            <div class="swiper-hint-container">
                <div class="swiper-hint-wrapper">
                    <div class="swiper-hint-slide"><img class="hint-img" src="img/product-page/hint-1.png" alt="1">
                    </div>
                    <div class="swiper-hint-slide"><img class="hint-img" src="img/product-page/hint-2.png" alt="2">
                    </div>
                    <div class="swiper-hint-slide"><img class="hint-img" src="img/product-page/hint-3.png" alt="3">
                    </div>
                    <div class="swiper-hint-slide"><img class="hint-img" src="img/product-page/hint-4.png" alt="4">
                    </div>
                    <div class="swiper-hint-slide"><img class="hint-img" src="img/product-page/hint-5.png" alt="5">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section id="rate">
            <div class="title">
                <h3>Những ý kiến đóng góp của bạn tạo nên sự phát triển của chúng tôi</h3>
                <hr>
                <p>Hãy cho chúng tôi những phản hồi để chúng tôi có thể phát triển hơn nữa</p>
            </div>
            <div class="comments">
                <div class="swiper-container swiper-comments-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-comments-slide">
                            <img src="img/icon/comment-icon.svg" alt="">
                            <p>"Studio này có dịch vụ rất chuyên nghiệp, đội ngũ nhiếp ảnh gia sáng tạo và tận tâm. Họ
                                luôn lắng nghe và mang đến những bức ảnh đẹp, ấn tượng."</p>
                            <div class="info-user">
                                <img src="" alt="avatar">
                                <div class="username">Trần Thanh Tú</div>
                                <div class="star"></div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-comments-slide">
                            <img src="img/icon/comment-icon.svg" alt="">
                            <p>"Studio này có dịch vụ rất chuyên nghiệp, đội ngũ nhiếp ảnh gia sáng tạo và tận tâm. Họ
                                luôn lắng nghe và mang đến những bức ảnh đẹp, ấn tượng."</p>
                            <div class="info-user">
                                <img src="" alt="avatar">
                                <div class="username">Trần Thanh Tú</div>
                                <div class="star"></div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-comments-slide">
                            <img src="img/icon/comment-icon.svg" alt="">
                            <p>"Studio này có dịch vụ rất chuyên nghiệp, đội ngũ nhiếp ảnh gia sáng tạo và tận tâm. Họ
                                luôn lắng nghe và mang đến những bức ảnh đẹp, ấn tượng."</p>
                            <div class="info-user">
                                <img src="" alt="avatar">
                                <div class="username">Trần Thanh Tú</div>
                                <div class="star"></div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-comments-slide">
                            <img src="img/icon/comment-icon.svg" alt="">
                            <p>"Studio này có dịch vụ rất chuyên nghiệp, đội ngũ nhiếp ảnh gia sáng tạo và tận tâm. Họ
                                luôn lắng nghe và mang đến những bức ảnh đẹp, ấn tượng."</p>
                            <div class="info-user">
                                <img src="" alt="avatar">
                                <div class="username">Trần Thanh Tú</div>
                                <div class="star"></div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-comments-slide">
                            <img src="img/icon/comment-icon.svg" alt="">
                            <p>"Studio này có dịch vụ rất chuyên nghiệp, đội ngũ nhiếp ảnh gia sáng tạo và tận tâm. Họ
                                luôn lắng nghe và mang đến những bức ảnh đẹp, ấn tượng."</p>
                            <div class="info-user">
                                <img src="" alt="avatar">
                                <div class="username">Trần Thanh Tú</div>
                                <div class="star"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
    </div>

    <div class="container">
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