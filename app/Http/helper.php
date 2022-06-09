<?php 

/*=======================================
            helper functions 
=======================================*/

/*

** helper function : adminUrl()
** add 'admin' word before all url's that belongs to admins 

*/

if(!function_exists('adminUrl')){
    function adminUrl($url = null){
        return url('admin/'.$url);
    }
}

/*

** helper function : admin()
** return(auth()->guard('admin)) instead of write it every time we use it 

*/

if(!function_exists('admin')){
    function admin(){
        return auth()->guard('admin');
    }
}

/*

** helper function : lang()
** return a session with selected language by the user 

*/

if(!function_exists('lang')){
    function lang(){
        if(session()->has('lang')){
            return session('lang');
        }

        else{
            return 'en';
        }
    }
}

/*

** helper function : direction()
** return the direction of writing depend on the selected language

*/

if(!function_exists('direction')){
    function direction(){
        if(session()->has('lang')){
            if(session('lang') == 'en'){
                return 'ltr';
            }

            else{
                return 'rtl';
            }
        }

        else{
            return 'ltr';
        }
    }
}


/*

** helper function : activeMenu()
** add 'admin' word before all url's that belongs to admins 

*/

if(!function_exists('activeMenu')){
    function activeMenu($link){
        if(preg_match('/'.$link.'/i', Request::segment(2))){
            return ['menu-open', 'display:block;'];
        }

        else{
            return ['', ''];
        }
    }
}
