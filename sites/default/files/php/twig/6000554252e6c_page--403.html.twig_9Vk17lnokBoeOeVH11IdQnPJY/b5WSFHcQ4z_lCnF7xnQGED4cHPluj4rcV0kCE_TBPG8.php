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

/* themes/custom/bfd/templates/page/page--403.html.twig */
class __TwigTemplate_03ec9ca9cc3d893235f5ab9dd75f377d0dfb7b928c039b6a93f4242b02f79bff extends \Twig\Template
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
        // line 45
        echo "
<!-- HEADER-->
";
        // line 47
        $this->loadTemplate("@bootstrap_for_drupal/includes/header.html.twig", "themes/custom/bfd/templates/page/page--403.html.twig", 47)->display($context);
        // line 48
        echo "<!-- HEADER-->

<!-- MAIN -->
<main role=\"main\">
   <a id=\"main-content\" tabindex=\"-1\"></a>
   ";
        // line 54
        echo "   <div class=\"container\">
      <div class=\"row\">
         <div class=\"col\">
            <div class=\"flex-column d-flex justify-content-center flex-grow-1 align-items-center vh-75\">
               <div class=\"p-5 p-md-7 text-center rounded\">
                  <h1 class=\"display-3 text-danger text-uppercase\">";
        // line 59
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("error 403"));
        echo "</h1>
                  <p class=\"lead\">";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Access Denied"));
        echo "</p>
                  <a href=\"/\" class=\"btn btn-outline-primary\">";
        // line 61
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Back to Home page"));
        echo "</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<!-- MAIN -->

<!-- FOOTER -->
";
        // line 71
        $this->loadTemplate("@bootstrap_for_drupal/includes/footer.html.twig", "themes/custom/bfd/templates/page/page--403.html.twig", 71)->display($context);
        // line 72
        echo "<!-- FOOTER -->
";
    }

    public function getTemplateName()
    {
        return "themes/custom/bfd/templates/page/page--403.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 72,  80 => 71,  67 => 61,  63 => 60,  59 => 59,  52 => 54,  45 => 48,  43 => 47,  39 => 45,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/bfd/templates/page/page--403.html.twig", "/var/www/html/sidhymo/themes/custom/bfd/templates/page/page--403.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 47);
        static $filters = array("t" => 59);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['t'],
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
