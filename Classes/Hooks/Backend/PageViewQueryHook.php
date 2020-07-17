<?php

namespace MUG\ContentElements\Hooks\Backend;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Hook into PageLayoutView to hide tt_content elements in page view
 *
 */
class PageViewQueryHook
{
  protected static $count = 0;

  /**
   * Prevent inline tt_content elements in products from
   * showing in the page module.
   *
   * @param array $parameters
   * @param string $table
   * @param int $pageId
   * @param array $additionalConstraints
   * @param string[] $fieldList
   * @param QueryBuilder $queryBuilder
   *
   * @return void
   */
  public function modifyQuery($parameters, $table, $pageId, $additionalConstraints, $fieldList, QueryBuilder $queryBuilder): void {
    if ($table === 'tt_content' && $pageId > 0) {

      $queryBuilder->andWhere(
        $queryBuilder->expr()->notIn('colPos', [$queryBuilder->createNamedParameter(100, \PDO::PARAM_INT),
                                                         $queryBuilder->createNamedParameter(101, \PDO::PARAM_INT),
                                                         $queryBuilder->createNamedParameter(102, \PDO::PARAM_INT),
                                                         $queryBuilder->createNamedParameter(103, \PDO::PARAM_INT)])
      );
    }
  }

}
