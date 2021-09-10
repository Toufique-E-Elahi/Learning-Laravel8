<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{$posts->links()}}
        @else
            <p> No Posts Yet</p>
        @endif

{{--        <div class="lg:grid lg:grid-cols-3">--}}
{{--            <x-post-card/>--}}
{{--            <x-post-card/>--}}
{{--            <x-post-card/>--}}

{{--        </div>--}}
    </main>
</x-layout>



{{--<x-layout>--}}
{{--    @foreach ($posts as $post)--}}
{{--        <article>--}}
{{--            <h1><a href="/posts/{{$post->slug}}">{{ $post->title}}</a></h1>--}}
{{--            <p>--}}
{{--                by <a href="/authors/{{ $post->author->name }}">{{ $post->author->name }}</a> in--}}
{{--                <a href="/categories/{{ $post->category->slug }}">--}}
{{--                    {{$post->category->name}}--}}
{{--                </a>--}}
{{--            </p>--}}

{{--            <p>--}}
{{--                {{$post->excerpt}}--}}
{{--            </p>--}}
{{--        </article>--}}
{{--    @endforeach--}}
{{--</x-layout>--}}

