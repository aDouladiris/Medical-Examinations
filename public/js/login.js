function validateForm() {
    var email = document.forms["login-form"]["email"].value;
    var password = document.forms["login-form"]["password"].value;

    if (email == "" ||
        password == ""          
    ) {
        alert("Παρακαλώ να συμπληρώσετε όλα τα πεδία");
        return false;
    }
}