<?php
require_once 'config.php';

$pCode = !empty($_REQUEST['pCode']) ? $_REQUEST['pCode'] : '';

$dataReturn = [];
if ($pCode === 'VNPAY') {
    $data = $_REQUEST;
    $dataReturn = (new ProcessFactory)->callback($pCode, $data);
}

function formatMoney($amount) {
    return number_format($amount / 100, 0, ',', '.') . ' VNĐ';
}

function formatDateTime($date) {
    if (!$date)
        return '';
    return date('d/m/Y H:i:s', strtotime($date));
}
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Kết quả thanh toán VNPAY</title>

        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: "Segoe UI", Arial, sans-serif;
                background: linear-gradient(135deg, #f1f4f9, #e6ecf5);
                display: flex;
                justify-content: center;
                padding: 40px 16px;
            }

            .card {
                width: 100%;
                max-width: 800px;
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 12px 35px rgba(0,0,0,0.08);
                overflow: hidden;
            }

            .header {
                padding: 20px;
                text-align: center;
                background: linear-gradient(90deg, #d32f2f, #b71c1c);
                color: #fff;
            }

            .header h1 {
                margin: 0;
                font-size: 20px;
                letter-spacing: 0.5px;
            }

            .content {
                padding: 24px;
            }

            .result-status {
                text-align: center;
                margin-bottom: 20px;
                font-size: 16px;
                font-weight: 600;
            }

            .success {
                color: #2e7d32;
            }

            .error {
                color: #c62828;
            }

            .info-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 14px 20px;
            }

            .info-item {
                background: #f8fafc;
                border: 1px solid #e3e8ef;
                border-radius: 8px;
                padding: 12px 14px;
            }

            .label {
                font-size: 13px;
                color: #666;
                margin-bottom: 4px;
            }

            .value {
                font-weight: 600;
                color: #222;
                word-break: break-word;
            }

            .footer {
                text-align: center;
                padding: 16px;
                font-size: 12px;
                color: #777;
                border-top: 1px solid #eee;
                background: #fafafa;
            }

            @media (max-width: 600px) {
                .info-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>

    <body>

        <div class="card">
            <div class="header">
                <h1>💳 KẾT QUẢ THANH TOÁN</h1>
            </div>

            <div class="content">
                <?php if (!empty($dataReturn)): ?>
                    <?php $isSuccess = ($dataReturn['vnp_ResponseCode'] === '00'); ?>

                    <div class="result-status <?= $isSuccess ? 'success' : 'error' ?>">
                        <?= $isSuccess ? '✔ Giao dịch thành công' : '✖ Giao dịch thất bại' ?>
                    </div>

                    <div class="info-grid">
                        <div class="info-item">
                            <div class="label">Mã đơn hàng</div>
                            <div class="value"><?= $dataReturn['vnp_TxnRef'] ?></div>
                        </div>

                        <div class="info-item">
                            <div class="label">Số tiền</div>
                            <div class="value"><?= formatMoney($dataReturn['vnp_Amount']) ?></div>
                        </div>

                        <div class="info-item">
                            <div class="label">Nội dung</div>
                            <div class="value"><?= $dataReturn['vnp_OrderInfo'] ?></div>
                        </div>

                        <div class="info-item">
                            <div class="label">Mã phản hồi</div>
                            <div class="value"><?= $dataReturn['vnp_ResponseCode'] ?></div>
                        </div>

                        <div class="info-item">
                            <div class="label">Mã giao dịch VNPAY</div>
                            <div class="value"><?= $dataReturn['vnp_TransactionNo'] ?></div>
                        </div>

                        <div class="info-item">
                            <div class="label">Ngân hàng</div>
                            <div class="value"><?= $dataReturn['vnp_BankCode'] ?></div>
                        </div>

                        <div class="info-item">
                            <div class="label">Thời gian thanh toán</div>
                            <div class="value"><?= formatDateTime($dataReturn['vnp_PayDate']) ?></div>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="result-status error">
                        Không có dữ liệu thanh toán
                    </div>
                <?php endif; ?>
            </div>

            <div class="footer">
                &copy; VNPAY <?= date('Y') ?>
            </div>
        </div>

    </body>
</html>