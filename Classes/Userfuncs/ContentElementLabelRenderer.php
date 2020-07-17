<?php
namespace MUG\ContentElements\Userfuncs;

class ContentElementLabelRenderer {

  public function getContentElementTitle(&$params) {

    switch ($params['row']['CType']) {
      case 'mugce_homeslider':
        $params['title'] = $GLOBALS['LANG']->sL('LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homeslider.caption');
        break;
      case 'mugce_imagetiles':
        $params['title'] = $params['row']['header'] ?: ($params['row']['subheader'] ?: $GLOBALS['LANG']->sL('LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetiles.caption'));
        break;
      default:
        $params['title'] = $params['row']['header'] ?: ($params['row']['subheader'] ?: $params['row']['bodytext']);
        break;
    }
  }
}