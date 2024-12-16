<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ob_start();
require_once 'inc/database.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $note = isset($_POST['note']) ? trim($_POST['note']) : '';
    $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    $total_amount = 0;

    if (empty($cart)) {
        die('Giỏ hàng trống. Vui lòng thêm sản phẩm trước khi đặt hàng.');
    }

    foreach ($cart as $item) {
        $total_amount += $item->quantity * $item->price * 1000;
    }

    if (empty($name) || empty($address) || empty($phone)) {
        die('Vui lòng nhập đầy đủ thông tin bắt buộc.');
    }

    $db = Database::getConnection();
    if (!$db) {
        die('Không thể kết nối cơ sở dữ liệu.');
    }

    $db->begin_transaction();
    try {
        $stmt = $db->prepare("INSERT INTO `orders` (customer_name, customer_address, customer_phone, note, total_amount, created_at)  VALUES (?, ?, ?, ?, ?, NOW())");
        if (!$stmt) {
            throw new Exception('Lỗi chuẩn bị câu lệnh: ' . $db->error);
        }
        $stmt->bind_param('ssssd', $name, $address, $phone, $note, $total_amount);
        if (!$stmt->execute()) {
            throw new Exception('Lỗi thực thi câu lệnh: ' . $stmt->error);
        }

        $order_id = $stmt->insert_id;
        $stmt_item = $db->prepare("INSERT INTO `order_items` (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        if (!$stmt_item) {
            throw new Exception('Lỗi chuẩn bị câu lệnh (order_items): ' . $db->error);
        }
        foreach ($cart as $item) {
            $stmt_item->bind_param('iiid', $order_id, $item->id, $item->quantity, $item->price);
            if (!$stmt_item->execute()) {
                throw new Exception('Lỗi thực thi câu lệnh (order_items): ' . $stmt_item->error);
            }
        }

        unset($_SESSION['cart']);
        $db->commit();

        // Giao diện hiển thị thành công
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="vi">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Đặt hàng thành công</title>
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background: linear-gradient(135deg, #74ebd5, #acb6e5);
                    font-family: 'Poppins', sans-serif;
                }
                .success-container {
                    text-align: center;
                    background: #ffffff;
                    padding: 40px;
                    border-radius: 15px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                    width: 90%;
                    max-width: 400px;
                    animation: fadeIn 0.6s ease;
                }
                .success-icon {
                    font-size: 80px;
                    color: #4CAF50;
                    margin-bottom: 20px;
                    animation: pulse 1.5s infinite;
                }
                .message {
                    font-size: 24px;
                    font-weight: 600;
                    color: #333;
                    margin-bottom: 10px;
                }
                .details {
                    font-size: 16px;
                    color: #666;
                    margin-bottom: 20px;
                }
                .cart-items {
                    margin: 20px 0;
                    font-size: 14px;
                    text-align: left;
                    border-top: 1px solid #ddd;
                    padding-top: 10px;
                }
                .cart-items div {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 5px;
                }
                .btn {
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #4CAF50;
                    color: white;
                    text-decoration: none;
                    font-size: 16px;
                    border-radius: 8px;
                    transition: background-color 0.3s ease;
                }
                .btn:hover {
                    background-color: #45a049;
                }
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
                @keyframes pulse {
                    0%, 100% {
                        transform: scale(1);
                    }
                    50% {
                        transform: scale(1.1);
                    }
                }
            </style>
        </head>
        <body>
            <div class="success-container">
                <div class="success-icon">✔</div>
                <div class="message">Đặt hàng thành công!</div>
                <div class="details">Cảm ơn bạn đã đặt hàng. Chúng tôi sẽ liên hệ sớm nhất để xác nhận đơn hàng.</div>
                <div class="cart-items">
                    <h4>Chi tiết giỏ hàng:</h4>
HTML;
        foreach ($cart as $item) {
            echo '<div><span>' . htmlspecialchars($item->name) . ' x ' . $item->quantity . '</span><span>' . number_format($item->price * $item->quantity * 1000, 0, ',', '.') . ' VND</span></div>';
        }
        echo <<<HTML
                </div>
                <a href="index.php" class="btn">Quay lại trang chủ</a>
            </div>
        </body>
        </html>
        HTML;

    } catch (Exception $e) {
        $db->rollback();
        die('Có lỗi xảy ra trong quá trình xử lý đơn hàng: ' . $e->getMessage());
    } finally {
        $db->close();
    }
} else {
    die('Yêu cầu không hợp lệ.');
}
?>