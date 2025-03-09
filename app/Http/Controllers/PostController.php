<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categories;
use App\Models\Galleries;


class PostController extends Controller
{
    //



    public function index()
    {
        $username = auth()->user()->username;
        $posts = Post::with(['gallery', 'category'])->where('email', $username)->paginate(5);


        session()->put('posts', $posts);
        return redirect()->route('dashboard');
    }

    public function create()
    {
        if(!auth()->user()){
            return redirect()->route('login');
        };

        $categories = Categories::all();
        return view('post.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:2', 'max:50', 'string'],
            'category' => 'required',
            'file' => 'required|image',
            'is_publish' => 'required',
            'description' => 'required|min:10',
        ]);



        if($request->file){
            $file = $request->file;
            $fileName =time(). $file->getClientOriginalName();
            $imagePath = public_path('/image/posts/');

            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);

            }

        };

        $file->move($imagePath, $fileName);

        $gallery = Galleries::create([
            'image' => $fileName
        ]);


        // dd(auth()->user()->id);
        Post::create([
            'gallery_id' => $gallery->id,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'is_publish' => $request->is_publish  ,
        ]);
        // return $request->all();

        return redirect()->route('dashboard')->with('success', 'success create post');

    }

    public function show($id)
    {

        $post = Post::with(['Category', 'Gallery'])->where('id', $id)->first();
        // dd($post);
        return view('website.blog.single', compact('post'));

    }

    public function edit($id)
    {
        if(!auth()->user()){
            return redirect()->route('login');
        };
        $post = Post::where('id', $id)->first();
        $categories = Categories::all();

        // dd( url()->previous());
        session(['previous_url' => url()->previous()]);


        return view('post.edite', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {

        if(!auth()->user()){
            return redirect()->route('login');
        };

        // dd($request->all());
        $request->validate([

            "title" => "string|min:5",
            "category" => "required",
            "description" => "string",

        ]);

        $post = Post::where('id', $id)->first();

        if ($request->hasFile('file')){

            if ($post->Gallery && $post->Gallery->name) {
                $oldImagePath = public_path('/image/posts/' . $post->Gallery->name);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file = $request->file('file');
            $fileName =time(). $file->getClientOriginalName();
            $imagePath = public_path('/image/posts/');
            $file->move($imagePath, $fileName);

            $gallery = Galleries::where('id', $post->gallery->id)->update([
                'image' => $fileName
            ]);
        };


        if($request->has('title') && $post->title !== $request->title){

            $post->update([
                'title' => $request->title,
            ]);

        };

        if($request->has('category') && $post->category_id !== $request->category){

            $post->update([
                'category' => $request->category,
            ]);

        };


        if($request->has('is_publish') && $post->is_publish !== $request->is_publish){

            $post->update([
                'is_publish' => $request->is_publish,
            ]);

        }


        if($request->has('description') && $post->description !== $request->description ){

            $post->update([
                'description' => $request->description,
            ]);

        }


        // $currentRouteName = url()->previous();
        // dd($currentRouteName);
        // dd(auth()->user()->is_admin);

        $posts = Post::with(['gallery', 'category'])->paginate(5);
        session()->put('posts', $posts);



        if ($post->wasChanged()) {

            if (session('previous_url') == "http://127.0.0.1:8000/dashboard") {
                return redirect()->route('dashboard')
                                 ->with('success', 'Post updated successfully')
                                 ->with(compact('posts'));
            } elseif (session('previous_url') == "http://127.0.0.1:8000/user-manage") {
                dd('zert');
                return redirect()->route('user.manage')
                                 ->with('success', 'Post updated successfully')
                                 ->with(compact('posts'));
            }
        }

        dd('ds');




        if (session('previous_url') == 'dashboard') {
            return redirect()->route('dashboard')
                    ->with('info', 'No changes were made.')
                    ->with(compact('posts'));
        } elseif (session('previous_url')) {
            return redirect()->route('user.manage')
                                ->with('info', 'No changes were made.')
                                ->with(compact('posts'));
        }




    }

    public function destroy($id)
    {

        if(!auth()->user()){
            return redirect()->route('login');
        };


        $post = Post::where('id', $id)->first();

        if ($post->Gallery && $post->Gallery->image) {
            $oldImagePath = public_path('/image/posts/' . $post->Gallery->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }



        $pastPost = $post;
        $post->delete();
        $pastPost->Gallery->delete();


        $posts = Post::with(['gallery', 'category'])->paginate(5);
        session()->put('posts', $posts);

        return redirect()->route('dashboard')->with('success', 'success delete post');

    }



    public function home()
    {

        $posts = Post::with(['gallery', 'category'])->paginate(5);
        $lastPost = Post::with(['gallery', 'category'])->latest()->take(5)->paginate(5);
        return view('website.blog.index', ['posts' => $posts, 'lastPost' => $lastPost]);
    }

}
