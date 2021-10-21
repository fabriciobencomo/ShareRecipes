<template>
    <input type="submit" class="btn btn-danger w-100 mb-2" value="Delete" v-on:click="deleteRecipe">
</template>

<script>
    export default {
        props: ['recipeId'],
        methods:{
            deleteRecipe(){
                this.$swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        const params = {
                            id: this.recipeId
                        }
                        axios.post(`recipes/${this.recipeId}`, {params, _method: 'delete'})
                            .then( request => {
                                this.$swal({
                                    title: 'Deleted!',
                                    text: 'Your recipe has been deleted.',
                                    icon: 'success'
                                })

                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch( error => {
                                console.log(error);
                            })

                    }
                })
            }
        },
    }
</script>
