<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public function getList($params)
    {
        $items = Student::where('name', '<>', '');
        if (!empty($params['keyword'])) {
            $keyword = '%' . $params['keyword'] . '%';
            $items->whereRaw(
                '((`name` like ?))',
                [$keyword]
            );
        }

        $items->orderBy('created_at', 'desc');
        return $items;
    }
}