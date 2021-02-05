{{--<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->--}}
{{--<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('course') }}'><i class='nav-icon la la-question'></i> Courses</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('lesson') }}'><i class='nav-icon la la-question'></i> Lessons</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('chapter') }}'><i class='nav-icon la la-question'></i> Chapters</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-question'></i> Categories</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('content') }}'><i class='nav-icon la la-question'></i> Contents</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('level') }}'><i class='nav-icon la la-question'></i> Levels</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('status') }}'><i class='nav-icon la la-question'></i> Statuses</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tag') }}'><i class='nav-icon la la-question'></i> Tags</a></li>--}}
{{--<li class='nav-item'><a class='nav-link' href='{{ backpack_url('type') }}'><i class='nav-icon la la-question'></i> Types</a></li>--}}

@foreach(trans('admin_sidebar.sidebar') as $item)
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url($item['href']) }}'><i
                class='nav-icon {{ $item['icon'] }}'></i> {{ $item['title'] }}</a></li>
@endforeach
