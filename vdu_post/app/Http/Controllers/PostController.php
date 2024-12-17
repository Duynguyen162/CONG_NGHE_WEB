<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("home", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = Post::all();
        return view('create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',   // Tiêu đề là bắt buộc và tối đa 255 ký tự
            'content' => 'required',          // Nội dung là bắt buộc
        ]);

        // Lưu dữ liệu vào cơ sở dữ liệu
        Post::create($request->all());  // Lưu tất cả các trường từ request vào cơ sở dữ liệu

        // Chuyển hướng về trang danh sách và thông báo thành công
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
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
        // Tìm bài viết theo ID
        $post = Post::findOrFail($id);

        // Trả về view chỉnh sửa và truyền dữ liệu bài viết
        return view('edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Xác thực dữ liệu từ form
        $request->validate([
            'title' => 'required|max:255',  // Tiêu đề là bắt buộc và tối đa 255 ký tự
            'content' => 'required',        // Nội dung là bắt buộc
        ]);

        // Tìm bài viết theo ID
        $post = Post::findOrFail($id);

        // Cập nhật bài viết
        $post->update($request->all());

        // Chuyển hướng về trang danh sách và thông báo thành công
        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm bài viết theo ID
        $post = Post::findOrFail($id);

        // Xóa bài viết
        $post->delete();

        // Chuyển hướng về trang danh sách và thông báo thành công
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
