let base_url = "{!! url('/') !!}/"
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// ajax request common function
function sendAjaxRequest(url, method, data = {}, eventTriggerBtn = null) {
    var btnText = '';
    return $.ajax({ // Return the Promise from $.ajax
        url: base_url + url,
        method: method,
        data: data,
        processData: !(data instanceof FormData),
        contentType: data instanceof FormData ? false : 'application/x-www-form-urlencoded; charset=UTF-8',
        beforeSend: function () {
            // You can show a loader here if needed
            btnText = $(eventTriggerBtn).text();
            $(eventTriggerBtn).attr('disabled', true).text('Please wait...');
        },
        complete: function () {
            // Hide the loader here if needed
            $(eventTriggerBtn).attr('disabled', false).text(btnText);
        },
    })
        .done(function (data) { // .done() for success
            // console.log('print from dno');
            // No need to assign to 'response' here, it's passed to .then()
        })
        .fail(function (xhr, status, error) {
            console.log('AJAX Error:', xhr.responseText);

            // Handle different types of errors
            if (xhr.status === 422) {
                // Laravel validation errors
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.error) {
                        // Handle your custom error format: {"error":{"mobile":["The mobile has already been taken."]},"status":"error"}
                        $.each(response.error, function(field, messages) {
                            if (Array.isArray(messages)) {
                                messages.forEach(function(message) {
                                    toastr.error(message);
                                });
                            } else {
                                toastr.error(messages);
                            }
                        });
                    } else if (response.errors) {
                        // Handle standard Laravel validation format
                        $.each(response.errors, function(field, messages) {
                            messages.forEach(function(message) {
                                toastr.error(message);
                            });
                        });
                    }
                } catch (e) {
                    toastr.error('Validation failed. Please check your input.');
                }
            } else if (xhr.status === 500) {
                toastr.error('Server error. Please try again later.');
            } else if (xhr.status === 403) {
                toastr.error('Access denied.');
            } else {
                toastr.error('An error occurred. Please try again.');
            }
        });
}

let checkingUnique = {};

function checkUniqueField(field) {
    let value = field.val().trim();
    let type = field.data('type'); // email or mobile
    let errorField = $('.error-' + type);
    errorField.text('');

    if (!value) return;

    // Format validation
    if (type === 'email') {
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            errorField.text('Please enter a valid email address');
            return;
        }
    }

    if (type === 'mobile') {
        let mobileRegex = /^01[3-9][0-9]{8}$/;
        if (!mobileRegex.test(value)) {
            errorField.text('Please enter a valid Bangladeshi mobile number');
            return;
        }
    }

    // Prevent duplicate requests
    if (checkingUnique[type]) return;
    checkingUnique[type] = true;

    $.ajax({
        url: base_url+"auth/check-unique-email-or-phone",
        type: "POST",
        data: {
            value: value,
            type: type,
        },
        success: function (response) {
            if (!response.available) {
                errorField.text(type === 'email'
                    ? 'This email is already registered'
                    : 'This mobile number is already registered');
            }
        },
        error: function () {
            errorField.text('Unable to verify ' + type + ' at the moment');
        },
        complete: function () {
            checkingUnique[type] = false;
        }
    });
}
