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
        $this->app->singleton("phrets", function ($app) {
            $connections = [];

            foreach (config("services.phrets") as $phretsConnection => $config) {
                $configuration = (new Configuration)
                    ->setLoginUrl($config["login-url"])
                    ->setUsername($config["username"])
                    ->setPassword($config["password"])
                    ->setHttpAuthenticationMethod($config["authentication-method"])
                    ->setRetsVersion($config["rets-version"]);

                if (! app()->environment("production")) {
                    $configuration->setLoginUrl($config["staging-login-url"]);
                }

                $phrets = new Session($configuration);

                if (config("app.debug") === true) {
                    $log = new \Monolog\Logger('PHRETS');
                    $log->pushHandler(new \Monolog\Handler\StreamHandler('php://stdout', \Monolog\Logger::DEBUG));
                    $phrets->setLogger($log);
                }

                $phrets->Login();
                $connections[$phretsConnection] = $phrets;
            }

            return $connections;
        });
    }

    public function provides() : array
    {
        return ["phrets"];
    }
}
