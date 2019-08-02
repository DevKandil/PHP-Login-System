$(document)
.on("submit", "form.form-signin", function(event) {
    event.preventDefault();

    var form = $(this);
    var error = $(".js-error", form);
    var data = {
        email: $("input[type='email']", form).val(),
        password: $("input[type='password']", form).val()
    }

    if(data.email.length < 6) {
        error.addClass("alert alert-danger");
        error.text("Email not valid.").show('.js-error');
        return false;
    } else if (data.password.length < 8) {
        error.addClass("alert alert-danger");
        error.text("Password must be 8 or more.").show('.js-error');
    }
    error.hide();

    $.ajax({
       type: 'POST',
       url: '/../../register.php',
       data: data,
       datatype: 'json',
       async: true,
    })
    .done(function ajaxDone (data) {
        console.log(data);
    })
    .fail(function ajaxFailed(e) {
        console.log(e);
    })
    .always(function ajaxAlwaysDoThis(data) {
        console.log('Always');
    });

    return false;
});