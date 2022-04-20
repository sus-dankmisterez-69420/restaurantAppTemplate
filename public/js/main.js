function redirectConfirmation(message, url) {
    if(confirm(message)) {
        window.location.replace(url)
    }
}

function confirmCb(message, callback) {
    if(confirm(message)) {
        callback()
    }
}

function ajax(url) {
    fetch(url).then(response => response.text()).then(pageData => {
        document.getElementsByTagName("html")[0].innerHTML = pageData;
    }).catch(exception => console.log(exception));
}

function ajaxPostForm(url, formId) {
    let formData = new FormData(document.getElementById(formId));
    fetch(url, {body: formData, method: 'POST'}).then(response => response.text()).then(pageData => {
        document.getElementsByTagName("html")[0].innerHTML = pageData;
    }).catch(exception => console.log(exception));
}