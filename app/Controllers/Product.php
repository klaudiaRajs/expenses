<?php


namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\ShopModel;
use App\Models\ProductModel;

class Product extends BaseController
{
    const MODULE = 'Product';
    const LIST_PATH = '/Product/List';
    const LIST_BUTTON_NAME = 'Product List';

    public function index()
    {
        /** @var CategoryModel $this ->categoryModel */
        $categoryList = $this->categoryModel->getAllForUser($this->user->user_id);
        /** @var ShopModel $this ->shopModel */
        $shopList = $this->shopModel->getAllForUser($this->user->user_id);

        return $this->view('addProduct', [
            'shopList' => $shopList,
            'categoryList' => $categoryList,
            'buttonName' => self::ADD_BUTTON_NAME,
            'action' => '/' . self::MODULE . '/' . self::ADD_ACTION
        ]);
    }

    public function List()
    {
        $productList = $this->productModel->getAllForUserForPeriod(
            $this->user->user_id,
            $this->getCurrentPeriodStart($this->user->period_start_day),
            $this->getCurrentPeriodEnd($this->user->period_start_day)
        );

        return $this->view('productList', [
            'productList' => $productList
        ]);
    }

    public function Add()
    {
        $this->session->remove('error');

        try {
            /** @var ProductModel */
            $this->productModel->save($this->getRequestData());
        }catch (\Exception $e) {
            return $this->getErrorResponse(self::ERROR_ADD, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to('/Product');
    }

    public function EditForm($id)
    {
        $this->session->remove('error');

        /** @var ProductModel $this ->productModel */
        $product = $this->productModel->find($id);

        if (!$product) {
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        /** @var CategoryModel $this ->categoryModel */
        $categoryList = $this->categoryModel->getAllForUser($this->user->user_id);

        /** @var ShopModel $this ->shopModel */
        $shopList = $this->shopModel->getAllForUser($this->user->user_id);

        return $this->view('addProduct', [
            'buttonName' => self::UPDATE_BUTTON_NAME,
            'action' => '/' . self::MODULE . '/' . self::EDIT_ACTION . '/' . $id,
            'productName' => $product->name,
            'productPrice' => $product->price,
            'productAmount' => $product->amount,
            'purchaseDate' => $product->purchase_date,
            'productComment' => $product->comment,
            'shopList' => $shopList,
            'categoryList' => $categoryList,
        ]);
    }

    public function Edit($id)
    {
        $this->session->remove('error');

        /** @var ProductModel $this ->productModel */
        $product = $this->productModel->find($id);

        if (!$product) {
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        try {
            /** @var ProductModel */
            $this->productModel->update($id, $this->getRequestData());
        }catch (\Exception $e) {
            return $this->getErrorResponse(self::ERROR_UPDATE, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to(self::LIST_PATH);
    }

    public function Delete($id)
    {
        $this->session->remove('error');

        /** @var ProductModel $this ->productModel */
        $product = $this->productModel->find($id);

        if (!$product) {
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        try {
            /** @var ProductModel $this ->productModel */
            $this->productModel->delete($id);
        }catch (\Exception $e) {
            return $this->getErrorResponse(self::ERROR_DELETE, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to(self::LIST_PATH);
    }

    private function getRequestData()
    {
        return [
            'name' => $this->request->getPost('productname'),
            'price' => $this->request->getPost('productprice'),
            'amount' => $this->request->getPost('amount'),
            'purchase_date' => $this->request->getPost('date'),
            'comment' => $this->request->getPost('comment'),
            'category_id' => $this->request->getPost('category'),
            'shop_id' => $this->request->getPost('shop'),
            'user_id' => $this->user->user_id,
        ];
    }
}