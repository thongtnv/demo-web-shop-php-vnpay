<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Kết quả VNPAY</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                background: linear-gradient(135deg, #f5f7fa, #e9eef5);
                display: flex;
                justify-content: center;
                padding: 40px;
            }

            .card {
                width: 100%;
                max-width: 900px;
                background: #fff;
                border-radius: 14px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.08);
                overflow: hidden;
            }

            .header {
                background: linear-gradient(90deg, #d32f2f, #b71c1c);
                color: white;
                padding: 20px;
                text-align: center;
            }

            .header h1 {
                margin: 0;
                font-size: 22px;
            }

            .content {
                padding: 25px;
            }

            .section {
                margin-bottom: 22px;
            }

            .label {
                font-weight: bold;
                margin-bottom: 10px;
                display: block;
                color: #444;
            }

            .box {
                background: #f7f9fc;
                border: 1px solid #e3e8ef;
                border-radius: 10px;
                padding: 15px;
                word-break: break-all;
                font-size: 13px;
                color: #333;
            }

            .actions {
                margin-top: 12px;
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
            }

            .btn {
                display: inline-block;
                padding: 12px 18px;
                border-radius: 8px;
                text-decoration: none;
                color: white;
                font-weight: bold;
                transition: 0.2s;
            }

            .btn-primary {
                background: #d32f2f;
            }
            .btn-primary:hover {
                background: #b71c1c;
            }

            .btn-secondary {
                background: #1976d2;
            }
            .btn-secondary:hover {
                background: #125aa0;
            }

            /* TEST CARD */
            .card-test {
                border-radius: 10px;
                padding: 15px;
                margin-bottom: 12px;
                font-size: 14px;
                line-height: 1.6;
            }

            .atm {
                background: #fff7f7;
                border: 1px solid #ffd6d6;
            }

            .visa {
                background: #f7fbff;
                border: 1px solid #d6e9ff;
            }

            .footer {
                text-align: center;
                padding: 15px;
                font-size: 12px;
                color: #777;
                border-top: 1px solid #eee;
                background: #fafafa;
            }
        </style>
    </head>

    <body>

        <div class="card">

            <!-- HEADER -->
            <div class="header">
                <h1>💳 KẾT QUẢ TẠO LINK THANH TOÁN VNPAY</h1>
            </div>

            <div class="content">

                <!-- LINK -->
                <div class="section">
                    <span class="label">🔗 Link thanh toán</span>

                    <div class="box">
                        <?= $link ?>
                    </div>

                    <div class="actions">
                        <a class="btn btn-primary" target="_blank" href="<?= $link ?>">
                            👉 Thanh toán ngay
                        </a>
                    </div>
                </div>

                <!-- ACTION -->
                <div class="section">
                    <span class="label">🔄 Hành động</span>

                    <div class="actions">
                        <a class="btn btn-secondary" href="getlink.php">
                            🔁 Tạo lại link
                        </a>
                    </div>
                </div>

                <!-- TEST CARD INFO -->
                <div class="section">
                    <span class="label">🧪 Thông tin thẻ test (Sandbox VNPAY) <a href="https://sandbox.vnpayment.vn/apis/vnpay-demo" target="_blank">Link demo thông tin thẻ test</a></span>

                    <div class="card-test atm">
                        <strong>1. ATM nội địa (NCB)</strong><br>
                        💳 Ngân hàng: NCB<br>
                        🔢 Số thẻ: 9704198526191432198<br>
                        👤 Chủ thẻ: NGUYEN VAN A<br>
                        📅 Ngày phát hành: 07/15<br>
                        🔐 OTP: 123456
                    </div>

                    <div class="card-test visa">
                        <strong>2. Thẻ Visa</strong><br>
                        💳 Số thẻ: 4111 1111 1111 1111<br>
                        👤 Chủ thẻ: NGUYEN VAN A<br>
                        📅 Hết hạn: 07/30<br>
                        🔐 CVV: 123
                    </div>

                </div>

            </div>

            <!-- FOOTER -->
            <div class="footer">
                * Sandbox VNPAY - môi trường kiểm thử tích hợp thanh toán
            </div>

        </div>

    </body>
</html>