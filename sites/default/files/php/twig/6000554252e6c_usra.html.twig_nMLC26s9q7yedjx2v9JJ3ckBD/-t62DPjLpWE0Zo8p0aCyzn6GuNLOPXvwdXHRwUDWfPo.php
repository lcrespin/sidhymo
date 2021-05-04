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

/* modules/custom/mapviewer/templates/usra.html.twig */
class __TwigTemplate_fc9413c3632d5d03f7000d4815a7f7e5ab7460d0494060084fedf08fe3a696a6 extends \Twig\Template
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
        echo "  <div class=\"modal-header\">
    <h5 class=\"modal-title\" id=\"fiche_title\">";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 3, $this->source), "html", null, true);
        echo "</h5>
    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Fermer\">
      <span aria-hidden=\"true\">&times;</span>
    </button>
  </div>
  <div class=\"modal-body\">
        <div class=\"fiche\">
\t\t\t<div class=\"row\">
\t\t\t\t<fieldset class=\"localinfo\">
\t\t\t\t    <legend>Informations de localisation</legend>
\t\t\t\t\t";
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["localinfo"] ?? null), 13, $this->source), "html", null, true);
        echo "
\t\t\t\t</fieldset>
\t\t\t</div>

\t    \t<div class=\"row\">
\t    \t    <ul class=\"nav nav-tabs nav-fill\" id=\"tabs_operations\" role=\"tablist\">
\t    \t        <li class=\"nav-item\">
\t    \t            <a aria-controls=\"op1\" aria-selected=\"true\" class=\"nav-link active\" data-toggle=\"tab\" href=\"#op1\" id=\"op1-tab\" role=\"tab\">
\t    \t\t\t\t\tDonnées 2017 - dernière MAJ
\t    \t            </a>
\t    \t        </li>
\t    \t        <li class=\"nav-item\">
\t    \t            <a aria-controls=\"op2\" aria-selected=\"false\" class=\"nav-link disabled\" data-toggle=\"tab\" href=\"#op2\" id=\"op2-tab\" role=\"tab\">
\t    \t            \tDonnées précédentes (non dispo à ce jour)
\t    \t            </a>
\t    \t        </li>
\t    \t    </ul>
\t    \t</div>

\t    \t<div class=\"tab-content\" id=\"operation_information\">
\t    \t    <div aria-labelledby=\"op1-tab\" class=\"tab-pane fade show active\" id=\"op1\" role=\"tabpanel\">
\t    \t\t\t<div class=\"row\">
\t    \t\t\t    <ul class=\"nav nav-tabs nav-fill\" id=\"tabsop1\" role=\"tablist\">
\t    \t\t\t        <li class=\"nav-item\">
\t    \t\t\t            <a aria-controls=\"caracteristiques\" aria-selected=\"true\" class=\"nav-link active\" data-toggle=\"tab\" href=\"#caracteristiques\" id=\"caracteristiques-tab\" role=\"tab\">
\t    \t\t\t                Caractéristiques
\t    \t\t\t            </a>
\t    \t\t\t        </li>

\t    \t\t\t        <li class=\"nav-item\">
\t    \t\t\t            <a aria-controls=\"alteration\" aria-selected=\"false\" class=\"nav-link\" data-toggle=\"tab\" href=\"#alteration\" id=\"alteration-tab\" role=\"tab\">
\t    \t\t\t                Risques d’altération
\t    \t\t\t            </a>
\t    \t\t\t        </li>
\t    \t    \t        ";
        // line 47
        if ((array_key_exists("classe_alteration", $context) &&  !(null === ($context["classe_alteration"] ?? null)))) {
            // line 48
            echo "\t        \t                <li class=\"nav-item\">
\t        \t                    <a aria-controls=\"classe_alteration\" aria-selected=\"true\" class=\"nav-link\" data-toggle=\"tab\" href=\"#classe_alteration\" id=\"classe_alteration-tab\" role=\"tab\">
\t    \t\t\t\t\t\t\t\tClasses d'altération
\t        \t                    </a>
\t        \t                </li>
\t    \t\t\t\t\t";
        }
        // line 54
        echo "\t    \t    \t        ";
        if ((array_key_exists("elements_qualite", $context) &&  !(null === ($context["elements_qualite"] ?? null)))) {
            // line 55
            echo "\t    \t    \t        \t<li class=\"nav-item\">
\t    \t    \t        \t    <a aria-controls=\"elements_qualite\" aria-selected=\"false\" class=\"nav-link\" data-toggle=\"tab\" href=\"#elements_qualite\" id=\"elements_qualite-tab\" role=\"tab\">
\t    \t    \t        \t    \tEléments de qualité
\t    \t    \t        \t    </a>
\t    \t    \t        \t</li>
\t    \t\t\t\t\t";
        }
        // line 61
        echo "\t    \t\t\t    </ul>
\t    \t\t\t</div>
\t    \t\t\t<div class=\"row tab-content\" id=\"tabinformations\">
\t    \t\t\t    <div aria-labelledby=\"caracteristiques-tab\" class=\"tab-pane fade show active\" id=\"caracteristiques\" role=\"tabpanel\">
\t    \t\t\t\t\t";
        // line 65
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["caracteristiques"] ?? null), 65, $this->source), "html", null, true);
        echo "

\t    \t\t\t    </div>

\t    \t\t\t    <div aria-labelledby=\"alteration-tab\" class=\"tab-pane fade\" id=\"alteration\" role=\"tabpanel\">
\t    \t\t\t    \t";
        // line 70
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["alteration"] ?? null), 70, $this->source), "html", null, true);
        echo "
\t    \t\t\t    </div>

    \t    \t        ";
        // line 73
        if ((array_key_exists("classe_alteration", $context) &&  !(null === ($context["classe_alteration"] ?? null)))) {
            echo "\t
\t    \t\t\t        <div aria-labelledby=\"classe_alteration-tab\" class=\"tab-pane fade\" id=\"classe_alteration\" role=\"tabpanel\">
\t    \t\t\t    \t\t";
            // line 75
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["classe_alteration"] ?? null), 75, $this->source), "html", null, true);
            echo "
\t    \t\t\t        </div>
    \t\t\t\t\t";
        }
        // line 78
        echo "
    \t\t\t\t\t";
        // line 79
        if ((array_key_exists("elements_qualite", $context) &&  !(null === ($context["elements_qualite"] ?? null)))) {
            // line 80
            echo "\t    \t\t\t        <div aria-labelledby=\"elements_qualite-tab\" class=\"tab-pane fade\" id=\"elements_qualite\" role=\"tabpanel\">
\t    \t\t\t        \t";
            // line 81
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["elements_qualite"] ?? null), 81, $this->source), "html", null, true);
            echo "
\t    \t\t\t        </div>
    \t\t\t        ";
        }
        // line 84
        echo "
\t    \t\t\t</div>
\t    \t    </div>

\t    \t    <div aria-labelledby=\"op2-tab\" class=\"tab-pane fade\" id=\"op2\" role=\"tabpanel\">
\t    \t        <p></p>
\t    \t    </div>
\t    \t</div>
        </div>
  </div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/mapviewer/templates/usra.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  158 => 84,  152 => 81,  149 => 80,  147 => 79,  144 => 78,  138 => 75,  133 => 73,  127 => 70,  119 => 65,  113 => 61,  105 => 55,  102 => 54,  94 => 48,  92 => 47,  55 => 13,  42 => 3,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/mapviewer/templates/usra.html.twig", "/var/www/html/sidhymo/modules/custom/mapviewer/templates/usra.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 47);
        static $filters = array("escape" => 3);
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
