$(function() {

      var t = {
        "Login": {
          fr:"Connecter"
        },
        "Home": {
          fr:"Acceuil"
        },
        "Products": {
          fr:"Produits"
        },
        "Contact": {
          fr:"Contacte"
        },
        "All Categories":{
          fr:"Toute les catégories"
        },
        "ABOUT US":{
          fr:"À PROPOS DE NOUS"
        },
        "Contact Us":{
          fr:"Contacter Nous"
        },
        "All":{
          fr:"Tous"
        },
        "Our Society":{
          fr:"Notre société"
        },
        "Dental":{
          fr:"dentaire"
        },
        "Dental product":{
          fr:"produit dentaire"
        },
        "Shop all our product":{
          fr:"Voir tous nos produits"
        },
        "Click here":{
          fr:"Cliquer ici"
        },
        "teeth":{
          fr:"Dents"
        },
        "Care":{
          fr:"Soins"
        },
        "Various Product":{
          fr:"Produit divers"
        },
        "See more":{
          fr:"Voir Plus"
        },
        "Address :":{
          fr:"Adresse :"
        },
        "Phone :":{
          fr:"Télèphone :"
        },
        "Leave A Comment":{
          fr:"Laissez un commentaire"
        },
        "Our staff will call back later and answer your questions.":{
          fr:"Notre personnel vous rappellera plus tard et répondra à vos questions."
        },
        "Send message":{
          fr:"Envoyer message"
        },
        "Search":{
          fr:"chercher"
        },
        "Show 01- 12 Of ":{
          fr:"Afficher 01-12 de "
        },
        " Product":{
          fr:" Produits"
        }
      };
      var _t = $('body').translate({lang: "en", t: t});
      var str = _t.g("translate");
      console.log(str);
    
      
      $(".lang_selector").click(function(ev) {
        var lang = $(this).attr("data-value");
        _t.lang(lang);
        console.log(lang);
        ev.preventDefault();
      });
});
