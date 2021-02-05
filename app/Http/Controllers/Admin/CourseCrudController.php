<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CourseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CourseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Course::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/course');
        CRUD::setEntityNameStrings('khóa học', 'Khóa học');

        $this->crud->setTitle('Thêm mới khóa học','create');
        $this->crud->setTitle('Chỉnh sửa khóa học','edit');
        $this->crud->setHeading('Khóa học','create');
        $this->crud->setSubheading('Thêm mới','create');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
//

        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => trans('admin_course.fields.name'),
                'type' => 'text',
            ],
            [
                'name' => 'price',
                'label' => trans('admin_course.fields.price'),
                'type' => 'number',
            ],
            [
                'label' => trans('admin_course.fields.tag'),
                'type' => 'select',
                'name' => 'tag_id',
                'entity' => 'tag',
                'model' => 'App\Models\Tag',
                'attribute' => 'name'
            ],
            [
                'label' => trans('admin_course.fields.level'),
                'type' => 'select',
                'name' => 'level_id',
                'entity' => 'level',
                'model' => 'App\Models\Level',
                'attribute' => 'name'
            ],
            [
                'label' => trans('admin_course.fields.status'),
                'type' => 'select',
                'name' => 'status_id',
                'entity' => 'status',
                'model' => 'App\Models\Status',
                'attribute' => 'name'
            ]
        ]);


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CourseRequest::class);

        $this->crud->addFields([
            [
                'name' => 'name',
                'label' => trans('admin_course.fields.name'),
                'type' => 'text',
            ],
            [
                'name' => 'slug',
                'label' => trans('admin_course.fields.slug'),
                'type' => 'text'
            ],
            [
                'name' => 'description',
                'label' => trans('admin_course.fields.description'),
                'type' => 'text',
            ],
            [
                'name' => 'price',
                'label' => trans('admin_course.fields.price'),
                'type' => 'number',
            ],
            [
                'name' => 'thumbnail',
                'label' => trans('admin_course.fields.thumbnail'),
                'type' => 'text'
            ],
            [
                'label' => trans('admin_course.fields.tag'),
                'type' => 'select2',
                'name' => 'tag_id',
                'entity' => 'tag',
                'model' => 'App\Models\Tag',
                'attribute' => 'name'
            ],
            [
                'label' => trans('admin_course.fields.level'),
                'type' => 'select2',
                'name' => 'level_id',
                'entity' => 'level',
                'model' => 'App\Models\Level',
                'attribute' => 'name'
            ],
            [
                'label' => trans('admin_course.fields.status'),
                'type' => 'select2',
                'name' => 'status_id',
                'entity' => 'status',
                'model' => 'App\Models\Status',
                'attribute' => 'name'
            ]


        ]);



        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => trans('admin_course.fields.name'),
                'type' => 'text',
            ],
            [
                'name' => 'slug',
                'label' => trans('admin_course.fields.slug'),
                'type' => 'text'
            ],
            [
                'name' => 'description',
                'label' => trans('admin_course.fields.description'),
                'type' => 'text',
            ],
            [
                'name' => 'price',
                'label' => trans('admin_course.fields.price'),
                'type' => 'number',
            ],
            [
                'name' => 'thumbnail',
                'label' => trans('admin_course.fields.thumbnail'),
                'type' => 'text'
            ],
            [
                'label' => trans('admin_course.fields.tag'),
                'type' => 'select',
                'name' => 'tag_id',
                'entity' => 'tag',
                'model' => 'App\Models\Tag',
                'attribute' => 'name'
            ],
            [
                'label' => trans('admin_course.fields.level'),
                'type' => 'select',
                'name' => 'level_id',
                'entity' => 'level',
                'model' => 'App\Models\Level',
                'attribute' => 'name'
            ],
            [
                'label' => trans('admin_course.fields.status'),
                'type' => 'select',
                'name' => 'status_id',
                'entity' => 'status',
                'model' => 'App\Models\Status',
                'attribute' => 'name'
            ]


        ]);

    }






}
