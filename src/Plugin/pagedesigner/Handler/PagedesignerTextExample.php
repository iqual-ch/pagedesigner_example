<?php

namespace Drupal\pagedesigner_example\Plugin\pagedesigner\Handler;

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
 *      "text",
 *      "html"
 *   },
 *   weight = 1000,
 * )
 */
class PagedesignerTextExample extends Content{

  /**
   * {@inheritdoc}
   */
  public function get(Element $entity, string &$result = '') {
    $result .= "<h3>This text is altered by the PagedesignerTextExample.</h3>";
  }

  /**
   * {@inheritDoc}
   */
  public function patch(Element $entity, array $data) {
    if (isset($data[0]) && \is_scalar($data[0])) {
      $entity->field_content->value = $data[0] . " <h2>PagedesignerTextExample ALTERED.</h2>";
      $entity->saveEdit();
    }
  }
}
