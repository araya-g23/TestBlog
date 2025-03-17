@if(Auth::check())
    <h3>Add a Comment</h3>
    <form method="POST" action="{{ route('comments.store', ['post_id' => $post->id]) }}">
        @csrf
        <textarea name="content" required></textarea>
        <button type="submit">Submit</button>
    </form>
@else
    <p><a href="{{ route('login') }}">Login</a> to comment</p>
@endif
