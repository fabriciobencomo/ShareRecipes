<template>
    <div>
        <span class="like-btn" @click="like" :class="{ 'like-active' : isActive}"></span>
        <p>{{Quantitylikes}} liked this recipe</p>
    </div>
</template>

<script>
    export default {
        props: ['recipeId', 'liked', 'likes'],
        data: function(){
            return{
                isActive: this.liked,
                totalLikes: this.likes
            }
        },
        methods: {
            like(){
                axios.post('/recipes/' + this.recipeId)
                    .then(request => {
                        if(request.data.attached > 0){
                            this.$data.totalLikes++
                        }else{
                            this.$data.totalLikes--
                        }

                        this.isActive = !this.isActive
                    }).catch(error => {
                        if(error.response.status === 401){
                            window.location = '/register'
                        }
                    })
            }
        },
        computed: {
            Quantitylikes: function(){
                return this.totalLikes
            }
        }
    }
</script>