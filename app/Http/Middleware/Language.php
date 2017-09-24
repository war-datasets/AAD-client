<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\{
    Request, App, Session, Input
};

/**
 * Class Language
 *
 * @package App\Http\Middleware
 */
class Language
{
    /**
     * The supported language keys.
     *
     * @var array $supportedLanguages
     */
    protected static $supportedLanguages = ['nl', 'en', 'fr'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) { // Authenticated  user found.
            $language = auth()->user()->language;
        } else { // No authenticated user.
            $language = (Input::get('lang')) ?: Session::get('lang');
        }

        $this->setSupportedLanguage($language);
        return $next($request);
    }

    /**
     * Determine if the language is supported or not.
     *
     * @param  string $lang The given language key
     * @return bool
     */
    private function isLanguageSupported($lang): bool
    {
        return in_array($lang, self::$supportedLanguages);
    }

    /**
     * Set the given language to the application.
     *
     * @param  string $lang The language given by the user.
     * @return void
     */
    private function setSupportedLanguage($lang)
    {
        if ($this->isLanguageSupported($lang)) {
            App::setLocate($lang);
            Session::put('lang', $lang);
        }
    }
}
