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

/* modules/custom/mapviewer/templates/stcarhyce.html.twig */
class __TwigTemplate_4b74f22cb8c5ca355add0fcdfa0d5b1faa2fea5fa3f5267aa63de8f62c6e8bf3 extends \Twig\Template
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
    <div class=\"modal-header\">
        <h5 class=\"modal-title\" id=\"fiche_title\">
            ";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 5, $this->source), "html", null, true);
        echo "
        </h5>
        <button aria-label=\"Fermer\" class=\"close\" data-dismiss=\"modal\" type=\"button\">
            <span aria-hidden=\"true\">
                ×
            </span>
        </button>
    </div>
    <div class=\"modal-body\">
        <div class=\"fiche\">
            <div class=\"row\">
                <fieldset class=\"localinfo\">
                    <legend>
                        Informations de localisation
                    </legend>
                    ";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["localinfo"] ?? null), 20, $this->source), "html", null, true);
        echo "
                </fieldset>
            </div>
            <div class=\"row\">
                <ul class=\"nav nav-tabs nav-fill\" id=\"tabs_operations\" role=\"tablist\">
                    ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["operations"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["idop"] => $context["dateop"]) {
            // line 26
            echo "                    <li class=\"nav-item\">
                        <a aria-controls=\"op-";
            // line 27
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 27, $this->source), "html", null, true);
            echo "\" aria-selected=\"false\" class=\"nav-link ";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 27)) {
                echo " active ";
            }
            echo "\" data-toggle=\"tab\" href=\"#op-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 27, $this->source), "html", null, true);
            echo "\" id=\"op-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 27, $this->source), "html", null, true);
            echo "-tab\" role=\"tab\">
                            Opération du ";
            // line 28
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["dateop"], 28, $this->source), "html", null, true);
            echo "
                        </a>
                    </li>
                    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['idop'], $context['dateop'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "                </ul>
            </div>
            <div class=\"tab-content\" id=\"operation_information\">
                ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["operations"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["idop"] => $context["dateop"]) {
            // line 36
            echo "                <div aria-labelledby=\"op-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 36, $this->source), "html", null, true);
            echo "-tab\" class=\"tab-pane fade ";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 36)) {
                echo " show active ";
            }
            echo "\" id=\"op-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 36, $this->source), "html", null, true);
            echo "\" role=\"tabpanel\">
                    <div class=\"row\">
                        <ul class=\"nav nav-tabs nav-fill\" id=\"tabs-";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 38, $this->source), "html", null, true);
            echo "\" role=\"tablist\">
                            <li class=\"nav-item\">
                                <a aria-controls=\"geom-";
            // line 40
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 40, $this->source), "html", null, true);
            echo "\" aria-selected=\"true\" class=\"nav-link ";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 40)) {
                echo " show active ";
            }
            echo "\" data-toggle=\"tab\" href=\"#geom-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 40, $this->source), "html", null, true);
            echo "\" id=\"geom-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 40, $this->source), "html", null, true);
            echo "-tab\" role=\"tab\">
                                    Géométrie
                                </a>
                            </li>
                            <li class=\"nav-item\">
                                <a aria-controls=\"granulo-";
            // line 45
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 45, $this->source), "html", null, true);
            echo "\" aria-selected=\"false\" class=\"nav-link\" data-toggle=\"tab\" href=\"#granulo-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 45, $this->source), "html", null, true);
            echo "\" id=\"granulo-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 45, $this->source), "html", null, true);
            echo "-tab\" role=\"tab\">
                                    Granulométrie
                                </a>
                            </li>
                            <li class=\"nav-item\">
                                <a aria-controls=\"modele-";
            // line 50
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 50, $this->source), "html", null, true);
            echo "\" aria-selected=\"false\" class=\"nav-link\" data-toggle=\"tab\" href=\"#modele-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 50, $this->source), "html", null, true);
            echo "\" id=\"modele-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 50, $this->source), "html", null, true);
            echo "-tab\" role=\"tab\">
                                    Modèles
                                </a>
                            </li>
                            <li class=\"nav-item\">
                                <a aria-controls=\"habitat-";
            // line 55
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 55, $this->source), "html", null, true);
            echo "\" aria-selected=\"false\" class=\"nav-link disabled\" data-toggle=\"tab\" href=\"#habitat-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 55, $this->source), "html", null, true);
            echo "\" id=\"habitat";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 55, $this->source), "html", null, true);
            echo "-tab\" role=\"tab\">
                                    Habitat
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class=\"row tab-content\" id=\"tabinformations\">
                        <div aria-labelledby=\"geom-";
            // line 62
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 62, $this->source), "html", null, true);
            echo "-tab\" class=\"tab-pane fade ";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 62)) {
                echo " show active ";
            }
            echo "\" id=\"geom-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 62, $this->source), "html", null, true);
            echo "\" role=\"tabpanel\">
                            <div class=\"loader\" id=\"loadergeom\">
                                <p>
                                    Géométrie en cours de chargement...
                                </p>
                            </div>
                        </div>
                        <div aria-labelledby=\"granulo-";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 69, $this->source), "html", null, true);
            echo "-tab\" class=\"tab-pane fade\" id=\"granulo-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 69, $this->source), "html", null, true);
            echo "\" role=\"tabpanel\">
                            <div class=\"loader\" id=\"loadergeom\">
                                <p>
                                    Granulométrie en cours de chargement...
                                </p>
                            </div>
                        </div>
                        <div aria-labelledby=\"modele-";
            // line 76
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 76, $this->source), "html", null, true);
            echo "-tab\" class=\"tab-pane fade\" id=\"modele-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 76, $this->source), "html", null, true);
            echo "\" role=\"tabpanel\">
                            <div class=\"loader\" id=\"loadergeom\">
                                <p>
                                    Modèles en cours de chargement...
                                </p>
                            </div>
                        </div>
                        <div aria-labelledby=\"habitat-";
            // line 83
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 83, $this->source), "html", null, true);
            echo "-tab\" class=\"tab-pane fade\" id=\"habitat-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["idop"], 83, $this->source), "html", null, true);
            echo "\" role=\"tabpanel\">
                            <div class=\"loader\" id=\"loadergeom\">
                                <p>
                                    Habitat en cours de chargement...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['idop'], $context['dateop'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/mapviewer/templates/stcarhyce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  279 => 93,  253 => 83,  241 => 76,  229 => 69,  213 => 62,  199 => 55,  187 => 50,  175 => 45,  159 => 40,  154 => 38,  142 => 36,  125 => 35,  120 => 32,  102 => 28,  90 => 27,  87 => 26,  70 => 25,  62 => 20,  44 => 5,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/mapviewer/templates/stcarhyce.html.twig", "/var/www/html/sidhymo/modules/custom/mapviewer/templates/stcarhyce.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 25, "if" => 27);
        static $filters = array("escape" => 5);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
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
