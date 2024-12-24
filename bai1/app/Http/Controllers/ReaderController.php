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
        $request->validate([
            'name' => ['required', 'regex:/^[\p{L}\p{N}\s\.,-]+$/u'],
            'birthday' => ['required', 'date'],
            'address' => ['required'],
            'phone' => ['required', 'regex:/^[0-9]+$/'],
        ],[
            'name.required' => 'Tên không được để trống.',
            'name.regex' => 'Tên chỉ được chứa chữ cái, khoảng trắng và không chứa ký tự đặc biệt.',
            'birthday.required' => 'Ngày sinh không được để trống.',
            'birthday.date' => 'Ngày sinh không đúng định dạng.',
            'address.required' => 'Địa chỉ không được để trống.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.regex' => 'Số điện thoại chỉ được chứa các chữ số.',
        ]);

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
        $request->validate([
            'name' => ['required', 'regex:/^[\p{L}\p{N}\s\.,-]+$/u'],
            'birthday' => ['required', 'date'],
            'address' => ['required'],
            'phone' => ['required', 'regex:/^[0-9]+$/'],
        ],[
            'name.required' => 'Tên không được để trống.',
            'name.regex' => 'Tên chỉ được chứa chữ cái, khoảng trắng và không chứa ký tự đặc biệt.',
            'birthday.required' => 'Ngày sinh không được để trống.',
            'birthday.date' => 'Ngày sinh không đúng định dạng.',
            'address.required' => 'Địa chỉ không được để trống.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.regex' => 'Số điện thoại chỉ được chứa các chữ số.',
        ]);
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
