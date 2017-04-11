<?php
/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 * Time: 10:25
 */

namespace App\Services;


use App\Models\Invitation;

class InvitationService
{
    /**
     * @param array $values
     *
     * @return Invitation|bool false => unsuccessfully updated; instance of Invitation if successfully
     */
    public function create($values)
    {
        $invitation = new Invitation();

        foreach ($values as $key => $value) {
            $invitation->{$key} = $value;
        }

        try {
            $invitation->save();
        } catch (\Exception $e) {
            return false;
        }

        return $invitation;
    }

    /**
     * @param integer $id
     * @param array   $values
     *
     * @return Invitation|bool false => unsuccessfully updated; instance of Invitation if successfully
     */
    public function update($id, $values)
    {
        $invitation = Invitation::find($id);

        if ($invitation == null) {
            return false;
        }

        foreach ($values as $key => $value) {
            $invitation->{$key} = $value;
        }

        try {
            $invitation->save();
        } catch (\Exception $e) {
            return false;
        }

        return $invitation;
    }


    /**
     * @param integer $id
     *
     * @return bool true => successfully removed; false => unsuccessfully removed
     */
    public function remove($id)
    {
        $invitation = Invitation::find($id);

        if ($invitation == null) {
            return false;
        }

        try {
            $invitation->delete();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}