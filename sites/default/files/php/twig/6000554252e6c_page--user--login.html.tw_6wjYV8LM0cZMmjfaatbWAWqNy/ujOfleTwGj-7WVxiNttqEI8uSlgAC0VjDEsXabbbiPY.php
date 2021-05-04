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

/* themes/custom/bfd/templates/page/page--user--login.html.twig */
class __TwigTemplate_0aa33ccb5c7581040c1ff023b3f2702037e6364a8390e4a291018251cdcf4294 extends \Twig\Template
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
        $this->loadTemplate("@bootstrap_for_drupal/includes/header.html.twig", "themes/custom/bfd/templates/page/page--user--login.html.twig", 47)->display($context);
        // line 48
        echo "<!-- HEADER-->

<!-- MAIN -->
<main role=\"main\" class=\"form-login\">
  <a id=\"main-content\" tabindex=\"-1\"></a>
  ";
        // line 54
        echo "  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col\">
        ";
        // line 57
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_before", [], "any", false, false, true, 57)) {
            // line 58
            echo "          <aside class=\"mt-2 mt-md-3\">
            ";
            // line 59
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_before", [], "any", false, false, true, 59), 59, $this->source), "html", null, true);
            echo "
          </aside>
        ";
        }
        // line 62
        echo "        <div class=\"row justify-content-md-center\">
          <div class=\"col col-md-8 col-lg-6\">
            <section class=\"bg-light p-4 my-2 my-md-5 form-login user rounded\">
              ";
        // line 65
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 65), 65, $this->source), "html", null, true);
        echo "
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- MAIN -->

<!-- FOOTER -->
";
        // line 76
        $this->loadTemplate("@bootstrap_for_drupal/includes/footer.html.twig", "themes/custom/bfd/templates/page/page--user--login.html.twig", 76)->display($context);
        // line 77
        echo "<!-- FOOTER -->
";
    }

    public function getTemplateName()
    {
        return "themes/custom/bfd/templates/page/page--user--login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 77,  87 => 76,  73 => 65,  68 => 62,  62 => 59,  59 => 58,  57 => 57,  52 => 54,  45 => 48,  43 => 47,  39 => 45,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/bfd/templates/page/page--user--login.html.twig", "/var/www/html/sidhymo/themes/custom/bfd/templates/page/page--user--login.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 47, "if" => 57);
        static $filters = array("escape" => 59);
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
