<?php
/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 * Time: 10:25
 */

namespace App\Services;


use App\Models\Box;

class BoxService
{
    /**
     * @param array $values
     *
     * @return Box|bool false => unsuccessfully updated; instance of Box if successfully
     */
    public function create($values)
    {
        $box = new Box();

        foreach ($values as $key => $value) {
            $box->{$key} = $value;
        }

        $box->code = uniqid();
        try {
            $box->save();
        } catch (\Exception $e) {
            return false;
        }

        return $box;
    }

    /**
     * @param integer $id
     * @param array   $values
     *
     * @return Box|bool false => unsuccessfully updated; instance of Box if successfully
     */
    public function update($id, $values)
    {
        $box = Box::find($id);

        if ($box == null) {
            return false;
        }

        foreach ($values as $key => $value) {
            $box->{$key} = $value;
        }

        try {
            $box->save();
        } catch (\Exception $e) {
            return false;
        }

        return $box;
    }


    /**
     * @param integer $id
     *
     * @return bool true => successfully removed; false => unsuccessfully removed
     */
    public function remove($id)
    {
        $box = Box::find($id);

        if ($box == null) {
            return false;
        }

        try {
            $box->delete();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * @param string $code
     *
     * @return null|Box null => unsuccessfully; instance of Feedback with $code
     */
    public function getByCode($code)
    {
        $box = Box::where('code', $code)->first();

        return $box;
    }

    public function getById($id)
    {
        return Box::findOrFail($id);
    }
}