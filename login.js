function validateForm(){
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;


    document.getElementById("name-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("password-error").innerHTML = "";

    let isValid = true;

    if (username === ""){
        document.getElementById("name-error").innerHTML = "Username is invalid";
        isValid = false;
    }
    if (email === ""){
        document.getElementById("email-error").innerHTML = "E-mail is invalid";
        isValid = false;
    }
    if (password === ""){
        document.getElementById("password-error").innerHTML = "Password is invalid";
        isValid = false;
    }

    return isValid;

}