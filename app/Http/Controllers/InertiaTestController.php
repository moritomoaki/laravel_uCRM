<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index () {
        return Inertia::render('Inertia/Index',[
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create () {
        return Inertia::render('Inertia/Create');
    }

    public function show ($id) {
        // dd($id);
        return Inertia::render('Inertia/show',
    [
        // 連想配列で引数を使用するのが主流
        'id'   => $id,
        // DBから該当のIDレコードを取得
        'blog' => InertiaTest::findOrFail($id)
    ]);
    }

    public function store (Request $request) {

        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        // インスタンス化
        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
        // フラッシュメッセージのセット
        ->with([
            'message' => '登録しました。'
        ]);
    }


    public function delete($id) {

        $book = InertiaTest:: findOrFail($id);
        $book->delete();

        return to_route('inertia.index')
        ->with([
            'message' => '削除しました'
        ]);
    }
}
