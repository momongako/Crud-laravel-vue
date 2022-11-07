<template>
    <div class="">
        <h1>Hello</h1>

        <div class="d-flex">
            <router-link class="nav-link" :to="{ name: 'ex' }">
                User
            </router-link>
            <router-link class="nav-link" :to="{ name: 'create' }">
                create
            </router-link>
            <router-link class="nav-link" :to="{ name: 'test' }">
                Table Teacher
            </router-link>
        </div>
        <router-view :listTeacher="listTeacher" :getListTeacher="getListTeacher" :pagination="pagination"
            :pageSize="pageSize" :current="current">
        </router-view>
    </div>
</template>

<script>
export default {
    name: 'App',

    data() {
        return {
            test: 'ok',
            pagination: {
            },
            listTeacher: {},
            pageSize: 10,
            current: 1,

        };
    },

    mounted() {
        this.getListTeacher()
    },

    methods: {
        // list teacher
        getListTeacher(page, pageSize = 10) {
            axios.get('all_teacher?page=' + page + "&page_size=" + pageSize)
                .then(response => {
                    this.listTeacher = response.data.data;
                    this.pagination = response.data
                    console.log('teacher data : ', response.data.data)
                })
        }
    },
};
</script>

<style lang="scss" scoped>

</style>