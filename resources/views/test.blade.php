@extends('layouts.app')

@section('title', 'Profil StudSign Test')

@section('content')
<section class="flex justify-center items-center h-full">
    <div class="bg-gray-800 p-8 rounded-lg text-white">
        <h1>Profil de l'utilisateur</h1>
        <div class="card">
            <div class="card-body">
                <h2>{{ $user->name }}</h2>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Date de création:</strong> {{ $user->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
