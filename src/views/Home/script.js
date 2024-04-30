var alertSignout = document.getElementById('alert-signout');
var flag = false;

document.getElementById('icon-down').addEventListener('click', function(){
    alertSignout.style.display = 'block';
    flag = true;

    if(flag == true) {
        document.getElementById('cancel-signout').addEventListener('click', function(){
            alertSignout.style.display = 'none';
        });
        document.getElementById('confirm-signout').addEventListener('click', function(){
            window.location.href = '/PTTKYC_WEB_FINAL/src/views/Login/index.php';
        });
    }
});
