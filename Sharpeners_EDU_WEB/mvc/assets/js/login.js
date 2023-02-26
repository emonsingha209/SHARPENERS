const errors = document.getElementsByClassName("err");
function Login()
{
    let email = document.getElementById('login-email').value;
    let password = document.getElementById('login-password').value;
    if(email == "" || password == "")
    {
        if(email == "")
        {
            document.getElementById('login-email-err').innerHTML = "Email field is required";
            errors[0].style.display = "block";
        }
        if(password == "")
        {
            document.getElementById('login-password-err').innerHTML = "Password field is required";
            errors[1].style.display = "block";
        }
        return false;
    }
}
function Hide()
{
    let l = errors.length;

    for(let i=0; i<l; i++)
    {
        errors[i].style.display = "none";
    }
}