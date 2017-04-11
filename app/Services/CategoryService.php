<?php
/**
 * Created by PhpStorm.
 * User: Lukas Figura
 * Date: 11/04/2017
 * Time: 10:25
 */

namespace App\Services;


use App\Models\Category;

class CategoryService
{
    /**
     * @param array $values
     *
     * @return Category|bool false => unsuccessfully updated; instance of Category if successfully
     */
    public function create($values)
    {
        $category = new Category();

        foreach ($values as $key => $value) {
            $category->{$key} = $value;
        }

        try {
            $category->save();
        } catch (\Exception $e) {
            return false;
        }

        return $category;
    }

    /**
     * @param integer $id
     * @param array   $values
     *
     * @return Category|bool false => unsuccessfully updated; instance of Category if successfully
     */
    public function update($id, $values)
    {
        $category = Category::find($id);

        if ($category == null) {
            return false;
        }

        foreach ($values as $key => $value) {
            $category->{$key} = $value;
        }

        try {
            $category->save();
        } catch (\Exception $e) {
            return false;
        }

        return $category;
    }


    /**
     * @param integer $id
     *
     * @return bool true => successfully removed; false => unsuccessfully removed
     */
    public function remove($id)
    {
        $category = Category::find($id);

        if ($category == null) {
            return false;
        }

        try {
            $category->delete();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}