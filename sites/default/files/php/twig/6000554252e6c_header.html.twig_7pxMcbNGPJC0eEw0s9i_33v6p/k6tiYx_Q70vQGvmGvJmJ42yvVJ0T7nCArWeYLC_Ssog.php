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

/* @bootstrap_for_drupal/includes/header.html.twig */
class __TwigTemplate_c6f27a75bdde50bcfee22587f92aed70485404be9d3fec777fa6abc29d7a1172 extends \Twig\Template
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
        // line 1
        echo "<!-- HEADER -->
";
        // line 2
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_special", [], "any", false, false, true, 2)) {
            // line 3
            echo "  <header class=\"bg-secondary\" role=\"special-message\">
    ";
            // line 4
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header_special", [], "any", false, false, true, 4), 4, $this->source), "html", null, true);
            echo "
  </header>
";
        }
        // line 7
        echo "
<header class=\"bg-secondary pt-3 \" role=\"banner-brand\" id=\"header-brand\">
  <div class=\"container\">

    <!-- branding header -->
    <div class=\"d-flex flex-md-column align-items-md-start\">
      <div class=\"d-md-flex\">
        <div class=\"d-none d-md-flex align-items-center\">
          <a class=\"navbar-brand d-flex text-white align-items-center\" href=\"";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front_page"] ?? null), 15, $this->source), "html", null, true);
        echo "\"><img class=\"text-white mr-3 logo\" src=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["logopath"] ?? null), 15, $this->source), "html", null, true);
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 15, $this->source), "html", null, true);
        echo "</a>
        </div>
        <div>
          <p class=\"d-flex align-items-center text-white h-100 pl-md-3 text-center text-md-left slogan\">";
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_slogan"] ?? null), 18, $this->source), "html", null, true);
        echo "</p>
        </div>
      </div>
\t\t<p style=\"font-size: 15px;color: yellow;margin: auto;\">⚠ Applicatif prototype et données en attente de vérification</p>
    </div>
    <!-- branding header -->

  </div>
</header>
<header class=\"sticky-top d-print-none\" role=\"header-menu\" id=\"header-menu\">
  <nav role=\"main-navigation\" class=\"navbar navbar-dark navbar-expand-md bg-secondary px-0 px-md-3 mb-2 mb-md-0\">
    <div class=\"container\">

      <!-- Sticky bar logo -->
      <div class=\"ml-3 ml-md-0\">
        <a class=\"navbar-brand mr-2 d-flex align-items-center py-0\" href=\"";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front_page"] ?? null), 33, $this->source), "html", null, true);
        echo "\"><img class=\"navbar-brand mr-2 hide-logo logo\" src=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["logopath"] ?? null), 33, $this->source), "html", null, true);
        echo "\"/>
          <span class=\"d-md-none\">";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 34, $this->source), "html", null, true);
        echo "</span></a>
      </div>
      <!-- Sticky bar logo -->

      <!-- button collapse -->
      <button data-toggle=\"collapse\" class=\"navbar-toggler ml-auto mr-3 mr-sm-0\" data-target=\"#navigation-container\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <!-- button collapse -->


      <!-- navbar collapse / mobile Menu -->
      <div class=\"collapse navbar-collapse position-relative justify-content-between\" id=\"navigation-container\">

        <!-- nav_main -->
        <div id=\"menu-main\" class=\"search-effect\">
          ";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
        echo "
        </div>
        <!-- nav_main -->

        <!-- nav_additional -->
        <div id=\"menu-add\">
          ";
        // line 57
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_add", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
        echo "
        </div>
        <!-- nav_additional -->

      </div>
      <!-- navbar collapse / mobile Menu -->

    </div>
  </nav>
</header>

<!-- <div style=\"position: relative; top: -130px;\">
  <div style=\"
      background-image: url(http://amihydro.oieau.fr/sidhymo/themes/custom/bfd/assets/image/hiclipart.com_1.png);
      opacity: 0.5;
      position: absolute;
      top: 0px;
      z-index: 1021;
      width: 100%;
      height: 127px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-position-y: -659px;
      \"> 
  </div>
</div> -->
<!-- HEADER -->
";
    }

    public function getTemplateName()
    {
        return "@bootstrap_for_drupal/includes/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 57,  117 => 51,  97 => 34,  91 => 33,  73 => 18,  63 => 15,  53 => 7,  47 => 4,  44 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_for_drupal/includes/header.html.twig", "/var/www/html/sidhymo/themes/custom/bfd/templates/includes/header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 2);
        static $filters = array("escape" => 4);
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
