<?php

namespace App\Http\Controllers;

use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{    
    public function Select()
    {
        $table = new news();
        return view('newsPage',['data' => $table->all()]);
    }

    public function Delete(Request $req)
    {
       // $table = new product();
        // $row = product::find($req->pId);
        // $row->delete();       
        //DB::table('products')->delete($req->pId);   
        
        $table = new news();
        $row = news::find($req->pId);
        $row->delete();
        return Redirect('newsPage');
    }

    public function Insert(Request $req)
    {
        $req->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);
        $table = new news();
        $table->title = $req->input('title');
        $table->content = $req->input('content');
        $table->author = $req->input('author');
        $table->save();
        return redirect('newsPage');       
    }
    
}
