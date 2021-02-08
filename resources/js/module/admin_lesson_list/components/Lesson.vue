<template>
    <div class="lesson_item">
        <a :href="href" class="content">
            {{ order }}. {{ name }}
        </a>
    </div>
</template>

<script>

    import {computed} from "vue";

    export default {
        props: {
            id: {
                type: Number,
            },
            order: {
                type: Number,
            },
            name: {
                type: String,
            }
        },
        setup(props){
          const href = computed(() => {
              return `/admin/lesson/${props.id}/show`
          });

          return {href};
        },
    }
</script>

<style scoped>
    .lesson_item{
        display: flex;
        height: 38px;
        align-items:center;
        flex-direction: row;
        background: #efeded;
        border-bottom: 1px solid blue;
        justify-content: space-between;
        line-height: 1.4rem;
    }

    .content{
        margin-left: 54px;
    }

    a{
        text-decoration: none;
        list-style: none;
        color: #0b0b0b;
    }
</style>
