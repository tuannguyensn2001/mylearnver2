<?php
    return [
        'fields' => [
            'name' => 'Tên bài giảng',
            'slug' => 'Slug',
            'description' => 'Mô tả bài giảng',
            'chapter' => 'Chương học',
            'status' => 'Trạng thái',
            'video_url' => 'URL video bài học',
            'course' => 'Khóa học'
        ],
        'actions' => [
            'insert_success' => 'Thêm mới thành công',
            'insert_fail' => 'Thêm mới thất bại',
            'update_success' => 'Sửa thành công',
            'update_fail' => 'Sửa thất bại',
        ],
        'request' => [
            'name_required' => 'Tên bài giảng không được để trống',
            'video_url_required' => 'URL Video không được để trống',
        ]
    ]
?>
