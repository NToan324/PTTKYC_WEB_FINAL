var SecondaryImage = document.querySelectorAll('.image-sec');
var srcMainImage = document.querySelector('.image-main').src;
SecondaryImage.forEach(function (img) {
    img.addEventListener('mouseover', function () {
        var mainImage = document.querySelector('.image-main');
        mainImage.src = img.src;
    });
    img.addEventListener('mouseout', function () {
        var mainImage = document.querySelector('.image-main');
        mainImage.src = srcMainImage;
    });
});

function viewPolicy(id, content) {
    var changeContent = document.getElementById('content');
    changeContent.innerHTML = content;
}

var shipping = document.getElementById('shipping');
shipping.addEventListener('click', function () {
    var content = `
      <p><strong>Phí vận chuyển:</strong> Chi phí vận chuyển sẽ phụ thuộc vào địa chỉ giao hàng và phương thức vận chuyển được chọn. Chi phí cụ thể sẽ được hiển thị trong quá trình thanh toán.</p>
      <p><strong>Thời gian giao hàng:</strong> Thời gian giao hàng có thể thay đổi tùy thuộc vào địa chỉ giao hàng và phương thức vận chuyển. Thông tin cụ thể về thời gian giao hàng sẽ được cung cấp trong quá trình đặt hàng.</p>
      <p><strong>Phương thức vận chuyển:</strong> Chúng tôi sử dụng các dịch vụ vận chuyển đáng tin cậy để đảm bảo việc giao hàng được thực hiện một cách nhanh chóng và an toàn.</p>
    `;
    viewPolicy(shipping, content);
});

var material = document.getElementById('material');
material.addEventListener('click', function () {
    content = `
    <p>Áo thun trắng là một sản phẩm thời trang phổ biến, được làm từ các loại chất liệu như cotton,
    polyester hoặc hỗn hợp giữa chúng. Chất liệu cotton mang lại cảm giác mềm mại và thoải mái,
    trong khi polyester có độ bền cao và giữ form dáng tốt</p>
    `;
    viewPolicy(material, content);
});

var returnOrder = document.getElementById('returnOrder');
returnOrder.addEventListener('click', function () {
    var content = `
      <p><strong>Chính sách hoàn trả:</strong> Chúng tôi cam kết đảm bảo quyền lợi của khách hàng khi mua sản phẩm. Trong trường hợp khách hàng không hài lòng với sản phẩm đã mua, chúng tôi sẽ tiến hành hoàn trả tiền một cách nhanh chóng và thuận tiện.</p>
      <p><strong>Thời gian hoàn trả:</strong> Thời gian hoàn trả sẽ phụ thuộc vào quy định của chúng tôi và phương thức thanh toán ban đầu. Thông tin chi tiết về thời gian hoàn trả sẽ được cung cấp khi khách hàng yêu cầu hoàn trả.</p>
      <p><strong>Điều kiện hoàn trả:</strong> Để được hoàn trả, sản phẩm phải còn nguyên vẹn, không bị hư hỏng và đáp ứng các điều kiện hoàn trả của chúng tôi. Khách hàng vui lòng liên hệ với chúng tôi để biết thêm thông tin chi tiết về điều kiện hoàn trả.</p>
    `;
    viewPolicy(returnOrder, content);
});

// Increase and decrease quantity
document.getElementById('increase').addEventListener('click', function() {
    var quantityInput = document.getElementById('procId');
    var currentValue = parseInt(quantityInput.value);
    currentValue++;
    quantityInput.value = currentValue;
});

document.getElementById('decrease').addEventListener('click', function() {
    var quantityInput = document.getElementById('procId');
    var currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        currentValue--;
        quantityInput.value = currentValue;
    }
});
