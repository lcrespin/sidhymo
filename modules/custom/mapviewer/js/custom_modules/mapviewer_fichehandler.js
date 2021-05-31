/*
 * Class resultable
 */
var fichehandler = function(options){
  var root=this;
    /*
     * Constructeur
     */
    this.construct = function(options){

    };

    /*
     * Créé dynamiquement la fiche à partir de "typeobjet"
     * Exemple:
     */
    this.createfiche = function(territoire, typeobjet, idobjet) {
      // Afficher la fiche modal
      jQuery('#modalinformation').modal('show')

      // Charger le contenu de la fiche
      jQuery('#fiche_content').load("getfiche?territoire="+territoire+"&type="+typeobjet+"&code="+idobjet, function( response, status, xhr ) {
          // Get config objet
          config.array_objets_etude.forEach(function(typeObjetEtude){
            if (typeObjetEtude.name == typeobjet) {
              lbtype = typeObjetEtude.libelle
            }
          });

          // jQuery('#fiche_title').html(lbtype+" "+idobjet)
          if ( typeobjet == "stcarhyce" ) {
            make_stcarhyce(idobjet);
          }
          if ( typeobjet == "tgh" ) {
            jQuery(".informationusra").click(function() {
              fichehandler2 = new fichehandler();
              fichehandler2.createfiche(territoire,'usra',jQuery(".informationusra").attr('id'));
            });
          }
          if( status == "error" ) {
              jQuery('#fiche_content').html("Désolé, cette fiche n'a pas encore été crée...")
          }
      });

      jQuery('#modalinformation').on('hidden.bs.modal', function (e) {
        jQuery('#fiche_content').html('<div class="modal-content h-100 w-100">\
                                        <div class="modal-header">\
                                            <h5 class="modal-title" id="fiche_title">\
                                            </h5>\
                                            <button aria-label="Fermer" class="close" data-dismiss="modal" type="button">\
                                                <span aria-hidden="true">\
                                                    ×\
                                                </span>\
                                            </button>\
                                        </div>\
                                        <div class="modal-body">\
                                            <div class="fiche">\
                                                <div class="loader">\
                                                    <p>\
                                                        Fiche en cours de chargement...\
                                                    </p>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>')
      })
    };


    /*
     *
     * Complète les fiches carhyce
     *
     */
    var make_stcarhyce = function(idobjet) {
      // Sur l'activation d'un onglet
      jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // Récupérer l'ID de l'onglet
        var id_tab = e.currentTarget.id.split('-');
        typeOnglet = id_tab[0];
        idOperation = id_tab[1];

        switch (typeOnglet) {
          // Si on active un onglet d'opération
          case  "op":
            // Alors on active la tab geométrie
            jQuery("#geom-"+id_tab[1]+"-tab").tab('show')
            break;
          // Si on active un onglet geom
          case "geom":
            // On va chercher la geometrie de l'opération
            jQuery("#geom-"+id_tab[1]).load('getcarhycegeom?operation='+idOperation, function( response, status, xhr ) {})
            break;

          // Si on active un onglet granulo
          case "granulo":
            // On va chercher la granulo de l'opération
            jQuery("#granulo-"+id_tab[1]).load('getcarhycegranulo?operation='+idOperation, function( response, status, xhr ) {})
            break;

          // Si on active un onglet habitat
          case "habitat":
            // On va chercher l'habitat de l'opération
            jQuery("#habitat-"+id_tab[1]).load('getcarhycehabitat?operation='+idOperation, function( response, status, xhr ) {})
            break;

          // Si on active un onglet modele
          case "modele":
            // On va chercher le modele de l'opération
            jQuery("#modele-"+id_tab[1]).load('getcarhycemodele?operation='+idOperation, function( response, status, xhr ) {})
            break;
        }
      });

      // Par défaut on active le premier onglet de la premiere opération
      jQuery('a[data-toggle="tab"].active').trigger("shown.bs.tab");

    };

    // /*
    //  * Créé le IMG
    //  */
    // var makeImgChart = function(idobjet) {
    //   anychart.onDocumentReady(function () {
    //     // create data for the second series
    //     var data_2 = [
    //       {"x": "Rapport Largeur/Profondeur à plein bord", "value": 0.56},
    //       {"x": "Largeur à plein bord", "value": 0.258},
    //       {"x": "Surface mouillée plein bord", "value": 0.327},
    //       {"x": "Pente de la ligne d'eau", "value": 0.337},
    //       {"x": "Profondeur maximale à plein bord", "value": 0.597},
    //       {"x": "Profondeur des mouilles", "value": 0.357}
    //     ];

    //     var x0 = data_2[0].value;
    //     var x1 = data_2[1].value;
    //     var x2 = data_2[2].value;
    //     var x3 = data_2[3].value;
    //     var x4 = data_2[4].value;
    //     var x5 = data_2[5].value;
    //     var IMG = parseFloat(x0 + x1 + x2 + x3 + x4 + x5).toFixed(2);
    //     // console.log(IMG);
    //     // document.getElementById('IMG').innerHTML = 'IMG=' + IMG;
    //     // console.log(name);

    //     // create a chart
    //     chart = anychart.radar();
    //     //chart.yScale().minimum(0);
    //     //chart.yScale().maximum(5);
    //     var ticksArray = [0, 1, 2, 3, 4, 5];
    //     chart.yScale().ticks().set(ticksArray);


    //     var labels = chart.xAxis().labels();
    //     labels.fontFamily("Courier");
    //     labels.fontSize(14);
    //     labels.fontColor("#125393");
    //     labels.fontWeight("bold");

    //     // create the first series (line) and set the data
    //     // var series1 = chart.line(data_1);

    //     // create the second series (area) and set the data
    //     var series2 = chart.area(data_2);

    //     // set the container id
    //     chart.container("imgcontainer");

    //     // initiate drawing the chart
    //     chart.draw();
    //   });
    // };

    /*
     * Pass options when class instantiated
     */
    this.construct(options);
};
