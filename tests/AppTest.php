<?php

namespace ITCtest\Tests;

use ITCtest\App;
use ITCtest\Services\ReaderService;
use PHPUnit\Framework\TestCase;

/*
 * TODO: instead of mocking the full readerservice, mocking the guzzlehttp client would be other option,
 * TODO: but that needs much more work, which is out of scope of this test
 */

class AppTest extends TestCase
{
    public function testAppCanBeInstantiatedWithMock(): void
    {
        $stub = $this->createStub(ReaderService::class);
        $app = new App($stub);
        $this->assertInstanceOf(App::class, $app);
    }

    public function testAppReturnText(): void
    {
        /* TODO: This is displaying the basic TDD principles when tests come first. Even HTML output could be tested. */
        $this->markTestIncomplete();
    }
}