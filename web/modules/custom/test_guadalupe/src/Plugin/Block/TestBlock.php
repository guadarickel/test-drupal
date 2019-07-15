<?php

namespace Drupal\test_guadalupe\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 *  Test Guadalupe Block
 *
 * @Block(
 *  id = "test_guadalupe_block",
 *  admin_label = @Translation("Test Guadalupe Block"),
 * )
 */
class TestBlock extends BlockBase implements ContainerFactoryPluginInterface {


  public function __construct(array $configuration, $plugin_id, $plugin_definition) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition
    );
  }

  public function build() {

    $menu_parameters = new \Drupal\Core\Menu\MenuTreeParameters();
    $menu_parameters->setMaxDepth(3);
    $menu_name = 'mi-menu';
    $menu_tree_service = \Drupal::service('menu.link_tree');
    $tree = $menu_tree_service->load($menu_name, $menu_parameters);

    $build['my_custom_menu'] = $menu_tree_service->build($tree);

    return $build;
  }

}