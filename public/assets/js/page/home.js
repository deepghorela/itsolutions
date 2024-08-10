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
        $('.requestAQuoteForm button').prop("disabled", "disabled");
    }
    function showResponse(responseText, statusText, xhr, $form) {
        if (responseText.status) {
            $('.requestAQuoteForm').trigger('reset');
            alert(responseText.message);
        } else {
            alert("OOPS! "+responseText.message);
        }
        $('.requestAQuoteForm button').prop("disabled", false);
    }
    var target_url = $(".target_url").val();
    var options = {
        beforeSubmit: showRequest, // pre-submit callback 
        success: showResponse,
        url: target_url,
        type: 'POST',
        dataType: 'json'
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
});