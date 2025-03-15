<?php
/**
 * Product Management Page
 * Handles listing, editing, and deleting products.
 */

require_once '../../app/admin/controller/ProductController.php';

$productController = new ProductController();
$products = $productController->listProducts();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnDeleteProduct'])) {
        $productController->deleteProduct(intval($_POST['product_id']));
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['editProductForm'])) {
        $productController->editProductForm(intval($_POST['product_id']));
        header('Location: UpdateProduct.php');
        exit;
    }
}
?>

<body>
    <div class="container">
        <main class="main-content">
            <header class="header-section">
                <div>
                    <h1 class="page-title">Product Dashboard</h1>
                    <p class="page-subtitle">View all status from the dashboard.</p>
                </div>
                <div class="user-profile">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8bb0745711ce6133076d46e9679fb39046eda8008659709e00d84e588f01f7b1?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                        alt="User Profile" class="profile-image">
                    <div class="profile-info">
                        <span class="profile-name">Nguyen Phuong</span>
                        <span class="profile-email">dsun.agency@gmail.com</span>
                    </div>
                </div>
            </header>

            <nav class="booking-nav">
                <div class="booking-container-product">
                    <div class="tab-group-product">
                        <a href="#booking-list" class="tab-link active">Product List</a>
                        <a href="?action=add-product">
                            <button class="add-product-btn">
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b633fdb76f5b691270eead81d21f22c6900577decef1c1f6a355bcc914dbc0e0"
                                    alt="Add" class="add-icon">
                                <span>Add New Product</span>
                            </button>
                        </a>
                    </div>
                </div>
            </nav>

            <section class="booking-section">
                <div class="table-container">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Location</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th colspan="2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                                <tr>
                                    <td colspan="8">No products found.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($product['product_id']) ?></td>
                                        <td><img src="lib/upload/<?= htmlspecialchars($product['image']) ?>"
                                                alt="<?= htmlspecialchars($product['name']) ?>" class="list-product-img"></td>
                                        <td><?= htmlspecialchars($product['name']) ?></td>
                                        <td><?= htmlspecialchars($product['location']) ?></td>
                                        <td><?= number_format($product['price'], 0, ',', '.') ?>đ /ngày</td>
                                        <td>
                                            <?= $product['availability'] === 'available' ? '<span class="status-completed">Available</span>' : '<span class="status-pending">Not Available</span>' ?>
                                        </td>
                                        <td>
                                            <form method="POST"
                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                                <input type="hidden" name="product_id"
                                                    value="<?= htmlspecialchars($product['product_id']) ?>">
                                                <button type="submit" name="btnDeleteProduct" class="view-btn-d">Delete</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form
                                                action="index.php?action=update-product&product_id=<?php echo $product['product_id']; ?>"
                                                method="POST">
                                                <input type="hidden" name="action" value="editProduct">
                                                <input type="hidden" name="product_id"
                                                    value="<?= htmlspecialchars($product['product_id']) ?>">

                                                <input type="hidden" name="productName"
                                                    value="<?= htmlspecialchars($product['name']) ?>" required>
                                                <input type="hidden" name="productPrice"
                                                    value="<?= htmlspecialchars($product['price']) ?>" required>
                                                <input type="hidden" name="productCategory"
                                                    value="<?= htmlspecialchars($product['category']) ?>" required>
                                                <textarea name="productDescription" style="display:none;"
                                                    required><?= htmlspecialchars($product['description']) ?></textarea>
                                                <input type="hidden" name="locationTitle"
                                                    value="<?= htmlspecialchars($product['location']) ?>" required>

                                                <input type="hidden" name="mainImage"
                                                    value="<?= htmlspecialchars($product['image']) ?>">

                                                <button type="submit" name="editProductForm" class="view-btn">Edit</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
</body>

</html>