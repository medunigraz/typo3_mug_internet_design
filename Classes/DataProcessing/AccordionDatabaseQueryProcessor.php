<?php
declare(strict_types=1);

namespace MUG\ContentElements\DataProcessing;

/*
 * This file is part of the mug_ce extension for TYPO3 CMS.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Versioning\VersionState;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor;

class AccordionDatabaseQueryProcessor extends DatabaseQueryProcessor
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
  public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
  {
    if (isset($processorConfiguration['if.']) && !$cObj->checkIf($processorConfiguration['if.'])) {
      return $processedData;
    }

    // the table to query, if none given, exit
    $tableName = $cObj->stdWrapValue('table', $processorConfiguration);
    if (empty($tableName)) {
      return $processedData;
    }
    if (isset($processorConfiguration['table.'])) {
      unset($processorConfiguration['table.']);
    }
    if (isset($processorConfiguration['table'])) {
      unset($processorConfiguration['table']);
    }

    // The variable to be used within the result
    $targetVariableName = $cObj->stdWrapValue('as', $processorConfiguration, 'records');

    // Execute a SQL statement to fetch the records
    // BEGIN OF CODECHANGE
    //$records = $cObj->getRecords($tableName, $processorConfiguration);
    /** @var QueryBuilder $queryBuilder */
    $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getConnectionForTable($tableName)->createQueryBuilder();
    $result = $queryBuilder
      ->select('*')
      ->from($tableName)
      ->where(
        $queryBuilder->expr()->eq('mugce_content_element_pid', $queryBuilder->createNamedParameter($cObj->data['uid'], \PDO::PARAM_INT)),
        $queryBuilder->expr()->eq('t3ver_wsid', $queryBuilder->createNamedParameter($cObj->data['t3ver_wsid'], \PDO::PARAM_INT)),
        $queryBuilder->expr()->lte('t3ver_state', $queryBuilder->createNamedParameter(VersionState::DEFAULT_STATE, \PDO::PARAM_INT))
      )
      ->orderBy('sorting')
      ->execute();
    $records = $result->fetchAll();
    // END OF CODECHANGE
    $processedRecordVariables = [];
    foreach ($records as $key => $record) {
      /** @var ContentObjectRenderer $recordContentObjectRenderer */
      $recordContentObjectRenderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);
      $recordContentObjectRenderer->start($record, $tableName);
      $processedRecordVariables[$key] = ['data' => $record];
      $processedRecordVariables[$key] = $this->contentDataProcessor->process($recordContentObjectRenderer, $processorConfiguration, $processedRecordVariables[$key]);
    }

    $processedData[$targetVariableName] = $processedRecordVariables;

    return $processedData;
  }
}
