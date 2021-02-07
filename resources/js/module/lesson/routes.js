import {createRouter,createWebHistory} from 'vue-router';
import Lesson from "./Lesson";
import Overview from "./components/Overview";
import Note from "./components/Note";
import Related from "./components/Related";
import Playlist from "./components/Playlist";



const routes = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/khoa-hoc/:course/:lesson',
            name: 'lesson',
            component: Lesson,
            props: true,
            children: [
                {
                    path: '',
                    component: Overview,
                    name: 'overview'
                },
                {
                    path: 'note',
                    component: Note,
                    name: 'note',
                },
                {
                    path: 'related',
                    component: Related,
                    name: 'related'
                },
                {
                    path: 'content',
                    component: Playlist,
                    props: {
                        isLg: false,

                    },
                    name: 'content',
                }
            ]
        }
    ]
})

export default routes;
