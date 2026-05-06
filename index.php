<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Hướng dẫn tích hợp VNPAY</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f5f7fa;
                margin: 0;
                padding: 30px;
            }
            .container {
                max-width: 900px;
                margin: auto;
                background: white;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            h1 {
                text-align: center;
                color: #d32f2f;
            }
            h2 {
                color: #333;
                margin-top: 20px;
            }
            .box {
                padding: 10px 15px;
                border-left: 4px solid #d32f2f;
                background: #fafafa;
                margin-bottom: 15px;
            }
            .footer {
                text-align: center;
                margin-top: 30px;
                padding-top: 20px;
                border-top: 1px solid #ddd;
            }
            .footer img {
                width: 180px;
                margin-bottom: 10px;
            }
            .btn {
                display: inline-block;
                margin-top: 10px;
                padding: 10px 18px;
                background: #d32f2f;
                color: white;
                text-decoration: none;
                border-radius: 5px;
            }
            .btn:hover {
                background: #b71c1c;
            }
        </style>
    </head>
    <body>

        <div class="container">

            <!-- 1. MÔ TẢ -->
            <h1>Hướng dẫn tích hợp VNPAY</h1>

            <div class="box">
                <h2>WordPress (WooCommerce)</h2>
                <p>Cài plugin VNPAY → cấu hình thông tin → bật thanh toán.</p>
            </div>

            <div class="box">
                <h2>Drupal</h2>
                <p>Tạo payment gateway → gọi API VNPAY → xử lý return.</p>
            </div>

            <div class="box">
                <h2>Joomla</h2>
                <p>Cài extension ecommerce → viết plugin VNPAY → xử lý callback.</p>
            </div>

            <div class="box">
                <h2>OpenCart</h2>
                <p>Tạo extension payment → cấu hình admin → xử lý đơn hàng.</p>
            </div>

            <div class="box">
                <h2>PrestaShop</h2>
                <p>Tạo module payment → hook vào checkout → verify IPN.</p>
            </div>

            <div class="box">
                <h2>Magento</h2>
                <p>Tạo custom module → xử lý redirect & callback → validate bảo mật.</p>
            </div>

            <!-- 2. LOGO + LINK DEMO -->
            <div class="footer">
                <img src="https://sandbox.vnpayment.vn/paymentv2/images/logo.png" alt="VNPAY Logo">

                <p><strong>Demo tích hợp VNPAY Sandbox</strong></p>

                <a href="getlink.php" class="btn">Đi tới trang demo →</a>
            </div>

        </div>

    </body>
</html>