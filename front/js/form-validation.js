// Wait for the DOM to be ready
$(function () {

    // add product form
    $("form[name='product']").validate({
        // Specify validation rules
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            categorie: {
                required: true,
            },
            description: {
                required: true,
                minlength: 2
            },
            price: {
                required: true,
                number: true
            },
            image: {
                required: true,
                accept: "image/*"
            }
            
        },
        // Specify validation error messages
        messages: {
            name: "Please enter product name",
            categorie: "Please select category",
            description: "Please enter description",
            price:"Please enter price",
            image: "Please select image"
        },
        submitHandler: function (form) {
            form.submit();
        }
    });


    // update product form

    $("form[name='product-update']").validate({
        // Specify validation rules
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            categorie: {
                required: true,
            },
            price: {
                required: true,
                number: true
            },
            description: {
                required: true,
                minlength: 2
            },
            image: {
                accept: "image/*"
            }

        },
        // Specify validation error messages
        messages: {
            name: "Please enter product name",
            categorie: "Please select category",
            description: "Please enter description",
            price:"Please enter price",
            image: "Please select image"
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    // update category form
    $("form[name='upcat']").validate({
        // Specify validation rules
        rules: {
            name: {
                required: true,
                minlength: 2
            }
        },
        // Specify validation error messages
        messages: {
            name: "Please enter category name"
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    // Contact Form
    $("form[name='form-contact']").validate({
        // Specify validation rules
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email:{
                required: true,
                email: true
            },
            subject:{
                required: true,
                minlength: 2
            },
            message:{
                required: true,
                minlength: 2   
            }
        },
        // Specify validation error messages
        messages: {
            name: "Please enter your name",
            email:"Please enter your email",
            subject:"Please enter subject of the mail",
            message:"Please write your message"
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});