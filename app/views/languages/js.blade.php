@if(!empty($langs))
var Language = {};
@foreach ($langs as $key => $lang)
Language['{{ $key }}'] = '{{ str_replace("'", "\\'", $lang) }}';
@endforeach
@endif
