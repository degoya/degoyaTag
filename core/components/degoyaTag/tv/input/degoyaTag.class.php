<?php
/*
 * DegoyaTag custom TV - input setup
 *
 * @var modX $this->modx
 * @var modTemplateVar $this
 * 
 */
class DegoyaTagInputRender extends modTemplateVarInputRender {
    public function process($value,array $params = array()) {
        $value = is_array($value) ? $value : explode(',',$value);

        $default = explode('||',$this->tv->get('default_text'));

        $options = $this->getInputOptions();
        $opts = array();
        $defaults = array();
        $i = 0;

        while (list($item, $itemValue) = each ($options)) {
            $checked = false;
            $itemValue = is_array($itemValue) ? $itemValue : explode('==',$itemValue);
            $item = $itemValue[0];
            $itemValue = isset($itemValue[1]) ? $itemValue[1] : $item;
            if (in_array($itemValue,$value)) {
                $checked = true;
            }
            if (in_array($itemValue,$default)) {
                $defaults[] = 'tv'.$this->tv->get('id').'-'.$i;
            }

            $opts[] = array(
                'value' => htmlspecialchars($itemValue,ENT_COMPAT,'UTF-8'),
                'text' =>  htmlspecialchars($item,ENT_COMPAT,'UTF-8'),
                'checked' => $checked,
            );
            $i++;
        }

        $this->setPlaceholder('cbdefaults',implode(',',$defaults));
        $this->setPlaceholder('opts',$opts);
    }
    public function getTemplate() {
        return $this->modx->getOption('core_path',null,MODX_CORE_PATH).'components/degoyaTag/tv/input/tpl/degoyaTag.tpl';
    }
}
return 'DegoyaTagInputRender';