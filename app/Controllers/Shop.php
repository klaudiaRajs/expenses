<?php


namespace App\Controllers;


use App\Models\ShopModel;

class Shop extends BaseController
{
    const MODULE = 'Shop';

    const LIST_PATH = '/Shop/List';
    const LIST_BUTTON_NAME = 'Shop List';

    public function index()
    {
        $this->view('addShop', [
            'buttonName' => self::ADD_BUTTON_NAME,
            'action' => '/' . self::MODULE . '/' . self::ADD_ACTION
        ]);
    }

    public function Add()
    {
        $this->session->remove('error');

        try {
            /** @var ShopModel */
            $this->shopModel->save($this->getRequestData());
        }catch (\Exception $e) {
            return $this->getErrorResponse(self::ERROR_ADD, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to(self::LIST_PATH);
    }

    public function List()
    {
        /** @var ShopModel $this ->shopModel */
        $list = $this->shopModel->getAllForUser($this->user->user_id);

        $this->view('shopList', [
            'shopList' => $list
        ]);
    }

    public function Delete($id)
    {
        $this->session->remove('error');

        /** @var ShopModel $this ->shopModel */
        $shop = $this->shopModel->find($id);

        if (!$shop) {
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        try{
            /** @var ShopModel $this ->shopModel */
            $this->shopModel->delete($id);
        }catch( \Exception $e){
            return $this->getErrorResponse(self::ERROR_DELETE, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to(self::LIST_PATH);
    }

    public function EditForm($id)
    {
        $this->session->remove('error');

        /** @var ShopModel $this ->shopModel */
        $shop = $this->shopModel->find($id);

        if (!$shop) {
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return $this->view('addShop', [
            'buttonName' => self::UPDATE_BUTTON_NAME,
            'shopName' => $shop->name,
            'shopLimit' => $shop->limit,
            'action' => '/' . self::MODULE . '/' . self::EDIT_ACTION . '/' . $id
        ]);
    }

    public function Edit($id)
    {
        $this->session->remove('error');

        /** @var ShopModel $this ->shopModel */
        $shop = $this->shopModel->find($id);

        if (!$shop) {
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        try {
            /** @var ShopModel */
            $this->shopModel->update($id, $this->getRequestData());
        }catch (\Exception $e) {
            return $this->getErrorResponse(self::ERROR_UPDATE, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to(self::LIST_PATH);
    }

    private function getRequestData()
    {
        return  [
            'name' => $this->request->getPost('name'),
            'limit' => $this->request->getPost('limit'),
            'user_id' => $this->user->user_id
        ];
    }
}