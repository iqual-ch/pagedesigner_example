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
    // This function is called when the content is displayed in the CK Editor.
    // By using this example as a second handler to the Html in Pagedesigner,
    // it is shown how to alter the content.
    // $result .= "<h3>This text is altered by the PagedesignerTextExample::get().</h3>";
  }

  /**
   * {@inheritDoc}
   */
  public function render(Element $entity, array &$build = []) {
    // The build array is prefilled by the default Pagedesigner HTML handler.
    // (in this case processed text @see https://api.drupal.org/api/drupal/core%21modules%21filter%21src%21Element%21ProcessedText.php/class/ProcessedText/8.2.x)
    // We adjust the #text value of the build array which is used to display from the Render API
    $build['#text'] .= "<h3>This text is altered by the PagedesignerTextExample::render().</h3>";
  }

  /**
   * {@inheritDoc}
   */
  public function patch(Element $entity, array $data) {
    // When the Pagedesigner element is edited, the patch method is called
    // when saving. The content value is altered in this function.
    // $entity->field_content->value .= " <h2>Altered by the PagedesignerTextExample::patch().</h2>";
    // $entity->save();
  }
}