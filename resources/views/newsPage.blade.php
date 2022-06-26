@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Новости</div>
                    <div class="card-body">
                        
                        @guest
                            Авторизуйтесь для добавления новостей<br>
                        @endguest

                        @auth
                            <form method="POST" action="Insert">
                                @csrf
                                <label>Title</label>
                                <input type="text" name="title"><br>
                                <label>Content</label>
                                <input type="text" name="content"><br>
                                <label>Author</label>
                                <input type="text" name="author"><br>
                                <input type="submit" value="Добавить новость">
                            </form><br>
                        @endauth

                        @foreach ($data as $item)
                            <p>
                            <div class="card">
                                <div class="card-header">
                                    {{ $item->id }} - {{ $item->title }}<br>
                                </div>
                            </div>
                            {{ $item->content }}<br>
                            Автор : {{ $item->author }}<br>
                            Дата добавления/изменения {{ $item->created_at }}
                            <form method="POST" action="Delete">
                                @csrf
                                <input type="hidden" name="pId" value={{ $item->id }}>
                                <input type="submit" value="Удалить">
                            </form>
                            </p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
