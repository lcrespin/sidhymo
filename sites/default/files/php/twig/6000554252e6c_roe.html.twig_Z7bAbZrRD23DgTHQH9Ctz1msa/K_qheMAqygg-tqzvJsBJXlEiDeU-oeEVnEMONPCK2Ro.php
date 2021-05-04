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

/* modules/custom/mapviewer/templates/roe.html.twig */
class __TwigTemplate_1d6c32d2a1dbc97a80695498cfba828ca7fae9f05af3aef9e9911a2d09be7a3e extends \Twig\Template
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
\t<div class=\"modal-header\">
\t    <h5 class=\"modal-title\" id=\"fiche_title\">
\t        ";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 5, $this->source), "html", null, true);
        echo "
\t    </h5>
\t    <button aria-label=\"Fermer\" class=\"close\" data-dismiss=\"modal\" type=\"button\">
\t        <span aria-hidden=\"true\">
\t            ×
\t        </span>
\t    </button>
\t</div>
\t<div class=\"modal-body\">
\t    <div class=\"fiche\">
\t\t\t<div class=\"row\">
\t\t\t\t<fieldset class=\"localinfo\">
\t\t\t\t    <legend>
\t\t\t\t    \tInformations de localisation
\t\t\t\t\t</legend>
\t\t\t\t\t";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["localinfo"] ?? null), 20, $this->source), "html", null, true);
        echo "
\t\t\t\t</fieldset>
\t\t\t</div>
\t\t\t<div class=\"row\">
\t\t\t    <ul class=\"nav nav-tabs nav-fill\" id=\"tabs_informations\" role=\"tablist\">
\t\t\t        <li class=\"nav-item\">
\t\t\t            <a aria-controls=\"roe\" aria-selected=\"true\" class=\"nav-link active\" data-toggle=\"tab\" href=\"#roe\" id=\"roe-tab\" role=\"tab\">
\t\t\t                Information sur l'obstacle à l'écoulement
\t\t\t            </a>
\t\t\t        </li>

\t\t\t        ";
        // line 31
        if ((array_key_exists("roeice", $context) &&  !(null === ($context["roeice"] ?? null)))) {
            echo "\t
\t\t\t\t        <li class=\"nav-item\">
\t\t\t\t            <a aria-controls=\"roeice\" aria-selected=\"false\" class=\"nav-link\" data-toggle=\"tab\" href=\"#roeice\" id=\"roeice-tab\" role=\"tab\">
\t\t\t\t\t\t\t\tInformation sur la continuité écologique
\t\t\t\t            </a>
\t\t\t\t        </li>
\t\t\t        ";
        }
        // line 38
        echo "
\t\t\t    </ul>
\t\t\t</div>
\t\t\t<div class=\"tab-content\" id=\"roe_information\">
\t\t\t    <div aria-labelledby=\"roe-tab\" class=\"tab-pane fade show active\" id=\"roe\" role=\"tabpanel\">
\t\t\t\t\t";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["roe"] ?? null), 43, $this->source), "html", null, true);
        echo "
\t\t\t    </div>

\t\t\t    ";
        // line 46
        if ((array_key_exists("roeice", $context) &&  !(null === ($context["roeice"] ?? null)))) {
            echo "\t
\t\t\t\t    <div aria-labelledby=\"roeice-tab\" class=\"tab-pane fade\" id=\"roeice\" role=\"tabpanel\">
\t\t\t\t    \t";
            // line 48
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["roeice"] ?? null), 48, $this->source), "html", null, true);
            echo "
\t\t\t\t    </div>
\t\t\t    ";
        }
        // line 51
        echo "
\t\t\t</div>
\t    </div>
\t</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/mapviewer/templates/roe.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 51,  104 => 48,  99 => 46,  93 => 43,  86 => 38,  76 => 31,  62 => 20,  44 => 5,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/mapviewer/templates/roe.html.twig", "/var/www/html/sidhymo/modules/custom/mapviewer/templates/roe.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 31);
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
