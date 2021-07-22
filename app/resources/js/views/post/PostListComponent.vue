<template>
    <div id="post-list">
        <div class="row pb-1">
            <div class="col h4">
                {{page.title}}
            </div>
            <div class="col text-right">
                <router-link
                    :to="page.action.buttonFavorite.href"
                    class="btn btn-success "
                >
                    {{page.action.buttonFavorite.title}}
                </router-link>

                <router-link
                    :to="page.action.buttonAll.href"
                    class="btn btn-success"
                >
                    {{page.action.buttonAll.title}}
                </router-link>
            </div>
        </div>

        <div class="row pb-3">
            <div class="col">
                <router-link v-for="itemCity in cities" class="btn btn-secondary mx-1" :to="'/?city_id=' + itemCity.id" >
                    {{itemCity.name}}
                </router-link>
            </div>
        </div>


        <div class="row row-cols-1 row-cols-md-3 g-4">
            <postcell v-for="item in data" :post="item" ></postcell>
        </div>
    </div>
</template>

<script>
import postcell from '../../components/PostCell';

export default {
    name: 'post-list',
    components: {
        postcell
    },
    data() {
        return {
            urlPath: '/api/v1/front/',
            page: {
                title: 'Новости',
                action: {
                    buttonFavorite: {
                        title: 'Избранные новости',
                        href: '/',
                    },
                    buttonAll: {
                        title: 'Все новости',
                        href: '/?all=1',
                    }
                }

            },
            data: [],
            cities: []
        }
    },
    mounted()
    {
        this.loadCities();
        this.loadData(this.setGetParam());

    },
    methods: {
        loadCities() {
            axios.get(this.urlPath + 'cities')
            .then(res => {
                this.cities = res.data;
            })
            .catch(errors => {

            })
        },
        loadData(params = '') {
            axios.get(this.urlPath + 'posts'+ params)
            .then(res => {
                this.data = res.data;
            })
            .catch(errors => {

            })
        },
        setGetParam() {
            var query = this.$route.query;
            var str = '';

            query = Object.entries(query);

            query.forEach(([key, value], i) => {
                if(i == 0)
                    str+='/?';
                else
                    str+='&';
                str+=key + '=' + value;
            });

            if(str.length == 0)
                return '/?favorite=1'
            return str;
        },

    },
    watch: {
        '$route.query': {
            immediate: true,
            handler() {
                this.loadData(this.setGetParam());
            },
        },
    },
}
</script>


