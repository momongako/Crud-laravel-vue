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
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(student, index) in data" :key="student.id">
                                <th scope="row">{{ index + 1 }}</th>
                                <td class="text-truncate" style="max-width: 100px;">{{ student.name }}</td>
                                <td class="text-truncate" style="max-width: 100px;">{{ student.email }}</td>
                                <td class="text-truncate" style="max-width: 100px;">{{ student.phone }}</td>
                                <td class="d-flex">
                                    <button type="button" @click="editStudents(student.id)" class="btn btn-primary"
                                        data-toggle="modal" data-target="#exampleModalLong">
                                        Edit
                                    </button>
                                    <button type="button" @click="deleteStudents(student.id)" class="btn btn-danger">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- pagination -->
                    <div>
                        <a-pagination @change="getResults" show-size-changer :default-current="current"
                            :total="pagination.total" @showSizeChange="getResults" />
                    </div>
                    <!-- pagination -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

    data() {
        return {
            data: {},
            pageSize: 10,
            current: 1,
            pagination: {
            },

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
    created() {
        this.getResults();

    },
    methods: {
        onShowSizeChange(current, pageSize) {
            console.log(current, pageSize);

        },
        getResults(page, pageSize = 10) {
            console.log('page : ', page)
            axios.get('all_students_library?page=' + page + "&page_size=" + pageSize)
                .then(response => {
                    this.data = response.data.data;
                    this.pagination = response.data;
                    console.log(response.data.data)
                });

        },
    },
};
</script>