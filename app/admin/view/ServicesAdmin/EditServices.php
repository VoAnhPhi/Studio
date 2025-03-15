<?php
require_once '../../app/admin/modal/ServiceModel.php';
$serviceModal = new ServiceModal();

if (isset($_GET['service_id'])) {
    $service_id = intval($_GET['service_id']);

    $service = $serviceModal->getServiceById($service_id);
    if ($service) {
        $serviceName = htmlspecialchars($service['name']);
        $price = number_format($service['price'], 0, ',', '.') . 'đ / ngày';
        $date = htmlspecialchars($_POST['date']);
        $studio = htmlspecialchars($_POST['studio']);
        $description1 = htmlspecialchars($service['description']);
        $image = htmlspecialchars($service['image']);
        $created_at = htmlspecialchars($_POST['created_at']);
        $availability = htmlspecialchars($service['availability']);
    } else {
        echo "Service not found.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnSaveChanges'])) {
    $serviceName = htmlspecialchars($_POST['serviceName']);
    $price = floatval($_POST['price']);
    $date = htmlspecialchars($_POST['date']);
    $studio = htmlspecialchars($_POST['studio']);
    $description = htmlspecialchars($_POST['serviceDescription']);
    $created_at = htmlspecialchars($_POST['created_at']);
    $availability = $_POST['availability'] === 'available' ? 'available' : 'not_available';

    if ($_FILES['service_image']['error'] === UPLOAD_ERR_OK) {
        $image = uploadImage($_FILES['service_image']);
    }

    $serviceData = [
        'service_id' => $service_id,
        'name' => $serviceName,
        'price' => $price,
        'date' => $date,
        'studio' => $studio,
        'description' => $description,
        'created_at' => $created_at,
        'availability' => $availability,
        'image' => $image,
    ];

    $result = $serviceModal->editService($serviceData);
    if ($result) {
        header("Location: index.php?action=service"); 
        exit;
    } else {
        echo "Error updating service.";
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
    <section class="edit-service-container" id="editServiceForm">
        <div class="edit-service-wrapper">
            <header class="edit-service-header">
                <h1 class="edit-service-title">Edit Service</h1>
                <button type="button" class="edit-service-save-btn" aria-label="Save product">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/ace380a4e6c699359f5dda7129c4479965ce48f6f711bc8bae14781f41cb0093?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                        alt="" width="18" height="18" />
                    Save
                </button>
            </header>

            <div class="edit-service-image-section">
                <div class="edit-service-image-container">
                    <label for="mainImage" class="edit-service-image-label">Description image</label>
                    <div class="edit-service-upload-container">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bbb44c710fdd4bcb04741d5dae8f291968b888a3b220974a1022a0961a6c75af?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="Upload icon" width="34" height="34" />
                    </div>

                </div>

                <div class="edit-service-image-container">
                    <label for="additionalImages" class="edit-service-image-label">Additional edit images</label>
                    <div class="edit-service-upload-container">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bbb44c710fdd4bcb04741d5dae8f291968b888a3b220974a1022a0961a6c75af?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="Upload icon" width="34" height="34" />
                    </div>
                    <button type="button" class="edit-service-upload-btn" ar
                        ia-label="Upload additional product images">Upload Avatar</button>
                    <input type="file" id="additionalImages" class="visually-hidden" accept="image/*" multiple />
                </div>
            </div>

            <form class="edit-service-form" method="POST" enctype="multipart/form-data">
                <div class="edit-service-input-wrapper">
                    <label for="servicePrice" class="edit-service-input-label">Price</label>
                    <input type="number" id="servicePrice" name="price" class="edit-service-input" placeholder="/ ngày" required 
                    value="<?php echo $service['price']; ?>"/>
                </div>

                <div class="edit-service-input-wrapper">
                    <label for="serviceStudio" class="edit-service-input-label">Studio</label>
                    <div class="edit-service-select-wrapper">
                    <select id="serviceStudio" name="studio" class="edit-service-select" required>
                        <option value="">Select Type</option>
                        <option value="type1" <?php echo $service == 'type1' ? 'selected' : ''; ?>>Type 1</option>
                        <option value="type2" <?php echo $service == 'type2' ? 'selected' : ''; ?>>Type 2</option>
                    </select>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/5ce3312dee92806ec00e2d79ae205b9c41db31566e3ccaf3cc9023b17706835e?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="14" height="7" aria-hidden="true" />
                    </div>
                </div>

                <div class="edit-service-input-wrapper">
                    <label for="serviceName" class="edit-service-input-label">Service Name</label>
                    <input type="text" id="serviceName" name="serviceName" class="edit-service-input" placeholder="VD: Dịch vụ chụp ảnh"
                        required value="<?php echo $serviceName; ?>" />
                </div>
                <button type="submit" name="btnSaveChanges" class="edit-service-save-btn" aria-label="Save changes">
                        Save Changes
                </button>

            </form>

            <h2 class="edit-service-description-title">Service Description</h2>

            <div class="edit-service-editor">
                <div class="edit-service-toolbar" role="toolbar" aria-label="Text formatting options">
                    <button type="button" class="edit-service-toolbar-btn" aria-label="Bold">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/c3078428681a10de92ae5d1793661989108ca8ad3e2f907893248e310df7f1f6?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="edit-service-toolbar-btn" aria-label="Italic">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/09d3f457b158de0160735371da2184fb934717d4e9293711913d71c8c15a63a1?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="edit-service-toolbar-btn" aria-label="Underline">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/8ee3bcdd1de96ed037ee9d8c5cc85ca4021506c67b4dbf67dabc8c90a70b55cf?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="edit-service-toolbar-btn" aria-label="List">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a2ab13543fa128423678e877f05f61c462c84b0601ce2140332495213fe8e6ac?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="edit-service-toolbar-btn" aria-label="Link">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/12bc741d80f0905fc17b9a064d411fbbf580736f145632f35575d02705ce102b?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                    <button type="button" class="edit-service-toolbar-btn" aria-label="Image">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/25659b97ce92c0c5303911e350aa4b6926b788221bc67f40354893f530042d9f?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="" width="24" height="24" />
                    </button>
                </div>

                <div class="edit-service-section">
                    <div class="edit-service-content">
                        <label for="section1Title" class="edit-service-content-label">Title:</label>
                        <input type="text" id="section1Title" class="edit-service-content-input" required />
                        <label for="section1Desc" class="edit-service-content-label">Description:</label>
                        <textarea id="section1Desc" class="edit-service-content-textarea" required></textarea>
                    </div>
                </div>
            </div>
    </section>
</body>

</html>