<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\IpRangeService;
use App\Rules\BlockEmailPatterns;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IpRangeService::class, function ($app) {
            return new IpRangeService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the custom validation rule globally
        Validator::extend('block_email_patterns', function ($attribute, $value, $parameters, $validator) {
            $rule = new BlockEmailPatterns();
            
            $failClosure = function($message) use ($attribute, $validator) {
                // Add the custom failure message to the validator
                if (!$validator->errors()->has($attribute)) {
                    $validator->errors()->add($attribute, $message);
                }
            };
    
            // Run the validation rule
            $rule->validate($attribute, $value, $failClosure);
    
            // If there are errors, validation failed
            return !$validator->errors()->has($attribute);
        });
    }
}
