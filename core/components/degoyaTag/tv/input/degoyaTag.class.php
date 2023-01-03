<?php
/*
 * DegoyaTag custom TV - input setup
 *
 * @var modX $this->modx
 * @var modTemplateVar $this
 * 
 */
class DegoyaTagInputRender extends modTemplateVarInputRender {

    /**
     * @param string|array $value
     * @param array $params
     * @return mixed|void
     */
    public function process($value, array $params = array())
    {
        $value = is_array($value) ? $value : explode(',', $value);

        $options = array();

        foreach ($this->getInputOptions() as $option) {
            if (!$option) { continue; }
            $option = is_array($option) ? $option : explode('==', $option);
            if (count($option) === 1) {
                $option[] = $option[0];
            }
            list($inputOptionText, $inputOptionValue) = $option;
            $options[] = array(
                'value' => htmlspecialchars($inputOptionValue, ENT_COMPAT, 'UTF-8'),
                'text' => htmlspecialchars($inputOptionText,ENT_COMPAT,'UTF-8'),
                'checked' => in_array($inputOptionValue, $value, false),
            );
        }

        $this->setPlaceholder('options', $options);
    }


    public function getTemplate() {
        return $this->modx->getOption('core_path',null,MODX_CORE_PATH).'components/degoyaTag/tv/input/tpl/degoyaTag.tpl';
    }
}
return 'DegoyaTagInputRender';
