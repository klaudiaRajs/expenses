<?php


namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\ShopModel;

class Dashboard extends BaseController
{
    public function index()
    {
        /** @var CategoryModel $this->categoryModel */
        $categoryList = $this->categoryModel->getAllForUser($this->user->user_id);
        /** @var ShopModel $this->shopModel */
        $shopList = $this->shopModel->getAllForUser($this->user->user_id);
        $productList = $this->productModel->getAllForUserForPeriod(
            $this->user->user_id,
            $this->getCurrentPeriodStart($this->user->period_start_day),
            $this->getCurrentPeriodEnd($this->user->period_start_day)
        );

        $savings = $this->user->income - $this->calculateSpendings($productList);

        return $this->view('dashboard', [
            'categorySums' => $this->getGroupSums($categoryList, $productList, 'category_id'),
            'shopSums' => $this->getGroupSums($shopList, $productList, 'shop_id'),
            'savings' => $savings
        ]);
    }

    private function getGroupSums(array $categoryList, array $productList, string $groupIdIdentifier)
    {
        $data = $this->getGroupData($categoryList, $groupIdIdentifier);
        $data = $this->getProductTotalsPerGroup($productList, $data, $groupIdIdentifier);

        return $data;
    }

    private function getProductTotalsPerGroup(array $productList, array $data, string $groupId)
    {
        foreach ($productList as $product) {
            if (!isset($data[$product->$groupId])) {
                continue;
            }

            $total = round($product->price * $product->amount, 2);
            $data[$product->$groupId]['total'] += $total;

            if ($data[$product->$groupId]['limit'] < $total) {
                $data[$product->$groupId]['limitReached'] = true;
            }
        }

        return $data;
    }

    private function getGroupData(array $groupList, string $groupId, array $data = [])
    {
        foreach ($groupList as $item) {
            $data[$item->$groupId]['name'] = $item->name;
            $data[$item->$groupId]['total'] = 0;
            $data[$item->$groupId]['limit'] = $item->limit;
            $data[$item->$groupId]['limitReached'] = false;
        }

        return $data;
    }

    private function calculateSpendings(array $productList)
    {
        $total = 0;
        foreach ($productList as $product) {
            $total += round($product->price * $product->amount, 2);
        }
        return $total;
    }
}