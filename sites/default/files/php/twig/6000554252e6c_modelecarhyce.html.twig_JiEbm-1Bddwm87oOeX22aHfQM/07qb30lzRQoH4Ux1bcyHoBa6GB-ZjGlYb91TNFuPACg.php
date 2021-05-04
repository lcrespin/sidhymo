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

/* modules/custom/mapviewer/templates/modelecarhyce.html.twig */
class __TwigTemplate_47ee28bb6a94542251ae4fa18b722fe00201bbf8ac4e00ef34827936375553e4 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'javascripts' => [$this, 'block_javascripts'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div class=\"container-fluid\">
  <div class=\"row justify-content-md-center\">
    <div class=\"graphpanel\">
      <div id=\"titre\" style=\"font-size: 22px;text-align: center; font-weight: bold;\">Indicateur Morphologique Global</div>
      <div id=\"IMG\" style=\"font-size: 22px;text-align: center;\"></div>

      <div style=\"width: 1200px; height: 800px;\" id=\"radar_";
        // line 7
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 7, $this->source), "html", null, true);
        echo "\" > </div>
      
<!--       <div id=\"valeurs\">
        <b>Valeurs absolues des résidus standardisés:</b><br/>
      - Largeur à plein bord: 0.26<br/>
      - Rapport Largeur/Profondeur à plein bord: 0.56<br/>
      - Profondeur des mouilles: 0.36<br/>
      - Profondeur maximale à plein bord: 0.6<br/>
      - Pente de la ligne d'eau: 0.34<br/>
      - Surface mouillée plein bord: 0.33<br/>
      </div> -->

      <div class=\"legendied\">
          D’après Gob F., Thommeret N., Bilodeau C., Tamisier V., Duval E., Legentil C., Grancher D., Raufaste S., Baudoin J-M.
          <br/>
          et Kreutzenberger K., Interface d’exploitation des données Carhyce [en ligne], Laboratoire de Géographie Physique – AFB :
          <a href=\"http://lgp.cnrs.fr/carhyce\">
              IED CARHYCE
          </a>
      </div>
    </div>
  </div>
</div>
  

<!-- JAVASCRIPT -->
";
        // line 33
        $this->displayBlock('javascripts', $context, $blocks);
    }

    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "<script>
  anychart.onDocumentReady(function () {
    var data = ";
        // line 36
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(json_encode($this->sandbox->ensureToStringAllowed(($context["json_modele"] ?? null), 36, $this->source), twig_constant("JSON_PRETTY_PRINT")));
        echo "  

    var x0 = data[0].value;
    var x1 = data[1].value;
    var x2 = data[2].value;
    var x3 = data[3].value;
    var x4 = data[4].value;
    var x5 = data[5].value;
    var IMG = parseFloat(x0 + x1 + x2 + x3 + x4 + x5).toFixed(2);

    document.getElementById('IMG').innerHTML = 'IMG=' + IMG;

    // create a chart
    chart = anychart.radar();

    // set the container id
    chart.container(\"radar_";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 52, $this->source), "html", null, true);
        echo "\");

    var ticksArray = [0, 1, 2, 3, 4, 5];
    chart.yScale().ticks().set(ticksArray);

    // create the second series (area) and set the data
    var series2 = chart.area(data);

    // initiate drawing the chart
    chart.draw();
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/mapviewer/templates/modelecarhyce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 52,  88 => 36,  84 => 34,  77 => 33,  48 => 7,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/mapviewer/templates/modelecarhyce.html.twig", "/var/www/html/sidhymo/modules/custom/mapviewer/templates/modelecarhyce.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 33);
        static $filters = array("escape" => 7, "raw" => 36, "json_encode" => 36);
        static $functions = array("constant" => 36);

        try {
            $this->sandbox->checkSecurity(
                ['block'],
                ['escape', 'raw', 'json_encode'],
                ['constant']
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
