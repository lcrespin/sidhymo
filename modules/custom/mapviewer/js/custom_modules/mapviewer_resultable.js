/*
 * Class resultable
 */
var resultable = function(map_instance, fichehandler_instance){

    var datahtml = ""

    var localmap = new Object();
    var localfichehandler = new Object();

    /*
     */
    this.construct = function(map_instance, fichehandler_instance){
      localmap = map_instance
      localfichehandler = fichehandler_instance
      jQuery('#bot_panel').hide();
      // Bouton pour masquer/afficher le bot panel
      jQuery('#close_bot_panel').click(function() {
        slideBotPanelMiddle();
      });
      this.initResultTable();

    };

    /**
     * Init le HTML de la table
     */
    this.initResultTable = function() {
        datahtml = '<table id="tableau_resultats" class="tablesorter">\
                    <thead>\
                      <tr>\
                        <th class="filter-select" data-placeholder="Filtrez par type d\'objet d\'étude">Type d\'objet d\'étude</th>\
                        <th>Libelle</th>\
                        <th>Code</th>\
                    </tr>\
                    </thead>\
                    <tbody>\
                    </tbody>\
                  </table>';
        jQuery('#bot_panel_middle').html(datahtml);

        jQuery('#tableau_resultats').tablesorter({
                theme: 'blue',
                headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
                widthFixed: true,
                widgets: ['zebra', 'stickyHeaders', 'filter' ],
                widgetOptions: {
                    // jQuery selector or object to attach sticky header to
                    stickyHeaders_attachTo : jQuery('.stickytable'),
                    // stickyHeaders_offset : 0,
                    // stickyHeaders_addCaption: true // or $('.wrapper')
                }
        });
        slideBotPanelMiddle('down');
    }

    /**
     * Ajouter un ensemble de resultat à la table
     */
    this.appendToResultTable = function(typeObjetEtude, data) {
        jQuery('#bot_panel').show();
        slideBotPanelMiddle('down');
        data.features.forEach(function(feature){
            // jsonResults.push({ "Objet d'étude": typeObjetEtude.libelle, Libelle: feature.properties['libelle'], Code: feature.properties['code'] });
            newRowContent = '<tr class="clickablerow" data-toggle="modal" data-target="#modalinformation" id="'+ typeObjetEtude.name + '_' + feature.properties['code'] +'">'+
                              '<td>' + typeObjetEtude.libelle + '</td>'+
                              '<td>' + feature.properties['libelle'] + '</td>'+
                              '<td>' + feature.properties['code'] + '</td>'+
                            '</tr>';

            jQuery("#tableau_resultats tbody").append(newRowContent);

        });

        jQuery('.clickablerow').click(function(e){
          objectid = e.currentTarget.id.split(/_(.+)/)
          localfichehandler.createfiche(localmap.territoire, objectid[0], objectid[1])
        });

        // Afficher
        // slideBotPanelMiddle('up')
    }

    /*
     * Slide up ou down de la table
     */
    var slideBotPanelMiddle = function(direction) {
      if (direction != undefined) {
        if (direction == "down") {
          jQuery('#bot_panel_middle').animate({
            height: "0px",
          });
          jQuery('#slidedownup').html("⏫");
          return;
        }
        else if (direction == "up") {
          jQuery('#tableau_resultats').trigger("updateAll");
          jQuery('#bot_panel_middle').animate({
            height: 500,
          });
          jQuery('#slidedownup').html("⏬");
          return;
        }
      }

      if (jQuery('#bot_panel_middle').css('height') != "0px") {
        jQuery('#bot_panel_middle').animate({
          height: "0px",
        });
        jQuery('#slidedownup').html("⏫");
      }
      else {
        jQuery('#tableau_resultats').trigger("updateAll");
        jQuery('#bot_panel_middle').animate({
          height: 500,
        });
        jQuery('#slidedownup').html("⏬");
      }
    }

    this.slideBotPanelMiddleDown = function() {
      jQuery('#bot_panel_middle').animate({
        height: "0px",
      });
      jQuery('#slidedownup').html("⏫");
    }
    /*
     * Pass options when class instantiated
     */
    this.construct(map_instance, fichehandler_instance);
};
