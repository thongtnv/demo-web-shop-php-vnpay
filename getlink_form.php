<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tạo mới đơn hàng VNPAY</title>

        <!-- Bootstrap -->
        <link href="public/assets/bootstrap.min.css" rel="stylesheet"/>
        <script src="public/assets/jquery-1.11.3.min.js"></script>

        <style>
            body {
                background: #f4f6f9;
            }

            .card {
                margin-top: 40px;
                border: none;
                border-radius: 12px;
                box-shadow: 0 8px 25px rgba(0,0,0,0.08);
                padding: 25px;
                background: #fff;
            }

            h3 {
                font-weight: bold;
                color: #d32f2f;
                margin-bottom: 20px;
            }

            h4 {
                margin-top: 20px;
                font-size: 16px;
                color: #333;
                font-weight: 600;
            }

            h5 {
                font-size: 14px;
                margin-top: 10px;
                color: #555;
            }

            .form-control {
                border-radius: 8px;
                padding: 10px;
            }

            .section {
                margin-bottom: 20px;
            }

            .radio-box {
                background: #fafafa;
                padding: 10px;
                border-radius: 8px;
                border: 1px solid #eee;
                margin-bottom: 8px;
            }

            .btn-pay {
                width: 100%;
                padding: 12px;
                border-radius: 8px;
                background: #d32f2f;
                color: white;
                font-weight: bold;
                border: none;
                margin-top: 15px;
            }

            .btn-pay:hover {
                background: #b71c1c;
            }

            footer {
                text-align: center;
                margin-top: 20px;
                color: #888;
                font-size: 13px;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <div class="card">

                        <h3>💳 Tạo mới đơn hàng VNPAY</h3>

                        <form action="" id="frmCreateOrder" method="post">

                            <!-- AMOUNT -->
                            <div class="section">
                                <label><strong>Số tiền</strong></label>
                                <input class="form-control" name="amount" type="number" min="1" max="100000000" value="100000">
                            </div>

                            <!-- DESCRIPTION -->
                            <div class="section">
                                <label><strong>Mô tả đơn hàng</strong></label>
                                <input class="form-control" name="description" type="text" value="Thanh toán hóa đơn">
                            </div>

                            <!-- PAYMENT METHOD -->
                            <div class="section">
                                <h4>Phương thức thanh toán</h4>

                                <div class="radio-box">
                                    <input type="radio" name="bankCode" value="" checked>
                                    <label>VNPAYQR (chọn tại cổng)</label>
                                </div>

                                <div class="radio-box">
                                    <input type="radio" name="bankCode" value="VNPAYQR">
                                    <label>App VNPAYQR</label>
                                </div>

                                <div class="radio-box">
                                    <input type="radio" name="bankCode" value="VNBANK">
                                    <label>ATM / Nội địa</label>
                                </div>

                                <div class="radio-box">
                                    <input type="radio" name="bankCode" value="INTCARD">
                                    <label>Thẻ quốc tế</label>
                                </div>
                            </div>

                            <!-- SERVICE -->
                            <div class="section">
                                <h4>Dịch vụ</h4>

                                <div class="radio-box">
                                    <input type="radio" name="service_code" value="BILL" checked>
                                    <label>Thanh toán hóa đơn</label>
                                </div>

                                <div class="radio-box">
                                    <input type="radio" name="service_code" value="TRANSFER">
                                    <label>Chuyển tiền</label>
                                </div>

                                <div class="radio-box">
                                    <input type="radio" name="service_code" value="TOPUP">
                                    <label>Nạp tiền điện thoại</label>
                                </div>
                            </div>

                            <!-- LANGUAGE -->
                            <div class="section">
                                <h4>Ngôn ngữ</h4>

                                <div class="radio-box">
                                    <input type="radio" name="language" value="vn" checked>
                                    <label>Tiếng Việt</label>
                                </div>

                                <div class="radio-box">
                                    <input type="radio" name="language" value="en">
                                    <label>Tiếng Anh</label>
                                </div>
                            </div>

                            <input type="hidden" name="create_link" value="1"/>

                            <!-- BUTTON -->
                            <button type="submit" class="btn-pay">
                                🚀 Thanh toán qua VNPAY
                            </button>

                        </form>

                    </div>

                    <footer>
                        © VNPAY Demo Integration
                    </footer>

                </div>
            </div>
        </div>

    </body>
</html>