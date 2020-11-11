<?php
namespace MUG\ContentElements\DataProcessing;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class DefaultValuesProcessor implements DataProcessorInterface
{

  /**
   * Fetches records from the database as an array
   *
   * @param ContentObjectRenderer $cObj The data of the content element or page
   * @param array $contentObjectConfiguration The configuration of Content Object
   * @param array $processorConfiguration The configuration of this processor
   * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
   *
   * @return array the processed data as key/value store
   */
  public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData) {
    $processedData['data']['frame_class'] = 'none';
    $processedData['data']['header_layout'] = 100;

    return $processedData;
  }
}