@extends('layouts.default')

@section('main')
@while ( have_posts() )
@php the_post() @endphp
<div class="sb-block-container">
  {!! the_content() !!}
</div>
@endwhile
@endsection