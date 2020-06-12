<?php
namespace app\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider {
    public function boot() {
        //
    }

    public function register() {
        foreach (glob(app_path() . '/Helpers/*.php') as $file_name) {
            require_once($file_name);
        }
    }

}