# 💳 DEMO Tích hợp thanh toán QR / ATM / Thẻ quốc tế

Tài liệu hướng dẫn tích hợp cổng thanh toán **QR / ATM / Payment Card** lên các nền tảng website bán hàng (CMS / Open Source).

---

## 🚀 1. Giới thiệu

Cổng thanh toán (QR / ATM / Payment Card) hỗ trợ các phương thức thanh toán phổ biến:

- 📱 QR Code thanh toán nhanh
- 🏦 Thẻ ATM nội địa
- 💳 Thẻ quốc tế (Visa / MasterCard / JCB / AMEX)
- 📲 Ứng dụng ngân hàng (Mobile Banking)

---

## 🧩 2. Các CMS hỗ trợ tích hợp

### 🟢 WordPress + WooCommerce
- Cài plugin thanh toán tương ứng
- Cấu hình merchant / API key
- Kích hoạt phương thức thanh toán trong WooCommerce

---

### 🔵 Drupal
- Tạo payment gateway custom
- Gọi API tạo URL thanh toán
- Xử lý Return URL và IPN

---

### 🟠 Joomla
- Cài extension thương mại điện tử (HikaShop / VirtueMart)
- Viết plugin payment gateway
- Xử lý callback sau thanh toán

---

### 🟡 OpenCart
- Tạo module payment
- Cấu hình trong Admin → Extensions → Payments
- Xử lý cập nhật trạng thái đơn hàng

---

### 🟣 PrestaShop
- Tạo module payment riêng
- Hook vào checkout process
- Xác thực IPN từ cổng thanh toán

---

### 🔴 Magento
- Tạo custom payment module
- Cấu hình `config.xml`, `di.xml`
- Xử lý redirect + callback + verify chữ ký

---

## ⚙️ 3. Luồng tích hợp thanh toán

1. Tạo đơn hàng trên hệ thống
2. Sinh URL thanh toán từ server
3. Redirect người dùng sang cổng thanh toán
4. Người dùng thực hiện thanh toán
5. Cổng thanh toán redirect về Return URL
6. Server xác thực kết quả qua IPN
7. Cập nhật trạng thái đơn hàng

---

## 🔐 4. Yêu cầu bảo mật

- Tạo chữ ký bảo mật (`Secure Hash - SHA512`)
- Không tin dữ liệu trả về từ client
- Luôn xác thực IPN từ server-to-server
- Kiểm tra toàn bộ tham số trước khi cập nhật đơn hàng

---

## 🧪 5. Thông tin thẻ test (Sandbox)

### 🧪 Thông tin demo
- **Website:** https://paylink.hotrocds.com  

---

### 🏦 ATM nội địa (NCB)
- Số thẻ: 9704198526191432198  
- Chủ thẻ: NGUYEN VAN A  
- Ngày phát hành: 07/15  
- OTP: 123456  

---

### 💳 Thẻ Visa
- Số thẻ: 4111 1111 1111 1111  
- Chủ thẻ: NGUYEN VAN A  
- Ngày hết hạn: 07/30  
- CVV: 123  

---

## 📌 6. Return URL

Sau khi thanh toán, cổng thanh toán sẽ redirect về:

---

## 🔄 7. Tạo lại link thanh toán

Người dùng có thể tạo lại đơn hàng bằng:

- Quay lại trang tạo đơn hàng
- Hoặc submit lại form thanh toán

---

## 📊 8. Kết luận

- Tích hợp cổng thanh toán yêu cầu xử lý backend
- Frontend chỉ đảm nhiệm tạo request và hiển thị kết quả
- Bắt buộc verify IPN để đảm bảo an toàn giao dịch

---

## 📞 Hỗ trợ

Tài liệu này dùng cho môi trường **sandbox của cổng thanh toán**.

Có thể áp dụng cho các hệ thống:
**VNPAY / MOMO / ONEPAY / EPAY / ZALOPAY / Stripe (tùy API)**


---

## 👨‍💻 Người triển khai

- **Email:** paysolution360@gmail.com  
- **Số điện thoại:** 0393111865

---

📌 Người triển khai chịu trách nhiệm xây dựng và demo hệ thống tích hợp thanh toán QR / ATM / Thẻ quốc tế trên các nền tảng CMS (WordPress, Drupal, Joomla, OpenCart, PrestaShop, Magento).

---