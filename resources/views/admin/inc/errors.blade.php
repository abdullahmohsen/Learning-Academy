{{--  @section('scripts')  --}}
@if ($errors->any())
<ul class="list-unstyled alert alert-danger mt-2">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        {{--  aler($error);  --}}
    @endforeach
</ul>
@endif
{{--  @endsection  --}}
