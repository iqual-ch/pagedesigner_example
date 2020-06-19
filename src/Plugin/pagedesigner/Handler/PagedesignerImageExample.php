<?php

namespace Drupal\pagedesigner_example\Plugin\pagedesigner\Handler;

use Drupal\pagedesigner\Entity\Element;
use Drupal\pagedesigner\Plugin\pagedesigner\Handler\Content;


/**
 * Demonstrates Pagedesigner Handler Plugin example.
 *
 * Attaches a default image when editing a pagedesigner image element.
 *
 * @PagedesignerHandler(
 *   id = "pagedesigner_image_example",
 *   name = @Translation("Pagedesigner image example handler"),
 *   types = {
 *      "image",
 *      "img"
 *   },
 *   weight = 1000,
 * )
 */
class PagedesignerImageExample extends Content{

  /**
   * {@inheritDoc}
   */
  public function serialize(Element $entity, array &$result = []) {
    // Attaches a default image when editing the image element.
    if (empty($result['src'])) {
      $result['src'] = "https://www.iqual.ch/sites/default/files/styles/pagedesigner_default/public/2018-03/partner_iqual_logo_drupal.png";
    }
  }
}