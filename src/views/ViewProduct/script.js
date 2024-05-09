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

// Change image
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

