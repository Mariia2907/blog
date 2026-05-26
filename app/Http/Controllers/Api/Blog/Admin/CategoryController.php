<?php

namespace App\Http\Controllers\Api\Blog\Admin;

//use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(5);

        return $paginator;
        //dd(__METHOD__);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); //отримаємо масив даних, які надійшли з форми
        if (empty($data['slug'])) { //якщо псевдонім порожній
            $data['slug'] = Str::slug($data['title']); //генеруємо псевдонім
        }
        $item = BlogCategory::create($data);
        if ($item) {
            return ['success' => 'Успішно створено'];
        } else {
            return ['msg' => 'Помилка створення'];
        }
        //dd(__METHOD__);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = BlogCategory::find($id);
        if (empty($item)) { //якщо ід не знайдено
            return ['msg' => "Запис id=[{$id}] не знайдено"];
        }
        return ['item' => $item];
        //dd(__METHOD__);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = BlogCategory::find($id);
        if (empty($item)) {
            return ['message' => "Запис id=[{$id}] не знайдено"];
        }

        $data = $request->all(); //отримаємо масив даних, які надійшли з форми
        if (empty($data['slug'])) { //якщо псевдонім порожній
            $data['slug'] = Str::slug($data['title']); //генеруємо псевдонім
        }

        $result = $item->update($data);  //оновлюємо дані об'єкта і зберігаємо в БД

        if ($result) {
            return ['success' => 'Успішно збережено', 'item' => $item];
        } else {
            return ['msg' => 'Помилка збереження'];
        }
        //dd(__METHOD__);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd(__METHOD__);
    }
}
