<?php

namespace GContacts\Http\Controllers;

use GContacts\Google\SharedContactsInterface;

/**
 * Class HomeController
 */
class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    /**
     * @param SharedContactsInterface $contacts
     */
    public function __construct(SharedContactsInterface $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function privacy()
    {
        return view('privacy');
    }

    /**
     * @return $this
     */
    public function home()
    {
        $list = $this->contacts->all();
        if (!is_array($list)) {
            return view('error')->with('message', $list);
        }
        return view('home')->with('contacts', $list);
    }
}