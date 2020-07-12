function showPassword() {
    let password = document.getElementById('input-password');
    let confirmPassword = document.getElementById('input-confirm-password');

    if (password.type === 'password' && confirmPassword.type === 'password') {
        password.setAttribute('type', 'text');
        confirmPassword.setAttribute('type', 'text');
    } else {
        password.setAttribute('type', 'password');
        confirmPassword.setAttribute('type', 'password');
    }
}

document.querySelector('.custom-file-input').addEventListener('change',function(event){
    let fileName = document.getElementById("input-image").files[0].name;
    let nextSibling = event.target.nextElementSibling
    nextSibling.innerText = fileName
})