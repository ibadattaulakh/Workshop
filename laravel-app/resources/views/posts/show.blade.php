@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="px-4 sm:px-0">
    <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="p-8">
            <div class="mb-4">
                <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800">
                    ← Back to posts
                </a>
            </div>

            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                {{ $post->title }}
            </h1>

            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                <span>By {{ $post->user->name }}</span>
                <span class="mx-2">•</span>
                <span>{{ $post->published_at->format('F d, Y') }}</span>
            </div>

            <div class="prose dark:prose-invert max-w-none">
                <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                    {{ $post->excerpt }}
                </p>
                <div class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">
                    {{ $post->body }}
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700 flex space-x-4">
                <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                    Edit Post
                </a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md" 
                            onclick="return confirm('Are you sure you want to delete this post?')">
                        Delete Post
                    </button>
                </form>
            </div>
        </div>
    </article>
</div>
@endsection


