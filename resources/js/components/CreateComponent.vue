<template>

    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Create Student</div>

                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" v-model="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" v-model="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" v-model="phone" class="form-control" id="phone"
                                aria-describedby="emailHelp">
                        </div>
                        <button type="submit" @click.prevent="saveStudent" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">List Student</div>

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
                            <tr v-for="(student, index) in students.data" :key="student.id">
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
                    <pagination :data="students" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" v-model="editname" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" v-model="editemail" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" v-model="editphone" class="form-control" id="phone"
                                    aria-describedby="emailHelp">
                            </div>
                            <!-- <button type="submit" @click.prevent="saveStudent" class="btn btn-primary">Submit</button> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click.prevent="updateStudent" data-dismiss="modal"
                            class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import axios from 'axios';




export default {



    data() {
        return {
            students: {},
            id: '',
            name: '',
            email: '',
            phone: '',
            editname: '',
            editemail: '',
            editphone: ''
        };
    },

    mounted() {
        this.getResults();
    },

    methods: {
        saveStudent() {
            console.log('ok');
            axios.post('save_student', {
                name: this.name,
                email: this.email,
                phone: this.phone
            })
                .then(response => {
                    this.name = '',
                        this.email = '',
                        this.phone = ''
                    this.getResults();
                });
        },

        getResults(page = 1) {
            axios.get('all_students?page=' + page)
                .then(response => {
                    console.log(response.data);
                    this.students = response.data;
                });
        },
        editStudents(id) {
            console.log('>>> check edit:', id)
            axios.get('edit_student/' + id).
                then(response => {
                    this.id = response.data.id;
                    this.editname = response.data.name;
                    this.editemail = response.data.email;
                    this.editphone = response.data.phone;
                });
        },
        updateStudent() {
            console.log('ok update', this.id)
            axios.put('update_student', {
                id: this.id,
                name: this.editname,
                email: this.editemail,
                phone: this.editphone

            }).
                then(response => {
                    this.getResults();
                });
        },
        deleteStudents(id) {
            console.log('delete :', id)
            axios.delete('delete_student/' + id)
                .then(response => {
                    this.getResults();
                })
        }
    },
};
</script>

<style lang="scss" scoped>

</style>