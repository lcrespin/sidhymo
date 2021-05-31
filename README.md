# Sidhymo

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table des matières</summary>
  <ol>
    <li>
      <a href="#a-propos-du-projet">A propos du projet</a>
    </li>
    <li>
      <a href="#Installation">Installation</a>
      <!-- <ul>
        <li><a href="#installation">Installation</a></li>
      </ul> -->
    </li>
    <li><a href="#drush">Drush</a></li>
    <ul>
      <li><a href="#excuter-un-drush">Excuter un drush</a></li>
      <li><a href="#configurer-un-drush">Configurer un drush</a></li>
    </ul>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## A propos du projet
Sur la base d’un recueil rédigé par l’Agence Française pour la Biodiversité (AFB) permettant d’identifier les besoins en matière d’outils et d’appui aux politiques de l’eau dans le cadre de la surveillance et de l’évaluation de l’état des eaux et des milieux aquatiques, l’AFB a lancé en 2018 un appel à manifestation d’intérêts (AMI) afin de susciter les compétences et motivations d’opérateurs publics ou privés pour proposer des projets d’actions répondant à ces besoins. A ce titre, l’Office International de l’Eau (OIEau) a été retenu pour la réalisation d’un système d’information de valorisation des données hydromorphologiques collectées sur les cours d’eau.


<!-- INSTALLATION -->
## Installation
1. Cloner le répertoire
   ```sh
   git clone https://github.com/lcrespin/sidhymo.git
   ```
2. Installer la base de données

3. Configurer le fichier settings
   ```sh
   sites/default/settings.php
   ```
   ```php
   $databases['default']['default'] = array (
     'database' => 'drupal_databases',
     'username' => '.....',
     'password' => '....',
     'prefix' => '....',
     'host' => '....',
     'port' => '....',
     'namespace' => '....',
     'driver' => '....',
   );

   $databases['data_sidhymo']['default'] = array (
     'database' => 'data_databases',
     'username' => '.....',
     'password' => '.....',
     'prefix' => '.....',
     'host' => '.....',
     'port' => '.....',
     'namespace' => '....',
     'driver' => '.....',
   );
   ```

<!-- DRUSH -->
## Drush

### Excuter un drush

Pour utiliser un drush utiliser cette commande
```sh
vendor/bin/drush mapviewer:name_function
```
Pour voir tous les drush existant dans mapviewer utiliser cette commande
```sh
vendor/bin/drush mapviewer
```

### Configurer un drush

Pour créer de nouvelles fonctions allaient dans le fichier
```sh
modules/custom/mapviewer/src/Commands/MapviewerCommands.php
```

Pour chaque fonction indiquée dans son entête la commande pour l'exécuter
```php
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
```

Dans cette exemple, la commande sera :
```sh
vendor/bin/drush mapviewer:commandName
```
