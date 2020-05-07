<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Productos</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nombre</th>
                                            <td>{{ item.name }}</td>
                                            </tr>
                                        <tr>
                                            <th>Menudeo</th>
                                            <td>{{ item.retail }}</td>
                                            </tr>
                                        <tr>
                                            <th>Mayoreo</th>
                                            <td>{{ item.wholesale }}</td>
                                            </tr>
                                        <tr>
                                            <th>Imagen</th>
                                            <td v-html="item.image_link"></td>
                                            </tr>
                                        <tr>
                                            <th>Categoria</th>
                                            <td>
                                                <span class="label label-info" v-if="item.categorie !== null">
                                                    {{ item.categorie.image }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Link</th>
                                            <td>{{ item.link }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('ProductsSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('ProductsSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
