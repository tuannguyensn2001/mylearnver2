<template>
    <div>
        <Header/>
        <div class="main">
            <div class="d-flex">
                <div :class="classContent">
                    <Content :isLg="screen.lg" :isClose="screen.isClosePlaylist"/>
                </div>
                <div class=" col-lg-3">
                    <div class="playlists">
                        <Playlist/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from "./components/Header";
import Playlist from "./components/Playlist";
import Content from "./components/Content";
import {watch, provide, onMounted, reactive, computed} from 'vue';

export default {
    components: {
        Playlist,
        Header,
        Content
    },
    props: {
        lesson: {
            type: String,
        },
        course: {
            type: String,
        }
    },
    setup(props) {
        provide('course', props.course);
        provide('lesson',props.lesson);

        watch(props, (newValue) => {
            const {lesson} = newValue;
            console.log(lesson);
        })

        const screen = reactive({
            lg: true,
        })

        onMounted(() => {
            screen.lg = window.innerWidth >= 992;

            window.addEventListener('resize', event => {
                const width = event.target.innerWidth;
                screen.lg = width >= 992;
            })

        })

        const classContent = computed(() => {
            return {
                'col-12': true,
                'col-lg-9': true,
                'col-lg-12': !screen.lg,
            }
        })

        return {screen, classContent};
    }
}
</script>

<style scoped>
.main {
    padding-top: 44px;
}

.playlists {
}


</style>
