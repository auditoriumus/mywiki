<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\UserController;
use App\Repository\DataRepository;

class SearchController extends UserController
{
    public function search() {
        $current_path = $this->current_path;

        $search_word = $_POST['search'];
        if (!$search_word) {
            return redirect('/')->withErrors('Пустая строка поиска');
        } else {
            $repository = new DataRepository();
            $search_result = $repository->searchData($search_word);
            //dd($search_result);

            $total_result_array = [];
            foreach ($search_result as $search_items) {
                foreach ($search_items as $item) {
                    $total_result_array[] = $item;
                }
            }
            $search_result = [];
            foreach ($total_result_array as $items) {
                if (in_array($items, $search_result)) {
                    continue;
                } else {
                    $items['note'] = preg_replace('/' . $search_word . '/', '<b>$0</b>', $items['note']);
                    $items['title'] = preg_replace('/' . $search_word . '/', '<b>$0</b>', $items['title']);
                    $search_result[] = $items;
                }
            }
        }

            $success = !empty($search_result) ? 'Показаны результаты с запросом ' . $search_word : 'По запросу ' . $search_word . ' ничего не найдено';
            return view('home', compact('search_result', 'success', 'current_path'));
        }
}
