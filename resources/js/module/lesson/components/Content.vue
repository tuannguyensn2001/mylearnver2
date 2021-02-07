<template>

  <div class="content_lesson">
    <Video/>
    <div>
      <div class="tabs">
        <template v-for="(tab) in tabsRender" :key="tab.path">
          <router-link :to="tab.path">
            <div class="tab_item">
              {{ tab.title }}
            </div>
          </router-link>
        </template>


      </div>
    </div>

    <div>
      <div class="router-view">
        <router-view></router-view>
      </div>
    </div>

  </div>

</template>

<script>
import Video from "./Video";
import {reactive, computed, watch, onMounted} from "vue";

export default {
  components: {
    Video
  },
  props: {
    isLg: {
      type: Boolean
    }
  },
  setup(props) {
    const state = reactive({
      tabs:  [
        {
          title: 'Nội dung',
          path: {name: 'content'},
          isVisible: false,
        },
        {
          title: 'Tổng quan',
          path: {name: 'overview'},
          isVisible: true,
        },
        {
          title: 'Ghi chú',
          path: {name: 'note'},
          isVisible: true,
        },
        {
          title: 'Liên quan',
          path: {name: 'related'},
          isVisible: true,
        },
      ]
    })

    const tabsRender = computed(() => {
      return state.tabs.filter(tab => tab.isVisible);
    })

    const isLg = computed(() => props.isLg);

    watch(isLg,newValue => {
      state.tabs[0].isVisible = !newValue;
    })

    onMounted(() => {

    })

    return {tabsRender}
  }
}
</script>

<style scoped>

.content_lesson{
  box-sizing: border-box;
  overflow-x: hidden;
  overflow-y: auto;
  height: 100%;

}



.content_lesson > div:not(:first-child) {
  display: flex;
  justify-content: center;
}

.router-view{
  margin-top: 15px;
  width: 90%;
}

.tabs {
  height: 60px;
  width: 90%;
  display: flex;
  border-bottom: 1px solid gray;
}

.tabs > a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  display: flex;
  position: relative;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

a:not(:first-child) {
  margin-left: 15px;
}



.tabs:hover a {
  color: #000;
}

.tab_item_active {
  border-bottom: 4px solid black;
}


.tab_item > a {
  /*margin: 0 ;*/
  /*position: absolute;*/
  /*top: 50%;*/
  /*transform: translateY(-50%);*/
}
</style>

