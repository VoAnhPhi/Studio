<body>
    <section class="add-product-container">
        <div class="add-product-wrapper">
            <header class="add-product-header">
                <h1 class="add-product-title">Add News</h1>
                <button type="button" class="add-product-save-btn" aria-label="Save product">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ace380a4e6c699359f5dda7129c4479965ce48f6f711bc8bae14781f41cb0093?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                        alt="" width="18" height="18" />
                    Save
                </button>
            </header>

            <div class="add-product-image-section">
                <div class="add-product-image-container">
                    <label for="mainImage" class="add-product-image-label">Image</label>
                    <div class="add-product-upload-container">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bbb44c710fdd4bcb04741d5dae8f291968b888a3b220974a1022a0961a6c75af?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="Upload icon" width="34" height="34" />
                    </div>
                    <button type="button" class="add-product-upload-btn" aria-label="Upload main product image">Upload
                        Image</button>
                    <input type="file" id="mainImage" class="visually-hidden" accept="image/*" />
                </div>

                <div class="add-product-image-container">
                    <label for="additionalImages" class="add-product-image-label">Additional product images</label>
                    <div class="add-product-upload-container">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bbb44c710fdd4bcb04741d5dae8f291968b888a3b220974a1022a0961a6c75af?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="Upload icon" width="34" height="34" />
                    </div>
                    <button type="button" class="add-product-upload-btn"
                        aria-label="Upload additional product images">Upload Image</button>
                    <input type="file" id="additionalImages" class="visually-hidden" accept="image/*" multiple />
                </div>
            </div>

            <form class="add-product-form">
                <div class="add-product-input-wrapper">
                    <label for="productPrice" class="add-product-input-label">Price</label>
                    <input type="number" id="productPrice" class="add-product-input" placeholder="/ ngày" required />
                </div>

                <div class="add-product-input-wrapper">
                    <label for="productCategory" class="add-product-input-label">Studio</label>
                    <div class="add-product-select-wrapper">
                        <select id="productCategory" class="add-product-select" required>
                            <option value="">Select Type</option>
                            <option value="type1">Type 1</option>
                            <option value="type2">Type 2</option>
                        </select>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5ce3312dee92806ec00e2d79ae205b9c41db31566e3ccaf3cc9023b17706835e?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="14" height="7" aria-hidden="true" />
                    </div>
                </div>

                <div class="add-product-input-wrapper">
                    <label for="productName" class="add-product-input-label">Title</label>
                    <input type="text" id="productName" class="add-product-input" placeholder="VD: Dịch vụ thuê phòng"
                        required />
                </div>
            </form>

            <h2 class="add-product-description-title">News Description</h2>

            <div class="add-product-editor">
                <div class="add-product-toolbar" role="toolbar" aria-label="Text formatting options">
                    <button type="button" class="add-product-toolbar-btn" aria-label="Bold">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/c3078428681a10de92ae5d1793661989108ca8ad3e2f907893248e310df7f1f6?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="add-product-toolbar-btn" aria-label="Italic">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/09d3f457b158de0160735371da2184fb934717d4e9293711913d71c8c15a63a1?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="add-product-toolbar-btn" aria-label="Underline">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8ee3bcdd1de96ed037ee9d8c5cc85ca4021506c67b4dbf67dabc8c90a70b55cf?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="add-product-toolbar-btn" aria-label="List">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a2ab13543fa128423678e877f05f61c462c84b0601ce2140332495213fe8e6ac?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="add-product-toolbar-btn" aria-label="Link">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/12bc741d80f0905fc17b9a064d411fbbf580736f145632f35575d02705ce102b?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="add-product-toolbar-btn" aria-label="Image">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/25659b97ce92c0c5303911e350aa4b6926b788221bc67f40354893f530042d9f?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                </div>

                <div class="add-product-section">
                    <div class="add-product-content">
                        <label for="section1Title" class="add-product-content-label">Title:</label>
                        <input type="text" id="section1Title" class="add-product-content-input" required />
                        <label for="section1Desc" class="add-product-content-label">Description:</label>
                        <textarea id="section1Desc" class="add-product-content-textarea" required></textarea>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>

</html>