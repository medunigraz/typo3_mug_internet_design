<?php

namespace MUG\ContentElements\Hooks\Backend;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Hook into DatabaseRecordList to hide tt_content elements in list view
 *
 */
class RecordListQueryHook
{
  protected static $count = 0;

  public function modifyQuery(array &$parameters, string $table, int $pageId, array $additionalConstraints, array $fieldList, QueryBuilder $queryBuilder) {
    if ($table === 'tt_content' && $pageId > 0) {
      $queryBuilder->where(...['colPos NOT IN (100, 101, 102, 103)']);
    }
  }

  public function buildQueryParametersPostProcess(array &$parameters, string $table, int $pageId, array $additionalConstraints, array $fieldList, $parentObject, $queryBuilder = null) {
    if ($table === 'tt_content' && (int)$parentObject->searchLevels === 0 && $parentObject->id > 0) {
      $parameters['where'][] = 'colPos NOT IN (100, 101, 102, 103)';
    }
  }

}
