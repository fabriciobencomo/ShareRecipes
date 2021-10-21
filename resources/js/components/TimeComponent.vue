<template>
    <span>{{ResetData}}</span>
</template>

<script>
    export default {
        props: ['time'],
        computed:{
            ResetData(){
                return moment(this.time).format('MM/DD/YYYY');
            }
        }
    }
</script>
