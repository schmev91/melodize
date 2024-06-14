<div id="track-widgets" class="grow flex justify-between gap-2">
    <div id="comments-stack class="flex flex-col gap-2"">
        @foreach ($comments as $comment)
        <div class="chat chat-start">
            <div class="chat-header">
                <span class="text-white">{{ $comment->user->name }}</span>
                <time class="text-gray-300">{{ $comment->created_at }}</time>
            </div>
            <div class="avatar chat-image">
                <div class="w-10 rounded-full">
                    <img src="{{ Storage::url($comment->user->avatar) }}" />
                </div>
            </div>
            <div class="chat-bubble">{{ $comment->content }}</div>
        </div>
        @endforeach
    </div>
    @auth
    <div class="flex flex-col w-96">
        <x-form.textarea name="comment_content" placeholder="What is your though on this track?" rows="2">
        </x-form.textarea>
        <button class="btn btn-primary w-fit" wire:click='comment'>Comment</button>
    </div>
    @endauth
</div>
