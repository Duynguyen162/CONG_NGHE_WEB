<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;
use App\Models\User;
class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issue = Issue::with('computer')->paginate(10); // Lấy 5 bản ghi mỗi trang
        return view('Issue.index', compact('issue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computer = Computer::all(); 
        return view('Issue.create', compact('computer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Issue::create($request->all());
        return redirect()->route('Issue.index')->with('success', 'đã được thêm thành công!');
    }

    /** 
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        $computer = Computer::all();
        return view('Issue.edit', compact('issue', 'computer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        
        $issue = Issue::find($id);
        
        // Cập nhật thông tin
        $issue->update($request->all());
    
        // Điều hướng trở lại trang index với thông báo thành công
        return redirect()->route('Issue.index')->with('success', 'được cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('Issue.index')->with('success', 'đã được xóa thành công!');
    }
}
