<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('created_at', 'desc')->paginate(5);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

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

    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
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

    public function destroy($id)
    {
        $book = Book::find($id);
        if($book){
            $book->delete();
        }
        return redirect()->route('books.index')->with('success', 'Xóa sách thành công!');
    }

    public function show($id){
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }
}

