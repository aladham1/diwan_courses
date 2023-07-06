@extends('layouts.master')
@section('title'){{$title}}@endsection
@section('meta_title'){{$title}}@endsection

@section('meta_description'){{$description}}@endsection
@section('meta_image'){{$image}}@endsection
@section('meta_url'){{route('courses.show',$id)}}@endsection

@section('content')
    <div class="container courses-page">
        <course-details :course_id="`{{$id}}`"></course-details>
    </div>
@endsection



