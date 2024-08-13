;
// Initialize Type.js with the desired options
var options = {
    strings: ["Laptop/Desktop Repair", "Data Recovery/Backup", "Computer and PC setup", "Virus removal", "Data Security", "IT Management Services", "Cyber Security Services", "and many more..."],
    typeSpeed: 25,
    backSpeed: 20,
    loop: true,
    showCursor: false
};

// Apply the typing effect to the element with class 'myText'
var typed = new Typed('.typeJsEffect', options);
document.addEventListener('DOMContentLoaded', function() {
    // Array of classes to cycle through
    const classes = ['bg1', 'bg2', 'bg3', 'bg4'];
    let currentIndex = 0;

    // Function to change the class
    function changeClass() {
        // Get the topHeader element
        const topHeader = document.querySelector('.topHeader');
        
        // Remove the current class
        topHeader.classList.remove(classes[currentIndex]);
        
        // Update the index to the next class
        currentIndex = (currentIndex + 1) % classes.length;
        
        // Add the new class
        topHeader.classList.add(classes[currentIndex]);
    }

    // Set an interval to change the class every 3 seconds
    setInterval(changeClass, 3000);
});

// var _spinner = new Loader();
$("document").ready(function(){
    $(".requestAQuoteForm").validate({
        errorPlacement: function (error, element) {
            error.insertBefore(element);
        },
        rules: {
            name: { required: true, minlength: 3, maxlength: 100 },
            mobile: { required: true, number: true, maxlength: 10, minlength: 10 },
            request_type: { required: true, maxlength: 100},
            address: {maxlength: 250},
            email: { required: true, email: true, maxlength: 70 },
            message: { required: true, minlength: 10, maxlength: 250}
        },
        messages: {
            name: { required: "Please enter your name", minlength: "Name must be or at least 3 characters", maxlength: "Provide a shorter name"},
            mobile: { required: "Don't left mobile number blank", number: "Please enter digits only", maxlength: "Enter 10 digit mobile", minlength: "Enter 10 digit mobile" },
            request_type: {required: "Select a request type"},
            address: {maxlength: "Provide a shorter address"},
            email: { required: "Enter your email address", email: "Invalid email address", maxlength: "Please enter another email" },
            message: { required: "Please type your message", minlength: "Enter at least 10 characters", maxlength: "Provide a shorter message"}
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        }
    });
    function showRequest(formData, jqForm, options) {
        $(".error").remove();
        $('.requestAQuoteForm button').prop("disabled", "disabled");
        $('.requestAQuoteForm button').html("Processing...");

        // Get the value of the Google reCAPTCHA response
        var recaptchaResponse = document.getElementById("g-recaptcha-response").value;
        // Append the g-recaptcha-response key and value to the form data
        formData.push({ name: 'g-recaptcha-response', value: recaptchaResponse });
        $('.requestAQuoteForm input, .requestAQuoteForm select, .requestAQuoteForm textarea').prop("disabled", true);
    }
    function showResponse(responseText, statusText, xhr, $form) {
        if (responseText.status) {
            $('.requestAQuoteForm').trigger('reset');
            alert(responseText.message);
        } else {
            alert("OOPS! "+responseText.message);
        }
        $('.requestAQuoteForm button').html("Submit");
        $('.requestAQuoteForm input, .requestAQuoteForm select, .requestAQuoteForm textarea').prop("disabled", false);
        $('.requestAQuoteForm button').prop("disabled", false);
    }
    var target_url = $(".target_url").val();
    var options = {
        beforeSubmit: showRequest, // pre-submit callback 
        success: showResponse,
        url: target_url,
        type: 'POST',
        dataType: 'json',
        error:function(xhr){
            if (xhr.status === 422) {
                // Handle validation errors
                var errorData = xhr.responseJSON;
                // Check if 'errors' object exists and is an object
                if (errorData.errors && typeof errorData.errors === 'object') {
                    // Check if 'email' property exists in 'errors'
                    if (errorData.errors.email && Array.isArray(errorData.errors.email)) {
                        $("input[name='email']").after('<label id="email-error" class="error" for="email" style="">' + errorData.errors.email.join(', ') + '</label>');
                    }
                }
            }
            $('.requestAQuoteForm button').html("Submit");
            $('.requestAQuoteForm input, .requestAQuoteForm select, .requestAQuoteForm textarea').prop("disabled", false);
            $('.requestAQuoteForm button').prop("disabled", false);
        }
    };
    
    $('.requestAQuoteForm').ajaxForm(options);
    $(".btn-service-detail").each(function() {
        $(this).click(function() {
            $('html, body').animate({
                scrollTop: $(".request-a-quote-section").offset().top
            }, 1000); // 1000 milliseconds for a 1-second scroll duration
            $(".requestAQuoteForm input[name='name']").trigger('focus');
            var headingSelect = $(this).parents('li').find('h3').text();
            $(".requestType option").each(function(){
                if($(this).text() == headingSelect){
                    $(this).attr("selected", true);
                }else{
                    $(this).removeAttr("selected");
                }
            });
        });
    }); 
    
    
    setTimeout(function(){
        var head = document.getElementsByTagName('head')[0];
        var captchaKey = document.getElementById("recaptchaKey").value;
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.onload = function() {
            grecaptcha.ready(function() {
                grecaptcha.execute(captchaKey, {action: 'requestquote'}).then(function(token) {
                    document.getElementById("g-recaptcha-response").value = token;
                });
            });
        }
        script.src = "https://www.google.com/recaptcha/api.js?render="+captchaKey;
        head.appendChild(script);
     }, 4000);
});