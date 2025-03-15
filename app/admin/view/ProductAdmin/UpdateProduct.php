<?php
require_once '../../app/admin/modal/ProductModal.php';
$productModal = new ProductModal();

if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);

    // Truy vấn sản phẩm từ cơ sở dữ liệu theo ID
    $product = $productModal->getProductById($product_id);
    if ($product) {
        $productName = htmlspecialchars($product['name']);
        $price = number_format($product['price'], 0, ',', '.') . 'đ / ngày';
        $category = htmlspecialchars($product['category']);
        $description1 = htmlspecialchars($product['description']);
        $image = htmlspecialchars($product['image']);
        $location = htmlspecialchars($product['location']);
        $availability = htmlspecialchars($product['availability']);
    } else {
        echo "Product not found.";
    }
}

// Kiểm tra nếu form được submit để cập nhật sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSaveChanges'])) {
    // Lấy dữ liệu từ form
    $productName = htmlspecialchars($_POST['productName']);
    $price = floatval($_POST['price']);
    $category = htmlspecialchars($_POST['productCategory']);
    $description = htmlspecialchars($_POST['productDescription']);
    $location = htmlspecialchars($_POST['location']);
    $availability = $_POST['availability'] === 'available' ? 'available' : 'not_available';

    // Xử lý ảnh mới nếu có
    if ($_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $image = uploadImage($_FILES['product_image']);
    }

    // Dữ liệu sản phẩm để cập nhật
    $productData = [
        'product_id' => $product_id,
        'name' => $productName,
        'price' => $price,
        'category' => $category,
        'description' => $description,
        'location' => $location,
        'availability' => $availability,
        'image' => $image,
    ];

    // Cập nhật sản phẩm vào cơ sở dữ liệu
    $result = $productModal->editProduct($productData);
    if ($result) {
        header("Location: index.php?action=product"); // Điều hướng về danh sách sản phẩm
        exit;
    } else {
        echo "Error updating product.";
    }
}

function uploadImage($file)
{
    $targetDir = "../../app/admin/lib/upload/";
    $fileName = uniqid() . "_" . basename($file['name']);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        return $fileName;
    }
    return null;
}
?>

<body>
    <section class="edit-product-container" id="editProductForm">
        <div class="product-edit-wrapper">
            <header class="header-section-edit">
                <div class="title-group">
                    <h1 class="edit-title">Edit</h1>
                    <h2 class="image-title">Image</h2>
                </div>
            </header>

            <form method="POST" enctype="multipart/form-data">
                <main class="main-content-detail">
                    <div class="content-grid">
                        <div class="image-column">
                            <div class="image-container">
                                <img src="../../app/admin/lib/upload/<?php echo $image; ?>" alt="Main product image"
                                    class="main-image" />
                            </div>
                        </div>
                        <div class="image-group">
                            <label for="imageInput" class="image-label">Image</label>
                            <input type="file" id="imageInput" name="product_image" />
                        </div>
                    </div>
                    <div class="price-group">
                        <label for="price" class="price-label">Price</label>
                        <div class="price-input-wrapper">
                            <input type="text" id="price" class="price-input" name="price"
                                value="<?php echo $product['price']; ?>" />
                            <span class="price-unit">đ / ngày</span>
                        </div>
                    </div>
                    <div class="add-product-input-wrapper">
                        <label for="productCategory" class="add-product-input-label">Category</label>
                        <div class="add-product-select-wrapper">
                            <select id="productCategory" name="productCategory" class="add-product-select" required>
                                <option value="">Select Type</option>
                                <option value="studio" <?php echo ($category == 'studio') ? 'selected' : ''; ?>>Studio
                                </option>
                                <option value="hotel" <?php echo ($category == 'hotel') ? 'selected' : ''; ?>>Hotel
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="name-group">
                        <label for="productName" class="name-label">Product Name</label>
                        <input type="text" id="productName" name="productName" class="name-input"
                            value="<?php echo $productName; ?>" />
                    </div>
                </main>

                <section class="description-section">
                    <h2 class="description-title"><?php echo $productName; ?></h2>
                    <article>
                        <h3 class="section-title">Description Product</h3>
                        <textarea id="section-text-1" name="productDescription"
                            class="section-text"><?php echo $description1; ?></textarea>
                    </article>
                    <article>
                        <h3 class="section-title">Location</h3>
                        <textarea id="section-text-1" name="location"
                            class="section-text"><?php echo $location; ?></textarea>
                    </article>
                    <article>
                        <div class="add-product-section">
                            <h3 class="add-product-section-heading">Availability</h3>
                            <select id="availability" name="availability" class="add-product-select" required>
                                <option value="available" <?php echo ($availability == 'available') ? 'selected' : ''; ?>>
                                    Available</option>
                                <option value="not_available" <?php echo ($availability == 'not_available') ? 'selected' : ''; ?>>Not Available</option>
                            </select>
                        </div>
                    </article>
                </section>
                <button type="submit" class="save-button" name="btnSaveChanges">Save Changes</button>
            </form>
        </div>
    </section>
</body>