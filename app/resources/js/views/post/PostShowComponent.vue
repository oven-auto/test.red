<template>
    <div class="post-show">
        <div class="row text-muted">
            <div class="col">
                {{ post.city }}
            </div>

            <div class="col text-right ">
                Дата создания: {{ post.pub_date }}
            </div>
        </div>

        <div class="row pb-3">
            <div class="col">
                <span v-for="itemTag in post.tags" class="badge badge-secondary mx-1">
                    {{itemTag.name}}
                </span>
            </div>
        </div>

        <div class="row">
            <div class="col h3">
                {{ post.title }}
            </div>
        </div>

        <div class="row pb-3">
            <div v-if="post.picture.length">
                <img :src="post.picture">
            </div>
            <div class="col-12">
                {{post.body}}
            </div>
        </div>

        <div class="row">
            <div class="col text-right">
                <a class="btn btn-danger" @click="$router.go(-1)">Назад</a>
            </div>
        </div>

        <div class="row">
            <div class="col h3">
                Похожие новости
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <postcell v-for="item in similars" :post="item" ></postcell>
        </div>
    </div>
</template>

<script>
import postcell from '../../components/PostCell';

export default {
    name: 'post-show',
    components: {
        postcell
    },
    data() {
        return {
            post: {
                title: '',
                slug: '',
                body: '',
                picture: '',
                city: '',
                pub_date: '',
                tags: []
            },
            slug: this.$route.params.slug,
            similars: []
        }
    },
    mounted() {
        this.loadData(this.slug)

        this.loadSimilar(this.slug)
    },
    methods: {
        loadData(slug) {
            axios.get('/api/v1/front/post/show/' + slug )
            .then(res => {
                this.post.title = res.data.title
                this.post.slug = res.data.slug
                this.post.body = res.data.body
                this.post.picture = res.data.picture
                this.post.city = res.data.city.name
                this.post.pub_date = res.data.created_at
                this.post.tags = res.data.tags
            })
            .catch(errors => {

            })
        },
        loadSimilar(slug)
        {
            axios.get('/api/v1/front/post/similar/' + slug )
            .then(res => {
                this.similars = res.data.similars
            })
            .catch(errors => {

            })
        }
    },
    watch: {
        '$route.params': {
            immediate: true,
            handler() {
                this.slug = this.$route.params.slug

                this.loadData(this.slug)

                this.loadSimilar(this.slug)
            },
        },
    },
}
</script>
