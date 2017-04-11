<?php
/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 * Time: 10:25
 */

namespace App\Services;


use App\Models\Rating;

class RatingService
{
    /**
     * @param array $values
     *
     * @return Rating|bool false => unsuccessfully updated; instance of Rating if successfully
     */
    public function create($values)
    {
        $rating = new Rating();

        foreach ($values as $key => $value) {
            $rating->{$key} = $value;
        }

        try {
            $rating->save();
        } catch (\Exception $e) {
            return false;
        }

        return $rating;
    }

    /**
     * @param integer $id
     * @param array   $values
     *
     * @return Rating|bool false => unsuccessfully updated; instance of Rating if successfully
     */
    public function update($id, $values)
    {
        $rating = Rating::find($id);

        if ($rating == null) {
            return false;
        }

        foreach ($values as $key => $value) {
            $rating->{$key} = $value;
        }

        try {
            $rating->save();
        } catch (\Exception $e) {
            return false;
        }

        return $rating;
    }


    /**
     * @param integer $id
     *
     * @return bool true => successfully removed; false => unsuccessfully removed
     */
    public function remove($id)
    {
        $rating = Rating::find($id);

        if ($rating == null) {
            return false;
        }

        try {
            $rating->delete();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}