<?php

namespace Controllers;

use Utils\View;
use Utils\Request;
use Utils\Session;
use Utils\Redirect;
use Utils\Response;
/**
 * Class HomeController
 *
 * @package Controllers
 */
class HomeController
{
    const ORDER_BY = 'color';

    /**
     * Login Page
     */
    public function login()
    {
        if (Session::get('user') !== null) {
            View::render('login');
        } else {
            $this->colorList();
        }
    }

    /**
     * Colors List Page
     */
    public function colorList()
    {
        View::render('color-list');
    }

    /**
     * Error 404 Not Found Page
     */
    public function E404()
    {
        View::render('404');
    }

    /**
     * Log Out Action
     */
    public function logout()
    {
        Session::destroy();
        Redirect::to('/');
    }

    /**
     * Get Colors List Ordered
     */
    public function getColorsList()
    {
        $list    = Request::call(__DIR__ . '/../../public/colors_list.json');
        $colors  = Response::asArray($list);
        $ordered = $this->order($colors, self::ORDER_BY);

        echo Response::json($ordered);
    }

    /**
     * Order the list
     *
     * @param $list
     * @param $by
     * @return array
     */
    private function order($list, $by)
    {
        // Sort the Colors by 'color' key comparing the strings
        usort($list, function ($a, $b) use ($by) {
            return strnatcmp($a[$by], $b[$by]);
        });

        // Reverse the array to get Z-A order (DESC)
        return array_reverse($list);
    }
}