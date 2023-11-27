function loginForm(event) {
    event.preventDefault(); // Prevent the default form submission

    var email = $('input[name=email]').val();
    var password = $('input[name=password]').val();

    if (email.trim() === '' || password.trim() === '') {
        alert('Please enter both email and password.');
        return;
    }

    var formData = { email: email, password: password };

    $.ajax({
        url: "http://localhost/guvi/php/login.php",
        type: 'POST',
        data: formData,
        success: function (response) {
            console.log(response);
            if (response === 'success') {
                alert("Login successful");
                window.location.href = "http://localhost:5000/";
            } else {
                alert("Invalid email or password");
            }
        },
        error: function (error) {
            console.log(error);
            alert("An error occurred while processing the login request.");
        }
    });
}