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

//Increase and decrease quantity of product

document.querySelectorAll('.decrease').forEach(function (button) {
    button.addEventListener('click', function () {
        var quantityInput = button.parentNode.querySelector('input[type="text"]');
        var procId = button.parentNode.querySelector('input[type="hidden"]').value;
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            currentValue--;
            quantityInput.value = currentValue;
            CalculateCost(procId, currentValue);
        }
    });
});

document.querySelectorAll('.increase').forEach(function (button) {
    button.addEventListener('click', function () {
        var quantityInput = button.parentNode.querySelector('input[type="text"]');
        var procId = button.parentNode.querySelector('input[type="hidden"]').value;
        var currentValue = parseInt(quantityInput.value);
        currentValue++;
        quantityInput.value = currentValue;
        CalculateCost(procId, currentValue);
    });
});

function CalculateCost(procId, currentValue) {
    document.querySelectorAll('.total-product').forEach(function (total) {
        if (procId == total.parentElement.querySelector('input[type="hidden"]').value) {
            costArray.forEach(function (item) {
                if (procId == item['id']) {
                    total.innerHTML = (item['cost'] * currentValue * 1000).toLocaleString('vi', {
                        style: 'currency',
                        currency: 'VND'
                    }).replace('₫', 'đ');

                    var totalCost = 0;
                    document.querySelectorAll('.total-product').forEach(function (cost) {
                        totalCost += parseInt(cost.innerHTML.replace('đ', '').replace(/\./g, ''));
                    });

                    //Thay đổi tổng tiền hàng
                    document.getElementById('cost-proc').innerText = totalCost.toLocaleString('vi', {
                        style: 'currency',
                        currency: 'VND'
                    }).replace('₫', 'đ');
                    document.getElementById('cost-ship-proc').innerText = (totalCost + 25000).toLocaleString('vi', {
                        style: 'currency',
                        currency: 'VND'
                    }).replace('₫', 'đ');
                }
            });
        }
    });
}

//Choose method of shipping
function paymentShipping(id, cost) {
    var id = document.getElementById(id);
    id.addEventListener('click', function () {
        if (id.checked) {
            document.querySelectorAll('.shipping-product').forEach(function (element) {
                element.innerHTML = 'Giao hàng: ' + cost + 'đ';
            });
            document.getElementById('shipping-cost').innerHTML = cost + 'đ';
            var totalCost = document.getElementById('cost-proc').innerText.replace(/[^\d]/g, '');
            totalCost = (parseInt(totalCost) + parseInt(cost)).toLocaleString('vi', {
                style: 'currency',
                currency: 'VND'
            }).replace('₫', 'đ');
            document.getElementById('cost-ship-proc').innerText = totalCost;
        }
    });
}
paymentShipping('normal', '25000');
paymentShipping('fast', '35000');

