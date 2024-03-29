// magic.js
$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'name': $('input[name=name]').val(),
            'email': $('input[name=email]').val(),
            'superheroAlias': $('input[name=superheroAlias]').val()
        };

        // process the form
        $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'process.php', // the url where we want to POST
                data: formData, // our data object
                dataType: 'json', // what type of data do we expect back from the server
                encode: true,
                beforeSend: function() {
                    $("#thisb").fadeIn();
                },
                complete: function() {
                    $("#thisb").fadeOut();
                },
                success: function(badges) {
                    $('#checkin-form').html("<div id='message'></div><div id='badges'></div>");
                    $('#message').html("<h2><img class=\"check-mark\" src=\"/static/images/check-mark.png\"/>You are checked in!</h2>");
                    $.each(badges, function(i, badge) {
                        $('#badges').append("<h2>New Badge!</h2><p><img class='badge' src='" + badge.image_url + "'><span class='badge-title'>" + badge.name + "</span></p>");
                    })
                }
            })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data);

                // here we will handle errors and validation messages
                if (!data.success) {
                    // handle errors for name ---------------
                    if (data.errors.name) {
                        $('#name-group').addClass('has-error'); // add the error class to show red input
                        $('#name-group').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for email ---------------
                    if (data.errors.email) {
                        $('#email-group').addClass('has-error'); // add the error class to show red input
                        $('#email-group').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
                    }

                    // handle errors for superhero alias ---------------
                    if (data.errors.superheroAlias) {
                        $('#superhero-group').addClass('has-error'); // add the error class to show red input
                        $('#superhero-group').append('<div class="help-block">' + data.errors.superheroAlias + '</div>'); // add the actual error message under our input
                    }

                } else {

                    // ALL GOOD! just show the success message!
                    $('form').append('<div class="alert alert-success">' + data.message + '</div>');

                    // usually after form submission, you'll want to redirect
                    // window.location = '/thank-you'; // redirect a user to another page

                }
            })

        // using the fail promise callback
        .fail(function(data) {

            // show any errors
            // best to remove for production
            console.log(data);
        });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});