<?php

use App\Models\FrontendMenu;
use App\Models\MenuPermission;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if ( !function_exists( 'slugChecker' ) ) {
    function slugChecker($editSlug,$slug) {
        $slug = str_replace(' ', '-',preg_replace('/[^A-Za-z0-9- ]/', '', Str::lower($slug)));
        $where[] = ['slug','=',$slug];
        if($editSlug){
            $where[] = ['rand_id','!=',$editSlug];
        }
        $slug_exist = FrontendMenu::where($where)->first();
        if($slug_exist){
            $explode_array = explode('-',$slug);
            $slug = str_replace('-'.((int)end($explode_array)),'',$slug);
            $slug = $slug.'-'.((int)end($explode_array)+1);
            return slugChecker($editSlug,$slug);
        }else{
            return $slug;
        }
    }
}

if ( !function_exists( 'menuUrl' ) ) {
    function menuUrl($menu) {
    	$route_url['menu'] = Str::slug(@$menu->url_link);
    	$route_url['menu_id'] = @$menu->id;

        return (@$menu->url_link)?(route('menu_url',$route_url)):'#' ;
    }
}

if(!function_exists('inner_permission')){
	function inner_permission($permitted_route){
		if(Auth::user()->id=='1'){
			return true;
		}
		
		$user_role_array=Auth::user()->user_role;
		if(count($user_role_array)==0){
			$user_role = [];
		}else{
			foreach($user_role_array as $rolee){
				$user_role[] = $rolee->role_id;
			}
		}
		
		$existpermission = MenuPermission::where('permitted_route',$permitted_route)->whereIn('role_id',@$user_role)->first();
		if($existpermission){
			return true;
		}else{
			return false;
		}
	}

	if (!function_exists('smsSend')) {
        function smsSend($phone, $messages)
        {
            $expo = explode(' ', $messages);
            $message = implode('%20', $expo);
            $url = "https://gpcmp.grameenphone.com/ecmapigw/webresources/ecmapigw.v2?username=Corp1Corp12&password=Imi@4321&apicode=1&msisdn=$phone&countrycode=880&cli=2222&messagetype=1&message=$message&messageid=0";
            $client = new \GuzzleHttp\Client(['verify'=>false]);
            $response = $client->get($url);
            return @$response;
        }
    }
}

if (!function_exists('logData')) {
    function logData($primary_id = null, $url = null, $old_data = null, $new_data = null, $action = null, $created_by = null, $updated_by = null, $deleted_by = null)
    {
        $server_info['Server Name']    = $_SERVER['SERVER_NAME'] ?? null;
        $server_info['Server Address'] = $_SERVER['SERVER_ADDR'] ?? null;
        $server_info['Server Port']    = $_SERVER['SERVER_PORT'] ?? null;
        $server_info['Remote Address'] = $_SERVER['REMOTE_ADDR'] ?? null;
        $server_info['Request Time']   = isset($_SERVER['REQUEST_TIME']) ? date('d-m-Y H:i:s A', $_SERVER['REQUEST_TIME']) : date('d-m-Y H:i:s A', time());

        $store                  = new Log();
        $store->primary_id      = $primary_id;
        $store->url             = $url;
        $store->old_data        = json_encode($old_data);
        $store->new_data        = json_encode($new_data);
        $store->action          = $action;
        $store->server_info     = json_encode($server_info);
        $store->created_by      = $created_by;
        $store->updated_by      = $updated_by;
        $store->deleted_by      = $deleted_by;
        $store->save();
        return true;
    }
}



function hall()
{
 $data=DB::table('popup_notifactions')->where(['status'=>1,'category'=>3])->first();
 return $data;
}

if ( !function_exists( 'mydate' ) ) {
	function mydate($mydate)
	{
		$date=date_create($mydate);
		$new_date = date_format($date,"d/M/Y");
		return $new_date;
	}
}
