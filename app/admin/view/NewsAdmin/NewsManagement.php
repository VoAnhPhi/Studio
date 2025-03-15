<?php
$newsController = new NewsController();
$news = $newsController->listNews();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btnDeleteNews'])) {
        $newsController->deleteNews(intval($_POST['post_id']));
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['editNewsForm'])) {
        $newsController->editNewsForm(intval($_POST['post_id']));
        header('Location: NewsUpdate.php');
        exit;
    }
}


?>

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
                        <tbody>
                            <?php if (empty($news)): ?>
                                <tr>
                                    <td colspan="6">Không có bài viết nào</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($news as $post): ?>
                                    <tr>
                                        <td><img class="list-product-img" src="../../app/admin/lib/upload/<?= htmlspecialchars($post['image']) ?>" alt=""></td>
                                        <td class="booking-name-studio"><?= htmlspecialchars($post['views'] ?? 0) ?></td>
                                        <td class="booking-name-studio"><?= htmlspecialchars($post['title']) ?></td>
                                        <td class="booking-name-studio"><?= htmlspecialchars($post['status']) ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($post['published_date'])) ?></td>
                                        <td>
                                            <!-- <form action="index.php?action=update-news&post_id=<?= $post['post_id'] ?>" method="POST">
                                                <input type="hidden" name="image" value="<?= htmlspecialchars($post['image']) ?>" required>
                                                <input type="hidden" name="views" value="<?= htmlspecialchars($post['views']) ?>" required>
                                                <input type="hidden" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
                                                <input type="hidden" name="status" value="<?= htmlspecialchars($post['status']) ?>" required>
                                                <input type="hidden" name="published_date" value="<?= htmlspecialchars($post['published_date']) ?>" required>
                                                <button type="submit" name="editNewsForm" class="view-btn">Edit</button>
                                            </form> -->
                                            <form method="POST"
                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                                <input type="hidden" name="post_id"
                                                    value="<?= htmlspecialchars($post['post_id']) ?>">
                                                <button type="submit" name="btnDeleteNews" class="view-btn-d">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
    function openPopup() {
        document.getElementById('popup').style.display = 'flex';
    }

    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</html>