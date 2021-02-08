<template>
    <section>
        <div @click="click" class="chapter">
            <div class="plus">
                <i :class="{'cil-plus': !state.isOpened,'cil-minus': state.isOpened,}"></i>
            </div>
            <div class="content">
                Chương {{ order }} : {{ name }}
            </div>
        </div>

        <div :class="{'lesson': true, show: state.isOpened}">
            <Lesson
                v-for="lesson in lessons"
                :order="lesson.order"
                :key="lesson.id"
                :id="lesson.id"
                :name="lesson.name"
            />
        </div>
    </section>
</template>

<script>
import {reactive} from 'vue'
import Lesson from "./Lesson";

export default {
    components: {Lesson},
    props: {
        order: {
            type: Number
        },
        name: {
            type: String,
        },
        lessons: {
            type: Array,
        }
    },
    setup() {
        const state = reactive({
            isOpened: false,
        })

        const click = () => state.isOpened = !state.isOpened;

        return {state, click};
    }
}
</script>

<style scoped>

section {
    margin-top: 10px;
}


.chapter {
    display: flex;
    border: 1px solid rgba(240, 81, 35, .15);
    background: #3965e9;
    color: white;
    height: 38px;
    align-items: center;
}

.chapter:hover {
    cursor: pointer;
}

.chapter > div {

}

.plus {
    padding-top: 4px;
    padding-left: 20px;
}

.content {
    padding-left: 15px;
}

.lesson {
    display: none;
}

.show {
    display: block;
}

</style>
