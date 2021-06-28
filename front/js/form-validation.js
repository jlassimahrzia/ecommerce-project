// Wait for the DOM to be ready
$(function() {

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
            subcategorie: {
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
            name: "Veuillez saisir le nom du produit",
            categorie: "Veuillez sélectionner une catégorie",
            subcategorie: "Veuillez sélectionner une sous-catégorie",
            description: "Veuillez saisir une description",
            price: "Veuillez saisir le prix",
            image: "Veuillez sélectionner une image"
        },
        submitHandler: function(form) {
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
            subcategorie: {
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
            name: "Veuillez saisir le nom du produit",
            categorie: "Veuillez sélectionner une catégorie",
            subcategorie: "Veuillez sélectionner une sous-catégorie",
            description: "Veuillez saisir une description",
            price: "Veuillez saisir le prix",
            image: "Veuillez sélectionner une image"
        },
        submitHandler: function(form) {
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
            name: "Veuillez saisir le nom de la catégorie"
        },
        submitHandler: function(form) {
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
            email: {
                required: true,
                email: true
            },
            subject: {
                required: true,
                minlength: 2
            },
            message: {
                required: true,
                minlength: 2
            }
        },
        // Specify validation error messages
        messages: {
            name: "S'il vous plaît entrez votre nom",
            email: "Veuillez entrer votre email",
            subject: "Veuillez saisir l'objet de l'email",
            message: "Veuillez écrire votre message"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    // add sub-category form
    $("form[name='addSubCategory']").validate({
        // Specify validation rules
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            categorie: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            name: "Veuillez saisir le nom de la sous-catégorie",
            categorie: "Veuillez sélectionner une catégorie"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
    // add sub-category form
    $("form[name='up_subcat']").validate({
        // Specify validation rules
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            categorie: {
                required: true,
            }
        },
        // Specify validation error messages
        messages: {
            name: "Veuillez saisir le nom de la sous-catégorie",
            categorie: "Veuillez sélectionner une catégorie"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});