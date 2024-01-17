<!-- resources/views/feedback/index.blade.php -->

@extends('layouts.base')
@section('title', 'Feedback')

@section('content')
    <div class="container mt-5">
        <h3 class="mb-4">Give Your Feedback</h3>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="form-group mb-4">
                <textarea class="form-control @error('feedback') @enderror" id="WYSIWYG" name="message" rows="5"></textarea>
                @error('feedback')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
@stop
