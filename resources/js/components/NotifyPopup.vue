<template>
    <div class="notification-popup">
        <h4>Title</h4>
        <p>Content</p>
        <a href="#">Link</a>
        <button type="button" class="close" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</template>
<style type="text/css">
    .notification-popup {
        position: fixed;
        bottom: 10px;
        right: 10px;
        width: 200px;
        border-radius: 5px;
        border: 1px solid #12312361;
        padding: 15px;
        background-color: aliceblue;
        color: cornflowerblue;
        transition-timing-function: ease-in;
        transition: 0.4s;
        transform: translateY(130%);
    }
    .notification-popup .close {
        position: absolute;
        top: 0px;
        right: 10px;
        font-size: 25px;
        cursor: pointer;
        outline: none;
    }
    .notification-popup.show {
        transition-timing-function: ease-out;
        transition: 0.5s;
        transform: translateY(0);
    }
</style>
<script>
    export default {
        mounted() {

        },
        data: function() {
            return {

            }
        },
        methods: {
            
        },
        computed: {

        },
        watch: {
          
        }
    }
</script>
