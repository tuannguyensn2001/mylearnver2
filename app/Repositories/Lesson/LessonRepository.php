<?php


namespace App\Repositories\Lesson;


use App\Models\Lesson;
use Illuminate\Support\Str;

class LessonRepository implements LessonRepositoryInterface
{

    public function create($data): bool
    {

        try {
            $data['slug'] = Str::slug($data['name']);
            Lesson::create($data);
            return true;
        } catch (\Exception $exception){
            return false;
        }
    }

    public function find($id)
    {
        return Lesson::find($id);
    }

    public function update($id, $data)
    {
        $data['slug'] = Str::slug($data['name']);
       try {
           $lesson = Lesson::find($id);
           $lesson->update($data);
           return true;
       } catch (\Exception $exception){
           return false;
       }
    }
}
