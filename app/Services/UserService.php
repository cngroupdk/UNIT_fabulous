<?php
/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 * Time: 10:24
 */

namespace App\Services;


use App\Models\User;

class UserService
{

    /**
     * @param array $values
     *
     * @return User|bool false => unsuccessfully updated; instance of User if successfully
     */
    public function create($values)
    {
        $user = new User();

        foreach ($values as $key => $value) {
            $user->{$key} = $value;
        }

        try {
            $user->save();
        } catch (\Exception $e) {
            return false;
        }

        return $user;
    }

    /**
     * @param integer $id
     * @param array   $values
     *
     * @return User|bool false => unsuccessfully updated; instance of User if successfully
     */
    public function update($id, $values)
    {
        $user = User::find($id);

        if ($user == null) {
            return false;
        }

        foreach ($values as $key => $value) {
            $user->{$key} = $value;
        }

        try {
            $user->save();
        } catch (\Exception $e) {
            return false;
        }

        return $user;
    }


    /**
     * @param integer $id
     *
     * @return bool true => successfully removed; false => unsuccessfully removed
     */
    public function remove($id)
    {
        $user = User::find($id);

        if ($user == null) {
            return false;
        }

        try {
            $user->delete();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * @param string $email
     *
     * @return User|null
     */
    public function getByEmail($email)
    {
        $user = User::where('email', $email)->first();

        return $user;
    }
}