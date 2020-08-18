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

            $search_string = str_word_count($search_word, 1);
            foreach ($search_result as $index=>$items) {
                foreach ($search_string as $word) {
                    $items['note'] = preg_replace('/' . $word . '/i', '<b>$0</b>', $items['note']);
                    $items['title'] = preg_replace('/' . $word . '/i', '<b>$0</b>', $items['title']);
                    $search_result[$index] = $items;
                }
            }
        }
            $success = !empty($search_result) ? 'Показаны результаты с запросом ' . $search_word : 'По запросу ' . $search_word . ' ничего не найдено';
            return view('home', compact('search_result', 'success', 'current_path'));
        }
}
