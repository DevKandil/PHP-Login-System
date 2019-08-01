$(document)
.on("submit", "form.form-signin", function(event) {
    event.preventDefault();

    var form = $(this);

    var data = {
        email: $("input[type='email']", form).val(),
        password: $("input[type='password']", form).val()
    }
    console.log(data);
    return false;
});