<?php
/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 * Time: 10:25
 */

namespace App\Services;

use App\Models\Feedback;

class FeedbackService
{
    /**
     * @param array $values
     *
     * @return Feedback|bool false => unsuccessfully updated; instance of Feedback if successfully
     */
    public function create($values)
    {
        $feedback = new Feedback();

        foreach ($values as $key => $value) {
            $feedback->{$key} = $value;
        }

        try {
            $feedback->save();
        } catch (\Exception $e) {
            return false;
        }

        return $feedback;
    }

    /**
     * @param integer $id
     * @param array   $values
     *
     * @return Feedback|bool false => unsuccessfully updated; instance of Feedback if successfully
     */
    public function update($id, $values)
    {
        $feedback = Feedback::find($id);

        if ($feedback == null) {
            return false;
        }

        foreach ($values as $key => $value) {
            $feedback->{$key} = $value;
        }

        try {
            $feedback->save();
        } catch (\Exception $e) {
            return false;
        }

        return $feedback;
    }


    /**
     * @param integer $id
     *
     * @return bool true => successfully removed; false => unsuccessfully removed
     */
    public function remove($id)
    {
        $feedback = Feedback::find($id);

        if ($feedback == null) {
            return false;
        }

        try {
            $feedback->delete();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}