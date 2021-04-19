function signUp() {
    var userForm = document.getElementsByClassName("user-form")[0];
    var formData = new FormData(userForm);
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
            var response = ajax.responseText;
           alert(response);
           if(response == "user registered successfully") {
               window.location = "pages/dashboard.php";
           }
        }
    }
    ajax.open("POST", "phpFiles/server.php");
    ajax.send(formData);
}


function signIn() {
    var userForm = document.getElementsByClassName("sign-in-form")[0];
    var formData = new FormData(userForm);
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState == 4 && ajax.status == 200) {
            var response = ajax.responseText;
           alert(response);
           if(response == "user logged in") {
               window.location = "../pages/dashboard.php";
           }
        }
    }
    ajax.open("POST", "../phpFiles/server.php");
    ajax.send(formData);
}