<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CardModel;
use App\Models\AddressModel;

class CheckoutController extends BaseController
{
    public function checkout($id)
    {
        $cardModel = new CardModel();
        $AddressModel = new AddressModel();

        $totalProductsMrp = $cardModel->selectSum('totalMrp')->where('user_id', $id);
        $data['totalProductsMrp'] =  $totalProductsMrp->findall();
        $totalProductsCost = $cardModel->selectSum('totalCost')->where('user_id', $id);
        $data['totalProductsCost'] =  $totalProductsCost->findall();
        $totalItam =  $cardModel->selectSum('addQty')->where('user_id', $id);
        $data['totalItam'] = $totalItam->findall();
        $data['totalAddress'] = $AddressModel->where('userId', $id)->findAll();
        $data['main_contant'] = 'checkout';
        return view('template', $data);
    }
    public function saveAddress()
    {

        $data = [];
        $rules = [
            'fullName' => 'required|string',
            'state' => 'required|string',
            'distic' => 'required|string',
            'subDistic' => 'required|string',
            'houseNo'    => 'required',
            'mobileNo'    => 'required|numeric',
            'email'    => 'required|valid_email',
            'pinCode'    => 'required|numeric',
        ];
        if ($this->validate($rules)) {
            $model = new AddressModel();

            $data = [
                'fullName' => $this->request->getVar('fullName'),
                'state'  => $this->request->getVar('state'),
                'distic'  => $this->request->getVar('distic'),
                'houseNo'  => $this->request->getVar('houseNo'),
                'mobileNo' => $this->request->getVar('mobileNo'),
                'email'  => $this->request->getVar('email'),
                'subDistic'  => $this->request->getVar('subDistic'),
                'pinCode'  => $this->request->getVar('pinCode'),
                "streetAria" => $this->request->getVar('streetAria'),
                "userId" => $this->request->getVar('userId')

            ];
            if ($model->save($data)) {
                $data['id'] = $model->getInsertID();
                return json_encode($data);
            }
        } else {

            $data= ['errors' => $this->validator];
            return  $data;
        }
    }
    public function AddressFetch()
    {
        $id = $this->request->getVar('id');
        $AddressModel = new AddressModel();
        $data = $AddressModel->where('id', $id)->findAll();
        return json_encode( $data);
  
    }
    public function updateAddress()
    {

        $data = [];
        $rules = [
            'fullName' => 'required|string',
            'state' => 'required|string',
            'distic' => 'required|string',
            'subDistic' => 'required|string',
            'houseNo'    => 'required',
            'streetAria'    => 'required',
            'mobileNo'    => 'required|numeric',
            'email'    => 'required|valid_email',
            'pinCode'    => 'required|numeric',
        ];
        if ($this->validate($rules)) {
            $model = new AddressModel();

            $data = [
                'fullName' => $this->request->getVar('fullName'),
                'state'  => $this->request->getVar('state'),
                'distic'  => $this->request->getVar('distic'),
                'houseNo'  => $this->request->getVar('houseNo'),
                'mobileNo' => $this->request->getVar('mobileNo'),
                'email'  => $this->request->getVar('email'),
                'subDistic'  => $this->request->getVar('subDistic'),
                'pinCode'  => $this->request->getVar('pinCode'),
                "streetAria" => $this->request->getVar('streetAria')

            ];
            $id = $this->request->getVar('id');
            if ($model->update($id,$data)) {
                return json_encode($data);
            }
        } else {

            $data['errors'] = $this->validator;
            return  $data;
        }
    }
    
}
