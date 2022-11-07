<template>
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Student 2 </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">age</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(listTeacher, index) in listTeacher" :key="listTeacher.id">
                                <th scope="row">{{ index + 1 }}</th>
                                <td class="text-truncate" style="max-width: 100px;">{{ listTeacher.name }}</td>
                                <td class="text-truncate" style="max-width: 100px;">{{ listTeacher.email }}</td>
                                <td class="text-truncate" style="max-width: 100px;">{{ listTeacher.age }}</td>
                                <td class="d-flex">
                                    <button type="button" @click="editStudents(listTeacher.id)" class="btn btn-primary"
                                        data-toggle="modal" data-target="#exampleModalLong">
                                        Edit
                                    </button>
                                    <button type="button" @click="deleteStudents(listTeacher.id)"
                                        class="btn btn-danger">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <!-- pagination -->
                    <div>
                        <a-pagination @change="getListTeacher" show-size-changer :default-current="current"
                            :total="pagination.total" @showSizeChange="getListTeacher" />
                    </div>

                    <!-- pagination -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TeacherList',
    props: {
        listTeacher: {},
        getListTeacher: Function,
        pagination: {},
        pageSize: '',
        current: ''
    },
    data() {
        return {

        };
    },
    watch: {
        pageSize(val) {
            console.log('pageSize', val);
        },
        current(val) {
            console.log('current', val);
        },
    },
    mounted() {

    },

    methods: {

    },
};
</script>

<style lang="scss" scoped>

</style>