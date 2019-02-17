<template>
    <div class="main">
        <br><br>
        <h1>PROYECTOS</h1>
        <div class="proyecto">
            <h3> {{ proyecto.name }} </h3>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted(){
            axios.get('/api/proyecto')
                .then((res) => {
                    this.$set(this.$data, 'proyecto', res.data.proyecto)
                })
        },
        data() {
            return {
                proyecto: []
            }
        }
    }
</script>