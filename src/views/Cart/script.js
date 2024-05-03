var alertSignout = document.getElementById('alert-signout');
var flag = false;

document.getElementById('icon-down').addEventListener('click', function () {
    alertSignout.style.display = 'block';
    flag = true;

    if (flag == true) {
        document.getElementById('cancel-signout').addEventListener('click', function () {
            alertSignout.style.display = 'none';
        });
        document.getElementById('confirm-signout').addEventListener('click', function () {
            window.location.href = '/PTTKYC_WEB_FINAL/src/views/Login/index.php';
        });
    }
});


//Increase and decrease quantity
document.querySelectorAll('.increase').forEach(function(button) {
    button.addEventListener('click', function() {
        var quantityInput = button.parentNode.querySelector('input[type="text"]');
        var currentValue = parseInt(quantityInput.value);
        currentValue++;
        quantityInput.value = currentValue;
    });
});

document.querySelectorAll('.decrease').forEach(function(button) {
    button.addEventListener('click', function() {
        var quantityInput = button.parentNode.querySelector('input[type="text"]');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            currentValue--;
        }
        quantityInput.value = currentValue;
    });
});

//Remove item
document.querySelectorAll('.delete-product').forEach(function(button) {
    button.addEventListener('click', function() {
        var product = button.closest('tr');
        var productId = button.dataset.productId;

        // Gửi ID đã xóa thông qua Ajax sang mã PHP
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Nhận dữ liệu trả về từ mã PHP (nếu có)
                var response = this.responseText;
                // Hiển thị thông báo hoặc thực hiện các hành động khác nếu cần
            }
        };
        xhr.open('POST', '/PTTKYC_WEB_FINAL/src/views/Cart/index.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('deletedId=' + productId);
        console.log(productId);
        // Sau khi gửi Ajax request, bạn có thể thực hiện các hành động khác nếu cần
        product.remove(); // Ví dụ: Xóa sản phẩm khỏi giao diện
    });
});


//Choose method of shipping
do
