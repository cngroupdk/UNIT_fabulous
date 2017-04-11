<?php
/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 * Time: 10:24
 */

namespace App\Services;


use App\Models\Tag;

class TagService
{
    /**
     * @param array $values
     *
     * @return Tag|bool false => unsuccessfully updated; instance of Tag if successfully
     */
    public function create($values)
    {
        $tag = new Tag();

        foreach ($values as $key => $value) {
            $tag->{$key} = $value;
        }

        try {
            $tag->save();
        } catch (\Exception $e) {
            return false;
        }

        return $tag;
    }

    /**
     * @param integer $id
     * @param array   $values
     *
     * @return Tag|bool false => unsuccessfully updated; instance of Tag if successfully
     */
    public function update($id, $values)
    {
        $tag = Tag::find($id);

        if ($tag == null) {
            return false;
        }

        foreach ($values as $key => $value) {
            $tag->{$key} = $value;
        }

        try {
            $tag->save();
        } catch (\Exception $e) {
            return false;
        }

        return $tag;
    }


    /**
     * @param integer $id
     *
     * @return bool true => successfully removed; false => unsuccessfully removed
     */
    public function remove($id)
    {
        $tag = Tag::find($id);

        if ($tag == null) {
            return false;
        }

        try {
            $tag->delete();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}