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

/* themes/custom/bfd/templates/page/frontpage/page--front.html.twig */
class __TwigTemplate_b97ca626ef5887244af5238c93e2aa5118045c6de4807a78662f3350fe18e668 extends \Twig\Template
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
        $this->loadTemplate("@bootstrap_for_drupal/includes/header.html.twig", "themes/custom/bfd/templates/page/frontpage/page--front.html.twig", 47)->display($context);
        // line 48
        echo "<!-- HEADER-->

<!-- MAIN -->
<main role=\"main\">
  <a id=\"main-content\" tabindex=\"-1\"></a>
  ";
        // line 54
        echo "  <div class=\"container-fluid\">
    ";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
        echo "
  </div>
</main>
<!-- MAIN -->

<!-- FOOTER -->
";
        // line 61
        $this->loadTemplate("@bootstrap_for_drupal/includes/footer.html.twig", "themes/custom/bfd/templates/page/frontpage/page--front.html.twig", 61)->display($context);
        // line 62
        echo "<!-- FOOTER -->
";
    }

    public function getTemplateName()
    {
        return "themes/custom/bfd/templates/page/frontpage/page--front.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 62,  64 => 61,  55 => 55,  52 => 54,  45 => 48,  43 => 47,  39 => 45,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/bfd/templates/page/frontpage/page--front.html.twig", "/var/www/html/sidhymo/themes/custom/bfd/templates/page/frontpage/page--front.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 47);
        static $filters = array("escape" => 55);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
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
