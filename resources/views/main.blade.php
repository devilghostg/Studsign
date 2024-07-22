@extends('layouts.app')

@section('content')

    <!-- container  -->
    <div class="container">
        <div class="box">
            <div>
                <h1>Organisme</h1>
            </div>
            <div class="article">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ducimus harum aperiam
                    repellendus voluptatum sequi, saepe voluptas error dicta ab corrupti labore, nostrum natus est
                    ipsa assumenda fuga nesciunt nihil.</p>
                <button class="btn-79"><span>S'informer</span></button>
            </div>
        </div>
        <div class="box">
            <div>
                <h1>Formateur</h1>
            </div>
            <div class="article">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ducimus harum aperiam
                    repellendus voluptatum sequi, saepe voluptas error dicta ab corrupti labore, nostrum natus est
                    ipsa assumenda fuga nesciunt nihil.</p>
                <button class="btn-79"><span>Se connecter</span></button>
            </div>
        </div>
        <div class="box">
            <div>
                <h1>Student</h1>
            </div>
            <div class="article">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ducimus harum aperiam
                    repellendus voluptatum sequi, saepe voluptas error dicta ab corrupti labore, nostrum natus est
                    ipsa assumenda fuga nesciunt nihil.</p>
                <form action="{{ route('auth') }}">
                    <button class="btn-79"><span>Se connecter</span></button>
                </form>
            </div>
        </div>
    </div>
@endsection