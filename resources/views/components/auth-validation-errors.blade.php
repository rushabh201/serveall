@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <!-- <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div> -->

        <ul class="mt-3 text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
.text-red-600 {
    color: red;
    font-weight: 600;
    list-style-type: none;
    padding-left: 0px !important;
}
</style>