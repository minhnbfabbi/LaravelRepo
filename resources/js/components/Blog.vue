<template>
    <div class="container blog">
        <div class="slider jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 col-lg-6 px-0">
                <h2 class="slider__title font-italic">Title of a longer featured blog post</h2>
                <p class="slider__description">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
                <a href="#" class="slider__link">Continue Reading</a>
            </div>
        </div>
        <div class="row post">
            <div class="col-md-6 col-lg-6 post__item">
                <div class="card">
                    <div class="card-body">
                        <div class="post__header-category">World</div>
                        <h3 class="post__title"><a href="#">Featured post</a></h3>
                        <p>Nov 12</p>
                        <p class="post__excerpt">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Continue reading</a>
                    </div>
                    <img src="/img/post-thumbnail.svg">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 post__item">
                <div class="card">
                    <div class="card-body">
                        <div class="post__header-category">World</div>
                        <h3 class="post__title"><a href="#">Featured post</a></h3>
                        <p>Nov 12</p>
                        <p class="post__excerpt">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Continue reading</a>
                    </div>
                    <img src="/img/post-thumbnail.svg">
                </div>
            </div>
        </div>
    </div>
</template>
<style type="text/css">
    .post__item .card {
        flex-direction: row;
    }
</style>
<script>
    export default {
        mounted() {

        },
        data: function () {
            return {

            }
        },
        methods: {
            
        }
    }
</script>
