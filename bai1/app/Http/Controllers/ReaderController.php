<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;

class ReaderController extends Controller
{
    public function index()
    {
        $readers = Reader::orderBy('created_at', 'desc')->paginate(5);
        return view('readers.index', compact('readers'));
    }

    public function create()
    {
        return view('readers.create');
    }

    public function store(Request $request)
    {
        $reader = $request->all();
        Reader::create($reader);
        return redirect()->route('readers.index')->with('success', 'Thêm độc giả thành công!');
    }

    public function show(string $id)
    {
        $reader = Reader::find($id);
        return view('readers.show', compact('reader'));
    }

    public function edit(string $id)
    {
        $reader = Reader::find($id);
        return view('readers.edit', compact('reader'));
    }

    public function update(Request $request, string $id)
    {
        $reader = Reader::find($id);
        $reader->update($request->all());
        return redirect()->route('readers.index')->with('success', 'Cập nhật độc giả thành công!');
    }

    public function destroy(string $id)
    {
        $reader = Reader::find($id);
        if($reader){
            $reader->delete();
        }
        return redirect()->route('readers.index')->with('success', 'Xóa thành công!');
    }
}
