document.getElementById('shorten-btn').addEventListener('click', function (e) {
    event.preventDefault();
    let thisButton = this;
    let link = document.getElementById('link');
    let csrf_token = document.querySelector('#link-form input[name=_token]').value;
    let link_error = document.getElementById('link_error');
    let copyUrlBox = document.getElementById('copy-url-box');
    thisButton.setAttribute('disabled', 'disabled');
    axios.post("/short/url", {"link": link.value, "_token": csrf_token})
        .then(function (response) {
            let shortedUrl = document.getElementById('shorted-url');
            if (200 === response.status) {
                shortedUrl.value = response.data;
                copyUrlBox.style.display = 'block';
                link_error.style.display = 'none';
            }
        })
        .catch(function (error) {
            if (422 === error.response.status) {
                link.classList.add('is-invalid');
                link_error.style.display = 'block';
                link_error.innerText = error.response.data.errors.link[0];
            } else if (500 === error.response.status) {
                alert('Server error, Please try again later.')
            }
            thisButton.removeAttribute('disabled');
        });
});

//Copy URL TO Clip board
document.getElementById('copy-url-btn').addEventListener('click', function () {

    let shortedUrl = document.getElementById('shorted-url');
    let shortenButton = document.getElementById('shorten-btn');

    shortedUrl.select();
    shortedUrl.setSelectionRange(0, 999999999); /* For mobile devices */

    navigator.clipboard.writeText(shortedUrl.value).then(function () {
        shortenButton.removeAttribute('disabled');
    }, function (err) {
        alert('Could not copy text');
    });

});
