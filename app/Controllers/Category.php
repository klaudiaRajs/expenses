<?php


namespace App\Controllers;


use App\Models\CategoryModel;

class Category extends BaseController
{
    const MODULE = 'Category';
    const LIST_PATH = '/Category/List';
    const LIST_BUTTON_NAME = 'Category List';


    public function index()
    {
        return $this->view('addCategory', [
            'buttonName' => self::ADD_BUTTON_NAME,
            'action' => '/' . self::MODULE . '/' . self::ADD_ACTION
        ]);
    }

    public function Add()
    {
        $this->session->remove('error');

        try {
            /** @var CategoryModel */
            $this->categoryModel->save($this->getRequestData());
        }catch (\Exception $e) {
            $this->getErrorResponse(self::ERROR_ADD, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to(self::LIST_PATH);
    }

    public function List()
    {
        /** @var CategoryModel $this->categoryModel */
        $list = $this->categoryModel->getAllForUser($this->user->user_id);

        return $this->view('categoryList', [
            'categoryList' => $list
        ]);
    }

    public function Delete($id)
    {
        $this->session->remove('error');

        /** @var CategoryModel $this->categoryModel */
        $category = $this->categoryModel->find($id);

        if( !$category ){
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        try{
            /** @var CategoryModel $this->categoryModel */
            $this->categoryModel->delete($id);
        }catch(\Exception $e){
            return $this->getErrorResponse(self::ERROR_DELETE, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to(self::LIST_PATH);
    }

    public function EditForm($id)
    {
        $this->session->remove('error');

        /** @var CategoryModel $this->categoryModel */
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return $this->view('addCategory', [
            'buttonName' => self::UPDATE_BUTTON_NAME,
            'categoryName' => $category->name,
            'categoryLimit' => $category->limit,
            'action' => '/' . self::MODULE . '/' . self::EDIT_ACTION . '/' . $id
        ]);
    }

    public function Edit($id)
    {
        $this->session->remove('error');

        /** @var CategoryModel $this->categoryModel */
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return $this->getErrorResponse(self::ERROR_NOT_FOUND, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        try {
            /** @var CategoryModel */
            $this->categoryModel->update($id, $this->getRequestData());
        }catch (\Exception $e) {
            return $this->getErrorResponse(self::ERROR_UPDATE, self::LIST_PATH, self::LIST_BUTTON_NAME);
        }

        return redirect()->to(self::LIST_PATH);
    }

    private function getRequestData()
    {
        return [
            'name' => $this->request->getPost('category_name'),
            'limit' => $this->request->getPost('limit'),
            'user_id' => $this->user->user_id
        ];
    }
}