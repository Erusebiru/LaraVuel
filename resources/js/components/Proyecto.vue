<template>
    <div class="main">
        <br><br>
        <div class="proyecto">
            <h1>{{ proyecto.name }}</h1>
            <p>Descripción: {{ proyecto.description }}</p>
            <p>Scrum Master: {{ proyecto.s_m.name }}</p>
            <p>Product Owner: {{ proyecto.p_o.name }}</p>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted(){
            axios
                .get('/api/proyecto/'+this.$route.params.id)
                .then((res) => {
                    console.log(res.data);
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