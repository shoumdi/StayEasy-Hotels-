@props(['type','name','place-holder'])
<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    <label>
        @yield('label')
    </label>
    @if($type !== 'text-aria')
    <input type="{{$type}}" name="{{$name}}" placeholder="{{$place-holder}}" value="{{$value}}">
    @else <textarea name="{{$name}}" placeholder="{{$place-holder}}">{{$value}}</textarea>
    @endif
</div>