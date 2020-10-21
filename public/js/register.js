function validateForm() {
    var first_name = document.forms["register-form"]["first_name"].value;
    var last_name = document.forms["register-form"]["last_name"].value;
    var email = document.forms["register-form"]["email"].value;
    var password = document.forms["register-form"]["password"].value;
    var confirm_password = document.forms["register-form"]["confirm_password"].value;

    if (first_name == "" || 
        last_name == "" ||
        email == "" ||
        password == "" ||
        confirm_password == ""            
    ) {
        alert("Παρακαλώ να συμπληρώσετε όλα τα πεδία!");
        return false;
    }

    if (password == confirm_password){
        return true;
    }
    else {
        alert("Ο Νέος Κωδικός δεν ταιριάζει με τον Κωδικό Επιβεβαίωσης!");
        return false;
    }
}