<?php

namespace Report\Template;

class Text extends \Report\Template {
    public function render($output) {
        $renderer = $output->getRenderer('Text');
        
        $renderer->render($output, $this->data);
    }
}

?>