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

/* themes/custom/bfd/templates/layout/page.html.twig */
class __TwigTemplate_3d9609c3816f79c9fb8920535a337d312b437c99cb8e1a0e363767022f6e8d18 extends \Twig\Template
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
        $this->loadTemplate("@bootstrap_for_drupal/includes/header.html.twig", "themes/custom/bfd/templates/layout/page.html.twig", 46)->display($context);
        // line 47
        echo "<!-- HEADER-->

<!-- MAIN -->
<main role=\"main \" class=\"d-print-block\">
  <a id=\"main-content\" tabindex=\"-1\"></a>
  ";
        // line 53
        echo "
  <div class=\"container-fluid\">
    <div class=\"row\">

          <!-- If no sidebar_left content take full width -->
          ";
        // line 58
        $context["content_classes"] = ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_left", [], "any", false, false, true, 58)) ? ("col-md-8 col-lg-9") : ("col-12"));
        // line 59
        echo "          <!-- If no sidebar_left content take full width -->

          <div class=\"";
        // line 61
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_classes"] ?? null), 61, $this->source), "html", null, true);
        echo " col-print-12\">

          <!-- CONTENT BEFORE -->
          ";
        // line 64
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_before", [], "any", false, false, true, 64)) {
            // line 65
            echo "            <aside class=\"mt-2 mt-md-3\" id=\"content-before\">
              ";
            // line 66
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_before", [], "any", false, false, true, 66), 66, $this->source), "html", null, true);
            echo "
            </aside>
          ";
        }
        // line 69
        echo "          <!-- CONTENT BEFORE -->

          <!-- MAIN CONTENT -->
          <section class=\"py-2 py-md-3\" id=\"page-content\">
            ";
        // line 73
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 73), 73, $this->source), "html", null, true);
        echo "
          </section>
          <!-- MAIN CONTENT -->

          <!-- CONTENT AFTER -->
          ";
        // line 78
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_after", [], "any", false, false, true, 78)) {
            // line 79
            echo "            <aside  id=\"content-after\">
              ";
            // line 80
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_after", [], "any", false, false, true, 80), 80, $this->source), "html", null, true);
            echo "
            </aside>
          ";
        }
        // line 83
        echo "        </div>
        <!-- CONTENT AFTER -->

      <!-- ASIDE CONTENT -->
      ";
        // line 87
        $this->loadTemplate("@bootstrap_for_drupal/includes/aside-content.html.twig", "themes/custom/bfd/templates/layout/page.html.twig", 87)->display($context);
        // line 88
        echo "      <!-- ASIDE CONTENT -->

    </div>
  </div>
</main>
<!-- MAIN -->

<!-- FOOTER -->
";
        // line 96
        $this->loadTemplate("@bootstrap_for_drupal/includes/footer.html.twig", "themes/custom/bfd/templates/layout/page.html.twig", 96)->display($context);
        // line 97
        echo "<!-- FOOTER -->
";
    }

    public function getTemplateName()
    {
        return "themes/custom/bfd/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 97,  124 => 96,  114 => 88,  112 => 87,  106 => 83,  100 => 80,  97 => 79,  95 => 78,  87 => 73,  81 => 69,  75 => 66,  72 => 65,  70 => 64,  64 => 61,  60 => 59,  58 => 58,  51 => 53,  44 => 47,  42 => 46,  39 => 45,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/bfd/templates/layout/page.html.twig", "/var/www/html/sidhymo/themes/custom/bfd/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 46, "set" => 58, "if" => 64);
        static $filters = array("escape" => 61);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include', 'set', 'if'],
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
