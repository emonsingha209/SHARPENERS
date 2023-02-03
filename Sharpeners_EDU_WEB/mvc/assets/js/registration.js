class Person
{
    constructor(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue)
    {
        this.name = name;
        this.email = email;
        this.address = address;
        this.division = division;
        this.postalcode = postalcode;
        this.contnum = contnum;
        this.gender = gender;
        this.bg = bg;
        this.pic = pic;
        this.picValue = picValue;
    }
    nameValidation()
    {
        if(this.name == '')
        {
            this.err = "Name must be filled out";
            return false;
        }
        else
        {
            if(!this.name.match(/^[A-Za-z\s]*$/) || this.name.length > 40 || this.name.length < 2)
            {
                this.err = "Only Letter and whitespaces are allow. Name cannot be longer than 40 characters.";
                return false;
            }
        }
        return true;
    }
    emailValidation()
    {
        if(this.email == '')
        {
            this.err = "Email must be filled out";
            return false;
        }
        else
        {
            let bDot = this.email.lastIndexOf(".") - this.email.indexOf("@");
            let aDot = this.email.length - this.email.lastIndexOf(".");
            if(this.email[0].match(/[-_.]/g) || this.email[this.email.indexOf("@")-1].match(/[-_.]/g) || !this.email.match(/^[A-Za-z0-9-_.@]*$/) || bDot < 2 || aDot < 3)
            {
                this.err = "Invalid Email.";
                return false;
            }
        }
        return true;
    }
    addressValidation()
    {
        if(this.address == '')
        {
            this.err = "Address must be filled out";
            return false;
        }
        else
        {
            if(this.address.length > 120)
            {
                this.err = "Too long Address.";
                return false;
            }
        }
        return true;
    }
    divisionValidation()
    {
        if(this.division == '')
        {
            this.err = "Division must be filled out";
            return false;
        }
        return true;
    }
    postalcodeValidation()
    {
        if(this.postalcode == '')
        {
            this.err = "Postal Code must be filled out";
            return false;
        }
        else
        {
            if(this.postalcode.length != 4)
            {
                this.err = "Your postalcode should be 4 digit and valid.";
                return false;
            }
        }
        return true;
    }
    contnumValidation()
    {
        if(this.contnum == '')
        {
            this.err = "Contact Number must be filled out";
            return false;
        }
        else
        {
            if(this.contnum.length != 11 || !this.contnum.startsWith("01"))
            {
                this.err = "Your contact number is invalid. \n Note: No need to add +88";
                return false;
            }
        }
        return true;
    }
    genderValidation()
    {
        if(!this.gender)
        {
            this.err = "Gender must be filled out";
            return false;
        }
        return true;
    }
    bgValidation()
    {
        if(this.bg == '')
        {
            this.err = "Blood Group must be filled out";
            return false;
        }
        return true;
    }
    picValidation()
    {
        if(this.pic == '')
        {
            this.err = "Picture must upload";
            return false;
        }
        else
        {
            if(this.picValue.size > 10485760)
            {
                this.err = "Picture size is too large, Upload less than or equal 10MB.";
                return false;
            }
            if(this.picValue.type != "image/jpeg" && this.picValue.type != "image/png")
            {
                this.err = "Your picture should be jpeg, jpg or png";
                return false;
            }
        }
        return true;
    }
}
class JobHolder extends Person
{
    constructor(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue, dob)
    {
        super(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue);
        this.dob = dob;
    }
    dobValidation()
    {
        if(this.dob == '')
        {
            this.err = "Date of birth must be filled out";
            return false;
        }
        else
        {
            const arrDate = new Date(this.dob);
            let year = arrDate.getFullYear();
            const currDate = new Date();
            let currentYear = currDate.getFullYear();
            if(year > currentYear-18)
            {
                this.err = "Too young for this job.";
                return false;
            }
            if(year < currentYear-40)
            {
                this.err = "Too old for this job.";
                return false;
            }
        }
        return true;
    }
}
class Admin extends JobHolder
{
    constructor(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue, dob, password, cpassword)
    {
        super(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue, dob);
        this.password = password;
        this.cpassword = cpassword;
    }
    passwordValidation()
    {
        if(this.password == '')
        {
            this.err = "Password must be filled out";
            return false;
        }
        else
        {
            if(this.password.length < 8 || this.password.length > 15 || !this.password.match(/[0-9]/g) || !this.password.match(/[a-z]/g) || !this.password.match(/[A-Z]/g))
            {
                this.err = "Full fill the all conditions for password before submit.";
                return false;
            }
        }
        return true;
    }
    cpasswordValidation()
    {
        if(this.cpassword == '')
        {
            this.err = "Confirm Password must be filled out";
            return false;
        }
        return true;
    }
    passwordMatch()
    {
        if(this.password != this.cpassword)
        {
            this.err = "Password and confirm password must be same.";
            return false;
        }
        return true;
    }
    Error()
    {
        return this.err;
    }
}
class Manager extends JobHolder
{
    constructor(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue, dob, cv, cvValue, post)
    {
        super(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue, dob);
        this.cv = cv;
        this.cvValue = cvValue;
        this.post = post;
    }
    cvValidation()
    {
        if(this.cv == '')
        {
            this.err = "CV must upload";
            return false;
        }
        else
        {
            if(this.cvValue.size > 10485760)
            {
                this.err = "File size is too large, Upload less than or equal 10MB.";
                return false;
            }
            if(this.cvValue.type != "application/msword" && this.cvValue.type != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" && this.cvValue.type != "application/pdf")
            {
                this.err = "Your file should be doc, docx or pdf";
                return false;
            }
        }
        return true;
    }
    postValidation()
    {
        if(!this.post)
        {
            this.err = "Post must be filled out";
            return false;
        }
        return true;
    }
    Error()
    {
        return this.err;
    }
}
function AdminReg() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let cpassword = document.getElementById('cpassword').value;
    let address = document.getElementById('address').value;
    let division = document.getElementById('division').value;
    let postalcode = document.getElementById('postalcode').value;
    let contnum = document.getElementById('contnum').value;
    let gender = false;
    if(document.getElementById('gender-male').checked || document.getElementById('gender-female').checked || document.getElementById('gender-others').checked)
    {
        gender = true;
    }
    let dob = document.getElementById('dob').value;
    let bg = document.getElementById('bg').value;
    let pic = document.getElementById('pic').value;
    let picValue = document.getElementById('pic').files[0];

    let headErr = document.getElementById('warn-p');
    let nameErr = document.getElementById('name-p');
    let emailErr = document.getElementById('email-p');
    let passErr = document.getElementById('password-p');
    let cpassErr = document.getElementById('cpassword-p');
    let addressErr = document.getElementById('address-p');
    let divisionErr = document.getElementById('division-p');
    let postalErr = document.getElementById('postalcode-p');
    let contnumErr = document.getElementById('contnum-p');
    let genderErr = document.getElementById('gender-p');
    let dobErr = document.getElementById('dob-p');
    let bgErr = document.getElementById('bg-p');
    let picErr = document.getElementById('pic-p');
    const errors = document.getElementsByClassName("err");

    const hide = document.querySelectorAll("input, select");
    let l = hide.length;
    for(let i=0; i<l; i++)
    {
        hide[i].addEventListener("change", Hide);
    }

    let admin = new Admin(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue, dob, password, cpassword);

    let err = -1;

    if(!admin.nameValidation())
    {
        nameErr.innerHTML = admin.Error();
        err = 0;
    }
    if(!admin.emailValidation())
    {
        emailErr.innerHTML = admin.Error();
        err = 1;
    }
    if(!admin.passwordValidation())
    {
        passErr.innerHTML = admin.Error();
        err = 2;
    }
    if(!admin.cpasswordValidation())
    {
        cpassErr.innerHTML = admin.Error();
        err = 8;
    }
    if(!admin.passwordMatch())
    {
        cpassErr.innerHTML = admin.Error();
        err = 8;
    }
    if(!admin.addressValidation())
    {
        addressErr.innerHTML = admin.Error();
        err = 9;
    }
    if(!admin.divisionValidation())
    {
        divisionErr.innerHTML = admin.Error();
        err = 10;
    }
    if(!admin.postalcodeValidation())
    {
        postalErr.innerHTML = admin.Error();
        err = 11;
    }
    if(!admin.contnumValidation())
    {
        contnumErr.innerHTML = admin.Error();
        err = 12;
    }
    if(!admin.genderValidation())
    {
        genderErr.innerHTML = admin.Error();
        err = 13;
    }
    if(!admin.dobValidation())
    {
        dobErr.innerHTML = admin.Error();
        err = 14;
    }
    if(!admin.bgValidation())
    {
        bgErr.innerHTML = admin.Error();
        err = 15;
    }
    if(!admin.picValidation())
    {
        picErr.innerHTML = admin.Error();
        err = 16;
    }

    if(err >= 0 && err < 17)
    {
        errors[err].style.display = "block";
        headErr.innerHTML = "Something is wrong. Please check all data again.";
        errors[17].style.display = "block";
        return false;
    }
}

function ManagerReg() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let address = document.getElementById('address').value;
    let division = document.getElementById('division').value;
    let postalcode = document.getElementById('postalcode').value;
    let contnum = document.getElementById('contnum').value;
    let gender = false;
    if(document.getElementById('gender-male').checked || document.getElementById('gender-female').checked || document.getElementById('gender-others').checked)
    {
        gender = true;
    }
    let dob = document.getElementById('dob').value;
    let bg = document.getElementById('bg').value;
    let cv = document.getElementById('cv').value;
    let cvValue = document.getElementById('cv').files[0];
    let pic = document.getElementById('pic').value;
    let picValue = document.getElementById('pic').files[0];
    let post = false;
    if(document.getElementById('post-manager').checked || document.getElementById('post-assist-manager').checked)
    {
        post = true;
    }
    let headErr = document.getElementById('warn-p');
    let nameErr = document.getElementById('name-p');
    let emailErr = document.getElementById('email-p');
    let addressErr = document.getElementById('address-p');
    let divisionErr = document.getElementById('division-p');
    let postalErr = document.getElementById('postalcode-p');
    let contnumErr = document.getElementById('contnum-p');
    let genderErr = document.getElementById('gender-p');
    let dobErr = document.getElementById('dob-p');
    let bgErr = document.getElementById('bg-p');
    let cvErr = document.getElementById('cv-p');
    let picErr = document.getElementById('pic-p');
    let postErr = document.getElementById('post-p');
    const errors = document.getElementsByClassName("err");

    const hide = document.querySelectorAll("input, select");
    let l = hide.length;
    for(let i=0; i<l; i++)
    {
        hide[i].addEventListener("change", Hide);
    }

    let manager = new Manager(name, email, address, division, postalcode, contnum, gender, bg, pic, picValue, dob, cv, cvValue, post);

    let err = 100;

    if(!manager.nameValidation())
    {
        nameErr.innerHTML = manager.Error();
        err = 0;
    }
    if(!manager.emailValidation())
    {
        emailErr.innerHTML = manager.Error();
        err = 1;
    }
    if(!manager.addressValidation())
    {
        addressErr.innerHTML = manager.Error();
        err = 2;
    }
    if(!manager.divisionValidation())
    {
        divisionErr.innerHTML = manager.Error();
        err = 3;
    }
    if(!manager.postalcodeValidation())
    {
        postalErr.innerHTML = manager.Error();
        err = 4;
    }
    if(!manager.contnumValidation())
    {
        contnumErr.innerHTML = manager.Error();
        err = 5;
    }
    if(!manager.genderValidation())
    {
        genderErr.innerHTML = manager.Error();
        err = 6;
    }
    if(!manager.dobValidation())
    {
        dobErr.innerHTML = manager.Error();
        err = 7;
    }
    if(!manager.bgValidation())
    {
        bgErr.innerHTML = manager.Error();
        err = 8;
    }
    if(!manager.cvValidation())
    {
        cvErr.innerHTML = manager.Error();
        err = 9;
    }
    if(!manager.picValidation())
    {
        picErr.innerHTML = manager.Error();
        err = 10;
    }
    if(!manager.postValidation())
    {
        postErr.innerHTML = manager.Error();
        err = 11;
    }
    if(err >= 0 && err < 12)
    {
        errors[err].style.display = "block";
        headErr.innerHTML = "Something is wrong. Please check all data again.";
        errors[12].style.display = "block";
        return false;
    }
}

function PassVal()
{
    let pass = document.getElementById('password').value;
    let passErr = document.getElementById('password-p');
    let minErr = document.getElementById('min-p');
    let maxErr = document.getElementById('max-p');
    let upErr = document.getElementById('uppercase-p');
    let lowErr = document.getElementById('lowercase-p');
    let numErr = document.getElementById('num-p');
    if(pass.length < 8 || pass.length > 15 || !pass.match(/[0-9]/g) || !pass.match(/[a-z]/g) || !pass.match(/[A-Z]/g))
    {
        passErr.innerHTML = "Your must contain:";
        for(let i=2; i<8; i++)
        {
            errors[i].style.display = "block";
        }
    }
    else 
    {
        errors[2].style.display = "none";
    }
    if(pass.length < 8)
    {
        minErr.innerHTML = "Minimum 8 characters.";
    }
    if(pass.length > 15)
    {
        maxErr.innerHTML = "Maximum 15 characters.";
    }
    if(!pass.match(/[0-9]/g))
    {
        numErr.innerHTML = "A number.";
    }
    if(!pass.match(/[a-z]/g))
    {
        lowErr.innerHTML = "A lowercase letter.";
    }
    if(!pass.match(/[A-Z]/g))
    {
        upErr.innerHTML = "A uppercase letter";
    }
    if(pass.match(/[0-9]/g))
    {
        errors[3].style.display = "none";
    }
    if(pass.match(/[a-z]/g))
    {
        errors[4].style.display = "none";
    }
    if(pass.match(/[A-Z]/g))
    {
        errors[5].style.display = "none";
    }
    if(pass.length >= 8 && pass.length <=15)
    {
        errors[6].style.display = "none";
        errors[7].style.display = "none";
    }
}

function CheckPass()
{
    let pass = document.getElementById("password").value;
    let cpass = document.getElementById("cpassword").value;
    let cpassErr = document.getElementById('cpassword-p');

    errors[8].style.display = "block";

    if(cpass.length == 0)
    {
        cpassErr.innerHTML = "";
        errors[8].style.display = "none";
    }
    else if(pass.length == 0 && cpass.length != 0)
    {
        cpassErr.innerHTML = "Enter password first";
    }
    else if(pass == cpass)
    {
        cpassErr.innerHTML = "Matched";
        setTimeout(() => {
            errors[8].style.display = "none";
        }, 3000);
    }
    else {
        cpassErr.innerHTML = "Does not matched";
    }
}
function Hide()
{
    const errors = document.getElementsByClassName("err");

    let l = errors.length;

    for(let i=0; i<l; i++)
    {
        errors[i].style.display = "none";
    }
}
function ClosePopup() {
    let popup = document.getElementById('open-popup');
    popup.remove();
}
function UniqueEmail()
{
    let email = document.getElementById('email').value;
    let emailErr = document.getElementById('email-p');
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../controller/admin/adminUniqueCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('Email='+email);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            emailErr.innerHTML = this.responseText;
        }
    }
}
function UpdateOpen(sid, hid)
{
    let hide = document.getElementById(sid);
    let show = document.getElementById(hid);
    show.style.display = "block";
    hide.style.display = "none";
}
function UpdateClose(sid, hid)
{
    let hide = document.getElementById(sid);
    let show = document.getElementById(hid);
    show.style.display = "none";
    hide.style.display = "block";
}