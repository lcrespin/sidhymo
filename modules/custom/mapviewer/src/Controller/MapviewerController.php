<?php

namespace Drupal\mapviewer\Controller;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Defines MapviewerController class.
 */
class MapviewerController extends ControllerBase
{
    private $config_objet = array(
        "usra"      => array(
            "territoire" => true,
            "met"        => array(
                "theme"         => "usra",
                "gid"           => "id_usra_dd",
                "code"          => "id_usra_dd",
                "libelle"       => "toponyme",
                "libelle_objet" => "USRA - Unité Spatiale de Recueil et d'Analyse",
            ),
            "drom"       => array(
                "theme"         => "usra",
                "gid"           => "id_usra",
                "code"          => "id_usra",
                "libelle"       => "toponyme_usra",
                "libelle_objet" => "USRA - Unité Spatiale de Recueil et d'Analyse",
            ),
        ),
        "tgh"       => array(
            "territoire" => true,
            "met"        => array(
                "theme"         => "tgh",
                "gid"           => "gid",
                "code"          => "id_troncon",
                "libelle"       => "toponyme",
                "libelle_objet" => "TGH - Tronçon Geomorphologiquement Homogène",
                "id_usra"       => "id_usra_dd",
            ),
            "drom"       => array(
                "theme"         => "tgh",
                "gid"           => "id_th",
                "code"          => "id_th",
                "libelle"       => "id_th",
                "libelle_objet" => "TGH - Tronçon Geomorphologiquement Homogène",
                "id_usra"       => "id_usra",
            ),
        ),
        "stcarhyce" => array(
            "theme"         => "stcarhyce",
            "gid"           => "code_station",
            "code"          => "code_station",
            "libelle"       => "localisation_station_de_mesure",
            "libelle_objet" => "Station de mesure Carhyce",
            "buffer"        => true,
        ),
        "roeice"    => array(
            "theme"         => "roe",
            "gid"           => "identifiant_roe",
            "code"          => "identifiant_roe",
            "libelle"       => "nom_principal_roe",
            "libelle_objet" => "Obstacle à l'écoulement",
            "buffer"        => true,
        ),
        "roe"       => array(
            "theme"         => "roe",
            "gid"           => "cdobstecou",
            "code"          => "cdobstecou",
            "libelle"       => "nomprincip",
            "libelle_objet" => "Obstacle à l'écoulement",
            "buffer"        => true,
            "filtre"        => " roe.cdobstecou NOT IN (SELECT roeice.identifiant_roe FROM roeice) AND ",
        ),
    );

    private $config_emprise = array(
        'hydroecoregion1'  => array(
            "code"          => "cdher1",
            "libelle"       => "nomher1",
            "libelle_objet" => "Hydro-ecorégion de niveau 1"),
        'hydroecoregion2'  => array(
            "code"          => "cdher2",
            "libelle"       => "nomher2",
            "libelle_objet" => "Hydro-ecorégion de niveau 2"),
        'regionhydro'      => array(
            "code"          => "cdregionhy",
            "libelle"       => "lbregionhy",
            "libelle_objet" => "Région hydrographique"),
        'courseau'         => array(
            "code"          => "cdentitehy",
            "libelle"       => "nomentiteh",
            "libelle_objet" => "Cours d'eau (BD Carthage ®)",
            "buffer"        => true),
        'massedeauriviere' => array(
            "code"          => "cdmassedea",
            "libelle"       => "nommassede",
            "libelle_objet" => "Masse d'eau cours d'eau",
            "buffer"        => true),
        'departement'      => array(
            "code"          => "cddepartem",
            "libelle"       => "lbdepartem",
            "libelle_objet" => "Département"),
        'commune'          => array(
            "code"          => "cdcommune",
            "libelle"       => "lbcommune",
            "libelle_objet" => "Commune"),
    );

    /**
     * Retourn le viewer carto avec la searchbar
     */
    public function getViewer()
    {
        return array(
            [
                '#theme'     => 'cartographie',
                '#searchbox' => [
                    '#id'            => 'searchbar',
                    '#type'          => 'select',
                    '#size'          => 60,
                    '#title'         => $this->t('Recherchez une emprise spatiale'),
                    '#title_display' => 'visible',
                ],
            ],
            [
                '#type'     => 'markup',
                '#markup'   => '',
                '#attached' => array(
                    'library' => array(
                        'mapviewer/main',
                    ),
                ),
            ],
        );
    }

    /*
     * Retourne une fiche ('popup') associée à l'objet d'étude
     */
    public function getFiche(Request $request)
    {
        // Recupérer le type et le code de l'objet dont on veux faire la fiche
        $territoire = $request->query->get('territoire');
        $type       = $request->query->get('type');
        $code       = $request->query->get('code');

        // Si on interroge un objet classé par territoire
        $config = $this->config_objet[$type];
        $table  = $type;
        if (isset($this->config_objet[$type]['territoire'])) {
            // Metropole
            if (isset($this->config_objet[$type][$territoire])) {
                $config = $this->config_objet[$type][$territoire];
            }
            // DROM
            else {
                $config = $this->config_objet[$type]['drom'];
                $table  = $type . "_" . $territoire;
            }
            // return "",
        }

        // Get infos de localisation
        $localinfo = $this->getInfoLocalisation($territoire, $type, $code);

        // Connection à la BDD
        $connection = Database::getConnection('default', 'data_sidhymo');

        // Get titre de la fiche
        $query = $connection->query("SELECT " . $config['libelle'] . " as libelle FROM public." . $table . " WHERE " . $config['code'] . "='" . $code . "' LIMIT 1");

        $libelle = $query->fetchAll();
        if (isset($libelle[0])) {
            $libelle = $libelle[0]->libelle;
        } else {
            $libelle = "";
        }

        // Render array de base
        $theme       = $config['theme'];
        $renderer    = \Drupal::service('renderer');
        $renderarray = array(
            [
                '#theme'     => $theme,
                '#title'     => $config['libelle_objet'] . " - " . ucfirst(strtolower($libelle)) . " - $code ",
                '#localinfo' => $localinfo,
            ],
        );

        // Ajouter les variables spécifique au type de fiche
        $var_spec = array();
        if ($type == "stcarhyce") {
            $var_spec = $this->getFicheCarhyce($code);
        }
        if ($type == "tgh") {
            $var_spec = $this->getFicheTgh($territoire, $code);
        }
        if ($type == "usra") {
            $var_spec = $this->getFicheUsra($territoire, $code);
        }
        if ($type == "roeice" || $type == "roe") {
            $var_spec = $this->getFicheRoe($territoire, $code);
        }
        // Ajout des variables de theme spécifiques
        foreach ($var_spec as $var => $vars) {
            $renderarray[0][$var] = $vars;
        }

        // renvoyer
        echo $renderer->render($renderarray);
        return new Response();
    }

    /*
     * Retourne le fieldset contenant les infos de localisation
     * en header de la fiche
     */
    private function getInfoLocalisation($territoire, $type, $code)
    {
        $localinfo_items = array();

        // Check cache
        $cid = "getinfolocalisation_" . $territoire . "_" . $type."_".$code;
        if ($cache = \Drupal::cache()->get($cid)) {
            $localinfo_items = $cache->data;
        }
        else {
            // Si on interroge un objet classé par territoire on récupère la bonne conf
            $configterr = $this->config_objet[$type];
            if (isset($this->config_objet[$type]['territoire'])) {
                // Metropole
                if (isset($this->config_objet[$type][$territoire])) {
                    $configterr = $this->config_objet[$type][$territoire];
                }
                // DROM
                else {
                    $configterr = $this->config_objet[$type]['drom'];
                    $type       = $type . "_" . $territoire;
                }
                // return "",
            }

            // Pour chaque couche ci-dessus rechercher les intersections avec l'objet
            $connection      = Database::getConnection('default', 'data_sidhymo');
            foreach ($this->config_emprise as $objet => $config_objet) {
                // Requete
                $query = $connection->query("SELECT t1." . $config_objet['code'] . ", t1." . $config_objet['libelle'] . " FROM public.$objet t1, public." . $type . " t2 WHERE t2." . $configterr['code'] . "='$code' AND ST_DWithin(t1.geom, t2.geom, 0.001)");
                if ($res = $query->fetch()) {
                    $cd                = $res->{$config_objet['code']};
                    $nom               = $res->{$config_objet['libelle']};
                    $localinfo_items[] = array('#markup' => '<b>' . $config_objet['libelle_objet'] . "</b> : $nom [$cd]");
                }
            }

            \Drupal::cache()->set($cid, $localinfo_items, CacheBackendInterface::CACHE_PERMANENT);
        }
        return [
            '#theme'              => 'item_list',
            '#list_type'          => 'ul',
            '#items'              => $localinfo_items,
            '#wrapper_attributes' => ['class' => 'localinfo'],
        ];
    }

    /*
     * Récupère la liste des opérations pour créer une fiche carhyce avec des onlgets pour chaque opération
     */
    private function getFicheCarhyce($code)
    {
        $operations = array();
        $connection = Database::getConnection('default', 'data_sidhymo');
        $query      = $connection->query("SELECT ope_id, ope_date_realisation  FROM ied.liste_operation  WHERE sme_cd_station_mesure_eaux_surface = '$code' ORDER BY ope_date_realisation DESC");
        if ($res = $query->fetchAll()) {
            foreach ($res as $operation) {
                $operations[$operation->ope_id] = date("d/m/Y", strtotime($operation->ope_date_realisation));
            }
        }

        return array("#operations" => $operations);
    }

    /*
     * Récupère le contenu des différents onglets pour le TGH
     */
    private function getFicheTgh($territoire, $code)
    {
        $conf_rows_descriptif = array(
            // TGH metropole
            "toponyme"  => array(
                "libelle" => "Toponyme de l'entité hydrographique",
                "unite"   => "",
            ),
            "longueur"  => array(
                "libelle" => "Longueur du tronçon",
                "unite"   => "m",
            ),
            "coorx_am"  => array(
                "libelle" => "Coordonée X amont",
                "unite"   => "Lambert 93",
            ),
            "coory_am"  => array(
                "libelle" => "Coordonée Y amont",
                "unite"   => "Lambert 93",
            ),
            "coorx_av"  => array(
                "libelle" => "Coordonée X aval",
                "unite"   => "Lambert 93",
            ),
            "coory_av"  => array(
                "libelle" => "Coordonée Y aval",
                "unite"   => "Lambert 93",
            ),
            "alt_av"    => array(
                "libelle" => "Altitude aval",
                "unite"   => "m",
            ),
            "alt_am"    => array(
                "libelle" => "Altitude amont",
                "unite"   => "m",
            ),

            // TGH RHUM: dans la table USRA
            "cours_eau" => array(
                "libelle" => "Toponyme de l'entité hydrographique",
                "unite"   => "",
            ),
            "long_th"   => array(
                "libelle" => "Longueur du tronçon",
                "unite"   => "m",
            ),
        );
        $conf_rows_indicateur = array(
            // TGH metropole
            "pente_lit"  => array(
                "libelle" => "Pente du lit mineur",
                "unite"   => "%",
            ),
            "surf_bv"    => array(
                "libelle" => "Surface du bassin versant amont",
                "unite"   => "km²",
            ),
            "larg_fdv"   => array(
                "libelle" => "Largeur du fond de valée",
                "unite"   => "m",
            ),
            "qspe_crue"  => array(
                "libelle" => "Débit spécifique de crue",
                "unite"   => "l.s-1.km-²",
            ),
            "pente_val"  => array(
                "libelle" => "Pente de la vallée",
                "unite"   => "%",
            ),
            "largeur_pb" => array(
                "libelle" => "Largeur théorique à plein bord",
                "unite"   => "m",
            ),
            "rap_encais" => array(
                "libelle" => "Rapport d'encaissement",
                "unite"   => "",
            ),
            // TGH RHUM: dans la table USRA
            "larg_pb_th" => array(
                "libelle" => "Largeur théorique à plein bord",
                "unite"   => "m",
            ),
            "larg_bdcar" => array(
                "libelle" => "Largeur de la surface hydraulique",
                "unite"   => "m",
            ),
            "pente"      => array(
                "libelle" => "Classe de pente",
                "unite"   => "",
            ),
            "substrat"   => array(
                "libelle" => "Substrat dominant",
                "unite"   => "",
            ),
            "f_vallee"   => array(
                "libelle" => "Fond de vallée",
                "unite"   => "",
            ),
            "classe_enc" => array(
                "libelle" => "Classe d’encaissement du tronçon",
                "unite"   => "",
            ),
            "nat_litho"  => array(
                "libelle" => "Nature lithologique",
                "unite"   => "",
            ),
            "typ_detail" => array(
                "libelle" => "Typologie du tronçon hydromorphologique détaillée",
                "unite"   => "",
            ),
            "typ_simple" => array(
                "libelle" => "Typologie du tronçon hydromorphologique simplifiée",
                "unite"   => "",
            ),
        );

        // Descriptif & indicateurs
        $header          = array("Objet d'étude", 'Valeur');
        $rows_descriptif = array();
        $rows_indicateur = array();
        $items_usra      = array();

        $tabletgh      = "tgh";
        $tableusra     = "usra";
        $codetgh       = "id_troncon";
        $config        = $this->config_objet['tgh']['met'];
        $toponyme_usra = "toponyme";
        if ($territoire != "met") {
            $config        = $this->config_objet['tgh']['drom'];
            $tabletgh      = "usra_" . $territoire;
            $tableusra     = "usra_" . $territoire;
            $codetgh       = $config['code'];
            $toponyme_usra = "toponyme_usra";
        }
        $connection = Database::getConnection('default', 'data_sidhymo');

        // TGH
        $query = $connection->query("SELECT * FROM public.$tabletgh WHERE $codetgh= '$code' LIMIT 1");
        if ($query) {
            while ($row = $query->fetchAssoc()) {
                foreach ($row as $col => $value) {
                    if (isset($conf_rows_descriptif[$col])) {
                        $rows_descriptif[] = array($conf_rows_descriptif[$col]['libelle'], $value . " " . $conf_rows_descriptif[$col]['unite']);
                    }
                    if (isset($conf_rows_indicateur[$col])) {
                        $rows_indicateur[] = array($conf_rows_indicateur[$col]['libelle'], $value . " " . $conf_rows_indicateur[$col]['unite']);
                    }
                }
            }
        }

        // USRA
        $query = $connection->query("SELECT * FROM public.$tableusra WHERE $codetgh = '$code'");
        if ($query) {
            while ($row = $query->fetchAssoc()) {
                $items_usra[] = array('#markup' => "<a href ='#'>[" . $row[$config['id_usra']] . "] " . $row[$toponyme_usra] . "</a>");
            }
        }

        if (sizeof($items_usra) == 0) {
            $usras = array();
        } else {
            $usras = array(
                '#theme'     => 'item_list',
                '#list_type' => 'ul',
                '#items'     => $items_usra,
            );
        }
        return array(
            "#descriptif"  => array(
                "#type"       => 'table',
                "#attributes" => array("class" => array('table', 'table-striped', 'tablesorter', 'tablesorter-blue')),
                "#header"     => $header,
                "#rows"       => $rows_descriptif,
            ),
            "#indicateurs" => array(
                "#type"       => 'table',
                "#attributes" => array("class" => array('table', 'table-striped', 'tablesorter', 'tablesorter-blue')),
                "#header"     => $header,
                "#rows"       => $rows_indicateur,
            ),
            "#usra"        => $usras,
        );
    }

    /*
     * Récupère le contenu des différents onglets pour les USRA
     */
    private function getFicheUsra($territoire, $code)
    {
        $conf_rows_caracteristiques = array(
            "longueur_u" => array(
                "libelle" => "Longueur de l’USRA",
                "unite"   => "m",
            ),
            "surface_bu" => array(
                "libelle" => "Surface de la zone tampon représentant l’emprise théorique du lit mineur",
                "unite"   => "m²",
            ),
            "surface__1" => array(
                "libelle" => "Surface de la zone tampon représentant 3 largeurs de cours d’eau",
                "unite"   => "m²",
            ),
            "surface__2" => array(
                "libelle" => "Surface de la zone tampon représentant 12 largeurs de cours d’eau restreinte dans un fond de vallée topographique",
                "unite"   => "m²",
            ),
            "surface__3" => array(
                "libelle" => "Surface de la zone tampon d’une largeur de 100m de part et d’autre du cours d’eau",
                "unite"   => "m²",
            ),
            "surface__4" => array(
                "libelle" => "Surface de la zone tampon d’une largeur de 10m de part et d’autre du lit mineur (théorique ou réel)",
                "unite"   => "m²",
            ),
            "surface__5" => array(
                "libelle" => "Surface de la zone tampon d’une largeur de 30m de part et d’autre du lit mineur (théorique ou réel)",
                "unite"   => "m²",
            ),
            "surface_co" => array(
                "libelle" => "Surface réelle (issue de la BD TOPO, IGN) du lit mineur pour les cours d’eau de rang 4 et plus",
                "unite"   => "m²",
            ),
            "surface_pl" => array(
                "libelle" => "Surface des plans d’eau sur le réseau hydrographique pour les cours d’eau de rang inférieurs à 4",
                "unite"   => "m²",
            ),
            "surface__6" => array(
                "libelle" => "Surface des plans d’eau déconnectés du réseau hydrographique dans le lit majeur pour les cours d’eau de rang supérieur ou égal à 4",
                "unite"   => "m²",
            ),
            "long_vcom_" => array(
                "libelle" => "Longueur cumulée des voies de communications (source : BD TOPO, IGN) à l’intérieur de la zone tampon représentant 3 largeurs de cours d’eau",
                "unite"   => "m",
            ),
            "long_vcom1" => array(
                "libelle" => "Longueur cumulée des voies de communications (source : BD TOPO, IGN) à l’intérieur de la zone tampon représentant 12 largeurs de cours d’eau restreinte dans un fond de vallée topographique",
                "unite"   => "m",
            ),
            "long_dig_3" => array(
                "libelle" => "Longueur cumulée des digues (source : BD TOPO, IGN) à l’intérieur de la zone tampon représentant 3 largeurs de cours d’eau",
                "unite"   => "m",
            ),
            "long_dig_1" => array(
                "libelle" => "Longueur cumulée des digues (source : BD TOPO, IGN) à l’intérieur de la zone tampon représentant 12 largeurs de cours d’eau restreinte dans un fond de vallée topographique",
                "unite"   => "m",
            ),
            "valid_dig"  => array(
                "libelle" => "Précision de l’exhaustivité de la présence de digues par l’emploi (1) ou non (0) du protocole BD TOPO de pays (source : IGN)",
                "unite"   => "",
            ),
            "nb_franchi" => array(
                "libelle" => "Nombre de franchissement du cours d’eau par une voie carrossable (source : BD TOPO, IGN)",
                "unite"   => "",
            ),
            "nb_seuils"  => array(
                "libelle" => "Nombre d’obstacle à l’écoulement (validé et non-validé, source : ROE version novembre 2011, ONEMA) présent dans la zone tampon représentant 3 largeurs de cours d’eau",
                "unite"   => "",
            ),
            "surface_ur" => array(
                "libelle" => "Surface de territoires artificialisés (poste 1* corine land cover) dans la zone tampon d’une largeur de 100m de part et d’autre du cours d’eau",
                "unite"   => "m²",
            ),
            "surface_ve" => array(
                "libelle" => "Surface de l’emprise de la végétation arborée (dans la zone tampon d'une largeur de 10m)",
                "unite"   => "m²",
            ),
            "surface__7" => array(
                "libelle" => "Surface de l’emprise de la végétation arborée (dans la zone tampon d'une largeur de 30m)",
                "unite"   => "m²",
            ),
            "surface__8" => array(
                "libelle" => "Surface de l’emprise de la végétation arborée (dans la zone tampon représentant 12 largeurs de cours d'eau)",
                "unite"   => "m²",
            ),
            // DROM
            "n"          => array(
                "libelle" => "Position de l'USRA dans le tronçon",
                "unite"   => "",
            ),
            "l_usra"     => array(
                "libelle" => "Longueur de l'USRA théorique",
                "unite"   => "m",
            ),
            "long_ursa"  => array(
                "libelle" => "Longueur de l'USRA recalculée",
                "unite"   => "m",
            ),
            "confl_maj"  => array(
                "libelle" => "Présence de confluences majeures en amont (5 TH amont)",
                "unite"   => "",
            ),
            "txrecti"    => array(
                "libelle" => "Taux de rectitude",
                "unite"   => "",
            ),
            "surf_bv_am" => array(
                "libelle" => "Surface du bassin versant de l'USRA",
                "unite"   => "m2",
            ),
            "i_pentep"   => array(
                "libelle" => "Pente (%) issu des TGH",
                "unite"   => "%",
            ),
            "i_sous_lar" => array(
                "libelle" => "Indicateur de sous-largeur : surface théorique du lit mineur / surface réelle",
                "unite"   => "",
            ),
            "i_berge"    => array(
                "libelle" => "Taux de boisement des berges",
                "unite"   => "%",
            ),
            "berge"      => array(
                "libelle" => "Classe de boisement des berges (fort, moyen, faible)",
                "unite"   => "",
            ),
            "mangrove"   => array(
                "libelle" => "Classe de présence de mangrove (absence, présence)",
                "unite"   => "",
            ),
            "pente"      => array(
                "libelle" => "Classe de pente",
                "unite"   => "",
            ),
            "pente_bio"  => array(
                "libelle" => "Classe de pente (seuil lié à continuité biologique)",
                "unite"   => "",
            ),
            "sinuosite"  => array(
                "libelle" => "Classe de sinuosité",
                "unite"   => "",
            ),
            "fq_facies"  => array(
                "libelle" => "Modification des facies",
                "unite"   => "",
            ),
            "etiage"     => array(
                "libelle" => "Caractéristique du débit à l’étiage naturel (caractérisé généralement par l'HER) (fort, moyen, faible)",
                "unite"   => "",
            ),
            "s_agri2"    => array(
                "libelle" => "classe de surface agricole",
                "unite"   => "",
            ),
            "d_ob"       => array(
                "libelle" => "Classe de densité  d'obstacles",
                "unite"   => "",
            ),
            "ind_prel"   => array(
                "libelle" => "Classe de prélèvement",
                "unite"   => "",
            ),

            "voie_com"   => array(
                "libelle" => "Classe en fonction de la densité de voies de communication",
                "unite"   => "",
            ),
            "pe_connec"  => array(
                "libelle" => "Classe selon le taux de surface de plan d'eau connecté",
                "unite"   => "",
            ),
            "d_ob_pr"    => array(
                "libelle" => "Classe de densité d’obstacles à proximité (1USRA en amont et 1 USRA en aval)",
                "unite"   => "",
            ),
        );

        $conf_rows_alteration = array(
            // Metropole
            "taux_seuil" => array(
                "libelle" => "Densité d’obstacles à l’écoulement",
                "unite"   => "nb/km",
            ),
            "taux_franc" => array(
                "libelle" => "Densité de franchissements",
                "unite"   => "nb/km",
            ),
            "taux_vcom_" => array(
                "libelle" => "Indicateur de présence de voies de communications à proximité du lit mineur",
                "unite"   => "%",
            ),
            "taux_vcom1" => array(
                "libelle" => "Indicateur de présence de voies de communications dans le lit majeur",
                "unite"   => "%",
            ),
            "taux_dig_3" => array(
                "libelle" => "Indicateur de présence de digues à proximité du lit mineur",
                "unite"   => "%",
            ),
            "taux_dig_1" => array(
                "libelle" => "Indicateur de présence de digues dans le lit majeur",
                "unite"   => "%",
            ),
            "taux_urb_1" => array(
                "libelle" => "Indicateur d’occupation du sol de type artificiel à proximité du lit mineur",
                "unite"   => "%",
            ),
            "taux_surla" => array(
                "libelle" => "Indicateur de surlargeur des grands cours d’eau",
                "unite"   => "%",
            ),
            "taux_pland" => array(
                "libelle" => "Indicateur de présence de plans d’eau sur le réseau hydrographique",
                "unite"   => "%",
            ),
            "taux_pla_1" => array(
                "libelle" => "Indicateur de présence de plans d’eau déconnectés du réseau hydrographique dans le lit majeur",
                "unite"   => "%",
            ),
            "taux_vege_" => array(
                "libelle" => "Indicateur du boisement des berges : rideau d’arbres",
                "unite"   => "%",
            ),
            "taux_vege1" => array(
                "libelle" => "Indicateur du boisement des berges : ripisylve",
                "unite"   => "%",
            ),
            "taux_veg_1" => array(
                "libelle" => "Indicateur de boisement du lit majeur",
                "unite"   => "%",
            ),
            "taux_recti" => array(
                "libelle" => "Indicateur de rectitude du tracé en plan du cours d’eau",
                "unite"   => "%",
            ),

            // DROM
            "i_s_urba_b" => array(
                "libelle" => "Taux de surface urbanisée dans le bassin versant",
                "unite"   => "%",
            ),
            "i_s_urba"   => array(
                "libelle" => "Taux de surface urbanisée (berges)",
                "unite"   => "%",
            ),
            "i_s_arti"   => array(
                "libelle" => "Taux de surface artificialisée (agriculture et urbanisation) (berges)",
                "unite"   => "%",
            ),
            "i_s_irr_bv" => array(
                "libelle" => "Ratio de surface irriguée utile dans le bassin versant",
                "unite"   => "",
            ),
            "i_s_agri"   => array(
                "libelle" => "Ratio des surfaces agricoles intensives dans le lit majeur dans le but d'apprécier les surfaces à forte érosion",
                "unite"   => "",
            ),
            "i_ind_prel" => array(
                "libelle" => "Indicateur de prélèvement (pompage/captage AEP, et irrigation) rapporté à la surface du bassin versant",
                "unite"   => "",
            ),
            "i_pe_conne" => array(
                "libelle" => "Taux de surface de plan d'eau connecté",
                "unite"   => "%",
            ),
            "i_pe_decon" => array(
                "libelle" => "Taux de surface de plan d'eau déconnecté",
                "unite"   => "%",
            ),
            "i_vol_am"   => array(
                "libelle" => "Volume stocké en amont rapporté à la surface du bassin versant",
                "unite"   => "",
            ),
            "i_vol_am_i" => array(
                "libelle" => "Volume stocké pour l'irrigation  rapporté à la surface du bassin versant",
                "unite"   => "m3",
            ),
            "nobs_aval"  => array(
                "libelle" => "Nombre d'obstacles à l'aval",
                "unite"   => "",
            ),
            "l_aval"     => array(
                "libelle" => "Somme des longueurs des USRA en aval",
                "unite"   => "m",
            ),
            "i_d_ob"     => array(
                "libelle" => "Nombre d'obstacles à l'aval ramené à la somme des longueurs des USRA en aval",
                "unite"   => "",
            ),
            "i_d_ob_pr"  => array(
                "libelle" => "Densité d’obstacles à proximité (1USRA en amont et 1 USRA en aval)",
                "unite"   => "",
            ),
            "i_voie_com" => array(
                "libelle" => "Densité de voies de communication",
                "unite"   => "",
            ),
            "digue"      => array(
                "libelle" => "Présence de digues",
                "unite"   => "",
            ),
            "s_agri"     => array(
                "libelle" => "Classe de surface agricoles intensives",
                "unite"   => "",
            ),
            "pe_decon"   => array(
                "libelle" => "Classe selon le taux de surface de plan d'eau déconnecté",
                "unite"   => "",
            ),
            "br"         => array(
                "libelle" => "Présence de barrage sur l'USRA",
                "unite"   => "",
            ),
            "br_am"      => array(
                "libelle" => "Présence de barrage en amont de l'USRA (10 USRA en amont)",
                "unite"   => "",
            ),
            "br_av"      => array(
                "libelle" => "Présence de barrage en aval de l'USRA (4 USRA en aval)",
                "unite"   => "",
            ),
            "br_av_pr"   => array(
                "libelle" => "Présence de barrage en aval proche de l'USRA (2 USRA en aval)",
                "unite"   => "",
            ),
            "br_usage"   => array(
                "libelle" => "Usage principale de barrage (10 USRA en amont)",
                "unite"   => "",
            ),
            "br_pointe"  => array(
                "libelle" => "Présence d'un barrage de Pointe en amont (10 USRA en amont)",
                "unite"   => "",
            ),
            "br_ecret"   => array(
                "libelle" => "Présence d'un barrage écrêteur en amont (10 USRA en amont)",
                "unite"   => "",
            ),
            "br_res"     => array(
                "libelle" => "Présence de barrage réservoir",
                "unite"   => "",
            ),

            "br_infran"  => array(
                "libelle" => "Présence de barrage infranchissable",
                "unite"   => "",
            ),
            "d_ob_w"     => array(
                "libelle" => "classe de Densité d’obstacles pondérés : Hauteur des obstacles cumulés sur l’USRA et relatif à la pente (somme des Hseuil/10P)",
                "unite"   => "",
            ),
            "sous_larg"  => array(
                "libelle" => "Classe de sous-largeur",
                "unite"   => "",
            ),
            "vol_am"     => array(
                "libelle" => "Classe de Volume stocké en amont ",
                "unite"   => "",
            ),
            "f_beton"    => array(
                "libelle" => "Présence de fond bétonné",
                "unite"   => "",
            ),
            "s_urba_bv"  => array(
                "libelle" => "Classe de surface urbanisée dans le BV",
                "unite"   => "",
            ),
            "vol_am_us"  => array(
                "libelle" => "Majorité des volumes stockés par les barrages amont sont pour l'irrigation",
                "unite"   => "",
            ),
            "s_urba"     => array(
                "libelle" => "Classe de surface urbanisée au niveau des berges",
                "unite"   => "",
            ),
            "curage"     => array(
                "libelle" => "Présence de Curage",
                "unite"   => "",
            ),
            "s_artif"    => array(
                "libelle" => "Classe de surface artificialisée",
                "unite"   => "",
            ),
            "carriere"   => array(
                "libelle" => "Présence de carrière",
                "unite"   => "",
            ),
            "s_irr"      => array(
                "libelle" => "Classe de surface irriguée",
                "unite"   => "",
            ),
        );

        $conf_rows_classe_alteration = array(
            "mph_rive1"  => array(
                "libelle" => "classe altération STRUCTURE RIVE & MANGROVE : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "mph_rive2"  => array(
                "libelle" => "classe altération STRUCTURE RIVE & MANGROVE  : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "mph_rive3"  => array(
                "libelle" => "classe altération STRUCTURE RIVE & MANGROVE  : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "mph_rive4"  => array(
                "libelle" => "classe altération STRUCTURE RIVE & MANGROVE  : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "mph_rive5"  => array(
                "libelle" => "classe altération STRUCTURE RIVE & MANGROVE  : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "mph_rive"   => array(
                "libelle" => "classe altération STRUCTURE RIVE & MANGROVE  : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "hyd_qte1"   => array(
                "libelle" => "classe altération HYDROLOGIE - QUANTITE : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "hyd_qte2"   => array(
                "libelle" => "classe altération HYDROLOGIE - QUANTITE : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "hyd_qte3"   => array(
                "libelle" => "classe altération HYDROLOGIE - QUANTITE : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "hyd_qte4"   => array(
                "libelle" => "classe altération HYDROLOGIE - QUANTITE : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "hyd_qte5"   => array(
                "libelle" => "classe altération HYDROLOGIE - QUANTITE : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "hyd_qte"    => array(
                "libelle" => "classe altération HYDROLOGIE - QUANTITE : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "hyd_dyn1"   => array(
                "libelle" => "classe altération HYDROLOGIE - DYNAMIQUE : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "hyd_dyn2"   => array(
                "libelle" => "classe altération HYDROLOGIE - DYNAMIQUE : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "hyd_dyn3"   => array(
                "libelle" => "classe altération HYDROLOGIE - DYNAMIQUE : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "hyd_dyn4"   => array(
                "libelle" => "classe altération HYDROLOGIE - DYNAMIQUE : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "hyd_dyn5"   => array(
                "libelle" => "classe altération HYDROLOGIE - DYNAMIQUE : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "hyd_dyn"    => array(
                "libelle" => "classe altération HYDROLOGIE - DYNAMIQUE : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "hyd_nap1"   => array(
                "libelle" => "classe altération HYDROLOGIE - CONNEXION AVEC LA NAPPE : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "hyd_nap2"   => array(
                "libelle" => "classe altération HYDROLOGIE - CONNEXION AVEC LA NAPPE : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "hyd_nap3"   => array(
                "libelle" => "classe altération HYDROLOGIE - CONNEXION AVEC LA NAPPE : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "hyd_nap4"   => array(
                "libelle" => "classe altération HYDROLOGIE - CONNEXION AVEC LA NAPPE : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "hyd_nap5"   => array(
                "libelle" => "classe altération HYDROLOGIE - CONNEXION AVEC LA NAPPE : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "hyd_nap"    => array(
                "libelle" => "classe altération HYDROLOGIE - CONNEXION AVEC LA NAPPE : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "con_lat1"   => array(
                "libelle" => "classe altération CONTINUITE LATERALE : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "con_lat2"   => array(
                "libelle" => "classe altération CONTINUITE LATERALE : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "con_lat3"   => array(
                "libelle" => "classe altération CONTINUITE LATERALE : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "con_lat4"   => array(
                "libelle" => "classe altération CONTINUITE LATERALE : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "con_lat5"   => array(
                "libelle" => "classe altération CONTINUITE LATERALE : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "con_lat"    => array(
                "libelle" => "classe altération CONTINUITE LATERALE : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "con_bio_m1" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - MIGRATION : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "con_bio_m2" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - MIGRATION : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "con_bio_m3" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - MIGRATION : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "con_bio_m4" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - MIGRATION : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "con_bio_m5" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - MIGRATION : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "con_bio_m"  => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - MIGRATION : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "con_bio_p1" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - PROXIMITE : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "con_bio_p2" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - PROXIMITE : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "con_bio_p3" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - PROXIMITE : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "con_bio_p4" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - PROXIMITE : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "con_bio_p5" => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - PROXIMITE : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "con_bio_p"  => array(
                "libelle" => "classe altération CONTINUITE BIOLOGIQUE - PROXIMITE : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "con_sedim1" => array(
                "libelle" => "classe altération CONTINUITE SEDIMENTAIRE : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "con_sedim2" => array(
                "libelle" => "classe altération CONTINUITE SEDIMENTAIRE : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "con_sedim3" => array(
                "libelle" => "classe altération CONTINUITE SEDIMENTAIRE : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "con_sedim4" => array(
                "libelle" => "classe altération CONTINUITE SEDIMENTAIRE : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "con_sedim5" => array(
                "libelle" => "classe altération CONTINUITE SEDIMENTAIRE : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "con_sedim"  => array(
                "libelle" => "classe altération CONTINUITE SEDIMENTAIRE : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "mph_ghy1"   => array(
                "libelle" => "classe altération GEOMETRIE HYDRAULIQUE : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "mph_ghy2"   => array(
                "libelle" => "classe altération GEOMETRIE HYDRAULIQUE : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "mph_ghy3"   => array(
                "libelle" => "classe altération GEOMETRIE HYDRAULIQUE : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "mph_ghy4"   => array(
                "libelle" => "classe altération GEOMETRIE HYDRAULIQUE : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "mph_ghy5"   => array(
                "libelle" => "classe altération GEOMETRIE HYDRAULIQUE : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "mph_ghy"    => array(
                "libelle" => "classe altération GEOMETRIE HYDRAULIQUE : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
            "mph_lit1"   => array(
                "libelle" => "classe altération STRUCTURE ET SUBSTRAT DU LIT : probabilité d'être dans la classe 'trèsfaible'",
                "unite"   => "",
            ),
            "mph_lit2"   => array(
                "libelle" => "classe altération STRUCTURE ET SUBSTRAT DU LIT : probabilité d'être dans la classe 'faible'",
                "unite"   => "",
            ),
            "mph_lit3"   => array(
                "libelle" => "classe altération STRUCTURE ET SUBSTRAT DU LIT : probabilité d'être dans la classe 'moyen'",
                "unite"   => "",
            ),
            "mph_lit4"   => array(
                "libelle" => "classe altération STRUCTURE ET SUBSTRAT DU LIT : probabilité d'être dans la classe 'fort'",
                "unite"   => "",
            ),
            "mph_lit5"   => array(
                "libelle" => "classe altération STRUCTURE ET SUBSTRAT DU LIT : probabilité d'être dans la classe 'trèsfort'",
                "unite"   => "",
            ),
            "mph_lit"    => array(
                "libelle" => "classe altération STRUCTURE ET SUBSTRAT DU LIT : SYNTHESE (classe ayant la plus forte probabilité)",
                "unite"   => "",
            ),
        );

        $conf_rows_elements_qualite = array(
            "hydro"      => array(
                "libelle" => "Elément de Qualtité hydromorphologique : HYDROLOGIE (3 classes)",
                "unite"   => "",
            ),
            "continuite" => array(
                "libelle" => "Elément de Qualtité hydromorphologique : CONTINUITE (3 classes)",
                "unite"   => "",
            ),
            "morpho"     => array(
                "libelle" => "Elément de Qualtité hydromorphologique : MORPHOLOGIE (3 classes)",
                "unite"   => "",
            ),
            "synthese"   => array(
                "libelle" => "Elément de Qualtité hydromorphologique : SYNTHESE (2 classes)",
                "unite"   => "",
            ),
        );

        // Descriptif & indicateurs
        $header                 = array("Objet d'étude", 'Valeur', 'Unité');
        $rows_caracteristiques  = array();
        $rows_alteration        = array();
        $rows_classe_alteration = array();
        $rows_elements_qualite  = array();

        $table  = "usra";
        $config = $this->config_objet['usra']['met'];
        if ($territoire != "met") {
            $config = $this->config_objet['usra']['drom'];
            $table  = "usra_" . $territoire;
        }
        $codeusra = $config['code'];

        $connection = Database::getConnection('default', 'data_sidhymo');
        $query      = $connection->query("SELECT * FROM public.$table WHERE $codeusra= '$code'");
        if ($query) {
            while ($row = $query->fetchAssoc()) {
                foreach ($row as $col => $value) {
                    if (isset($conf_rows_caracteristiques[$col])) {
                        $rows_caracteristiques[] = array($conf_rows_caracteristiques[$col]['libelle'], $value, $conf_rows_caracteristiques[$col]['unite']);
                    }
                    if (isset($conf_rows_alteration[$col])) {
                        $rows_alteration[] = array($conf_rows_alteration[$col]['libelle'], $value, $conf_rows_alteration[$col]['unite']);
                    }
                    if (isset($conf_rows_classe_alteration[$col])) {
                        $rows_classe_alteration[] = array($conf_rows_classe_alteration[$col]['libelle'], $value, $conf_rows_classe_alteration[$col]['unite']);
                    }
                    if (isset($conf_rows_elements_qualite[$col])) {
                        $rows_elements_qualite[] = array($conf_rows_elements_qualite[$col]['libelle'], $value, $conf_rows_elements_qualite[$col]['unite']);
                    }
                }
            }
        }

        $return = array(
            "#caracteristiques" => array(
                "#type"       => 'table',
                "#attributes" => array("class" => array('table', 'table-striped', 'tablesorter', 'tablesorter-blue')),
                "#header"     => $header,
                "#rows"       => $rows_caracteristiques,
            ),
            "#alteration"       => array(
                "#type"       => 'table',
                "#attributes" => array("class" => array('table', 'table-striped', 'tablesorter', 'tablesorter-blue')),
                "#header"     => $header,
                "#rows"       => $rows_alteration,
            ),
        );

        if (!empty($rows_classe_alteration)) {
            $return["#classe_alteration"] = array(
                "#type"       => 'table',
                "#attributes" => array("class" => array('table', 'table-striped', 'tablesorter', 'tablesorter-blue')),
                "#header"     => $header,
                "#rows"       => $rows_classe_alteration,
            );
        }

        if (!empty($rows_elements_qualite)) {
            $return["#elements_qualite"] = array(
                "#type"       => 'table',
                "#attributes" => array("class" => array('table', 'table-striped', 'tablesorter', 'tablesorter-blue')),
                "#header"     => $header,
                "#rows"       => $rows_elements_qualite,
            );
        }

        return $return;
    }

    /*
     * Récupère le contenu des différents onglets pour les OBS et les OBS d'ICE
     */
    private function getFicheRoe($territoire, $code)
    {
        // Descriptif & indicateurs
        $header   = array("Attribut", 'Valeur');
        $conf_rows_roe = array(
            "stobstecou" => array(
                "libelle" => "Statut de l'obstacle",
                "unite"   => "",
            ),
            "lbmodevali" => array(
                "libelle" => "Mode de validation de l'obstacle à l'écoulement",
                "unite"   => "",
            ),
            "lbetouvrag" => array(
                "libelle" => "État de l'ouvrage",
                "unite"   => "",
            ),
            "cdtypeouvr" => array(
                "libelle" => "Code type d'ouvrage",
                "unite"   => "",
            ),
            "lbtypeouvr" => array(
                "libelle" => "Type d'ouvrage",
                "unite"   => "",
            ),
            "coordxpoin" => array(
                "libelle" => "Coordonnée x",
                "unite"   => "",
            ),
            "coordypoin" => array(
                "libelle" => "Coordonnée y",
                "unite"   => "",
            ),
            "typecoordp" => array(
                "libelle" => "Type de projection",
                "unite"   => "",
            ),
            "lbtypedisp" => array(
                "libelle" => "Type de dispositif de franchissement piscicole",
                "unite"   => "",
            ),
            "lbtypedi_5" => array(
                "libelle" => "Type d'organe de franchissement de navigation",
                "unite"   => "",
            ),
            "lbusageobs" => array(
                "libelle" => "Usage de l'obstacle à l'écoulement",
                "unite"   => "",
            ),
            "hautmaxter" => array(
                "libelle" => "Hauteur maximale sur terrain naturel de l'ouvrage",
                "unite"   => "",
            ),
            "cdhautchut" => array(
                "libelle" => "Hauteur de chute à l'étiage par classe",
                "unite"   => "",
            ),
            "lbhautchut" => array(
                "libelle" => "Code Hauteur de chute à l'étiage par classe",
                "unite"   => "",
            ),
            "datemajobs" => array(
                "libelle" => "Date de mise à jour de l'obstacle à l'écoulement",
                "unite"   => "",
            ),
            "datevalido" => array(
                "libelle" => "Date de validation de l'obstacle à l'écoulement",
                "unite"   => "",
            ),
            "grenobstec" => array(
                "libelle" => "Ouvrage grenelle (f=Non t=Oui)",
                "unite"   => "",
            ),
        );
        $conf_rows_roeice = array(
            "identifiant_ice"             => array(
                "libelle" => "Identifiant ICE",
                "unite"   => "",
            ),
            "date_releve"                 => array(
                "libelle" => "Date du relevé",
                "unite"   => "",
            ),
            "date_creation"               => array(
                "libelle" => "Date de création",
                "unite"   => "",
            ),
            "date_modification"           => array(
                "libelle" => "Date de modification",
                "unite"   => "",
            ),
            "organisme"                   => array(
                "libelle" => "Organisme",
                "unite"   => "",
            ),
            "controle_donnees"            => array(
                "libelle" => "Contrôle de données",
                "unite"   => "",
            ),
            "niveau_qualification"        => array(
                "libelle" => "Niveau de qualification",
                "unite"   => "",
            ),
            "commentaire_qualification"   => array(
                "libelle" => "Commentaire qualification",
                "unite"   => "",
            ),
            "largeur_totale_obstacle"     => array(
                "libelle" => "Largeur totale de l'obstacle",
                "unite"   => "",
            ),
            "cours_eau_aval"              => array(
                "libelle" => "Cours d'eau aval",
                "unite"   => "",
            ),
            "debit_si_mesure"             => array(
                "libelle" => "Débit (si mesure)",
                "unite"   => "",
            ),
            "cote_ligne_eau_amont"        => array(
                "libelle" => "Côte ligne d'eau amont",
                "unite"   => "",
            ),
            "cote_ligne_eau_aval"         => array(
                "libelle" => "Côte ligne d'eau aval",
                "unite"   => "",
            ),
            "hauteur_chute_globale"       => array(
                "libelle" => "Hauteur de chute globale",
                "unite"   => "",
            ),
            "classe_ice_moins_limitante"  => array(
                "libelle" => "Classe ICE la moins limitante",
                "unite"   => "",
            ),
            "classe_ice_plus_limitante"   => array(
                "libelle" => "Classe ICE la plus limitante",
                "unite"   => "",
            ),
            "informations_source_donnees" => array(
                "libelle" => "Informations source de données",
                "unite"   => "",
            ),
        );


        $connection = Database::getConnection('default', 'data_sidhymo');
        $rows_roe = array();
        $rows_roeice = array();
        // ROE
        $query      = $connection->query("SELECT * FROM public.roe WHERE cdobstecou= '$code'");
        if ($query) {
            while ($row = $query->fetchAssoc()) {
                foreach ($row as $col => $value) {
                    if (isset($conf_rows_roe[$col])) {
                        $rows_roe[] = array($conf_rows_roe[$col]['libelle'], $value . " " . $conf_rows_roe[$col]['unite']);

            //     if (isset($conf_rows_caracteristiques[$col])) {
            //         $rows_caracteristiques[] = array($conf_rows_caracteristiques[$col]['libelle'], $value, $conf_rows_caracteristiques[$col]['unite']);
            //     }


                    }
                }
            }
        }

        // ROE ICE
        $query = $connection->query("SELECT * FROM public.roeice WHERE identifiant_roe='$code'");
        if ($query) {
            while ($row = $query->fetchAssoc()) {
                foreach ($row as $col => $value) {
                    if (isset($conf_rows_roeice[$col])) {
                        $rows_roeice[] = array($conf_rows_roeice[$col]['libelle'], $value . " " . $conf_rows_roeice[$col]['unite']);
                    }
                }
            }
        }

        $return = array(
            "#roe"    => array(
                "#type"       => 'table',
                "#attributes" => array("class" => array('table', 'table-striped', 'tablesorter', 'tablesorter-blue')),
                "#header"     => $header,
                "#rows"       => $rows_roe,
            )
        );
        if(!empty($rows_roeice)) {
            $return["#roeice"] = array(
                "#type"       => 'table',
                "#attributes" => array("class" => array('table', 'table-striped', 'tablesorter', 'tablesorter-blue')),
                "#header"     => $header,
                "#rows"       => $rows_roeice,
            );
        }
        return $return;
    }

    /*
     * Renvoie les objets json permettant de configurer les graphiques plotly en 3D, profil et travers
     * pour l'onglet geometrie des stations carhyce
     * Les objets json sont passé en tableau via le thème et converti en json via une instruction twig du style:
     *   var data_3D = {{ json_transects |  json_encode(constant('JSON_PRETTY_PRINT')) | raw }}
     * voir le fichier geomarchyce.html.twig
     */
    public function getCarhyceGeom(Request $request)
    {
        $operation = $request->query->get('operation');

        ///////////////////////////////////////////////////////////
        // GRAPHIQUE 3D ET 2D des transects
        $points     = array();
        $connection = Database::getConnection('default', 'data_sidhymo');
        $query      = $connection->query("SELECT *  FROM ied.liste_points  WHERE poi_ope_id = '$operation' ORDER BY poi_num ASC");
        if ($res = $query->fetchAll()) {
            // Pour chaque point
            foreach ($res as $point) {
                // si le numero du point est numerique, on l'ajoute au tableau
                if (is_numeric($point->poi_num)) {
                    $points[intval($point->poi_tra_id)][intval($point->poi_num)] = array(
                        "x" => $point->x,
                        "y" => $point->y,
                        "z" => $point->cote_pente);
                }
                // Le dernier point n'a pas de numero. Il faut l'ajouter quand même, à la fin...
                elseif ($point->poi_id == $point->poi_tra_id . "BB2") {
                    $last_point_transect[intval($point->poi_tra_id)] = $point;
                }
            }
        }

        // Trier les points
        ksort($points);
        foreach ($points as $tr => $pt) {
            ksort($points[$tr]);
        }

        // Ajouter les points de fin
        foreach ($last_point_transect as $idtransect => $lastpoint) {
            $points[$idtransect][] = array(
                "x" => $lastpoint->x,
                "y" => $lastpoint->y,
                "z" => $lastpoint->cote_pente);
        }

        // Make transects json
        $transects3D = array();
        $transects2D = array();
        foreach ($points as $transect => $points) {
            foreach ($points as $idpoint => $point) {
                // 3D
                $transects3D[$transect]['x'][] = floatval(str_replace(",", ".", $point['x']));
                $transects3D[$transect]['y'][] = floatval(str_replace(",", ".", $point['y']));
                $transects3D[$transect]['z'][] = floatval(str_replace(",", ".", $point['z']));

                // 2D
                $transects2D[$transect]['x'][] = floatval(str_replace(",", ".", $point['x']));
                $transects2D[$transect]['y'][] = floatval(str_replace(",", ".", $point['z']));
            }
            // 3D
            $transects3D[$transect]['name'] = "Transect " . $transect;
            $transects3D[$transect]['mode'] = "lines";
            $transects3D[$transect]['line'] = array(
                "color"      => $transects3D[$transect]['z'],
                "width"      => 10,
                "colorscale" => 'Blues',
            );
            $transects3D[$transect]['type'] = 'scatter3d';

            // 2D
            $transects2D[$transect]['name'] = "Transect " . $transect;
            $transects2D[$transect]['mode'] = "lines";
            if ($transect != 1) {
                $transects2D[$transect]['visible'] = "legendonly";
            }
            $transects2D[$transect]['line'] = array(
                "color" => "rgb(" . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ", " . mt_rand(0, 255) . ")",
                "width" => 3,
            );
            $transects2D[$transect]['type'] = 'scatter';
        }
        ///////////////////////////////////////////////////////////////////////

        // Récupérer le fond du lit
        $trace_fond_lit = array();
        $trace_cote_max = array();
        $trace_cote_eau = array();
        $trace_cote_pb  = array();
        $query          = $connection->query("
            SELECT cast( replace(fond_de_lit, ',', '.') as double precision) as fond_de_lit,
            cast( replace(cote_max, ',', '.') as double precision) as cote_max,
            cast( replace(cote_de_l_eau, ',', '.') as double precision) as cote_de_l_eau,
            cast( replace(cote_pb, ',', '.') as double precision) as cote_pb,
            cast( replace(y, ',', '.') as double precision) as x
            FROM ied.liste_transect
            WHERE tra_ope_id ='$operation'
            AND fond_de_lit != 'NA'
            ORDER BY  cast( replace(y, ',', '.') as double precision) ASC
        ");
        if ($res = $query->fetchAll()) {
            // Pour chaque point
            foreach ($res as $point) {
                $trace_fond_lit['x'][] = doubleval($point->x);
                $trace_fond_lit['y'][] = doubleval($point->fond_de_lit);

                $trace_cote_max['x'][] = doubleval($point->x);
                $trace_cote_max['y'][] = doubleval($point->cote_max);

                $trace_cote_eau['x'][] = doubleval($point->x);
                $trace_cote_eau['y'][] = doubleval($point->cote_de_l_eau);

                $trace_cote_pb['x'][] = doubleval($point->x);
                $trace_cote_pb['y'][] = doubleval($point->cote_pb);
            }

            $trace_fond_lit['mode'] = 'lines+markers';
            $trace_fond_lit['name'] = 'Cote du fond du lit';
            $trace_fond_lit['line'] = array(
                'color' => 'black',
                'width' => 3,
            );
            $trace_cote_max['mode'] = 'lines+markers';
            $trace_cote_max['name'] = 'Cote maximale';
            $trace_cote_max['line'] = array(
                'color' => 'red',
                'width' => 3,
            );
            $trace_cote_eau['mode'] = 'lines+markers';
            $trace_cote_eau['name'] = 'Cote eau';
            $trace_cote_eau['line'] = array(
                'color' => 'blue',
                'width' => 3,
            );
            $trace_cote_pb['mode'] = 'lines+markers';
            $trace_cote_pb['name'] = 'Cote plein bord moyen';
            $trace_cote_pb['line'] = array(
                'color' => 'green',
                'width' => 3,
            );
        }

        // Pente de la ligne d'eau
        $query = $connection->query("SELECT ope_pente_ligne_eau  FROM ied.liste_operation  WHERE ope_id = '$operation'");
        if ($res = $query->fetchAll()) {
            $pente_ligne_deau = $res[0]->ope_pente_ligne_eau;
        };

        // Render array de base
        $renderer    = \Drupal::service('renderer');
        $renderarray = array(
            [
                '#theme'            => "geomcarhyce",
                '#idoperation'      => $operation,
                '#json_transects'   => array_values($transects3D),
                '#json_profil'      => array_values(array($trace_fond_lit, $trace_cote_max, $trace_cote_eau, $trace_cote_pb)),
                '#json_transect2D'  => array_values($transects2D),
                '#pente_ligne_deau' => $pente_ligne_deau,
            ],
        );

        // renvoyer
        echo $renderer->render($renderarray);
        return new Response();
    }

    /*
     * Renvoie les objets json permettant de configurer les graphiques plotly de courbe granulo et triangle granulo
     * voir le fichier granulomarchyce.html.twig (même principe que pour la geom ci dessus)
     */
    public function getCarhyceGranulo(Request $request)
    {
        $operation  = $request->query->get('operation');
        $connection = Database::getConnection('default', 'data_sidhymo');

        // Radier
        $json_radier = array();
        $query       = $connection->query("SELECT * FROM ied.liste_granulo WHERE mgr_ope_id = '$operation'");
        if ($res = $query->fetchAll()) {
            // Pour chaque point
            foreach ($res as $point) {
                $json_radier['radier']['x'][] = doubleval($point->mgr_mesures);
                $json_radier['radier']['y'][] = doubleval($point->numero);
            }
        }
        //Tri croissant sur Axe y
        $size=count($json_radier['radier']['y']);
        foreach ($json_radier['radier']['x'] as $key => $value) {
          for ($i=$key; $i <$size ; $i++) {
            if($json_radier['radier']['y'][$i]<$json_radier['radier']['y'][$key]){

              $tmp = $json_radier['radier']['x'][$key];
              $json_radier['radier']['x'][$key] = $json_radier['radier']['x'][$i];
              $json_radier['radier']['x'][$i] = $tmp;

              $tmp = $json_radier['radier']['y'][$key];
              $json_radier['radier']['y'][$key] = $json_radier['radier']['y'][$i];
              $json_radier['radier']['y'][$i] = $tmp;

            }
          }
        }

        $json_radier['radier']['uid']  = 'Acetone';
        $json_radier['radier']['type'] = 'scatter';

        // Triangulaire
        $json_triangulaire = array();
        $query             = $connection->query("SELECT
                                                (
                                                    cast( replace(prct_rochers, ',', '.') as double precision)+
                                                    cast( replace(prct_blocs, ',', '.') as double precision)+
                                                    cast( replace(prct_pg, ',', '.') as double precision)
                                                ) prct_sup128,
                                                (
                                                    cast( replace(prct_pf, ',', '.') as double precision)+
                                                    cast( replace(prct_cg, ',', '.') as double precision)+
                                                    cast( replace(prct_cf, ',', '.') as double precision)+
                                                    cast( replace(prct_gg, ',', '.') as double precision)+
                                                    cast( replace(prct_gf, ',', '.') as double precision)
                                                ) prct_2a128,
                                                (
                                                    cast( replace(prct_sabes, ',', '.') as double precision)+
                                                    cast( replace(prct_limons, ',', '.') as double precision)+
                                                    cast( replace(prct_a, ',', '.') as double precision)+
                                                    cast( replace(prct_v, ',', '.') as double precision)
                                                ) prct_inf2
                                            FROM ied.liste_operation WHERE ope_id = '$operation'");

        if ($res = $query->fetchAll()) {
            // Pour chaque point
            foreach ($res as $pourcent) {
                $json_triangulaire['prct_sup128'] = doubleval($pourcent->prct_sup128 * 10);
                $json_triangulaire['prct_2a128']  = doubleval($pourcent->prct_2a128 * 10);
                $json_triangulaire['prct_inf2']   = doubleval($pourcent->prct_inf2 * 10);
            }
        }

        // $json_radier['radier']['uid'] = 'Acetone';
        // $json_radier['radier']['type'] = 'scatter';

        // Render array
        $renderer    = \Drupal::service('renderer');
        $renderarray = array(
            [
                '#theme'             => "granulocarhyce",
                '#idoperation'       => $operation,
                '#json_radier'       => array_values($json_radier),
                '#json_triangulaire' => $json_triangulaire,
            ],
        );

        // renvoyer
        echo $renderer->render($renderarray);
        return new Response();
    }

    /*
     * Renvoie les objets json permettant de configurer les graphiques plotly de courbe granulo et triangle granulo
     * voir le fichier granulomarchyce.html.twig (même principe que pour la geom ci dessus)
     */
    public function getCarhyceModele(Request $request)
    {
        $operation  = $request->query->get('operation');
        $connection = Database::getConnection('default', 'data_sidhymo');

        // Triangulaire
        $query = $connection->query("SELECT
                                replace(res_stand_moy_lm_qb, ',', '.') as res_stand_moy_lm_qb,
                                replace(res_stand_moy_ratiolp_qb, ',', '.') as  res_stand_moy_ratiolp_qb,
                                replace(res_stand_moy_pmouille, ',', '.') as res_stand_moy_pmouille,
                                replace(res_stand_moy_hmax_qb, ',', '.')  as  res_stand_moy_hmax_qb,
                                replace(res_stand_pente_ligne_eau_m, ',', '.') as res_stand_pente_ligne_eau_m,
                                replace(res_stand_moy_sm_qb, ',', '.') as res_stand_moy_sm_qb
                                FROM ied.liste_operation WHERE ope_id = '$operation'"
        );

        if ($res = $query->fetchAll()) {
            // Pour chaque point
            foreach ($res as $values) {
                $json_modele[] = array("x" => "Rapport Largeur/Profondeur à plein bord", "value" => abs($values->res_stand_moy_ratiolp_qb));
                $json_modele[] = array("x" => "Largeur à plein bord", "value" => abs($values->res_stand_moy_lm_qb));
                $json_modele[] = array("x" => "Surface mouillée plein bord", "value" => abs($values->res_stand_moy_sm_qb));
                $json_modele[] = array("x" => "Pente de la ligne d'eau", "value" => abs($values->res_stand_pente_ligne_eau_m));
                $json_modele[] = array("x" => "Profondeur maximale à plein bord", "value" => abs($values->res_stand_moy_hmax_qb));
                $json_modele[] = array("x" => "Profondeur des mouilles", "value" => abs($values->res_stand_moy_pmouille));
            }
        }

        // Render array
        $renderer    = \Drupal::service('renderer');
        $renderarray = array(
            [
                '#theme'       => "modelecarhyce",
                '#idoperation' => $operation,
                '#json_modele' => $json_modele,
            ],
        );

        // renvoyer
        echo $renderer->render($renderarray);
        return new Response();
    }

    /**
     *
     * Rechercher parmis les emprises géographiques
     */
    public function searchEmprise(Request $request)
    {
        $limit      = 5;
        $term       = $request->query->get('search');
        $territoire = $request->query->get('territoire');

        // Check cache
        $cid = "searchemprise_" . $term . "_" . $territoire;
        if ($cache = \Drupal::cache()->get($cid)) {
            $data = $cache->data;
        } else {

            // Affiche les 5 premiers si pas de recherche encore
            $search  = "";
            $orderby = "";
            if ($term == "") {
                $orderby = " ORDER BY text ASC LIMIT $limit ";
            } else {
                $search = " WHERE text @@ plainto_tsquery('$term') ";
            }
            // on filtre par territoire
            $territoire_filter = " WHERE ";
            if ($search != "") {
                $territoire_filter = " AND ";
            }
            $territoire_filter .= " ST_Intersects(geom, (SELECT geom FROM public.territoires WHERE territoire='$territoire')) ";

            $connection = Database::getConnection('default', 'data_sidhymo');

            // Hydroecoregion1
            $query           = $connection->query("SELECT CONCAT('hydroecoregion1.', gid) as id, CONCAT(cdher1, ' ', nomher1) as text FROM {hydroecoregion1} $search $territoire_filter $orderby");
            $hydroecoregion1 = $query->fetchAll();
            // Hydroecoregion2
            $query           = $connection->query("SELECT CONCAT('hydroecoregion2.', gid) as id, CONCAT(cdher2, ' ', nomher2) as text FROM {hydroecoregion2} $search $territoire_filter $orderby");
            $hydroecoregion2 = $query->fetchAll();
            // Régions hydrographique
            $query       = $connection->query("SELECT CONCAT('regionhydro.', gid) as id, CONCAT(cdregionhy, ' ', lbregionhy) as text FROM {regionhydro} $search $territoire_filter $orderby");
            $regionhydro = $query->fetchAll();
            // Departements
            $query        = $connection->query("SELECT CONCAT('departement.', gid) as id, CONCAT(cddepartem, ' ', lbdepartem) as text FROM {departement} $search $territoire_filter $orderby");
            $departements = $query->fetchAll();
            // Communes
            $query    = $connection->query("SELECT CONCAT('commune.', gid) as id, CONCAT(cdcommune, ' ', lbcommune) as text FROM {commune} $search $territoire_filter $orderby");
            $communes = $query->fetchAll();
            // Courseau
            $query    = $connection->query("SELECT CONCAT('courseau.', gid) as id, CONCAT(cdentitehy, ' ', nomentiteh) as text FROM {courseau} $search $territoire_filter $orderby");
            $courseau = $query->fetchAll();
            // Massedeau riviere
            $query            = $connection->query("SELECT CONCAT('massedeauriviere.', gid) as id, CONCAT(cdmassedea, ' ', nommassede) as text FROM {massedeauriviere} $search $territoire_filter $orderby");
            $massedeauriviere = $query->fetchAll();

            // Regroup
            $data   = array();
            $data[] = array("text" => "Hydroecoregion 1", "children" => $hydroecoregion1);
            $data[] = array("text" => "Hydroecoregion 2", "children" => $hydroecoregion2);
            $data[] = array("text" => "Régions hydrographiques", "children" => $regionhydro);
            $data[] = array("text" => "Departements", "children" => $departements);
            $data[] = array("text" => "Communes", "children" => $communes);
            $data[] = array("text" => "Cours d'eau", "children" => $courseau);
            $data[] = array("text" => "Masse d'eau rivière", "children" => $massedeauriviere);

            \Drupal::cache()->set($cid, $data, CacheBackendInterface::CACHE_PERMANENT);
        }
        // Response
        $response = new JsonResponse();
        $response->setData(["results" => $data]);

        return $response;
    }

    /**
     * Recherche les objets d'études qui sont situé dans l'emprise
     * passé en argument
     *
     */
    public function searchObjet(Request $request)
    {
        // Init
        $limit   = 5;
        $emprise = $request->query->get('emprise');
        $gid     = $request->query->get('gid');
        $type    = $request->query->get('type');

        // Check cache
        $cid = "searchobjet_" . $emprise . "_" . $gid . "_" . $type;
        if ($cache = \Drupal::cache()->get($cid)) {
            $data = $cache->data;
        } else {

            $config = $this->config_objet[$type];

            // Si on interroge un objet classé par territoire
            if (isset($this->config_objet[$type]['territoire'])) {
                $territoire = $this->getTerritoire($emprise, $gid);

                // Metropole
                if (isset($this->config_objet[$type][$territoire])) {
                    $config = $this->config_objet[$type][$territoire];
                }
                // DROM
                else {
                    $config = $this->config_objet[$type]['drom'];
                    $type   = $type . "_" . $territoire;
                }
                // return "",
            }

            // Objet d'étude croisant la route de l'objet d'emprise
            $gid_field     = $config["gid"];
            $code_field    = $config["code"];
            $libelle_field = $config["libelle"];

            // Filtre
            $filtre = "";
            if (isset($config["filtre"])) {
                $filtre = $config["filtre"];
            }
            $emprise_geom = "t1.geom";
            if (isset($config['projection'])) {
                $emprise_geom = "ST_Transform(t1.geom, " . $config['projection'][$territoire] . " )";
            }

            // Buffer
            $geomemprise = "ST_Intersects( t1.geom , $type.geom)";
            if (isset($this->config_emprise[$emprise]["buffer"]) && isset($config["buffer"])) {
                // $geomemprise = "ST_Buffer(t1.geom,10,'endcap=round join=round')";
                $geomemprise = "ST_DWithin(t1.geom, $type.geom, 0.001)";
            }

            $querystr = <<<EOT
            SELECT json_build_object(
                'type', 'FeatureCollection',
                'features', json_agg(ST_AsGeoJSON(t.*)::json)
            )
            FROM (
                    SELECT $type.geom, $type.$gid_field as gid, $type.$code_field as code, $type.$libelle_field as libelle
                    FROM public.$emprise t1, public.$type $type
                    WHERE $filtre t1.gid=$gid
                    AND $geomemprise
                  )
            AS t;
EOT;

            // echo $querystr;
            // return"";
            $connection = Database::getConnection('default', 'data_sidhymo');
            $query      = $connection->query($querystr);
            $data       = $query->fetchAll();
            \Drupal::cache()->set($cid, $data);
        }

        // Response
        $response = new JsonResponse();
        $response = JsonResponse::fromJsonString($data[0]->json_build_object);

        return $response;
    }

    /*
     * Dans quel territoire est $typeobjet de code $codeobjet
     */
    private function getTerritoire($typeobjet, $gid)
    {
        $champcode = $this->config_emprise[$typeobjet]['code'];

        $connection = Database::getConnection('default', 'data_sidhymo');
        $query      = $connection->query("SELECT territoires.territoire FROM public.territoires, public.$typeobjet WHERE $typeobjet.gid = '$gid' AND ST_Intersects(territoires.geom, $typeobjet.geom)");
        $queryfetch = $query->fetchAll();
        return $queryfetch[0]->territoire;
    }

    public function getConfig_objet()
    {
      return $this->config_objet;
    }
}
