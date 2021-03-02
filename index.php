<?php

namespace ITCtest;

use ITCtest\Services\ReaderService;

require __DIR__ . '/vendor/autoload.php';

const __TEMPLATE_DIR__ = 'templates';

const API_URI = 'https://www.itccompliance.co.uk/recruitment-webservice/api/';

$app = new App(new ReaderService());

echo $app->run();