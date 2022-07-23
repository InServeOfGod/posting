<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = DB::select("SELECT u.name, p.id, p.title, p.thoughts FROM users u JOIN posts p on u.id = p.user_id ORDER BY p.id DESC");

        return view('posts.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'thoughts' => 'required|max:255'
        ]);

        $post = new Posts();
        $post['user_id'] = Auth::id();
        $post['title'] = $data['title'];
        $post['thoughts'] = $data['thoughts'];
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $data = DB::select("SELECT u.name, p.id, p.title, p.thoughts FROM users u JOIN posts p on u.id = p.user_id WHERE p.id = $id LIMIT 1");

        return view('posts.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Posts $posts
     * @return Application|Factory|View
     */
    public function edit(Posts $posts)
    {
        return view('posts.edit', [
            'data' => $posts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Posts $posts
     * @return RedirectResponse
     */
    public function update(Request $request, Posts $posts)
    {
        $request->validate([
            'title' => 'required|max:128',
            'thoughts' => 'required|max:255'
        ]);

        $title = $request->get('title');
        $thoughts = $request->get('thoughts');

        $posts->update([
            'title' => $title,
            'thoughts' => $thoughts
        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Posts $posts
     * @return RedirectResponse
     */
    public function destroy(Posts $posts): RedirectResponse
    {
        $posts->delete();
        return redirect()->route('posts.index');
    }
}
