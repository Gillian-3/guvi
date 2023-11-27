function submitForm(event) {
    var name = $('input[name=name]').val();
    var email = $('input[name=email]').val();
    var password = $('input[name=password]').val();
    var confirm = $('input[name=confirm]').val();
    
    if (confirm !== password) {
        alert("Passwords do not match!");
        event.preventDefault();
        return;
    }
    
    window.alert(`${name}, ${email}, ${password}`);
    
    var formData = { name: name, email: email, password: password };

    $.ajax({
        url: "http://localhost/guvi/php/register.php",
        type: 'POST',
        data: formData,
        success: function (response) {
            console.log(response);
            alert("Form registered successfully");
        },
        error: function (error) {
            console.log(error);
            alert("An error occurred while registering the form.");
        }
    });
}
