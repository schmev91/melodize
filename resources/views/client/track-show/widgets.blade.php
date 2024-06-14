<div id="track-widgets" class="grow flex justify-between gap-2">
    <div id="comments-stack class="flex flex-col gap-2"">
        <h3 class="text-white">Comments</h3>
        @if ($comments->isEmpty())
        <h2 class="text-lg text-slate-400">There are not yet any comments, be the first!</h2>
        @else
        @foreach ($comments as $comment)
        <div class="chat chat-start">
            <div class="chat-header">
                <span class="text-white">{{ $comment->user->name }}</span>
                @if ($comment->at)
                <time class="text-gray-300">at {{ $comment->at }}</time>
                @endif
            </div>
            <div class="avatar chat-image">
                <div class="w-10 rounded-full">
                    <img src="{{ Storage::url($comment->user->avatar) }}" />
                </div>
            </div>
            <div class="chat-bubble">{{ $comment->content }}</div>
        </div>
        @endforeach
        @endif
    </div>
    {{-- comments --}}
    @if (!auth()->check())
        <button class="btn btn-primary" @click="login_modal.show()">Login to comment</button>
    @else
    <div class="flex flex-col w-96">
        <x-form.textarea name="comment_content" placeholder="What is your though on this track?" rows="2"></x-form.textarea>
        <button id="comment-btn" class="btn btn-primary w-fit" wire:click='comment'>Comment</button>
    </div>
    @endif
</div>
