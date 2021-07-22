<template>
<div class="col mb-4">
    <div class="card h-100">
        <favorite :id="post.id" :status="(post.favorite) ? true : false"></favorite>
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
            <small class="text-muted">
                {{ (post.city.name) ? post.city.name : 'Общие' }}
            </small>
            <h5 class="card-title">
                {{post.title}}
            </h5>
            <p class="card-text">{{post.annotation}}</p>

            <p>
                <span v-for="itemTag in post.tags" class="badge-secondary badge mr-1">
                    {{itemTag.name}}
                </span>
            </p>
            <router-link class="btn btn-warning btn-block" :to="'/post/'+post.slug">Открыть</router-link>
        </div>
        <div class="card-footer">
            <small class="text-muted">{{post.created_at ? post.created_at : 'Не знаю дату'}}</small>
        </div>
    </div>
</div>
</template>

<script>
import favorite from './Favorite';

export default {
    name: 'post-cell',
    components: {
        favorite
    },
    props: {
        post: {
            type: Object,
            default: null
        }
    }
}
</script>
