<?php

namespace ITCtest;

/**
 * Class View
 * @package ITCtest
 */
class View
{
    /**
     * @var string
     */
    public $template;

    /**
     * View constructor.
     * @param string $template
     */
    public function __construct(string $template)
    {
        $this->template = $template;
    }

    /**
     * @param $data array|\IteratorAggregate
     * @return string
     */
    public function render($data): string
    {
        $template = file_get_contents(__TEMPLATE_DIR__ . '/' . $this->template . '.tpl');
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $list = '';
                foreach ($value as $item) {
                    $list .= ' ' . $item;
                }
                $value = $list;
            }

            $template = str_replace('<@' . $key . '>', $value, $template);

        }
        return $template;

    }
}