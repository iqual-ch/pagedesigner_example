<?php

namespace Drupal\pagedesigner_block_adaptable\Plugin\pagedesigner\Handler;

use Drupal\Component\Utility\Xss;
use Drupal\pagedesigner\Entity\Element;
use Drupal\pagedesigner\Plugin\pagedesigner\Handler\Content;

/**
 * Demonstrates Pagedesigner Handler Plugin example.
 *
 * Adds a quote at the end of the pagedesigner text element.
 *
 * @PagedesignerHandler(
 *   id = "pagedesigner_text_example",
 *   name = @Translation("Pagedesigner text example handler"),
 *   types = {
 *      "text"
 *   },
 *   weight = 1000,
 * )
 */
class PagedesignerTextExample extends Content{
  /**
   * {@inheritdoc}
   */
  public function get(Element $entity, string &$result = '') {
    $result .= Xss::filter("This text is altered by the PagedesignerTextExample Handler Plugin.");
  }
}
