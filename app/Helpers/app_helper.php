<?php
if (!function_exists('site_setting')) {
	function site_setting($data)
	{
		$settingmodel = new \App\Models\Setting;
		$setting = $settingmodel->first(1);
		return $setting[$data];
	}
}

if (!function_exists('isActive')) {
    function isActive(array $routes, $output = "active")
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

if (!function_exists('certificatefind')) {
    function certificatefind($studentId)
    {
        $certificate = new \App\Models\Certificate();
        $cer = $certificate->where('student_id', $studentId)->first();

        if(!empty($cer)){
            return $cer;
        }

        return false;

    }
}



