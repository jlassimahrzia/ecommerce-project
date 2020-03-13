// Wait for the DOM to be ready
$(function () {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
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
            image: "Please select image"
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

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
            image: "Please select image"
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

  
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
});