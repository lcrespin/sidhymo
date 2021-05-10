/*
 * mapviewer
 */
var map = function(mapDiv, fichehandler_instance){
    var root = this;
    var localfichehandler = new Object();

    this.territoire = "met";

    this.styles = {
        hoverroeiceStyle: [
            new ol.style.Style({
                /* Les points seront des puces bleues (une image) */
                image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                    anchor: [12.5, 39],
                    src: 'modules/custom/mapviewer/images/roe_red.png',
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
        ],
        hoverroeStyle: [
            new ol.style.Style({
                /* Les points seront des puces bleues (une image) */
                image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                    anchor: [12.5, 39],
                    src: 'modules/custom/mapviewer/images/roe_red.png',
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
        ],
        hoverstcarhyceStyle: [
            new ol.style.Style({
                /* Les points seront des puces bleues (une image) */
                image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                    anchor: [12.5, 39],
                    src: 'modules/custom/mapviewer/images/stcarhyce_red.png',
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
        ],
        blueStyle : [
            new ol.style.Style({
                /* Les points seront des puces bleues (une image) */
                image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                    anchor: [12.5, 39],
                    src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-icon.png',
                    anchorXUnits: 'pixels',
                    anchorYUnits: 'pixels',
                    opacity: 0.90,
                }),
                /* Les traits, en bleu un peu épais */
                stroke: new ol.style.Stroke({
                    lineCap: 'round',
                    color: 'rgba(3, 85, 145, 0.7)',
                    width: 4
                }),
                /* Couleur de remplissage */
                fill: new ol.style.Fill({
                    color: [61, 96, 152, 0.5]
                }),
                zIndex: 10
            }),
            new ol.style.Style({
                image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                    anchor: [12.5, 39],
                    src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-shadow.png',
                    anchorXUnits: 'pixels',
                    anchorYUnits: 'pixels',
                    opacity: 0.90,
                }),
                zIndex: 9
            })
        ],
        redStyle : [
            new ol.style.Style({
                /* Les points seront des puces bleues (une image) */
                image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                    anchor: [12.5, 39],
                    src: 'modules/custom/mapviewer/images/marker-icon-red.png',
                    anchorXUnits: 'pixels',
                    anchorYUnits: 'pixels',
                    opacity: 1,
                }),
                /* Les traits, en bleu un peu épais */
                stroke: new ol.style.Stroke({
                    lineCap: 'round',
                    color: 'rgba(220, 90, 90, 1',
                    width: 5
                }),
                /* Couleur de remplissage */
                fill: new ol.style.Fill({
                    color: [220, 90, 90, 1]
                }),
                zIndex: 10
            }),
            new ol.style.Style({
                image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                    anchor: [12.5, 39],
                    src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-shadow.png',
                    anchorXUnits: 'pixels',
                    anchorYUnits: 'pixels',
                    opacity: 0.90,
                }),
                zIndex: 9
            })
        ],
        yellowStyle: [
            new ol.style.Style({
                /* Les points seront des puces bleues (une image) */
                // image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                //     anchor: [12.5, 39],
                //     src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-icon.png',
                //     anchorXUnits: 'pixels',
                //     anchorYUnits: 'pixels',
                //     opacity: 0.90,
                // }),
                /* Les traits, en bleu un peu épais */
                stroke: new ol.style.Stroke({
                    lineCap: 'round',
                    color: 'rgba(0, 0, 100, 0.4)',
                    width: 8
                }),
                /* Couleur de remplissage */
                fill: new ol.style.Fill({
                    // color: [255, 255, 0, 0.2]
                    color: [0, 0, 0, 0.1]
                }),
                zIndex: 10
            }),
            new ol.style.Style({
                image: new ol.style.Icon({ /** @type {olx.style.IconOptions} */
                    anchor: [12.5, 39],
                    src: 'https://unpkg.com/leaflet@1.0.1/dist/images/marker-shadow.png',
                    anchorXUnits: 'pixels',
                    anchorYUnits: 'pixels',
                    opacity: 0.90,
                }),
                zIndex: 9
            })
        ],
        circleStyle: [
            new ol.style.Style({
                image: new ol.style.Circle({
                    radius: 4,
                    fill: new ol.style.Fill({
                        color: 'orange'
                    }),
                    stroke: new ol.style.Stroke({
                        color: [255, 255, 255],
                        width: 1
                    })
                })
            })
        ]
    }

    /*
     * Constructor
     */
    this.construct = function(mapDiv, fichehandler_instance){
        // jQuery("#loader").show();
        localfichehandler = fichehandler_instance
        /* WMS du Sandre */
        // Cours d'eau
        var wmsCoursEauSource = new ol.source.TileWMS({
            url: 'https://services.sandre.eaufrance.fr/geo/sandre',
            params: {
                'LAYERS': 'CoursEau_classe1,CoursEau_classe2,CoursEau_classe3,CoursEau_classe4,CoursEau_classe5,CoursEau_classe6,CoursEau_classe7'
            },
            crossOrigin: 'anonymous'
        });
        var wmsCoursEau = new ol.layer.Tile({
            title: 'Cours d\'eau',
            visible: false,
            source: wmsCoursEauSource,
        });
        // Plan d'eau
        var wmsPlanEauSource = new ol.source.TileWMS({
            url: 'https://services.sandre.eaufrance.fr/geo/sandre',
            params: {
                'LAYERS': 'PlanEau'
            },
            crossOrigin: 'anonymous'
        });
        var wmsPlanEau = new ol.layer.Tile({
            title: 'Plans d\'eau',
            visible: false,
            source: wmsPlanEauSource
        });

        var Troncons_SYRAH = new ol.layer.Tile({
            title: 'TGH - Tronçon Geomorphologiquement Homogène',
            type: 'hydromorpho',
            visible: false,
            source: new ol.source.TileWMS({
                url: 'https://maps.oieau.fr/ows/OIEau/ami_hydromorpho',
                params: {
                    'LAYERS': 'Troncons_SYRAH'
                },
                crossOrigin: 'anonymous'
            })
        });
        var USRA_SYRAH = new ol.layer.Tile({
            title: 'USRA - Unité Spatiale de Recueil et d\'Analyse',
            type: 'hydromorpho',
            visible: false,
            source: new ol.source.TileWMS({
                url: 'https://maps.oieau.fr/ows/OIEau/ami_hydromorpho',
                params: {
                    'LAYERS': 'USRA_SYRAH'
                },
                crossOrigin: 'anonymous'
            })
        });


        var roe = new ol.layer.Tile({
            title: 'Obstacles à l\'écoulement',
            type: 'hydromorpho',
            visible: false,
            source: new ol.source.TileWMS({
                url: 'https://maps.oieau.fr/ows/OIEau/ami_hydromorpho',
                params: {
                    'LAYERS': 'ObstEcoul'
                },
                crossOrigin: 'anonymous'
            })
        });

        /* Layer des entites cliquées */


        /* ied_carhyce */
        ied_carhyce_source = new ol.source.Vector({
            format: new ol.format.GeoJSON(),
            url: function(extent) {
                return 'https://maps.oieau.fr/ows/OIEau/ami_hydromorpho?SERVICE=WFS&REQUEST=GetFeature&VERSION=2.0.0&TYPENAMES=sa:ied_carhyce&outputformat=geojson';
            },
        });
        var ied_carhyce = new ol.layer.Vector({
            title: 'Stations de mesure Carhyce',
            visible: false,
            source: ied_carhyce_source,
            projection: 'EPSG:4326',
            style: root.styles.circleStyle
        });
        /* Openstreetmap  Layers */
         var olLayer = [new ol.layer.Tile({
             title: 'Open street map',
             visible: true,
             type: 'base',
             source: new ol.source.OSM()
         })];
        /*var olLayer = [new ol.layer.Tile({
            title: 'Open street map',
            visible: true,
            type: 'base',
            source: new ol.source.XYZ({
                url: 'https://{a-c}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png',
                crossOrigin: 'anonymous'
            })
        })];*/
        var openTopo = [new ol.layer.Tile({
            title: 'Open Topo',
            type: 'base',
            visible: false,
            source: new ol.source.XYZ({
                url: '//{a-c}.tile.opentopomap.org/{z}/{x}/{y}.png',
                // crossOrigin: 'anonymous'
            })
        })];
        /* Fond blanc */
        var whiteLayer = [new ol.layer.Tile({
            title: 'Fond blanc',
            visible: true,
            type: 'base',
            contrast: 0,
            brightness: 1
        })];
        /* Stamen Layer*/
        var stamenTerrain = [new ol.layer.Tile({
            title: 'Terrain en relief',
            type: 'base',
            visible: false,
            source: new ol.source.Stamen({
                layer: 'terrain'
            })
        })];
        /* Stamen Layer*/
        var stamenToner = [new ol.layer.Tile({
            title: 'Noir et blanc',
            type: 'base',
            visible: false,
            source: new ol.source.Stamen({
                layer: 'toner'
            })
        })];
        /* Maintenant on place tout ça dans un objet carte */
        var fondDeCarte = []
        map = new ol.Map({
            controls: ol.control.defaults().extend([
                new ol.control.FullScreen(),
                new ol.control.ScaleLine()
            ]),
            projection: 'EPSG:3857',
            layers: [new ol.layer.Group({
                    'title': 'Fond de carte',
                    layers: fondDeCarte.concat(whiteLayer, stamenTerrain, stamenToner, openTopo, olLayer /*bingLayers,*/ )
                }),
                new ol.layer.Group({
                    title: 'Couches Sandre',
                    layers: [wmsPlanEau, wmsCoursEau]
                }),
                new ol.layer.Group({
                    title: 'Couches hydromorphologiques',
                    layers: [/*ind_base_bio_SYRAH, ind_physique_SYRAH, ind_physique_ME, ind_base_bio_ME,*/ Troncons_SYRAH, USRA_SYRAH, ied_carhyce, roe]
                }),
                new ol.layer.Group({
                    title: 'Couches interactives',
                    layers: []
                }),

            ],
            target: document.getElementById(mapDiv),
            view: new ol.View({
                // center: [195678.79241, 5690971.749164],
                center: [308194.0980,5876478.7346],
                // extent: [-728903.5017,5041174.8895,1345291.6978,6709336.5948],
                maxZoom: 17,
                zoom: 6
            })
        });
        selectedFeature = new ol.Feature();
    }

    /*
     * Choix d'une emprise géo DOM / TOM
     */
    this.initemprisesgeo = function() {
        // console.log("initemprisesgeo");
        jQuery('#met').on('click', function (e) {
            root.territoire = "met"
            map.getView().fit([-728903.5017, 5041174.8895, 1345291.6978, 6709336.5948], { duration: 1000 } );
        });

        // Guadeloupe
        jQuery('#gua').on('click', function (e) {
            root.territoire = "gua"
            map.getView().fit([-6880639.447271852, 1785277.9421617945, -6790707.013272151, 1864381.2947347453], { duration: 1000 } );
        });
        // Martinique
        jQuery('#mar').on('click', function (e) {
            root.territoire = "mar"
            map.getView().fit([-6815985.712634657, 1618842.758636648, -6769303.47896755, 1675227.172954789], { duration: 1000 } );
        });
        // Guyanne
        jQuery('#guy').on('click', function (e) {
            root.territoire = "guy"
            map.getView().fit([-6078310.204141547, 235054.7576209647, -5746205.305923755, 640956.3987252256], { duration: 1000 } );
        });
        // Reunion
        jQuery('#reu').on('click', function (e) {
            root.territoire = "reu"
            map.getView().fit([6146676.089800716, -2438399.3231658326, 6215704.815122672, -2376601.3580462346], { duration: 1000 } );
        });
        // Mayotte
        jQuery('#may').on('click', function (e) {
            root.territoire = "may"
            map.getView().fit([5011419.083682236, -1460351.3626672423, 5042771.477989549, -1418243.3332407956], { duration: 1000 } );
        });
    }

    /*
     * Ajout du controle pour changer les différentes couches ajoutées à la carte
     */
    this.addLayerSwitcher = function() {
        layerSwitcher = new ol.control.LayerSwitcher({
            tipLabel: 'Gestion des couches',
            className: 'sandreSwitcher',
            activationMode: 'click',
            tipLabel: "Cliquez pour afficher le panneau de gestion des couches.",
            show_progress:true,
            extent: true,
            trash: true
        });
        map.addControl(layerSwitcher);
    }

    /**
     * Ajoute une liste déroulante de selection de couche Sandre
     * au panneau de gestion des couches
     */
    this.addLayerSelection = function() {
        // Add a select input to allow setting the groupSelectStyle style
        function createOption(name, text) {
            var option = document.createElement("option");
            option.value = name;
            option.text = text;
            return option;
        }

        function createOptGroup(name) {
            var optgroup = document.createElement("optgroup");
            optgroup.label = name;
            return optgroup;
        }
        // optgroup
        // Créer une liste déroulante
        var container = document.createElement('div');
        container.className = 'ol-unselectable ol-control add-layer-control';
        var select = document.createElement('select');
        select.id = 'group-select-style-input';
        container.appendChild(select);
        // Remplir cette liste avec la liste des layers sandre dispo en WMS
        var parser = new ol.format.WMSCapabilities();
        fetch('https://services.sandre.eaufrance.fr/geo/sandre?REQUEST=getCapabilities&service=WMS').then(function(response) {
            return response.text();
        }).then(function(text) {
            var result = parser.read(text);
            result.Capability.Layer.Layer.forEach((layer, index) => {
                optgroup = createOptGroup(layer.Name);
                layer.Layer.forEach((sslayer, index) => {
                    optgroup.appendChild(createOption(sslayer.Name, sslayer.Title));
                })
                select.add(optgroup);
            })
        });
        // Ajouter la liste déroulante sur la carte
        jQuery('.ol-overlaycontainer-stopevent').prepend(container);
        // Clic sur une layer dans la liste

        select.onchange = function(e) {
            // jQuery("#loader").show();
            wmsource = new ol.source.TileWMS({
                url: 'https://services.sandre.eaufrance.fr/geo/sandre',
                params: {
                    LAYERS: select.value,
                    TILED: true
                },
                crossOrigin: 'anonymous'
            })
            wmslayer = new ol.layer.Tile({
                title: jQuery("#group-select-style-input option:selected").text(),
                source: wmsource
            })
            wmsource.on('tileloadend', function() {
                // jQuery("#loader").hide();
            });
            // Récupérer le group2 de layers
            group = map.getLayerGroup().getLayers()
            layersgroup1 = group.item(1).getLayers()
            // Ajouter au groupe 1 nos nouvelle layers
            layersgroup1.push(wmslayer)
        };
    }


    /**
     * Lors d'un clic sur la carte et qu'il y a des features on les affiche dans la fiche
     */
    this.ficheControler = function() {
        map.on('singleclick', function(evt) {
            var feature = ""
            var layer = ""

            // init popup
            var featureArray = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {
                return [feature, layer];
            }, {
                hitTolerance: 5
            });
            if(featureArray) {
                feature = featureArray[0]
                layer = featureArray[1]
            }

            // S'il y a une feature a cet endroit on popup
            if (feature && layer.values_.type == 'objetdetude') {
                // selectFeaturesAndPopup(feature, layer);
                localfichehandler.createfiche(root.territoire, layer.values_.name, feature.values_.code)
            }
        });
    }

    this.highlightControler = function () {
        var highlightStyle = new ol.style.Style({
         stroke: new ol.style.Stroke({
           width: 3,
           color: 'yellow'
         }),
         fill: new ol.style.Fill()
        });


        var selectedFeature = null;
        var selectedFeatureOldStyle = null;
        map.on('pointermove', function(evt) {
            if (!evt.dragging) {
                var feature = ""
                var layer = ""

                if(selectedFeature != null) {
                    selectedFeature.setStyle(selectedFeatureOldStyle)
                    selectedFeature = null;
                    selectedFeatureOldStyle = null;
                }

                // init popup
                var featureArray = map.forEachFeatureAtPixel(evt.pixel, function(feature, layer) {
                    return [feature, layer];
                }, {
                    hitTolerance: 5
                });
                if(featureArray) {
                    feature = featureArray[0]
                    layer = featureArray[1]
                }

                // S'il y a une feature a cet endroit on highlight
                if (feature && layer.values_.type == 'objetdetude') {
                    map.getTargetElement().style.cursor  = 'pointer';
                    // Enregistrer le style et la feature pour anuler plus tard
                    selectedFeature = feature;
                    selectedFeatureOldStyle = feature.getStyle();
                    name = layer.get('name');
                    // Changer le style de l'actuelle
                    if(eval('root.styles.hover'+name+'Style')) {
                        feature.setStyle(eval('root.styles.hover'+name+'Style'));
                    }
                    else {
                        feature.setStyle(root.styles.redStyle);
                    }
                    feature.changed();
                }
                else {
                    map.getTargetElement().style.cursor  =  ''
                }
            }
        });

    }

    /*
     * Créer le contenu de la popup
     */
    var addPropertiesToPopup = function(properties, layer) {
        var rows = "";
        var htmlpopup = "";
        jQuery('#popup-content').html(htmlpopup);

        jQuery.each(properties, function(key, value) {
            if(key != "geometry")
            rows += "<tr><td>" + key + "</td><td>" + value + "</td></tr>";
        });
        htmlpopup = "<h2>"+layer.get('title')+"</h2>"
        htmlpopup += "<table>"+rows+"</table>";
        jQuery('#popup-content').html(htmlpopup);
    }

    /*
     * A partir d'une feature met la popup, change les style en rouge
     * de la feature et de la feature comparée
     */
    // var selectFeaturesAndPopup = function(feature, layer) {
    //     switchStyle(feature)
    //     // Calculer les coordonnée d'affichage de la popup
    //     var featureExtent = feature.getGeometry().getExtent();
    //     var coordinate = ol.extent.getCenter(featureExtent);
    //     // Zoommer
    //     flyTo(coordinate, function() {})
    //     // Afficher la popup
    //     overlay.setPosition(coordinate);
    //     overlay.setOffset([0, -10])
    //     addPropertiesToPopup(feature.getProperties(), layer);
    // }

    // /*
    //  * Change le style des feature selectionnées
    //  */
    // var switchStyle = function(feature) {
    //     selectedFeature.setStyle()
    //     feature.setStyle(root.styles.redStyle)
    //     selectedFeature = feature;
    // }

    /*
     * Aller sur un objet en "volant/zoomant"
     */
    var flyTo = function(location, done) {
        view = map.getView();
        var duration = 2000;
        var zoom = view.getZoom();
        var parts = 2;
        var called = false;

        function callback(complete) {
            --parts;
            if (called) {
                return;
            }
            if (parts === 0 || !complete) {
                called = true;
                done(complete);
            }
        }
        view.animate({
            center: location,
            duration: duration
        }, callback);
        // view.animate({
        //     zoom: zoom - 1,
        //     duration: duration / 2
        // }, {
        //     zoom: zoom,
        //     duration: duration / 2
        // }, callback);
    }

    /*
     * Pass options when class instantiated
     */
    this.construct(mapDiv, fichehandler_instance);

};
