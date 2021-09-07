var togglePassword = document.querySelectorAll("#toggle-password");
var formContent = document.getElementsByClassName('form-content')[0];
var getFormContentHeight = formContent.clientHeight;

var formImage = document.getElementsByClassName('form-image')[0];
if (formImage) {
    var setFormImageHeight = formImage.style.height = getFormContentHeight + 'px';
}
if (togglePassword) {
    togglePassword.forEach(function (element, index) {
        element.addEventListener('click', function () {
            var x = element.previousElementSibling;
            console.log(x);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        });
    });
}
