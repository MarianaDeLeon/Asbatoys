<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Productos</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Enter Nombre"
                                            :value="item.name"
                                            @input="updateName"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="retail">Menudeo</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="retail"
                                            placeholder="Enter Menudeo"
                                            :value="item.retail"
                                            @input="updateRetail"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="wholesale">Mayoreo</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="wholesale"
                                            placeholder="Enter Mayoreo"
                                            :value="item.wholesale"
                                            @input="updateWholesale"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="image">Imagen</label>
                                    <input
                                            type="file"
                                            class="form-control"
                                            @change="updateImage"
                                    >
                                    <ul v-if="item.image" class="list-unstyled">
                                        <li>
                                            {{ item.image.name || item.image.file_name }}
                                            <button class="btn btn-xs btn-danger"
                                                    type="button"
                                                    @click="removeImage"
                                            >
                                                Remove file
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label for="categorie">Categoria</label>
                                    <v-select
                                            name="categorie"
                                            label="image"
                                            @input="updateCategorie"
                                            :value="item.categorie"
                                            :options="categoriesAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="link"
                                            placeholder="Enter Link"
                                            :value="item.link"
                                            @input="updateLink"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
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
    computed: {
        ...mapGetters('ProductsSingle', ['item', 'loading', 'categoriesAll']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('ProductsSingle', ['fetchData', 'updateData', 'resetState', 'setName', 'setRetail', 'setWholesale', 'setImage', 'setCategorie', 'setLink']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateRetail(e) {
            this.setRetail(e.target.value)
        },
        updateWholesale(e) {
            this.setWholesale(e.target.value)
        },
        removeImage(e, id) {
            this.$swal({
                title: 'Are you sure?',
                text: "To fully delete the file submit the form.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#dd4b39',
                focusCancel: true,
                reverseButtons: true
            }).then(result => {
                if (typeof result.dismiss === "undefined") {
                    this.setImage('');
                }
            })
        },
        updateImage(e) {
            this.setImage(e.target.files[0]);
            this.$forceUpdate();
        },
        updateCategorie(value) {
            this.setCategorie(value)
        },
        updateLink(e) {
            this.setLink(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'products.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
