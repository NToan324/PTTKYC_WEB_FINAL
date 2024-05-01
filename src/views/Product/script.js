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


//Slideshow
var slideIndex = 1;
changSlide = function () {
    var imageSlide = ['advertise1', 'advertise2', 'advertise3', 'advertise4'];
    if(slideIndex != 0) {
        document.getElementById('advertise-info').style.display = 'none';
    } else {
        document.getElementById('advertise-info').style.display = 'block';
    }
    document.getElementById('advertise-img').style.backgroundImage = 'url(/PTTKYC_WEB_FINAL/storage/Image_Product/' + imageSlide[slideIndex++] + '.png)';
    if (slideIndex == imageSlide.length) {
        slideIndex = 0;
    }
}

setInterval(changSlide, 4000);

