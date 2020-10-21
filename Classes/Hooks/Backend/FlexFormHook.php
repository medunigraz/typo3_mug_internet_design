<?php
namespace MUG\ContentElements\Hooks\Backend;

use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class FlexFormHook {
  /**
   * @param array $dataStructure
   * @param array $identifier
   * @return array
   */
  public function parseDataStructureByIdentifierPostProcess(array $dataStructure, array $identifier): array
  {
    if ($identifier['type'] === 'tca' && $identifier['tableName'] === 'tt_content' && $identifier['dataStructureKey'] === 'news_pi1,list') {
      $file = Environment::getPublicPath() . '/typo3conf/ext/mug_ce/Configuration/Flexforms/flexform_mugce_social.xml';
      $content = file_get_contents($file);
      if ($content) {
        $dataStructure['sheets']['extraEntrySocial'] = GeneralUtility::xml2array($content);
      }
    }
    return $dataStructure;
  }
}
