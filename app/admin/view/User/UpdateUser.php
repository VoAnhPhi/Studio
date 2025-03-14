<body>
    <section class="edit-user">
        <div class="edit-user__wrapper">
            <header class="edit-user__header">
                <h1 class="edit-user__title">Edit User</h1>
                <button class="edit-user__delete-btn">Delete Account</button>
            </header>

            <h2 class="edit-user__section-title">Personal Information</h2>

            <div class="add-product-image-container">

                <div class="add-product-upload-container">
                    <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bbb44c710fdd4bcb04741d5dae8f291968b888a3b220974a1022a0961a6c75af?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                        alt="Upload icon" width="34" height="34" />
                </div>
                <button type="button" class="add-product-upload-btn" aria-label="Upload main product image">Upload
                    Avatar</button>
                <input type="file" id="mainImage" class="visually-hidden" accept="image/*" />
            </div>


            <div class="edit-user__info-grid">
                <section class="edit-user__personal-info">
                    <label class="edit-user__field-label">User name</label>
                    <input type="text" class="edit-user__field" value="Nguyen Phuong" />

                    <label class="edit-user__field-label">First name</label>
                    <input type="text" class="edit-user__field" value="Nguyen" />

                    <label class="edit-user__field-label">Last name</label>
                    <input type="text" class="edit-user__field" value="Phuong" />

                    <label class="edit-user__field-label">DOB</label>
                    <input type="date" class="edit-user__field" value="2000-09-12" />

                    <label class="edit-user__field-label">Email</label>
                    <input type="email" class="edit-user__field" value="dsun.agency@gmail.com" />

                    <label class="edit-user__field-label">Phone Number</label>
                    <input type="tel" class="edit-user__field" value="0912345678" />
                </section>

                <section class="edit-user__payment-info">
                    <h3 class="edit-user__payment-title">Payment Information</h3>
                    <label class="edit-user__field-label">Account holder's name</label>
                    <input type="text" class="edit-user__field" value="Nguyen Phuong" />

                    <label class="edit-user__field-label">Account number</label>
                    <input type="text" class="edit-user__field" value="12730374012" />

                    <label class="edit-user__field-label">SWIFT code</label>
                    <input type="text" class="edit-user__field" value="187" />

                    <label class="edit-user__field-label">Bank</label>
                    <input type="text" class="edit-user__field" value="MB Bank" />

                    <label class="edit-user__field-label">Role</label>
                    <div class="edit-user__role-select">
                        <span>User</span>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1b0cffb6d7d35cf0f3f1a9649f4e03028837ca03a0675c35279fe5142e806dad?placeholderIfAbsent=true&apiKey=c01b0b1f77f44db1a01eba6bb534c16f"
                            alt="Select role" class="edit-user__select-icon" />
                    </div>
                </section>
            </div>
        </div>
    </section>
</body>

</html>