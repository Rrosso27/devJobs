@php
    $classes = " text-sm text-gray-600 hover:text-gray-900 text-xs";
@endphp

<div>
    <a  {{$attributes->merge(['class' => $classes])}}>
       {{$slot}}
    </a>
</div>
