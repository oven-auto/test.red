<template>
    <span  @click="pushFavorite(id)" :class="['favorite-icon', status ? 'favorite-set' : 'favorite-def']">
        &#9829
    </span>
</template>

<script>
export default {
    name: 'favorite',
    data() {
        return {
            urlPath: '/api/v1/front/',
        }
    },
    props: {
        status: {
            type: Boolean,
            default: false
        },
        id: {
            type: Number,
            default: 0
        }
    },
    methods: {
        pushFavorite(id) {
            axios.patch(this.urlPath + 'post/favorite/' + id)
            .then(res => {
                this.status = res.data.status
            })
            .catch(errors => {

            })
        }
    }
}
//:class="['favorite-icon', (item.favorite) ? 'favorite-set' : 'favorite-def']"
</script>

<style scoped>
    .favorite-icon{
        width: 30px;
        height: 30px;
        font-size: 30px;
        border-radius: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 15px;
    }
    .favorite-set{
        background: red;
        color: #fff;
    }
    .favorite-def{
        background: #ccc;
        color: #fff;
    }
</style>
