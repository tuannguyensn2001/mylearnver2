<template>
  <div :class="classPlaylist">
    <header ref="header">
      <div class="d-flex justify-content-between">
        <p>Lập trình Javascript cơ bản </p>
        <i @click="close" :class="classIcon"></i>
      </div>
    </header>
    <section>

      <div ref="playlist">
        <PlaylistItem v-for="i in 20" :key="i"/>
        <div></div>
      </div>

    </section>
  </div>
</template>

<script>
import PlaylistItem from "./PlaylistItem";
import {ref, computed} from 'vue';

export default {
  components: {
    PlaylistItem,
  },
  props: {
    isLg: {
      type: Boolean,
      default: true,
    },
    isClosePlaylist: {
      type: Boolean,
      default: false,
    }
  },
  setup(props) {
    const playlist = ref(null);
    const header = ref(null);

    const classPlaylist = computed(() => {
      return {
        'playlist' : true,
        'playlist_lg': props.isLg,
        'playlist_not_lg': !props.isLg,
      }
    })

    const classIcon = computed(() => {
      return {
        'fas fa-angle-double-left fa-1x': false,
        'right-playlist': true,
      }
    })

    return {playlist, header,classPlaylist,classIcon}
  }
}
</script>

<style scoped>


.playlist{
  box-sizing: border-box;
}

.playlist_lg{
  overflow-x: hidden;
  overflow-y: auto;
  height: 100%;
  position: fixed;
  width: 25%;

}



section > div {
  box-sizing: border-box;

}

header > div:first-child {
  padding: 12px 16px;
  background-color: #fff;
}

.right-playlist {
  margin-top: 2px;
}

.right-playlist:hover {
  cursor: pointer;
}
</style>
