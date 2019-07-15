<?php

namespace Drupal\test_guadalupe\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;
use Drupal\migrate\Row;
use Drupal\migrate\Annotation\MigrateSource;

/**
 * Source plugin for laptop legacy.
 *
 * @MigrateSource(
 *   id = "laptop_legacy"
 * )
 */
class LaptopLegacy extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    // Write a query using the standard Drupal query builder that will be run
    // against the {source} database to retrieve information about players. Each
    // row returned from the query should represent one item that we would like
    // to import. So, basically, one row per player.
    //
    // In this case, we can just select all rows from the master table in the
    // {source} database, and limit to just the fields we plan to migrate.
    $query = $this->select('productos', 'p')
      ->fields('p', array(
        'lid',
        'nombre',
        'precio',
        'descripcion',
      ));
    return $query;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    // Provide documentation about source fields that are available for
    // mapping as key/value pairs. The key is the name of the field from the
    // database, and the value is the human readable description of the field.
    $fields = array(
      'lid' => $this->t('Laptop ID'),
      'nombre' => $this->t('Nombre'),
      'precio' => $this->t('Precio'),
      'descripcion' => $this->t('Descripcion'),

    );

    // If using prepareRow() to create computed fields you can describe them
    // here as well.

    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    // Use a Schema Definition array to describe the field from the source row
    // that will be used as the unique ID for each row.
    //
    // @link https://www.drupal.org/node/146939 - Schema array docs.
    //
    // @see \Drupal\migrate\Plugin\migrate\source\SqlBase::initializeIterator
    // for more about the 'alias' key.
    return [
      // Key is the name of the field from the fields() method above that we
      // want to use as the unique ID for each row.
      'lid' => [
        // Type is from the schema array definition.
        'type' => 'integer',
        // This is an optional key currently only used by SqlBase.
        'alias' => 'p',
      ],
    ];
  }

}