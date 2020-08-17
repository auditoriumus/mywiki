<?php

namespace App\Repository;
use App\Models\Data;

class DataRepository
{
    private $model;

    public function __construct(){
        $model = new Data();
        $this->model = $model;
    }

    public function addData($title, $note, $id = false){
        if ($id) {
            $model = $this->model::find($id);
            $model->note = $note;
            $model->title = $title;
            $model->updated_at = date('Y-m-d', time());
        } else {
            $model = $this->model;
            $model->note = $note;
            $model->title = $title;
            $model->created_at = date('Y-m-d', time());
            $model->updated_at = date('Y-m-d', time());
        }
        $model->save();
        return $model->id;
    }

    public function searchData($string){
        if(empty($string)) return false;

        $words = explode(' ', trim($string));
        $result = [];
        foreach ($words as $word) {
            $array =  $this->model
                ->where('note', 'LIKE', '%' . $word . '%')
                ->orWhere('title', 'LIKE', '%' . $word . '%')
                ->get()
                ->toArray();
            $result[] = $array;
        }
        return $result;
    }

    public function getData($id){
        return $this->model::find($id)->toArray();
    }

    public function deleteData($id){
        return $this->model::find($id)->delete();
    }
}
