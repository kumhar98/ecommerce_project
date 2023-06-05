
<?php
$session = session()->get();
use App\Models\CardModel;
use App\Models\Admin\CategoryModel;
use App\Models\Order;

if (isset($session['id'])) {
    $cardModel = new CardModel();
    $Order = new Order();
    $data["userTotalCard"] =   $cardModel->where('user_id',$session['id'])->countAllResults();
    $data["order_id"] =   $Order->where('fk_userid',$session['id'])->findColumn('order_id');
}
$model = new CategoryModel();
$data["categoryName"] =  $model->findAll();


 echo view('header',$data);
 echo view($main_contant);
 echo view('footer');
 ?>