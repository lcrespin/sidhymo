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

/* modules/custom/mapviewer/templates/geomcarhyce.html.twig */
class __TwigTemplate_6b56bbb642613c59f65b422945701bee7b86ecc567bf5599583c6d6cb934881e extends \Twig\Template
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
      <div id=\"graph_";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 4, $this->source), "html", null, true);
        echo "\"></div>
      <div class=\"legendied\">
          D’après Gob F., Thommeret N., Bilodeau C., Tamisier V., Duval E., Legentil C., Grancher D., Raufaste S., Baudoin J-M.
          <br/>
          et Kreutzenberger K., Interface d’exploitation des données Carhyce [en ligne], Laboratoire de Géographie Physique – AFB :
          <a href=\"http://lgp.cnrs.fr/carhyce\">IED CARHYCE</a>
      </div>
    </div>
    <div class=\"graphpanel\">
      <div id=\"profil_";
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 13, $this->source), "html", null, true);
        echo "\"></div>
      <div class=\"legendied\">
          D’après Gob F., Thommeret N., Bilodeau C., Tamisier V., Duval E., Legentil C., Grancher D., Raufaste S., Baudoin J-M.
          <br/>
          et Kreutzenberger K., Interface d’exploitation des données Carhyce [en ligne], Laboratoire de Géographie Physique – AFB :
          <a href=\"http://lgp.cnrs.fr/carhyce\">IED CARHYCE</a>
      </div>
    </div>
    <div class=\"graphpanel\">
      <div id=\"travers_";
        // line 22
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 22, $this->source), "html", null, true);
        echo "\"></div>
      <div class=\"legendied\">
          D’après Gob F., Thommeret N., Bilodeau C., Tamisier V., Duval E., Legentil C., Grancher D., Raufaste S., Baudoin J-M.
          <br/>
          et Kreutzenberger K., Interface d’exploitation des données Carhyce [en ligne], Laboratoire de Géographie Physique – AFB :
          <a href=\"http://lgp.cnrs.fr/carhyce\">IED CARHYCE</a>
      </div>
    </div>
  </div>
</div>

<!-- JAVASCRIPT -->
";
        // line 34
        $this->displayBlock('javascripts', $context, $blocks);
    }

    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 35
        echo "<script>
  /******************** GRAPH 3D ************************************/
  var layout_3D = {
    scene: 
      {
        xaxis:{title: 'Distance depuis la rive gauche (m)' },
        yaxis:{title: 'Distance depuis l\\'amont (m) '},
        zaxis:{title: 'Cote'}
      },
      title: 'Profil 3D',
      // autosize: true,
      width: 1200,
      height: 800,
  };

  var data_3D = ";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(json_encode($this->sandbox->ensureToStringAllowed(($context["json_transects"] ?? null), 50, $this->source), twig_constant("JSON_PRETTY_PRINT")));
        echo " 
  Plotly.newPlot('graph_";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 51, $this->source), "html", null, true);
        echo "', data_3D, layout_3D, {showSendToCloud: true, responsive: true});


  /*************************** GRAPH PROFIL *************************/
  layout_profil = {
    showlegend: true,
    font: {size: 16}, 
    title: 'Profil en long',
    annotations: [{
      text: \"Pente de la ligne d'eau: ";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pente_ligne_deau"] ?? null), 60, $this->source), "html", null, true);
        echo "%\",
        font: {
        size: 13,
        color: 'rgb(40, 40, 40)',
      },
      showarrow: false,
      align: 'center',
      x: 0.1,
      y: 1,
      xref: 'paper',
      yref: 'paper',
    }],
    xaxis: {
      type: 'linear', 
      ticks: 'outside', 
      title: 'Distance à la limite amont de la station (m)', 
      nticks: 5, 
      showline: true, 
      tickfont: {size: 16}, 
      autorange: true, 
      gridcolor: 'rgb(240, 240, 240)', 
      gridwidth: 2, 
      showticklabels: true
    }, 
    yaxis: {
      type: 'linear', 
      ticks: 'outside', 
      title: 'Cote (m)', 
      nticks: 5, 
      showline: true, 
      tickfont: {size: 16}, 
      autorange: true, 
      gridcolor: 'rgb(240, 240, 240)', 
      gridwidth: 2, 
      fixedrange: true, 
      showticklabels: true
    }, 
    width: 1200,
    height: 800,
    // autosize: true
  };

  var data_profil = ";
        // line 102
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(json_encode($this->sandbox->ensureToStringAllowed(($context["json_profil"] ?? null), 102, $this->source), twig_constant("JSON_PRETTY_PRINT")));
        echo "  
  Plotly.newPlot('profil_";
        // line 103
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 103, $this->source), "html", null, true);
        echo "', data_profil, layout_profil, {showSendToCloud: true, responsive: true});


 /**************************** GRAPH 2D TRAVERS *******************/
  var data_travers = ";
        // line 107
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(json_encode($this->sandbox->ensureToStringAllowed(($context["json_transect2D"] ?? null), 107, $this->source), twig_constant("JSON_PRETTY_PRINT")));
        echo "  

  layout_travers = {
    showlegend: true,
    font: {size: 16}, 
    title: 'Profil en travers', 
    xaxis: {
      type: 'linear', 
      // range: [0, 25], 
      ticks: 'outside', 
      title: 'Distance par rapport à la rive gauche', 
      nticks: 5, 
      showline: true, 
      tickfont: {size: 16}, 
      autorange: true, 
      gridcolor: 'rgb(240, 240, 240)', 
      gridwidth: 2, 
      showticklabels: true
    }, 
    yaxis: {
      type: 'linear', 
      ticks: 'outside', 
      title: 'Cote', 
      nticks: 5, 
      showline: true, 
      tickfont: {size: 16}, 
      autorange: true, 
      gridcolor: 'rgb(240, 240, 240)', 
      gridwidth: 2, 
      fixedrange: true, 
      showticklabels: true
    }, 
    width: 1200,
    height: 800,  
    // autosize: true
  };

  Plotly.newPlot('travers_";
        // line 144
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 144, $this->source), "html", null, true);
        echo "', data_travers, layout_travers, {showSendToCloud: true, responsive: true});

</script>
";
    }

    public function getTemplateName()
    {
        return "modules/custom/mapviewer/templates/geomcarhyce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 144,  180 => 107,  173 => 103,  169 => 102,  124 => 60,  112 => 51,  108 => 50,  91 => 35,  84 => 34,  69 => 22,  57 => 13,  45 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/mapviewer/templates/geomcarhyce.html.twig", "/var/www/html/sidhymo/modules/custom/mapviewer/templates/geomcarhyce.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 34);
        static $filters = array("escape" => 4, "raw" => 50, "json_encode" => 50);
        static $functions = array("constant" => 50);

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
