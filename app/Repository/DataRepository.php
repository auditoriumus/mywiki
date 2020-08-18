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

        $words = str_word_count(trim(mb_strtolower($string)), 1);
        $result = [];
        foreach ($words as $word) {
            $array =  $this->model
                ->where('note', 'LIKE', '%' . $word . '%')
                ->orWhere('title', 'LIKE', '%' . $word . '%')
                ->get()
                ->toArray();
            if(!empty($array)) {
                $result[$array[0]['id']] = $array[0];
            } else {
                continue;
            }
        }
        return isset($result) ? $result : false;
    }

    public function getData($id){
        return $this->model::find($id)->toArray();
    }

    public function deleteData($id){
        return $this->model::find($id)->delete();
    }
}
