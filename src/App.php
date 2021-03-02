<?php

namespace ITCtest;

use ITCtest\Repositories\InsuranceRepository;
use ITCtest\Services\ReaderService;

class App
{
    /*
     * @var ReaderService;
     */
    public $readerService;

    public function __construct(ReaderService $readerService)
    {
        $this->readerService = $readerService;
    }

    public function run()
    {
        $data = $this->readerService->read(API_URI . 'list');

        $insuranceCollection = new InsuranceRepository($data->products);
        $insurance_item_view = new View('insurance_item');
        $insurance_list = '';

        foreach ($insuranceCollection as $key => $insurance) {
            $data = $this->readerService->read(API_URI . 'info?id=' . $insurance->id);
            $item = $insurance->id;
            $insurance->update($data->$item);

            $insurance_list .= $insurance_item_view->render($insurance);
        }

        $insurance_list_view = new View('insurance_list');

        return $insurance_list_view->render(['list' => $insurance_list]);
    }
}