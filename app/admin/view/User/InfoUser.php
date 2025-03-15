<?php

?>

<body>
    <div class="container">
        <main class="main-content">
            <header class="header-section">
                <div>
                    <h1 class="page-title">User Management</h1>
                    <p class="page-subtitle">Manage customers</p>
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
                            <span class="tab-text">List User</span>
                        </a>
                        <a href="#upcoming" class="tab-link">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text">Admin List</span>
                        </a>
                        <a href="#upcoming" class="tab-link">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text"></span>
                        </a>
                        <a href="#upcoming" class="tab-link">
                            <div class="active-indicator" aria-hidden="true"></div>
                            <span class="tab-text"></span>
                        </a>
                    </div>
                </div>
            </nav>
            <section class="booking-section" aria-label="Booking List">
                <div class="table-container">
                    <table class="booking-table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">User name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Role</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming the controller method 'listUsers' returns an array of users
                            $userController = new UserController();
                            $users = $userController->listUsers();

                            // Check if users were returned
                            if (count($users) > 0) {
                                foreach ($users as $user) {
                                    echo "<tr>";
                                    echo "<td><img class='list-product-img' src='lib/upload/faces/" . $user['image'] . "' alt='User Image'></td>";
                                    echo "<td class='booking-name-studio'>" . $user['name'] . "</td>";
                                    echo "<td class='booking-name-studio'>" . $user['email'] . "</td>";
                                    echo "<td class='booking-name-studio'>" . $user['phone'] . "</td>";
                                    echo "<td class='booking-name-studio'>" . $user['registration_date'] . "</td>";
                                    echo "<td class='booking-name-studio'>" . $user['user_type'] . "</td>";
                                    echo "<td><a href='?action=edit-info-user&id=" . $user['user_id'] . "' class='view-btn' aria-label='Chỉnh sửa người dùng'>Edit</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No users found</td></tr>";
                            }
                            ?>

                            <!-- 
                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Nguyen Phuong</td>
                                <td class="booking-name-studio">dsun.agency@gmail.com</td>
                                <td class="booking-name-studio">0912345678</td>
                                <td class="booking-name-studio">12/09/2000</td>
                                <td class="booking-name-studio">User</td>
                                <td>
                                    <a href="?action=edit-info-user" class="view-btn" aria-label="View details">Edit</a>
                                </td>
                            </tr>
                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Nguyen Phuong</td>
                                <td class="booking-name-studio">dsun.agency@gmail.com</td>
                                <td class="booking-name-studio">0912345678</td>
                                <td class="booking-name-studio">12/09/2000</td>
                                <td class="booking-name-studio">User</td>

                                <td>
                                    <a href="?action=edit-info-user" class="view-btn" aria-label="View details">Edit</a>
                                </td>
                            </tr>


                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Nguyen Phuong</td>
                                <td class="booking-name-studio">dsun.agency@gmail.com</td>
                                <td class="booking-name-studio">0912345678</td>
                                <td class="booking-name-studio">12/09/2000</td>
                                <td class="booking-name-studio">User</td>

                                <td>
                                    <a href="?action=edit-info-user" class="view-btn" aria-label="View details">Edit</a>
                                </td>
                            </tr>


                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Nguyen Phuong</td>
                                <td class="booking-name-studio">dsun.agency@gmail.com</td>
                                <td class="booking-name-studio">0912345678</td>
                                <td class="booking-name-studio">12/09/2000</td>
                                <td class="booking-name-studio">User</td>

                                <td>
                                    <a href="?action=edit-info-user" class="view-btn" aria-label="View details">Edit</a>
                                </td>
                            </tr>


                            <tr>
                                <td><img class="list-product-img" src="../lib/img/img_product.png" alt=""></td>
                                <td class="booking-name-studio">Nguyen Phuong</td>
                                <td class="booking-name-studio">dsun.agency@gmail.com</td>
                                <td class="booking-name-studio">0912345678</td>
                                <td class="booking-name-studio">12/09/2000</td>
                                <td class="booking-name-studio">User</td> -->

                            <!-- <td>
                                    <a href="?action=edit-info-user" class="view-btn" aria-label="View details">Edit</a>
                                </td> -->
                            </tr>




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
    // Hàm mở popup
    function openPopup() {
        document.getElementById('popup').style.display = 'flex';
    }

    // Hàm đóng popup
    function closePopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>

</html>