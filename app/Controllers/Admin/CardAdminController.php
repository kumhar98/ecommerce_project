<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CardModel;

class CardAdminController extends BaseController
{
    public function cardTableFetchData()
    {
       $model =new CardModel();
       $data['CardData'] = $model->findAll();
       $data['main_content'] = 'cardTable';
       return view('admin/adminTemplate',$data);

    }
}
