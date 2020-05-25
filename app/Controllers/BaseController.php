<?php
namespace App\Controllers;

use App\Helpers\AuthHelper;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ShopModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use DateTime;

class BaseController extends Controller
{

	protected $helpers = [];
    const EDIT_ACTION = 'Edit';
    const UPDATE_BUTTON_NAME = 'Update';
    const ADD_BUTTON_NAME = 'Add';
    const ADD_ACTION = 'Add';
    //same as in AuthHelper
    const LOGGED_IN_SESSION_INDEX_KEY = 'loggedIn';
    //same as in AuthHelper
    const USER_INDEX_NAME = 'user';
    const ERROR_NOT_FOUND = "Item not found!";
    const ERROR_UPDATE = "Error when updating item, please try again or contact administration.";
    const ERROR_ADD = "Error when adding a new item, please try again or contact administration.";
    const ERROR_DELETE = "Error when deleting, please try again or contact administration.";

    const PATH_DASHBOARD = '/Dashboard';
    const PATH_AUTH = '/Auth';

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		$this->session = \Config\Services::session();
		$this->shopModel = new ShopModel();
		$this->categoryModel = new CategoryModel();
		$this->productModel = new ProductModel();
		$this->authService = new AuthHelper();
		$this->userModel = new UserModel();
		$this->user =  AuthHelper::currentUser();
	}

    public function view(string $page = 'logIn', array $data = [])
    {
        if ( ! is_file(APPPATH.'/Views/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['isLoggedIn'] = $this->authService->isLoggedIn();

        echo view('templates/header', $data);
        echo view($page, $data);
    }

    protected function getErrorResponse(string $error, string $path, string $buttonName)
    {
        $this->session->set('error', [
            'message' => $error,
            'destinationPath' => $path,
            'destinationName' => $buttonName
        ]);
        return redirect()->to('/Ups');
    }

    protected function getCurrentPeriodStart(int $period_start_day)
    {
        if( intval(date("d")) >= $period_start_day ){
            $startDate = (new DateTime())->setDate(intval(date("Y")), intval(date("m")), $period_start_day);
        } else{
            $startDate = (new DateTime())->setDate(intval(date("Y")), intval(date("m")) - 1, $period_start_day);
        }
        return $startDate->format('Y-m-d');
    }

    protected function getCurrentPeriodEnd(int $period_start_day)
    {
        if( intval(date("d")) >= $period_start_day ){
            $startDate = (new DateTime())->setDate(intval(date("Y")), intval(date("m")) + 1, $period_start_day - 1);
        } else{
            $startDate = (new DateTime())->setDate(intval(date("Y")), intval(date("m")), $period_start_day - 1);
        }
        return $startDate->format('Y-m-d');
    }
}
