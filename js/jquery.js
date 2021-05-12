/* Script pour afficher les articles en colonne si on est en mode portrait par défaut (uniquement aux articles qui possèdent la class "responsive") */
$(function column_default() {

    if((window.matchMedia("(orientation: portrait)").matches)) {

        //on retire la class "row" aux articles
        $('article.responsive').removeClass("row");

        //on ajoute la class "column" aux articles
        $('article.responsive').addClass("column");

    }
});

/* Script pour afficher les articles en colonne si on redimensionne la fenetre en mode portrait ou si on bascule de portrait à landscape */
function column_resize_window() {

    if((window.matchMedia("(orientation: portrait)").matches)) {

        //on retire la class "row" aux articles
        $('article.responsive').removeClass("row");

        //on ajoute la class "column" aux articles
        $('article.responsive').addClass("column");

    }
    else {

        //on retire la class "column" aux articles
        $('article.responsive').removeClass("column");


        //on ajoute la class "row" aux articles
        $('article.responsive').addClass("row");
    }
}

//exécution du script précépent si la fenêtre est redimensionnée
window.onresize = column_resize_window;

/* Script pour le suivi du MENU lors du SCROLL */
$(function() {

        //Par défaut on cache le logo dans le menu
        $('#logo_nav').addClass("invisible");

        // On recupère la position du bloc MENU par rapport au haut du site
        var position_top_raccourci = $("#menu").offset().top;

        //Au scroll dans la fenetre on déclenche la fonction
        $(window).scroll(function () {

            //on exécute si la fenetre est en mode paysage. Si on est en portrait (mobile), on affichera un autre menu
            if((window.matchMedia("(orientation: landscape)").matches)) {

                //si on a dépasse le bloc
                if ($(this).scrollTop() > position_top_raccourci) {

                    //on ajoute la classe "floatable" a <div id="menu">
                    $('#menu').addClass("floatable");

                    //on retire la class "invisible" au logo
                    $('#logo_nav').removeClass("invisible");

                    //on ajoute la class "visible" au logo pour l'afficher
                    $('#logo_nav').addClass("visible");

            }
                else {

                    //sinon on retire la classe "floatable" a <div id="menu">
                    $('#menu').removeClass("floatable");

                    //on retire la class "visible" au logo
                    $('#logo_nav').removeClass("visible");

                    //on ajoute la class "invisible" au logo pour le cacher quand on remonte
                    $('#logo_nav').addClass("invisible");
            }
        }
    });

});