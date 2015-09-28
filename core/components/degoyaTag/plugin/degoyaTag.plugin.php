<?php
/*
 * Handles plugin events for degoyaTag custom TV
 *
 * @package degoyaActionButton
 *
 */
$corePath = $modx->getOption('core_path',null,MODX_CORE_PATH).'components/degoyaTag/';
switch ($modx->event->name) {
    case 'OnTVInputRenderList':
        $modx->event->output($corePath.'tv/input/');
        break;
    case 'OnTVOutputRenderList':
        $modx->event->output($corePath.'tv/output/');
        break;
    case 'OnTVInputPropertiesList':
        $modx->event->output($corePath.'tv/inputoptions/');
        break;
    case 'OnTVOutputRenderPropertiesList':
        $modx->event->output($corePath.'tv/properties/');
        break;
}