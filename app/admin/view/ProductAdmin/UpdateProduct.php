<body>
    <!-- Button to trigger showing the edit form -->

    <!-- The product edit form container, initially hidden -->
    <section class="edit-product-container" id="editProductForm">
        <div class="product-edit-wrapper">
            <header class="header-section-edit">
                <div class="title-group">
                    <h1 class="edit-title">Edit</h1>
                    <h2 class="image-title">Image</h2>
                </div>
                <p class="additional-images-text">Additional product images</p>
                <button class="save-button">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/fc527d811cb6956af671b2c27e1b02c5a96c46f91851902c0d72f14610e185fa?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                        alt="Save icon" class="save-icon" />
                    <span>Save Changes</span>
                </button>
            </header>

            <main class="main-content-detail">
                <div class="content-grid">
                    <div class="image-column">
                        <div class="image-container">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/50f826197073c5413d6973443a2a6b6fbced8f2012a2d82a4f630c1a3d72d5a4?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                alt="Main product image" class="main-image" />
                            <p class="delete-banner-text">delete current banner image.</p>
                        </div>
                    </div>

                    <div class="details-column">
                        <div class="details-wrapper">
                            <div class="gallery-grid">
                                <div class="gallery-row">
                                    <div class="gallery-item">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5683d4fca3756eedc9bb8c9642fad4b2edd7ad6b6b73896cd4c76e740a053ce8?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                            alt="Product gallery image 1" class="gallery-image" />
                                    </div>
                                    <div class="gallery-item">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1bdc423a976261d220a53abaf746e9998ccae73f6c5b78be33596250705cfb1d?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                            alt="Product gallery image 2" class="gallery-image" />
                                    </div>
                                    <div class="gallery-item">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/4f74e5aa0a4495907bccacbcc4bec7e921d697755faad0f50b5ff6ea47ff89d8?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                            alt="Product gallery image 3" class="gallery-image" />
                                    </div>
                                    <div class="gallery-item">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/11eadd221d2ded8a8605ec197673690a91b01ae1ea66f925e470e527d60af8d9?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                            alt="Product gallery image 4" class="gallery-image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="form-group">
                    <div class="price-group">
                        <label for="price" class="price-label">Price</label>
                        <input type="text" id="price" class="price-input" value="1.250.000đ / ngày" />
                    </div>

                    <div class="category-group">
                        <label for="category" class="category-label">Category</label>
                        <div class="category-select">
                            <span>Select Type</span>
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5ce3312dee92806ec00e2d79ae205b9c41db31566e3ccaf3cc9023b17706835e?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                alt="Select dropdown icon" class="select-icon" />
                        </div>
                    </div>

                    <div class="name-group">
                        <label for="productName" class="name-label">Product Name</label>
                        <input type="text" id="productName" class="name-input" value="Four Seasons Studio" />
                    </div>
                </form>
            </main>

            <section class="description-section">
                <h2 class="description-title">Product Description</h2>
                <article>
                    <h3 class="section-title">Section 1</h3>
                    <input type="text" id="productName" class="section-heading"
                        value="Four Seasons Studio là lựa chọn lý tưởng cho concept ý tưởng đầy sáng tạo" />
                    <textarea id="section-text-1" class="section-text">
Chụp ảnh tại căn hộ studio mang lại nhiều lợi thế, đặc biệt là ánh sáng thiên nhiên từ cửa sổ lớn. Không gian này cho phép bạn dễ dàng thay đổi phông nền và bố trí, giúp tạo ra những bức ảnh độc đáo và sáng tạo. Các thiết bị hiện đại và nội thất tinh tế sẽ nâng cao chất lượng cho từng buổi chụp, tạo nên những khoảnh khắc đáng nhớ cho khách hàng.</textarea>
                </article>
                <article>
                    <h3 class="section-title">Section 2</h3>
                    <input type="text" id="productName" class="section-heading"
                        value="Căn phòng hoàn hảo cho mọi concept chụp ảnh." />
                    <textarea id="section-text-1" class="section-text">
Căn hộ studio là địa điểm lý tưởng cho việc quay video nhờ ánh sáng tự nhiê và không gian yên tĩnh. Với bối cảnh linh hoạt, bạn có thể dễ dàng thay đổi phong cách và thiết lập để phù hợp với từng loại nội dung. Các góc quay đa dạng sẽ giúp bạn tạo ra những video hấp dẫn và sáng tạo, thu hút sự chú ý của khán giả.</textarea>
                </article>
                <article>
                    <h3 class="section-title">Section 3</h3>
                    <input type="text" id="productName" class="section-heading" value="Four Seasons Studio " />
                    <textarea id="section-text-1" class="section-text">
"Không chỉ là không gian sống, Four Seasons Studio còn mang lại nguồn cảm hứng bất tận"</textarea>
                    <textarea id="section-text-1" class="section-text">
Chào mừng đến với căn phòng đầy cảm hứng, nơi lý tưởng cho chụp ảnh và quay video! Với ánh sáng tự nhiên và nhiều góc nhìn hấp dẫn, không gian này mang đến những bức ảnh ấn tượng và video chất lượng. Hãy khám phá những bối cảnh linh hoạt giúp bạn sáng tạo không giới hạn!</textarea>
                </article>
            </section>

            <button class="delete-button" aria-label="Delete product">
                Delete Product
            </button>
        </div>
    </section>
</body>

</html>