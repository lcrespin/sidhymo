<?php

namespace Drupal\mapviewer\Commands;

use Consolidation\OutputFormatters\StructuredData\RowsOfFields;
use Drush\Commands\DrushCommands;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Drupal\mapviewer\Controller\MapviewerController;
use Drupal\Core\Database\Database;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class MapviewerCommands extends DrushCommands {

  // private $mapviewer = new MapviewerController();

  /**
   * Command description here.
   *
   * @param $arg1
   *   Argument description.
   * @param array $options
   *   An associative array of options whose values come from cli, aliases, config, etc.
   * @option option-name
   *   Description
   * @usage mapviewer-commandName foo
   *   Usage description
   *
   * @command mapviewer:commandName
   * @aliases foo
   */
  public function commandName($arg1, $options = ['option-name' => 'default']) {
    $this->logger()->success(dt('Achievement unlocked.'));
  }

  /**
   * An example of the table output format.
   *
   * @param array $options An associative array of options whose values come from cli, aliases, config, etc.
   *
   * @field-labels
   *   group: Group
   *   token: Token
   *   name: Name
   * @default-fields group,token,name
   *
   * @command mapviewer:token
   * @aliases token
   *
   * @filter-default-field name
   * @return \Consolidation\OutputFormatters\StructuredData\RowsOfFields
   */
  public function token($options = ['format' => 'table']) {
    $all = \Drupal::token()->getInfo();
    foreach ($all['tokens'] as $group => $tokens) {
      foreach ($tokens as $key => $token) {
        $rows[] = [
          'group' => $group,
          'token' => $key,
          'name' => $token['name'],
        ];
      }
    }
    return new RowsOfFields($rows);
  }

  /**
   * Permet de recreer les caches
   * @command mapviewer:cache_mapviewer
   */
  public function cache_mapviewer()
  {
    $this->cache_emprises();
    return 0;
  }


  /**
   * Permet de creer les caches des emprises
   * @command mapviewer:cache_emprises
   * @usage cache_emprises search emprise
   *   Mettre si vous le souhaitez une emprise particuliere sous le format d'un tableau et/ou une recherche
   *
   * @aliases search emprise
   */
  public function cache_emprises($emprise="",$search="")
  {
    $mapviewer = new MapviewerController();
    if ($emprise=="") {
      $connection = Database::getConnection('default', 'data_sidhymo');
      $query      = $connection->query("SELECT territoire from territoires");
      $queryfetch = $query->fetchAll();
      $emprise=array();
      foreach ($queryfetch as $key => $value) {
        array_push($emprise,$value->territoire);
      }
    }else {
      $emprise=array($emprise);
    }

    foreach ($emprise as $key => $value) {
      $request = Request::create(
        '/searchemprise',
        'GET',
        ['territoire' => $value, 'search' => $search]
      );
      if ($search=="") {
        echo 'Create cache searchEmprise territoire = '.$request->query->get('territoire')." \n";
      }else {
        echo 'Create cache searchEmprise territoire = '.$request->query->get('territoire')." et search = ".$request->query->get('search')."\n";
      }
      $json = json_decode($mapviewer->searchEmprise($request)->getContent());
      $this->cache_objets('','','',$json);
    }

  }

  /**
   * Permet de recreer les caches des objets
   * @command mapviewer:cache_objets
   * @usage mapviewer-cache_objets emprise gid type
   *    Renseigner l'emprise, gid et le type
   *
   * @aliases emprise gid type
   */
  public function cache_objets($emprise,$gid,$type,$json="")
  {
    $mapviewer = new MapviewerController();
    if ($json!="") {
      foreach ($json->results as $key => $value) {
        foreach ($value->children as $key => $value) {
          $emprise=$value->type;
          $gid=explode(".",$value->id)[1];
          foreach ($mapviewer->getConfig_objet() as $key => $value) {
            $type=$key;
            echo "   Searchobjet emprise= ".$emprise." , gid= ".$gid." , type= ".$type."\n";
            $request = Request::create(
              '/searchobjet',
              'GET',
              ['emprise' => $emprise, 'gid' =>$gid , 'type'=> $type]
            );
            $mapviewer->searchObjet($request);
          }
        }
      }
    }else {
      echo "Searchobjet emprise= ".$emprise." , gid= ".$gid." , type= ".$type."\n";
      $request = Request::create(
        '/searchobjet',
        'GET',
        ['emprise' => $emprise, 'gid' =>$gid , 'type'=> $type]
      );
      $mapviewer->searchObjet($request);
    }
    // var_dump($mapviewer->getConfig_objet());
  }
}
