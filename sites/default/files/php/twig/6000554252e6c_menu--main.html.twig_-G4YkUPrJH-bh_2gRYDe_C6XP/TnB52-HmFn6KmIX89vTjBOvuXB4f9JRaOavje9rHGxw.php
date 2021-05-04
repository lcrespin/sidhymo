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

/* themes/custom/bfd/templates/navigation/menu--main.html.twig */
class __TwigTemplate_6c2214ccd11fe1958c89108519db593c276a65570e5471122a0880695d0d25e3 extends \Twig\Template
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
        // line 21
        $macros["menus"] = $this->macros["menus"] = $this;
        // line 22
        echo "
";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["menus"], "macro_menu_links", [($context["items"] ?? null), ($context["attributes"] ?? null), 0], 27, $context, $this->getSourceContext()));
        echo "

";
        // line 81
        echo "
";
    }

    // line 29
    public function macro_menu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $macros = $this->macros;
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 30
            echo "  ";
            $macros["menus"] = $this;
            // line 31
            echo "  ";
            if (($context["items"] ?? null)) {
                // line 32
                echo "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 33
                    echo "      ";
                    $context["classes"] = [0 => "nav", 1 => "navbar-nav", 2 => "mt-2", 3 => "mt-md-0"];
                    // line 34
                    echo "      <ul";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 34), 34, $this->source), "html", null, true);
                    echo ">
        ";
                    // line 35
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 36
                        echo "          ";
                        // line 37
                        $context["classes_list_item"] = [0 => "nav-item", 1 => ((twig_get_attribute($this->env, $this->source,                         // line 39
$context["item"], "is_expanded", [], "any", false, false, true, 39)) ? ("dropdown") : (""))];
                        // line 42
                        echo "          ";
                        // line 43
                        $context["classes_link"] = [0 => "nav-item", 1 => "nav-link", 2 => ((twig_get_attribute($this->env, $this->source,                         // line 46
$context["item"], "is_expanded", [], "any", false, false, true, 46)) ? ("dropdown-toggle") : ("")), 3 => ((twig_get_attribute($this->env, $this->source,                         // line 47
$context["item"], "is_collapsed", [], "any", false, false, true, 47)) ? ("dropdown-toggle") : ("")), 4 => ((twig_get_attribute($this->env, $this->source,                         // line 48
$context["item"], "in_active_trail", [], "any", false, false, true, 48)) ? ("active") : (""))];
                        // line 51
                        echo "          <li";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 51), "addClass", [0 => ($context["classes_list_item"] ?? null)], "method", false, false, true, 51), 51, $this->source), "html", null, true);
                        echo ">
            ";
                        // line 52
                        if (twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 52)) {
                            // line 53
                            echo "              ";
                            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 53), 53, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 53), 53, $this->source), ["class" => ($context["classes_link"] ?? null), "data-toggle" => "dropdown"]), "html", null, true);
                            echo "
              ";
                            // line 54
                            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["menus"], "macro_menu_links", [twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 54), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)], 54, $context, $this->getSourceContext()));
                            echo "
            ";
                        } else {
                            // line 56
                            echo "              ";
                            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 56), 56, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 56), 56, $this->source), ["class" => ($context["classes_link"] ?? null)]), "html", null, true);
                            echo "
            ";
                        }
                        // line 58
                        echo "          </li>
        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 60
                    echo "      </ul>
    ";
                } else {
                    // line 62
                    echo "      <div class=\"dropdown-menu animate slideIn\">
        ";
                    // line 63
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 64
                        echo "          ";
                        // line 65
                        $context["classes_link"] = [0 => "dropdown-item", 1 => ((twig_get_attribute($this->env, $this->source,                         // line 67
$context["item"], "is_expanded", [], "any", false, false, true, 67)) ? ("dropdown-toggle") : ("")), 2 => ((twig_get_attribute($this->env, $this->source,                         // line 68
$context["item"], "is_collapsed", [], "any", false, false, true, 68)) ? ("dropdown-toggle") : ("")), 3 => ((twig_get_attribute($this->env, $this->source,                         // line 69
$context["item"], "in_active_trail", [], "any", false, false, true, 69)) ? ("active") : (""))];
                        // line 72
                        echo "          ";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getLink($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 72), 72, $this->source), $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "url", [], "any", false, false, true, 72), 72, $this->source), ["class" => ($context["classes_link"] ?? null)]), "html", null, true);
                        echo "
          ";
                        // line 73
                        if (twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 73)) {
                            // line 74
                            echo "            ";
                            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_call_macro($macros["menus"], "macro_menu_links", [twig_get_attribute($this->env, $this->source, $context["item"], "below", [], "any", false, false, true, 74), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)], 74, $context, $this->getSourceContext()));
                            echo "
          ";
                        }
                        // line 76
                        echo "        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 77
                    echo "      </div>
    ";
                }
                // line 79
                echo "  ";
            }

            return ('' === $tmp = ob_get_contents()) ? '' : new Markup($tmp, $this->env->getCharset());
        } finally {
            ob_end_clean();
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/bfd/templates/navigation/menu--main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 79,  169 => 77,  163 => 76,  157 => 74,  155 => 73,  150 => 72,  148 => 69,  147 => 68,  146 => 67,  145 => 65,  143 => 64,  139 => 63,  136 => 62,  132 => 60,  125 => 58,  119 => 56,  114 => 54,  109 => 53,  107 => 52,  102 => 51,  100 => 48,  99 => 47,  98 => 46,  97 => 43,  95 => 42,  93 => 39,  92 => 37,  90 => 36,  86 => 35,  81 => 34,  78 => 33,  75 => 32,  72 => 31,  69 => 30,  54 => 29,  49 => 81,  44 => 27,  41 => 22,  39 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/bfd/templates/navigation/menu--main.html.twig", "/var/www/html/sidhymo/themes/custom/bfd/templates/navigation/menu--main.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("import" => 21, "macro" => 29, "if" => 31, "set" => 33, "for" => 35);
        static $filters = array("escape" => 34);
        static $functions = array("link" => 53);

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'set', 'for'],
                ['escape'],
                ['link']
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
