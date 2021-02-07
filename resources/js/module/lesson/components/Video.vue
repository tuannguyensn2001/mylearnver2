<template>
  <div class="video ">
    <div class="video_frame">
      <vue-plyr >
        <div class="plyr__video-embed">
          <iframe
              src="https://www.youtube.com/embed/bTqVqk7FSmY"
              allowfullscreen
              allowtransparency
              allow="autoplay"
          ></iframe>
        </div>
      </vue-plyr>
    </div>
  </div>
</template>

<script>
export default {
  setup(){



  }
}
</script>



<style scoped>
.video{
  display: flex;
  justify-content: center;
  height: 450px;
  width: 100%;
  background-color: black;
}

.video_frame{
  width: 90%;
  height: 100%;
  background-color: red;
}
</style>