# GssiCustomily
# Tạo một module tên Gssi_Customily
- Create Grid để hiển thị thông tin bao gồm: ID, SKU, Personalization code, Qty, Price
- Cho phép tạo mới, sửa, xóa
- Viết 1 web API lấy price theo SKU, Personalization code
- Tạo 1 Function get Price trong Helper bao gồm cả Sku, Personalization code, Qty
- Lưu ý:
  + ID là tự tăng
  + SKU là text để nhập
  + Personalization code là text để nhập
  + Qty là text chỉ cho phép nhập number và min là 1
  + Qty là text chỉ cho phép nhập number có thập phân như 1.00 và min = 0
  + SKU + Personalization code + Qty là duy nhất
 
# Import
- Trong Magento có tính năng import (System->import)
- Cần thêm 1 option import để thực hiện insert or update data cho table ở module trên
- Tính năng import này là chọn file để thực hiện insert or update và database
- Cần phải chạy đúng với các tùy chọn khác của tính năng import này

