<template>
  <div class="playlist_item d-flex flex-column">
    <div @click="chapterClick" class="d-flex justify-content-between">
      <h6>Làm quen</h6>
      <i :class="classIcon" aria-hidden="true"></i>
    </div>
    <div v-if="state.isOpened" class="d-flex flex-column justify-content-between">
      <div class="list_lessons">
        <router-link :to="link"><p>Bài 1</p></router-link>
        <router-link :to="link"><p>Bài 2</p></router-link>
        <router-link :to="link"><p>Bài 3</p></router-link>
      </div>
    </div>
  </div>
</template>

<script>
import {reactive,computed,inject} from 'vue'
export default {
  setup(){
    const state = reactive({
      isOpened : false,
    })

    const classIcon = computed(() => {
      return {
        'fa fa-angle-down' : !state.isOpened,
        'fa fa-angle-up' : state.isOpened,
      }
    })

    const chapterClick = () => {
      state.isOpened = !state.isOpened;
    }

    const random = Math.random();

    const course = inject('course');
    const link = `/khoa-hoc/${course}/${random}`;

    return {state,classIcon,chapterClick,link}
  }

}
</script>

<style scoped>

.playlist_item{
  margin-top: 0;

}

.playlist_item > div:first-child {
  padding: 8px 16px;
  background-color: #f7f8fa;
  border: 1px solid #dedfe0;
  transition: all ease-in-out .3s;
}

.playlist_item > div:first-child:hover{
  background-color: #edeff1;
  cursor: pointer;
}

.playlist_item > div:last-child{
  height: 100% !important;
}

.list_lessons > *{
  margin-bottom: 0;
  height: 100%;
  display: block;
  background-color: antiquewhite;
}

.list_lessons > a{
  text-decoration: none;
  color: black;
}

.list_lessons > a:hover{
  background-color: aqua;
  cursor: pointer;
}

.list_lessons > a > p{
  padding-left: 16px;
  margin-bottom: 0;
}




</style>