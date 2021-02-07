<template>
    <div class="overview">
      <p v-for="i in 20" :key="i">{{i}}</p>
    </div>
</template>

<script>
  export default {

  }
</script>

<style scoped>
  .overview{
    box-sizing: border-box;
    height: 100%;
  }
</style>