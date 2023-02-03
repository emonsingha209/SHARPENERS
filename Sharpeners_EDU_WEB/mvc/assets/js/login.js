function Login()
{
    let email = document.getElementById('login-email').value;
    let password = document.getElementById('login-password').value;
    if(email == "" || password == "")
    {
        if(email == "")
        {
            document.getElementById('login-email-err').innerHTML = "Email field is required";
        }
        if(password == "")
        {
            document.getElementById('login-password-err').innerHTML = "Password field is required";
        }
        return false;
    }
}
function Hide()
{
    const errors = document.getElementsByClassName("err");

    let l = errors.length;

    for(let i=0; i<l; i++)
    {
        errors[i].innerHTML = "";
    }
}