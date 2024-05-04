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
document.querySelectorAll('.increase').forEach(function (button) {
    button.addEventListener('click', function () {
        var quantityInput = button.parentNode.querySelector('input[type="text"]');
        var procId = button.parentNode.querySelector('input[type="hidden"]').value;
        var currentValue = parseInt(quantityInput.value);
        currentValue++;
        quantityInput.value = currentValue;
        quantityIncDec(procId, currentValue);
    });
});

document.querySelectorAll('.decrease').forEach(function (button) {
    button.addEventListener('click', function () {
        var quantityInput = button.parentNode.querySelector('input[type="text"]');
        var procId = button.parentNode.querySelector('input[type="hidden"]').value;
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            currentValue--;
            quantityInput.value = currentValue;
            quantityIncDec(procId, currentValue);
        }
    });
});

function quantityIncDec(id, qty) {
    console.log(id, qty);
    $.ajax({
        type: "POST",
        url: "/PTTKYC_WEB_FINAL/src/models/addcart.php",
        contentType: "application/json",
        data : {
            'productIncDec': true,
            'product_id': id,
            'quantity': qty
        },
        success: function (response) {
            console.log(response); // Kiểm tra phản hồi từ server
            if (response.trim() !== "") { // Kiểm tra xem chuỗi phản hồi có rỗng không
                try {
                    var res = JSON.parse(response);
                    if(res.status == 200) {
                        window.location.reload();
                        alertify.success(res.message);
                    } else {
                        alertify.error(res.message);
                    }
                } catch (e) {
                    console.error("Parsing error:", e);
                    // Xử lý lỗi phân tích JSON ở đây
                }
            } else {
                console.error("Empty response from server");
                // Xử lý trường hợp phản hồi rỗng ở đây
            }
        }
    });
}


//Choose method of shipping
function paymentShipping(cost) {
    document.querySelectorAll('.shipping-product').forEach(function (element) {
        element.innerHTML = 'Giao hàng: ' + cost + 'đ';
    }); 
    document.getElementById('shipping-cost').innerHTML = cost + 'đ';
}

document.getElementById('normal').addEventListener('click', function () {
    if (document.getElementById('normal').checked) {
        paymentShipping('25000');
    }
});

document.getElementById('fast').addEventListener('click', function () {
    if (document.getElementById('fast').checked) {
        paymentShipping('35000');
    }
});
