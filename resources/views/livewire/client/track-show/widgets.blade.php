{{-- Stop trying to control. --}}
<div id="track-widgets" class="flex grow justify-between gap-2">
    @include("client.track-show.comments")
    <div class="flex flex-col gap-3">
        @include("client.track-show.interaction")

        @include("client.track-show.commentable")
    </div>
</div>
