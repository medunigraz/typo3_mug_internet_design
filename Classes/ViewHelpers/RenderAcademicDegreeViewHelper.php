<?php
namespace MUG\ContentElements\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RenderAcademicDegreeViewHelper extends AbstractViewHelper {

  protected $escapeOutput = false;

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
    return str_replace('.in', '<sup>in</sup>', str_replace('.a','<sup>a</sup>',$arguments['degree']));
  }
}