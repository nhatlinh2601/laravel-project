<!-- resources/views/posts/posts_list.blade.php -->

@foreach($posts as $post)
   <h1>{{$post->title}}</h1>
@endforeach
