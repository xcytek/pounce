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
        if (is_array(Session::get('user'))) {
            Redirect::to('?view=list');
        } else {
            View::render('login');
        }
    }

    /**
     * Colors List Page
     */
    public function colorList()
    {
        if (! is_array(Session::get('user'))) {
            Redirect::to();
        } else {
            View::render('color-list');
        }
    }

    /**
     * Error 404 Not Found Page
     */
    public function E404()
    {
        View::render('404');
    }

    /**
     * Do login with POST form data
     */
    public function signin()
    {
        $data = Request::post();
        if ($this->validateFormData($data)) {
            Session::put('user', $data);
            $message = [
                'type'    => 'success',
                'message' => 'Datos Validos'
            ];
        } else {
            $message = [
                'type'    => 'error',
                'message' => 'Por favor ingrese datos validos',
            ];
        }

        echo Response::json($message);
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
     * Get Colors List Ordered Web Service
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

    /**
     * Validate POST Form Data
     *
     * @param $data
     * @return bool
     */
    private function validateFormData($data)
    {
        if (isset($data['email'], $data['password'])) {
            $email    = $data['email'];
            $password = $data['password'];
        } else {
            return false;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)
            && $this->validPassword($password)) {
            return true;
        }

        return false;
    }

    /**
     * Only Validate for Password
     *
     *  * Validate Password
     * At least 1 lowercase
     * At least 1 uppercase
     * At least 1 number
     * At least 1 special character
     * Minimum Length of 6
     *
     * @param $password
     * @return bool
     */
    private function validPassword($password) {
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $special   = preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password);

        if (! $uppercase
            || ! $lowercase
            || ! $number
            || ! $special
            || strlen($password) < 6) {
            return false;
        }

        return true;
    }
}