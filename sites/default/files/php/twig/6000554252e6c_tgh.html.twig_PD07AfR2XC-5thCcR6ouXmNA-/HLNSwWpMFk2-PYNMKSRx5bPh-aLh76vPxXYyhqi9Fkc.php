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

/* modules/custom/mapviewer/templates/tgh.html.twig */
class __TwigTemplate_0e47d4e0fba0ce78e095c79a0708f0c3d90f2ba8c76e56ca16a48c4081b25b0a extends \Twig\Template
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
        echo "<div class=\"modal-content h-100 w-100\">
    <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"fiche_title\">
            ";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 5, $this->source), "html", null, true);
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
            <div class=\"row\">
                <fieldset class=\"localinfo\">
                    <legend>
                        Informations de localisation
                    </legend>
                    ";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["localinfo"] ?? null), 20, $this->source), "html", null, true);
        echo "
                </fieldset>
            </div>
            <div class=\"row\">
                <ul class=\"nav nav-tabs nav-fill\" id=\"tabs_operations\" role=\"tablist\">
                    <li class=\"nav-item\">
                        <a aria-controls=\"op1\" aria-selected=\"true\" class=\"nav-link active\" data-toggle=\"tab\" href=\"#op1\" id=\"op1-tab\" role=\"tab\">
                            Données 2017 - dernière MAJ
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a aria-controls=\"op2\" aria-selected=\"false\" class=\"nav-link disabled\" data-toggle=\"tab\" href=\"#op2\" id=\"op2-tab\" role=\"tab\">
                            Données précédentes (non dispo à ce jour)
                        </a>
                    </li>
                </ul>
            </div>
            <div class=\"tab-content\" id=\"operation_information\">
                <div aria-labelledby=\"op1-tab\" class=\"tab-pane fade show active\" id=\"op1\" role=\"tabpanel\">
                    <div class=\"row\">
                        <ul class=\"nav nav-tabs nav-fill\" id=\"tabsop1\" role=\"tablist\">
                            <li class=\"nav-item\">
                                <a aria-controls=\"descriptif\" aria-selected=\"true\" class=\"nav-link active\" data-toggle=\"tab\" href=\"#descriptif\" id=\"descriptif-tab\" role=\"tab\">
                                    Descriptif du tronçon
                                </a>
                            </li>
                            <li class=\"nav-item\">
                                <a aria-controls=\"indicateurs\" aria-selected=\"false\" class=\"nav-link\" data-toggle=\"tab\" href=\"#indicateurs\" id=\"indicateurs-tab\" role=\"tab\">
                                    Indicateurs
                                </a>
                            </li>
                            <li class=\"nav-item\">
                                <a aria-controls=\"usra\" aria-selected=\"false\" class=\"nav-link\" data-toggle=\"tab\" href=\"#usra\" id=\"usra-tab\" role=\"tab\">
                                    USRA rattachées
                                </a>
                            </li>
                        </ul>
                    </div>



                    <div class=\"row tab-content\" id=\"tabinformations\">
                        <div aria-labelledby=\"descriptif-tab\" class=\"tab-pane fade show active\" id=\"descriptif\" role=\"tabpanel\">
\t\t\t\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t\t\t  <div class=\"row justify-content-md-center\">
\t\t\t\t\t\t\t\t";
        // line 65
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["descriptif"] ?? null), 65, $this->source), "html", null, true);
        echo "
\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t</div>
                        </div>
                        <div aria-labelledby=\"indicateurs-tab\" class=\"tab-pane fade\" id=\"indicateurs\" role=\"tabpanel\">
                        \t<div class=\"container-fluid\">
                        \t  <div class=\"row justify-content-md-center\">
\t\t\t\t\t\t\t\t";
        // line 72
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["indicateurs"] ?? null), 72, $this->source), "html", null, true);
        echo "
                        \t  </div>
                        \t</div>
                        </div>
                        <div aria-labelledby=\"usra-tab\" class=\"tab-pane fade\" id=\"usra\" role=\"tabpanel\">
                        \t<div class=\"container-fluid\">
\t\t\t\t\t\t\t\t<div class=\"row justify-content-md-center\">
\t\t\t\t\t\t\t\t\t<h5>USRA rattachée à ce tronçon</h5>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"row justify-content-md-center\">
\t\t\t\t\t\t\t\t\t";
        // line 82
        if ( !twig_test_empty(($context["usra"] ?? null))) {
            // line 83
            echo "\t\t\t\t\t\t\t\t\t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["usra"] ?? null), 83, $this->source), "html", null, true);
            echo "
\t\t\t\t\t\t\t\t\t";
        } else {
            // line 85
            echo "\t\t\t\t\t\t\t\t\t\t<p>Aucune USRA n'est rattachée à ce tronçon</p>
\t\t\t\t\t\t\t\t\t";
        }
        // line 87
        echo "\t\t\t\t\t\t\t\t</div>
                        \t</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/mapviewer/templates/tgh.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 87,  141 => 85,  135 => 83,  133 => 82,  120 => 72,  110 => 65,  62 => 20,  44 => 5,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/mapviewer/templates/tgh.html.twig", "/var/www/html/sidhymo/modules/custom/mapviewer/templates/tgh.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 82);
        static $filters = array("escape" => 5);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
