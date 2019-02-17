<template>
    <div class="main">
        <br><br>
        <h1>PROYECTOS</h1>
        <div class="proyecto">
            <h2>the product id is: {{this.$route.params.id}}</h2>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted(){
            axios.get('/api/proyecto/'+this.$route.params.id)
                .then((res) => {
                    this.$set(this.$data, 'proyecto', res.data.proyecto)
                    console.log(res);
                })
        },
        data() {
            return {
                proyecto: []
            }
        }
    }
</script>