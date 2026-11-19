<?php

if (!function_exists('is_admin')) {
	function is_admin()
	{
		if (!session()->has('admin_id')) {
			return null;
		}
		$adminModel = new \App\Models\AdminModel();
		$franchiseModel = new \App\Models\FranchiseModel();
		$admin = $adminModel->findAdmin(session()->get('admin_id'));
		$my_center_code = $franchiseModel->where("id", $admin["branch_id"])->first()["center_code"];
		$application_id = $franchiseModel->where("id", $admin["branch_id"])->first();
		$data = [
			"admin" => $admin,
			"center_code" => $my_center_code,
			"center" => $application_id,
		];
		return $data;
	}
}
if (!function_exists('is_user')) {
	function is_user()
	{
		if (!session()->has('user_id')) {
			return null;
		}
		$student = new \App\Models\RegistrationModel();
		$user = $student->where('id', session()->get('user_id'))->first();
		return $user;
	}
}
if (!function_exists('franchise')) {
	function franchise($id)
	{
		$franchiseModel = new \App\Models\FranchiseModel();
		$franchiseModel = $franchiseModel->where('id', $id)->first();
		return $franchiseModel;
	}
}
if (!function_exists('areActiveRoutesHome')) {
    function areActiveRoutesHome(array $routes, $output = "active")
    {
        $currentRoute = service('router')->getMatchedRoute()->getName();

        foreach ($routes as $route) {
            if ($currentRoute == $route) {
                return $output;
            }
        }

        return '';
    }
}

if (!function_exists('getState')) {
    function getState($id)
    {
		$statemodel = new \App\Models\StateModel();
        return $statemodel->where ('id',$id)->first()['state_name'];
    }
}

if (!function_exists('getDist')) {
    function getDist($id)
    {
		$citieModel = new \App\Models\CitieModel();
		return $citieModel->first($id)['city_name'];
        
    }
}


