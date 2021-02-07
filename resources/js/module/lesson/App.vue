<template>
    <div>
        <router-view></router-view>
    </div>
</template>

<script>
import {provide,getCurrentInstance} from 'vue';
export default {
    setup(){
        provide('emitter',getCurrentInstance().appContext.config.globalProperties.emitter);
    }
}
</script>

