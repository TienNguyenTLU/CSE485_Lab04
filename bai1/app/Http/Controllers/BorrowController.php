<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Reader;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book', 'reader')->orderBy('created_at','desc')->paginate(5);
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.create', compact('books', 'readers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reader_id' => ['required', 'exists:readers,id'], 
            'book_id' => ['required', 'exists:books,id'], 
            'borrow_date' => ['required', 'date'], 
            'return_date' => ['required', 'date', 'after_or_equal:borrow_date'], 
            'status' => ['required', 'in:0,1'], 
        ], 
        [
            'reader_id.required' => 'Chưa chọn độc giả.',
            'reader_id.exists' => 'Độc giả không tồn tại.',
            'book_id.required' => 'Chưa chọn sách.',
            'book_id.exists' => 'Sách không tồn tại.',
            'borrow_date.required' => 'Ngày mượn không được để trống.',
            'borrow_date.date' => 'Ngày mượn không hợp lệ.',
            'return_date.required' => 'Ngày trả không được để trống.',
            'return_date.date' => 'Ngày trả không hợp lệ.',
            'return_date.after_or_equal' => 'Ngày trả phải sau hoặc bằng ngày mượn.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái phải là "0" (chưa trả) hoặc "1" (đã trả).',
        ]);

        $borrow = $request->all();
        Borrow::create($borrow);
        return redirect()->route('borrows.index')->with('success', 'Thêm phiếu mượn thành công!');
    }

    public function show(string $id)
    {
        $borrow = Borrow::find($id);
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.show', compact('borrow', 'books', 'readers'));
    }

    public function edit(string $id)
    {
        $borrow = Borrow::find($id);
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.edit', compact('borrow', 'books', 'readers'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'reader_id' => ['required', 'exists:readers,id'], 
            'book_id' => ['required', 'exists:books,id'], 
            'borrow_date' => ['required', 'date'], 
            'return_date' => ['required', 'date', 'after_or_equal:borrow_date'], 
            'status' => ['required', 'in:0,1'], 
        ], 
        [
            'reader_id.required' => 'Chưa chọn độc giả.',
            'reader_id.exists' => 'Độc giả không tồn tại.',
            'book_id.required' => 'Chưa chọn sách.',
            'book_id.exists' => 'Sách không tồn tại.',
            'borrow_date.required' => 'Ngày mượn không được để trống.',
            'borrow_date.date' => 'Ngày mượn không hợp lệ.',
            'return_date.required' => 'Ngày trả không được để trống.',
            'return_date.date' => 'Ngày trả không hợp lệ.',
            'return_date.after_or_equal' => 'Ngày trả phải sau hoặc bằng ngày mượn.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái phải là "0" (chưa trả) hoặc "1" (đã trả).',
        ]);

        $borrow = Borrow::find($id);
        $borrow->update($request->all());
        return redirect()->route('borrows.index')->with('success', 'Cập nhật phiếu mượn thành công!');
    }

    public function destroy(string $id)
    {
        $borrow = Borrow::find($id);
        if($borrow){
            $borrow->delete();
        }

        return redirect()->route('borrows.index')->with('success', 'Xóa phiếu mượn thành công!');
    }
}
