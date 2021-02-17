@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => backpack_url('dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.edit') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
	<section class="container-fluid">
	  <h2>
        <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
        <small>{!! $crud->getSubheading() ?? trans('backpack::crud.edit').' '.$crud->entity_name !!}.</small>

        @if ($crud->hasAccess('list'))
          <small><a href="{{ url($crud->route) }}" class="d-print-none font-sm"><i class="la la-angle-double-{{ config('backpack.base.html_direction') == 'rtl' ? 'right' : 'left' }}"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
        @endif
	  </h2>
	</section>
@endsection

@section('content')
<div class="row">
	<div class="{{ $crud->getEditContentClass() }}">
		<!-- Default box -->

		@include('crud::inc.grouped_errors')

		  <form method="post"
		  		action="{{ url($crud->route.'/'.$entry->getKey()) }}"
				@if ($crud->hasUploadFields('update', $entry->getKey()))
				enctype="multipart/form-data"
				@endif
		  		>
		  {!! csrf_field() !!}
		  {!! method_field('PUT') !!}

              <div class="card">
                  <div class="card-body row">
                      <div class="form-group col-sm-12" element="div">
                          <label for="name">{{trans('admin_lesson.fields.name')}}</label>
                          <input id="name" type="text" name="name" class="form-control" value="{{ $lesson->name ?? old('name') }}">
                      </div>

                      <div class="form-group col-sm-12" element="div">
                          <label for="description">{{trans('admin_lesson.fields.description')}}</label>
                          <input id="description" type="text" name="description" class="form-control" value="{{ $lesson->description ?? old('description')}}">
                      </div>

                      <div class="form-group col-sm-12" element="div">
                          <label for="video_url">{{trans('admin_lesson.fields.video_url')}}</label>
                          <input id="video_url" type="text" name="video_url" class="form-control" value="{{ $lesson->video_url ?? old('video_url')}}">
                      </div>

                      <div class="form-group col-sm-12">
                          <label for="course_id">{{trans('admin_lesson.fields.course')}}</label>
                          <select id="course_id" class="form-control">
                              @foreach($courses as $course)
                                  <option {{ $course->id === $lesson->chapter->course_id ? 'selected' : null }}  value="{{ $course->id }}">{{ $course->name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group col-sm-12">
                          <label for="chapter_id">{{trans('admin_lesson.fields.chapter')}}</label>
                          <select name="chapter_id" id="chapter_id" class="form-control">

                          </select>
                      </div>


                      <div class="form-group col-sm-12">
                          <label for="status_id">{{trans('admin_lesson.fields.status')}}</label>
                          <select name="status_id" id="status_id" class="form-control">
                              @foreach($statuses as $status)
                                  <option {{ $status->id === $lesson->status_id ? 'check' : null }} value="{{ $status->id }}">{{ $status->name }}</option>
                              @endforeach
                          </select>
                      </div>


                  </div>
              </div>

              @include('crud::inc.form_save_buttons')
		  </form>
	</div>
</div>
@endsection

@section('after_scripts')
    <script>
        $(document).ready(function(){
            const chapters = JSON.parse(`{!! $chapters !!}`);
            const course = $('#course_id');
            const chapter = $('#chapter_id');

            (() => {
                const courseId = course.val()-0;


                const chapterFilter = chapters.filter(chapter => chapter.course_id === courseId);

                let option = '';
                chapterFilter.forEach(chapter => {
                    option+= `<option value=${chapter.id}>${chapter.name}</option>`
                })


                chapter.append(option);
            })();

            course.on('change',function(event){
                chapter.empty();

                const courseId = event.target.value-0;
                const chapterFilter = chapters.filter(chapter => chapter.course_id === courseId);

                let option = '';
                chapterFilter.forEach(chapter => {
                    option+= `<option value=${chapter.id}>${chapter.name}</option>`
                })

                chapter.append(option);


            })


        })

    </script>
@endsection



