{{-- comments --}}
@if (! auth()->check())
<button
    class="btn btn-primary"
    @click="login_modal.show()"
>
    Login to comment
</button>
@else
<div class="flex w-96 flex-col">
    <x-form.textarea
        name="comment_content"
        placeholder="What is your though on this track?"
        rows="2"
    ></x-form.textarea>
    <button
        id="comment-btn"
        class="btn btn-primary btn-sm w-fit"
        wire:click="comment"
    >
        Comment
    </button>
</div>
@endif