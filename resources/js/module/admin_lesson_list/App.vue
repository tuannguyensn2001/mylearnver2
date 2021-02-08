<template>
    <div>
        <div>
            <label for="course">Khóa học</label>
            <select id="course" class="custom-select" v-model="state.course">
                <option selected value="-1">Chọn khóa học</option>
                <option
                    v-for="course in state.courses"
                    :key="course.id"
                    :value="course.id">
                    {{ course.name }}
                </option>
            </select>
        </div>

        <div class="chapter">
            <div :class="{'hide': !state.flag}">
                <Chapter v-for="(chapter,order) in state.chapters"
                         :order="order+1"
                         :name="chapter.name"
                         :lessons="chapter.lessons"
                         :key="chapter.id"/>
            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import {computed, reactive, watch} from 'vue';
import Chapter from "./components/Chapter";

export default {
    components: {Chapter},
    setup() {
        const state = reactive({
            courses: [],
            course: -1,
            chapters: [],
            flag: true,
        })

        const fetchCourse = async () => {
            const response = await axios.get('api/v1/courses');
            try {
                state.courses = response?.data?.data;
            } catch (e) {
                state.courses = [];
            }
        }

        const fetchLesson = async (id) => {
            state.flag = false;
            const response = await axios.get(`/api/v1/course/show/${id}/lesson`);
            try {
                state.chapters = response?.data?.data;
                let count = 0;
                state.chapters = state.chapters.map(chapter => {
                    return {
                        ...chapter,
                        lessons: chapter?.lessons.map(lesson => {
                            return {
                                ...lesson,
                                order: ++count,
                            }
                        })
                    }
                });
            } catch (e) {
                state.chapters = [];
            }

            console.log(response);

            state.flag = true;
        }

        const course = computed(() => state.course);

        watch(course,newValue => {
            if (newValue !== '-1'){
                fetchLesson(newValue);
            } else {
                state.chapters = [];
            }
        })


        fetchCourse();


        return {state};
    }
}
</script>

<style scoped>
    .chapter{
        margin-top: 40px;
    }

    .hide{
        display: none;
    }

</style>
