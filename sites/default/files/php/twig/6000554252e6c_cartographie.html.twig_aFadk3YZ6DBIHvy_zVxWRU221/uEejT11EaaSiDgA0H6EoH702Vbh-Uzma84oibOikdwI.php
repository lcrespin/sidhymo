<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/mapviewer/templates/cartographie.html.twig */
class __TwigTemplate_cdfc13626791ee91ee765d0e7e96c156a9913c0a13df9eefd4b331d1c17bd91f extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 2
        echo "<!-- notification -->
<div id=\"notifications\" class=\"position-absolute w-100 p-4 d-flex flex-column align-items-center\" style=\"top: 25px;\">   

</div>

 <!-- Carte -->
<div class=\"map\" id=\"map\">
</div>

<!-- Container -->  
<div class=\"container-fluid\">
    <!-- Barre de recherche du haut de carte (searchbox) -->
    <div class=\"row\">
        <div class=\"col\" style=\"z-index: -10;\">
        </div>
        <div class=\"col-5\">
            ";
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["searchbox"] ?? null), 18, $this->source), "html", null, true);
        echo "
            <!-- Loader spinner -->
        </div>
        <div class=\"col\" style=\"z-index: -10;\">
        </div>
    </div>
    <div class=\"row\">
        <div class=\"col-1\">
            <!-- Barre de changement d'emprise (DROM) --> 
            <div class=\"selectemp\">
                <div class=\"col\" id=\"met\">
                    Metropole
                </div>
                <div class=\"col\" id=\"gua\">
                    Guadeloupe
                </div>
                <div class=\"col\" id=\"mar\">
                    Martinique
                </div>
                <div class=\"col\" id=\"guy\">
                    Guyane
                </div>
                <div class=\"col\" id=\"reu\">
                    Réunion
                </div>
                <div class=\"col\" id=\"may\">
                    Mayotte
                </div>
            </div>
        </div>
        <!-- Zone de notification de chargement --> 
<!--         <div class=\"col\">

        </div>
        <div class=\"col-1\">
        </div> -->
    </div>

    <!-- Tableaux de resultats (sticky en bas) --> 
    <div class=\"fixed-bottom\" id=\"bot_panel\">
        <div class=\"row\" >
            <div class=\"col\" style=\"z-index: -10;\">
            </div>
            <div class=\"col-9\">
                <div class=\"row\" style=\"background: #053b8182; color: white;font-weight: bold;height: 28px;\">
                  <div class=\"col\">
                    <p>Liste des objets d'étude hydromorphologique localisés dans l'emprise géographique selectionnée.</p>
                  </div>
                  <div class=\"col-1\">
                    <button id=\"close_bot_panel\" aria-label=\"Close\" class=\"close\" type=\"button\">
                        <span id=\"slidedownup\" aria-hidden=\"true\" style=\"color: white\">⏬</span>
                    </button>
                  </div>
                </div>
                <div class=\"row\">
                  <div class=\"col stickytable\">
                    <div id=\"bot_panel_middle\"></div>
                  </div>
                </div>
            </div>
            <div class=\"col\">
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class=\"modal fade\" id=\"modalinformation\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"fiche_title\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-xl modal-dialog-centered\" role=\"document\">
    <div class=\"modal-content h-100 w-100\" id=\"fiche_content\">
        <div class=\"modal-content h-100 w-100\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\" id=\"fiche_title\">
                    ";
        // line 94
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 94, $this->source), "html", null, true);
        echo "
                </h5>
                <button aria-label=\"Fermer\" class=\"close\" data-dismiss=\"modal\" type=\"button\">
                    <span aria-hidden=\"true\">
                        ×
                    </span>
                </button>
            </div>
            <div class=\"modal-body\">
                <div class=\"fiche\">
                    <div class=\"loader\">
                        <p>
                            Fiche en cours de chargement...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "modules/custom/mapviewer/templates/cartographie.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 94,  57 => 18,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/mapviewer/templates/cartographie.html.twig", "/var/www/html/sidhymo/modules/custom/mapviewer/templates/cartographie.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 18);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
