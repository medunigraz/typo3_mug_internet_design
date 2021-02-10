<?php
namespace MUG\ContentElements\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RenderAcademicDegreeViewHelper extends AbstractViewHelper {

  protected $escapeOutput = false;

  /**
   * @var string[]
   */
  protected static $replacements = [
    '.a' => '.<sup>a</sup>',
    '.in' => '.<sup>in</sup>',
    'DIin' => 'DI<sup>in</sup>',
    'PDin' => 'PD<sup>in</sup>',
  ];

  public function initializeArguments() {
    parent::initializeArguments();
    $this->registerArgument(
        'degree',
        'string',
        'The academic degree',
        true
    );
  }

  public static function renderStatic(array $arguments, \Closure $renderChildrenClosure,  RenderingContextInterface $renderingContext) {
    return str_replace(array_keys(static::$replacements), array_values(static::$replacements),$arguments['degree']);
  }
}