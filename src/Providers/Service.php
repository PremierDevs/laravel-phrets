<?php namespace GeneaLabs\LaravelPhrets\Providers;

use Illuminate\Support\ServiceProvider;
use PHRETS\Configuration;
use PHRETS\Session;

class Service extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton("phrets", function () {
            $configuration = (new Configuration)
                ->setLoginUrl(config("services.phrets.login-url"))
                ->setUsername(config("services.phrets.username"))
                ->setPassword(config("services.phrets.password"))
                ->setRetsVersion(config("services.phrets.rets-version"));

            return new Session($configuration);
        });
    }

    public function provides() : array
    {
        return ["phrets"];
    }
}
