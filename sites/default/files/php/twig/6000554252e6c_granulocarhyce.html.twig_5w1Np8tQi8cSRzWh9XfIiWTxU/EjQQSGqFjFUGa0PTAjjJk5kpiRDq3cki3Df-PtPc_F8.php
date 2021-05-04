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

/* modules/custom/mapviewer/templates/granulocarhyce.html.twig */
class __TwigTemplate_c6d9509964dca4a68ff157c8b6b055f0f381799c1101223be53913856f8ad8a6 extends \Twig\Template
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
            <div id=\"radier_";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 4, $this->source), "html", null, true);
        echo "\">
            </div>
            <div class=\"legendied\">
                D’après Gob F., Thommeret N., Bilodeau C., Tamisier V., Duval E., Legentil C., Grancher D., Raufaste S., Baudoin J-M.
                <br/>
                et Kreutzenberger K., Interface d’exploitation des données Carhyce [en ligne], Laboratoire de Géographie Physique – AFB :
                <a href=\"http://lgp.cnrs.fr/carhyce\">
                    IED CARHYCE
                </a>
            </div>
        </div>
        <div class=\"graphpanel\">
            <div id=\"triangle_";
        // line 16
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 16, $this->source), "html", null, true);
        echo "\">

            </div>
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
        // line 32
        $this->displayBlock('javascripts', $context, $blocks);
    }

    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "<script>
  layout_granulo = {
    font: {size: 16}, 
    title: 'Courbe granulométrique cumulative (radier)', 
    xaxis: {
      type: 'linear', 
      // range: [0, Max], 
      ticks: 'outside', 
      title: 'Mesure de l\\'axe b de 100 particules échantillonnées aléatoirement sur un radier (mm)', 
      nticks: 5, 
      showline: true, 
      tickfont: {size: 16}, 
      autorange: true, 
      gridcolor: 'rgb(204, 204, 204)', 
      gridwidth: 2, 
      showticklabels: true
    }, 
    yaxis: {
      type: 'linear', 
      ticks: 'outside', 
      title: 'Effectifs cumulés croissants (%)', 
      nticks: 5, 
      showline: true, 
      tickfont: {size: 16}, 
      autorange: true, 
      gridcolor: 'rgb(204, 204, 204)', 
      gridwidth: 2, 
      fixedrange: true, 
      showticklabels: true
    }, 
    width: 1200,
    height: 800
  };

  var data_granulo = ";
        // line 67
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(json_encode($this->sandbox->ensureToStringAllowed(($context["json_radier"] ?? null), 67, $this->source), twig_constant("JSON_PRETTY_PRINT")));
        echo "  
  Plotly.plot('radier_";
        // line 68
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 68, $this->source), "html", null, true);
        echo "', {data: data_granulo, layout: layout_granulo});


  /*
  - cours d’eau « Abatesco »
  - station CARHYCE 06222100
  - opération 2020
  - Année 2015
  - % Bloc rochers = 0,794 %
  - % Graviers - cailloux = 60,317 %
  - % fine = 38,889 %
  */
  var json_triangulaire = ";
        // line 80
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(json_encode($this->sandbox->ensureToStringAllowed(($context["json_triangulaire"] ?? null), 80, $this->source), twig_constant("JSON_PRETTY_PRINT")));
        echo "  

  var rawData = [
      {bloc:json_triangulaire.prct_sup128, fine:json_triangulaire.prct_inf2, gravier:json_triangulaire.prct_2a128, label:'Opération'},
  ];

  // console.log(rawData)

  Plotly.plot('triangle_";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idoperation"] ?? null), 88, $this->source), "html", null, true);
        echo "', [{
      type: 'scatterternary',
      mode: 'markers',
      a: rawData.map(function(d) { return d.bloc; }),
      b: rawData.map(function(d) { return d.fine; }),
      c: rawData.map(function(d) { return d.gravier; }),
      text: rawData.map(function(d) { return d.label; }),
      marker: {
          symbol: 100,
          color: '#DB7365',
          size: 14,
          line: { width: 2 }
      },
    }],
    {
      ternary: {
          sum: 100,
          aaxis: makeAxis('A: % Blocs-rochers (>128mm)', 0, 'rgba(51, 255, 79,0.7)'), 
          baxis: makeAxis('<br>B: % Fines (<2mm)', 0, 'rgba(51, 255, 79,0.7)'),
          caxis: makeAxis('<br>C: % Gravier-<br>cailloux (2-128mm)', 0, 'rgba(51, 255, 79,0.7)'),
          bgcolor: '#fff1e0'
      },
      annotations: [{
        showarrow: false,
        text: 'Diagramme triangulaire',
          x: 0.5,
          y: 1.3,
          font: { size: 15 }
      }],
      paper_bgcolor: '#fff1e0',
    }, 
    {showSendToCloud: true}
  );

  function makeAxis(title, tickangle, color) {
      return {
        title: title,
        titlefont: { size: 16 },
        tickangle: tickangle,
        tickfont: { size: 12 },
        //tickcolor: 'rgba(0,0,0,0)',
        tickcolor: color,
        ticklen: 5,
        showline: true,
        showgrid: true
      };
  }

</script>

";
    }

    public function getTemplateName()
    {
        return "modules/custom/mapviewer/templates/granulocarhyce.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 88,  141 => 80,  126 => 68,  122 => 67,  86 => 33,  79 => 32,  60 => 16,  45 => 4,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/mapviewer/templates/granulocarhyce.html.twig", "/var/www/html/sidhymo/modules/custom/mapviewer/templates/granulocarhyce.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 32);
        static $filters = array("escape" => 4, "raw" => 67, "json_encode" => 67);
        static $functions = array("constant" => 67);

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
