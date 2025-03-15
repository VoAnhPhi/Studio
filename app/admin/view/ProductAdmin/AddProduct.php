<body>
    <section class="add-product-container">
        <div class="add-product-wrapper">
            <header class="add-product-header">
                <h1 class="add-product-title">Add New Product</h1>
            </header>
            <form class="add-product-form" method="POST" action="index.php?action=add-product"
                enctype="multipart/form-data">
                <div class="add-product-image-section">
                    <div class="add-product-image-container">
                        <label for="mainImage" class="add-product-image-label">Image</label>
                        <div class="add-product-upload-container">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bbb44c710fdd4bcb04741d5dae8f291968b888a3b220974a1022a0961a6c75af?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                alt="Upload icon" width="34" height="34" />
                        </div>
                        <!-- <input type="file" id="mainImage" name="mainImage" class="visually-hidden" accept="image/*" /> -->
                        <input type="file" id="mainImage" name="mainImage" class="add-product-upload-btn"
                            class="visually-hidden" aria-label="Upload main product image" accept="image/*">
                        </input>
                    </div>

                    <div class="add-product-image-container">
                        <label for="additionalImages" class="add-product-image-label">Variants</label>
                        <div class="add-product-upload-container">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bbb44c710fdd4bcb04741d5dae8f291968b888a3b220974a1022a0961a6c75af?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                                alt="Upload icon" width="34" height="34" />
                        </div>
                        <button type="button" class="add-product-upload-btn"
                            aria-label="Upload additional product images">
                            Upload Image
                        </button>
                        <input type="file" id="additionalImages" name="additionalImages[]" class="visually-hidden"
                            accept="image/*" multiple />
                    </div>
                </div>
                <div class="add-product-input-wrapper">
                    <label for="productPrice" class="add-product-input-label">Price</label>
                    <input type="number" id="productPrice" name="productPrice" class="add-product-input"
                        placeholder="Price of Product" required />
                </div>
                <div class="add-product-input-wrapper">
                    <label for="productCategory" class="add-product-input-label">Category</label>
                    <div class="add-product-select-wrapper">
                        <select id="productCategory" name="productCategory" class="add-product-select" required>
                            <option value="">Select Type</option>
                            <option value="studio">Studio</option>
                            <option value="hotel">Hotel</option>
                        </select>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5ce3312dee92806ec00e2d79ae205b9c41db31566e3ccaf3cc9023b17706835e?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="14" height="7" aria-hidden="true" />
                    </div>
                </div>
                <div class="add-product-input-wrapper">
                    <label for="productName" class="add-product-input-label">Product Name</label>
                    <input type="text" id="productName" name="productName" class="add-product-input"
                        placeholder="VD: Four Seasons Studio" required />
                </div>
                <h2 class="add-product-description-title">Product Description</h2>
                <textarea name="productDescription" class="add-product-content-textarea"
                    placeholder="Enter product description here..." required></textarea>

                <h2 class="add-product-description-title">Additional Information</h2>
                <div class="add-product-section">
                    <h3 class="add-product-section-heading">Location</h3>
                    <div class="add-product-content">
                        <label for="section1Title" class="add-product-content-label">Title:</label>
                        <input type="text" id="section1Title" name="locationTitle" class="add-product-content-input"
                            required />
                        <label for="section1Desc" class="add-product-content-label">Description:</label>
                        <textarea id="section1Desc" name="locationDescription" class="add-product-content-textarea"
                            required></textarea>
                    </div>
                </div>
                <div class="add-product-section">
                    <h3 class="add-product-section-heading">Availability</h3>
                    <select id="availability" name="availability" class="add-product-select" required>
                        <option value="">Select Availability</option>
                        <option value="available">Available</option>
                        <option value="not_available">Not Available</option>
                    </select>
                </div>
                <button type="submit" name="btnAddProduct" class="add-product-save-btn" aria-label="Save product">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ace380a4e6c699359f5dda7129c4479965ce48f6f711bc8bae14781f41cb0093?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                        alt="" width="18" height="18" />
                    Save
                </button>
            </form>
        </div>
    </section>
</body>

</html>