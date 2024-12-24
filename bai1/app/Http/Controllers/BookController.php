<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'regex:/^[\p{L}\p{N}\s\.,-]+$/u'],
            'author' => ['required', 'regex:/^[\p{L}\p{N}\s\.,-]+$/u'],
            'category' => ['required', 'regex:/^[\p{L}\p{N}\s\.,-]+$/u'],
            'year' => ['required', 'digits:4', 'integer'],
            'quantity' => ['required', 'integer', 'min:0'],
        ],
        [
            'name.required' => 'Tên sách không được để trống.',
            'name.regex' => 'Tên sách không được chứa ký tự không hợp lệ.',
            'author.required' => 'Tên tác giả không được để trống.',
            'author.regex' => 'Tên tác giả không được chứa ký tự không hợp lệ.',
            'category.required' => 'Thể loại không được để trống.',
            'category.regex' => 'Thể loại không được chứa ký tự không hợp lệ.',
            'year.required' => 'Năm xuất bản không được để trống.',
            'year.digits' => 'Năm xuất bản phải là 4 chữ số.',
            'year.integer' => 'Năm xuất bản phải là số nguyên.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn 0.',
        ]);
        
        $book = $request->all();
        Book::create($book);
        return redirect()->route('books.index')->with('success', 'Thêm sách mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'regex:/^[\p{L}\p{N}\s\.,-]+$/u'],
            'author' => ['required', 'regex:/^[\p{L}\p{N}\s\.,-]+$/u'],
            'category' => ['required', 'regex:/^[\p{L}\p{N}\s\.,-]+$/u'],
            'year' => ['required', 'digits:4', 'integer'],
            'quantity' => ['required', 'integer', 'min:0'],
        ],
        [
            'name.required' => 'Tên sách không được để trống.',
            'name.regex' => 'Tên sách không được chứa ký tự không hợp lệ.',
            'author.required' => 'Tên tác giả không được để trống.',
            'author.regex' => 'Tên tác giả không được chứa ký tự không hợp lệ.',
            'category.required' => 'Thể loại không được để trống.',
            'category.regex' => 'Thể loại không được chứa ký tự không hợp lệ.',
            'year.required' => 'Năm xuất bản không được để trống.',
            'year.digits' => 'Năm xuất bản phải là 4 chữ số.',
            'year.integer' => 'Năm xuất bản phải là số nguyên.',
            'quantity.required' => 'Số lượng không được để trống.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải lớn hơn 0.',
        ]);        
        $book = Book::find($id);
        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Cập nhật sách thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if($book){
            $book->delete();
        }
        return redirect()->route('books.index')->with('success', 'Xóa sách thành công!');
    }
}
