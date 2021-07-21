<template>
    <div id="post-list">
        <div class="row pb-3">
            <div class="col h4">
                {{page.title}}
            </div>
            <div class="col text-right">
                <button :to="page.action.button.href" type="button" class="btn btn-success ">{{page.action.button.title}}</button>
            </div>
        </div>


        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" v-for="item in data">
                <div class="card h-100">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <small class="text-muted">
                            {{ (item.city.name) ? item.city.name : 'Общие' }}
                        </small>
                        <h5 class="card-title">
                            {{item.title}}
                        </h5>
                        <p class="card-text">{{item.annotation}}</p>

                        <a class="btn btn-warning btn-block">Открыть</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{item.created_at ? item.created_at : 'Не знаю дату'}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'post-list',
    data() {
        return {
            urlPath: '/api/v1/front/',
            page: {
                title: 'Список новостей',
                action: {
                    button: {
                        title: 'Избранное',
                        href: '/'
                    }
                }

            },
            data: [],
        }
    },
    mounted()
    {
        this.loadData();
    },
    methods: {
        loadData() {
            axios.get(this.urlPath + 'posts')
            .then(res => {
                this.data = res.data;
            })
            .catch(errors => {

            })
        },
        setParam(method = '') {
            var formData = new FormData();

            return formData;
        },
    }
}
</script>
