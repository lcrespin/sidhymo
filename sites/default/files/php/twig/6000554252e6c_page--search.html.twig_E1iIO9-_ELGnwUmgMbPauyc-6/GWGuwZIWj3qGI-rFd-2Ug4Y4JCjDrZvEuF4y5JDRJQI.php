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

/* themes/custom/bfd/templates/page/page--search.html.twig */
class __TwigTemplate_27e240bcaa1bbb4a247a2b072ca449fe207995cd95a0b880209d73a564f4d750 extends \Twig\Template
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
        echo "<!-- HEADER-->
";
        // line 46
        $this->loadTemplate("@bootstrap_for_drupal/includes/header.html.twig", "themes/custom/bfd/templates/page/page--search.html.twig", 46)->display($context);
        // line 47
        echo "<!-- HEADER-->

<!-- MAIN -->
<main role=\"main\">
  <a id=\"main-content\" tabindex=\"-1\"></a>
  ";
        // line 53
        echo "
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-md-8\">

          <!-- CONTENT BEFORE -->
          ";
        // line 59
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_before", [], "any", false, false, true, 59)) {
            // line 60
            echo "            <aside class=\"mt-2 mt-md-3\" id=\"content-before\">
              ";
            // line 61
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_before", [], "any", false, false, true, 61), 61, $this->source), "html", null, true);
            echo "
            </aside>
          ";
        }
        // line 64
        echo "          <!-- CONTENT BEFORE -->

          <!-- MAIN CONTENT -->
          <section class=\"py-2 py-md-3\" id=\"page-content\">
            ";
        // line 68
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 68), 68, $this->source), "html", null, true);
        echo "
          </section>
          <!-- MAIN CONTENT -->

          <!-- CONTENT AFTER -->
          ";
        // line 73
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_after", [], "any", false, false, true, 73)) {
            // line 74
            echo "            <aside  id=\"content-after\">
              ";
            // line 75
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_after", [], "any", false, false, true, 75), 75, $this->source), "html", null, true);
            echo "
            </aside>
          ";
        }
        // line 78
        echo "        </div>
        <!-- CONTENT AFTER -->

      <!-- ASIDE CONTENT -->
      ";
        // line 82
        $this->loadTemplate("@bootstrap_for_drupal/includes/aside-content.html.twig", "themes/custom/bfd/templates/page/page--search.html.twig", 82)->display($context);
        // line 83
        echo "      <!-- ASIDE CONTENT -->

    </div>
  </div>
</main>
<!-- MAIN -->

<!-- FOOTER -->
";
        // line 91
        $this->loadTemplate("@bootstrap_for_drupal/includes/footer.html.twig", "themes/custom/bfd/templates/page/page--search.html.twig", 91)->display($context);
        // line 92
        echo "<!-- FOOTER -->
";
    }

    public function getTemplateName()
    {
        return "themes/custom/bfd/templates/page/page--search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 92,  113 => 91,  103 => 83,  101 => 82,  95 => 78,  89 => 75,  86 => 74,  84 => 73,  76 => 68,  70 => 64,  64 => 61,  61 => 60,  59 => 59,  51 => 53,  44 => 47,  42 => 46,  39 => 45,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/bfd/templates/page/page--search.html.twig", "/var/www/html/sidhymo/themes/custom/bfd/templates/page/page--search.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 46, "if" => 59);
        static $filters = array("escape" => 61);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
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
