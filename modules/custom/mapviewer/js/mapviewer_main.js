/* https://joebuckle.me/quickie/jquery-create-object-oriented-classes-in-jquery/ */

var config = {
  //// TODO: A modifier avant de push
    url_searchemprise : 'http://amihydro.oieau.fr/sidhymo/searchemprise',
    url_wfsemprise : 'http://amihydro.oieau.fr/ows',
    url_searchobjet : 'http://amihydro.oieau.fr/sidhymo/searchobjet',
    //New
    url_gettableterritoires : 'http://amihydro.oieau.fr/sidhymo/gettableterritoires',
    array_objets_etude  : [
                            {
                                name : 'usra',
                                libelle : 'Unité Spatiale de Recueil et d\'Analyse (USRA)',
                                code : 'id_usra_dd',
                                style : [
                                    new ol.style.Style({
                                        /* Les traits, en bleu un peu épais */
                                        stroke: new ol.style.Stroke({
                                            lineCap: 'round',
                                            color: 'rgba(6, 214, 160, 0.9)',
                                            width: 7
                                        }),
                                        /* Couleur de remplissage */
                                        fill: new ol.style.Fill({
                                            color: [61, 96, 152, 0.5]
                                        }),
                                        zIndex: 10
                                    }),
                                ]
                            },
                            {
                                name : 'tgh',
                                libelle : 'Tronçon Geomorphologiquement Homogène (TGH)',
                                code: 'id_troncon',
                                style : [
                                    new ol.style.Style({
                                        /* Les traits, en bleu un peu épais */
                                        stroke: new ol.style.Stroke({
                                            lineCap: 'round',
                                            color: 'rgba(17, 138, 178, 0.9)',
                                            width: 4
                                        }),
                                        /* Couleur de remplissage */
                                        fill: new ol.style.Fill({
                                            color: [61, 96, 152, 0.5]
                                        }),
                                        zIndex: 10
                                    }),
                                ]
                            },
                            {
                                name: 'roe',
                                libelle: 'Obstacle à l\'écoulement',
                                code : 'identifiant_roe',
                                style: [
                                    new ol.style.Style({
                                        /* Les points seront des puces bleues (une image) */
                                        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                                            anchor: [12.5, 39],
                                            src: 'modules/custom/mapviewer/images/roe.png',
                                            anchorXUnits: 'pixels',
                                            anchorYUnits: 'pixels',
                                            opacity: 0.50,
                                            scale: 0.5,
                                        }),
                                        zIndex: 10
                                    }),
                                    new ol.style.Style({
                                        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                                            anchor: [12.5, 39],
                                            src: 'modules/custom/mapviewer/images/marker-shadow.png',
                                            anchorXUnits: 'pixels',
                                            anchorYUnits: 'pixels',
                                            opacity: 0.50,
                                            scale: 0.5,
                                        }),
                                        zIndex: 9
                                    })
                                ]
                            },
                            {
                                name: 'roeice',
                                libelle: 'Obstacle à l\'écoulement ICE',
                                code : 'identifiant_roe',
                                style: [
                                    new ol.style.Style({
                                        /* Les points seront des puces bleues (une image) */
                                        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                                            anchor: [12.5, 39],
                                            src: 'modules/custom/mapviewer/images/roeice.png',
                                            anchorXUnits: 'pixels',
                                            anchorYUnits: 'pixels',
                                            opacity: 0.90,
                                        }),
                                        zIndex: 10
                                    }),
                                    new ol.style.Style({
                                        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                                            anchor: [12.5, 39],
                                            src: 'modules/custom/mapviewer/images/marker-shadow.png',
                                            anchorXUnits: 'pixels',
                                            anchorYUnits: 'pixels',
                                            opacity: 0.90,
                                        }),
                                        zIndex: 9
                                    })
                                ]
                            },
                            {
                                name: 'stcarhyce',
                                libelle: 'Station de mesure Carhyce',
                                code : 'code_station',
                                style: [
                                    new ol.style.Style({
                                        /* Les points seront des puces bleues (une image) */
                                        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                                            anchor: [12.5, 39],
                                            src: 'modules/custom/mapviewer/images/stcarhyce.png',
                                            anchorXUnits: 'pixels',
                                            anchorYUnits: 'pixels',
                                            opacity: 0.90,
                                        }),
                                        zIndex: 10
                                    }),
                                    new ol.style.Style({
                                        image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                                            anchor: [12.5, 39],
                                            src: 'modules/custom/mapviewer/images/marker-shadow.png',
                                            anchorXUnits: 'pixels',
                                            anchorYUnits: 'pixels',
                                            opacity: 0.90,
                                        }),
                                        zIndex: 9
                                    })
                                ]
                            }
                          ]
};

jQuery('#document').ready(function() {

  // return 0;
    // jQuery('#spinner').hide();

    // Construct
    fichehandler2 = new fichehandler();
    map2 = new map('map', fichehandler2);
    resultable2 = new resultable(map2, fichehandler2);
    searchbar2 = new searchbar('searchbar', map2, resultable2)

    // do
    map2.initemprisesgeo(resultable2);
    map2.addLayerSwitcher();
    map2.ficheControler();
    map2.highlightControler();

    //Hauteur de la map
    var taille=jQuery('.path-frontpage').height()-jQuery('#header-menu').height()-parseInt(jQuery('#header-brand').css('padding-top'))-jQuery('#header-brand').height()-1
    jQuery('#map').css('height',taille+"px");


    // jQuery("#stcarhyce").toast({delay:1000});
    // jQuery("#stcarhyce").toast('show');
    // jQuery("#roe").toast({delay:4000});
    // jQuery("#roe").toast('show');
    // jQuery("#roeice").toast({delay:7000});
    // jQuery("#roeice").toast('show');


    // addLayerSelection();
    // // Pour accélerer le developement
    // searchbar2.getEmpriseEtObjetDetude('commune',34192,'87001 Aixe-sur-Vienne')
    // resultable2 = new resultable();
    // jQuery('#modalinformation').modal('show')
    // fichehandler2.createfiche("stcarhyce", "4079750")
});
jQuery( window ).resize(function() {
  var taille=jQuery('.path-frontpage').height()-jQuery('#header-menu').height()-parseInt(jQuery('#header-brand').css('padding-top'))-jQuery('#header-brand').height()-1
  jQuery('#map').css('height',taille+"px");
});
