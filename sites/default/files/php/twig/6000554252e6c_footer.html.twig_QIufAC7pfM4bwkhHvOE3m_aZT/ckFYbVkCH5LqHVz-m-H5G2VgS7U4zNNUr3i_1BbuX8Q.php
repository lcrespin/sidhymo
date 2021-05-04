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

/* @bootstrap_for_drupal/includes/footer.html.twig */
class __TwigTemplate_a5572182328ec46960edf27c47325e82aa6a3e818cbc2633913ee8dfa1802034 extends \Twig\Template
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
        echo "<!-- FOOTER -->
<footer class=\"py-3 py-lg-5 bg-secondary text-white-50 mt-2 mt-md-5 d-print-none\" id=\"page-footer\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"col-md-12 col-lg-3 order-3 order-md-3 order-lg-1 mb-3 mb-3\">
        ";
        // line 6
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_left", [], "any", false, false, true, 6)) {
            // line 7
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_left", [], "any", false, false, true, 7), 7, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 9
        echo "      </div>
      <div class=\"col-sm-12 col-md-6 col-lg-5 order-2 order-lg-2 mb-3\">
        ";
        // line 11
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_center", [], "any", false, false, true, 11)) {
            // line 12
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_center", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 14
        echo "      </div>
      <div class=\"col-sm-12 col-md-6 col-lg-4 order-1 order-lg-3\">
        ";
        // line 16
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_right", [], "any", false, false, true, 16)) {
            // line 17
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_right", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 19
        echo "      </div>
    </div>
  </div>
</footer>
<!-- <footer class=\"py-3 justify-content-center d-flex bg-primary text-white-50 d-print-none\" id=\"page-footer-sub\">
  <div class=\"container\">
    <div class=\"row justify-content-center\">
      <div class=\"col-sm-12 col-xl-4 d-flex justify-content-center align-items-center\">
        ";
        // line 27
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_sub_left", [], "any", false, false, true, 27)) {
            // line 28
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_sub_left", [], "any", false, false, true, 28), 28, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 30
        echo "      </div>
      <div class=\"col-sm-12 col-md-6 col-xl-4 d-flex justify-content-center align-items-center\">

        ";
        // line 33
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_sub_center", [], "any", false, false, true, 33)) {
            // line 34
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_sub_center", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 36
        echo "      </div>
      <div class=\"col-sm-12 col-md-6 col-xl-4 d-flex justify-content-center align-items-center\">
        ";
        // line 38
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_sub_right", [], "any", false, false, true, 38)) {
            // line 39
            echo "          ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_sub_right", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
            echo "
        ";
        }
        // line 41
        echo "      </a>
    </div>
  </div>
</div>
</footer> -->
<!-- FOOTER -->


<!-- MODAL CONTAINER -->
";
        // line 50
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "modal_container", [], "any", false, false, true, 50)) {
            // line 51
            echo "  ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "modal_container", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
            echo "
";
        }
        // line 53
        echo "<!-- MODAL CONTAINER -->
";
    }

    public function getTemplateName()
    {
        return "@bootstrap_for_drupal/includes/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 53,  134 => 51,  132 => 50,  121 => 41,  115 => 39,  113 => 38,  109 => 36,  103 => 34,  101 => 33,  96 => 30,  90 => 28,  88 => 27,  78 => 19,  72 => 17,  70 => 16,  66 => 14,  60 => 12,  58 => 11,  54 => 9,  48 => 7,  46 => 6,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@bootstrap_for_drupal/includes/footer.html.twig", "/var/www/html/sidhymo/themes/custom/bfd/templates/includes/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 6);
        static $filters = array("escape" => 7);
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
