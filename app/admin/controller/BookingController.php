<?php

class BookingController
{
    /**
     * Hiển thị danh sách các booking
     */
    public function listBookings()
    {
        // Gọi model để lấy danh sách các booking
        require_once MODEL_PATH . 'BookingModel.php';
        $bookingModel = new BookingModel();
        $bookings = $bookingModel->getAllBookings();

        // Gọi view để hiển thị danh sách các booking
        require_once VIEW_PATH . 'BookingAdmin/Booking.php';
    }

    /**
     * Hiển thị chi tiết booking
     */
    public function viewBooking($id)
    {
        // Gọi model để lấy chi tiết booking
        require_once MODEL_PATH . 'BookingModel.php';
        $bookingModel = new BookingModel();
        $booking = $bookingModel->getBookingById($id);

        // Gọi view để hiển thị chi tiết booking
        require_once VIEW_PATH . 'BookingAdmin/BookingDetail.php';
    }

    /**
     * Thêm mới booking
     */
    public function addBookingForm()
    {
        // Gọi view form để thêm mới booking
        require_once VIEW_PATH . 'BookingAdmin/BookingAdd.php';
    }

    /**
     * Xử lý thêm mới booking
     */
    public function addBooking()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerName = $_POST['customer_name'] ?? '';
            $bookingDate = $_POST['booking_date'] ?? '';
            $roomType = $_POST['room_type'] ?? '';
            $status = $_POST['status'] ?? 'pending';
            $paymentStatus = $_POST['payment_status'] ?? 'unpaid';

            // Gọi model để thêm booking mới
            require_once MODEL_PATH . 'BookingModel.php';
            $bookingModel = new BookingModel();
            $result = $bookingModel->insertBooking($customerName, $bookingDate, $roomType, $status, $paymentStatus);

            if ($result) {
                header('Location: index.php?action=booking');
                exit();
            } else {
                echo "Có lỗi xảy ra khi thêm booking!";
            }
        }
    }

    /**
     * Hiển thị form chỉnh sửa booking
     */
    public function editBookingForm($id)
    {
        // Gọi model để lấy dữ liệu booking theo ID
        require_once MODEL_PATH . 'BookingModel.php';
        $bookingModel = new BookingModel();
        $booking = $bookingModel->getBookingById($id);

        // Gọi view form để chỉnh sửa booking
        require_once VIEW_PATH . 'BookingAdmin/BookingEdit.php';
    }

    /**
     * Xử lý chỉnh sửa booking
     */
    public function editBooking()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? 0;
            $customerName = $_POST['customer_name'] ?? '';
            $bookingDate = $_POST['booking_date'] ?? '';
            $roomType = $_POST['room_type'] ?? '';
            $status = $_POST['status'] ?? 'pending';
            $paymentStatus = $_POST['payment_status'] ?? 'unpaid';

            // Gọi model để cập nhật booking
            require_once MODEL_PATH . 'BookingModel.php';
            $bookingModel = new BookingModel();
            $result = $bookingModel->updateBooking($id, $customerName, $bookingDate, $roomType, $status, $paymentStatus);

            if ($result) {
                header('Location: index.php?action=booking');
                exit();
            } else {
                echo "Có lỗi xảy ra khi cập nhật booking!";
            }
        }
    }

    /**
     * Xóa booking
     */
    public function deleteBooking($id)
    {
        // Gọi model để xóa booking theo ID
        require_once MODEL_PATH . 'BookingModel.php';
        $bookingModel = new BookingModel();
        $result = $bookingModel->deleteBooking($id);

        if ($result) {
            header('Location: index.php?action=booking');
            exit();
        } else {
            echo "Có lỗi xảy ra khi xóa booking!";
        }
    }
}
