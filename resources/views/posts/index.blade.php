@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
           @auth
                <form action="{{ route('posts') }}" method="post" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <lable for="body" class="sr-only">Body</lable>
                        <textarea name="body" id="body" name="body" cols="38" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Whats in your mind?"></textarea>
                        @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-black text-white px-4 py-2 rounded front-medium">Post</button>
                    </div>
                </form>
            @endauth
            @if($posts->count())
                @foreach ($posts as $post)
               
                <x-post :post="$post" />

                @endforeach

                {{ $posts->links() }}

            @else
                <p>there are no posts</p>
            @endif

        </div>
    </div>
@endsection