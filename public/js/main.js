function showPassword()
{
    let password = document.getElementById('input-password');
    let confirmPassword = document.getElementById('input-confirm-password');

    if (password.type === 'password' && confirmPassword.type === 'password')
    {
        password.setAttribute('type', 'text');
        confirmPassword.setAttribute('type', 'text');
    }
    else
    {
        password.setAttribute('type', 'password');
        confirmPassword.setAttribute('type', 'password');
    }
}

function showNewPassword()
{
    let newPassword = document.getElementById('input-new-password');

    if (newPassword.type === 'password')
    {
        newPassword.setAttribute('type', 'text');
    }
    else
    {
        newPassword.setAttribute('type', 'password');
    }
}