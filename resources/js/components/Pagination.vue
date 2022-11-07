<template>
    <div>
        <div class="content">
            <nav class="post-list-pagination">
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous" v-on:click.prevent="changePage(1)">
                            <span aria-hidden="true">&#10216;&#10216;</span>
                        </a>
                    </li>
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous" v-on:click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">&#10216;</span>
                        </a>
                    </li>
                    <li class="static pagination" v-for="page in pagesNumber" :key="page">
                        <a href="#" v-on:click.prevent="changePage(page)" class="check"
                            v-bind:class="pagination.current_page == page ? 'cursor' : 'cursor-disable'">
                            {{ page }}
                        </a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next" v-on:click.prevent="changePage(pagination.current_page + 1)">
                            <span aria-hidden="true">&#10217;</span>
                        </a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next" v-on:click.prevent="changePage(pagination.last_page)">
                            <span aria-hidden="true">&#10217;&#10217;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</template>

<script>

export default {
    name: "Pagination",

    data() {
        return {
            isActive: false,
            status: 'success'
        }
    },
    props: {
        pagination: {},
        offset: {
            type: Number,
            default: 4
        }
    },
    computed: {
        pagesNumber() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            for (from = 1; from <= to; from++) {
                pagesArray.push(from);
            }
            return pagesArray;

        },


    },
    methods: {
        changePage(page) {
            this.pagination.current_page = page;
        }

    },

}
</script>

<style lang="scss" scoped>
a.check.cursor {

    cursor: not-allowed;
    /*pointer-events: none;*/
    background-color: #1d68a7;
    color: white;
}

.pagination {
    display: flex;

}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
    border-radius: 5px;
}
</style>