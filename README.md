# Booking Studio

Hệ thống website đặt lịch/dịch vụ studio, gồm 2 phần:
- Client site cho người dùng cuối.
- Admin site để quản lý sản phẩm, tin tức, dịch vụ, người dùng.

Project được viết bằng PHP thuần theo hướng MVC đơn giản (Controller - Model - View), dùng MySQL và session cho xác thực.

## 1. Công nghệ sử dụng
- Backend: PHP thuần (không dùng framework)
- Frontend: HTML, CSS/SCSS, JavaScript
- Database: MySQL (PDO)
- Xác thực: PHP Session

## 2. Cấu trúc thư mục chính
```text
Studio/
  index.php                 # Entry point client site
  app/
	 controller/             # Controller phía client
	 modal/                  # Model phía client (đang đặt tên là modal)
	 view/                   # View phía client
	 admin/
		index.php             # Entry point admin site
		controller/           # Controller phía admin
		modal/                # Model phía admin
		view/                 # View phía admin
  public/                   # Asset tĩnh (css/js/fonts/scss)
  img/                      # Hình ảnh giao diện
  upload/                   # Nơi lưu file upload
```

## 3. Chức năng chính
### Client
- Trang chủ, danh sách sản phẩm/studio
- Xem chi tiết sản phẩm
- Xem tin tức và chi tiết tin
- Xem dịch vụ
- Đăng ký, đăng nhập, đăng xuất
- Quản lý tài khoản người dùng
- Checkout/trang thanh toán

### Admin
- Dashboard
- Quản lý sản phẩm
- Quản lý danh mục
- Quản lý tin tức
- Quản lý dịch vụ
- Quản lý booking
- Quản lý người dùng

## 4. Luồng route hiện tại
### Client
Routing tập trung ở `index.php` thông qua query `page`.

Ví dụ:
- `index.php?page=product_page`
- `index.php?page=detailProduct&id=1`
- `index.php?page=News_page`
- `index.php?page=service_page`
- `index.php?page=account_page`
- `index.php?page=loginModal`
- `index.php?page=registerModal`

### Admin
Routing tập trung ở `app/admin/index.php` thông qua query `action`.

Ví dụ:
- `app/admin/index.php?action=dashboard`
- `app/admin/index.php?action=product`
- `app/admin/index.php?action=add-product`
- `app/admin/index.php?action=news`
- `app/admin/index.php?action=services`
- `app/admin/index.php?action=user`

## 5. Hướng dẫn chạy local
## 5.1 Yêu cầu
- PHP 8.0+ (khuyến nghị 8.1+)
- MySQL/MariaDB
- Apache/Nginx (thường dùng XAMPP hoặc Laragon để chạy nhanh)

## 5.2 Cấu hình database
Thông tin kết nối DB hiện nằm trong:
- `app/modal/database.php`
- `app/admin/modal/database.php`

Giá trị mặc định trong source:
- host: `localhost`
- user: `root`
- password: rỗng
- dbname: `studio`

Tạo database tên `studio`, sau đó import dữ liệu SQL của bạn vào DB này.

Luu y: Repository hiện chưa có file `.sql` export schema/data, nên cần tự chuẩn bị script tạo bảng hoặc dump DB từ môi trường đang chạy.

## 5.3 Chạy project
Nếu dùng XAMPP:
1. Copy thư mục `Studio` vào `htdocs`.
2. Start Apache + MySQL.
3. Truy cập:
	- Client: `http://localhost/Studio/`
	- Admin: `http://localhost/Studio/app/admin/index.php?action=dashboard`

Nếu dùng PHP built-in server:
1. Mở terminal tại thư mục `Studio`.
2. Chạy lệnh:
	```bash
	php -S localhost:8000
	```
3. Truy cập:
	- Client: `http://localhost:8000/`
	- Admin: `http://localhost:8000/app/admin/index.php?action=dashboard`

## 6. Các bảng dữ liệu xuất hiện trong source
Project đang truy vấn một số bảng chính:
- `user`
- `products`
- `post`
- `orders`
- `category`
- `services`
- `service` (co the la bang cu)
- `studiocategory` (co the la bang cu)

Luu y: Có dấu hiệu không đồng nhất tên bảng giữa `service` và `services`. Nên chuẩn hóa khi bạn refactor hoặc dựng lại schema.

## 7. Ghi chú kỹ thuật
- Thư mục `modal` thực chất đóng vai trò Model.
- Có một số file debug/echo trực tiếp trong luồng đăng nhập, nên tắt hoặc xóa ở môi trường production.
- Chưa có `.env`, composer hoặc package manager; cấu hình đang hardcode trong source.

## 8. Định hướng cải tiến (khuyến nghị)
- Tách cấu hình DB ra file môi trường (`.env`).
- Chuẩn hóa naming: `Model` thay cho `Modal`.
- Bổ sung migration/schema SQL vào repository.
- Chuẩn hóa route và middleware kiểm tra quyền admin.
- Tách logic upload và validate input thành service riêng.

---

Nếu bạn muốn, mình có thể viết tiếp phiên bản README theo format chuyên nghiệp hơn cho GitHub (bao gồm ảnh demo, badges, roadmap, và checklist đóng góp).

