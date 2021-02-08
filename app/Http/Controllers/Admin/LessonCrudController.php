<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LessonRequest;
use App\Repositories\Chapter\ChapterRepository;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Lesson\LessonRepositoryInterface;
use App\Repositories\Status\StatusRepository;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LessonCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LessonCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    private $courseRepository;
    private $chapterRepository;
    private $statusRepository;
    private $repository;

    public function __construct(CourseRepositoryInterface $courseRepository,ChapterRepository $chapterRepository,StatusRepository $statusRepository,LessonRepositoryInterface $lessonRepository)
    {
        parent::__construct();
        $this->courseRepository = $courseRepository;
        $this->chapterRepository = $chapterRepository;
        $this->statusRepository = $statusRepository;
        $this->repository = $lessonRepository;

    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Lesson::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/lesson');
        CRUD::setEntityNameStrings('lesson', 'Bài giảng');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('slug');
        CRUD::column('description');
        CRUD::column('video_url');
        CRUD::column('status_id');
        CRUD::column('created_at');
        CRUD::column('updated_at');

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
        CRUD::setValidation(LessonRequest::class);
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

    public function create()
    {
        $this->crud->hasAccessOrFail('create');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->crud->getSaveAction();
        $this->data['title'] = $this->crud->getTitle() ?? trans('backpack::crud.add').' '.$this->crud->entity_name;

        $this->data['courses'] = $this->courseRepository->all();
        $this->data['chapters'] = $this->chapterRepository->all();
        $this->data['statuses'] = $this->statusRepository->all();
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('admin.lesson.create', $this->data);
    }

    public function store(LessonRequest $lessonRequest): \Illuminate\Http\RedirectResponse
    {
        $data = $lessonRequest->except(['_token','save_action']);

        $result = $this->repository->create($data);

        $result ? \Alert::success(trans('admin_lesson.actions.insert_success'))->flash() :    \Alert::success(trans('admin_lesson.actions.insert_fail'))->flash();

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->crud->hasAccessOrFail('update');
        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;
        $this->crud->setOperationSetting('fields', $this->crud->getUpdateFields());
        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->crud->getSaveAction();
        $this->data['title'] = $this->crud->getTitle() ?? trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['lesson'] = $this->repository->find($id);
        $this->data['courses'] = $this->courseRepository->all();
        $this->data['chapters'] = $this->chapterRepository->all();
        $this->data['statuses'] = $this->statusRepository->all();

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('admin.lesson.edit', $this->data);
    }

    public function update(LessonRequest $lessonRequest,$id): \Illuminate\Http\RedirectResponse
    {
        $data = $lessonRequest->except(['_token','save_action']);

        $result = $this->repository->update($id,$data);

        $result ? \Alert::success(trans('admin_lesson.actions.update_success'))->flash() :    \Alert::danger(trans('admin_lesson.actions.update_fail'))->flash();

        return redirect()->back();
    }

    public function index()
    {
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->getTitle() ?? mb_ucfirst($this->crud->entity_name_plural);

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('admin/lesson/list', $this->data);
    }

}
