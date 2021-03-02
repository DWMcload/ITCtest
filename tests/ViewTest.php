<?php

namespace ITCtest\Tests;

use ITCtest\View;
use PHPUnit\Framework\TestCase;

class ViewTest extends TestCase
{
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        define ('__TEMPLATE_DIR__', 'templates');
        parent::__construct($name, $data, $dataName);
    }


    public function testViewClassCanBeInstantiated(): void
    {
        $view = new View('test');
        $this->assertInstanceOf(View::class, $view);
    }

    public function testViewReturnsString(): void
    {

        $view = new View('insurance_list');
        $this->assertIsString($view->render([]));
    }

    public function testViewReplacesContentsInTheTemplates(): void
    {
        $view = new View('insurance_list');
        $template = $view->render(['list' => 'Lorem Ipsum']);
        $this->assertEquals('Lorem Ipsum', $template);
    }
}