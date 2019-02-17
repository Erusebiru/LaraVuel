<template>
    <div class="main">
        <h1>PROYECTOS</h1>
        <div class="proyectos">
            <div class="proyecto" v-for="proyecto in proyectos" :key="proyecto.id" @click="showSingleProyect(proyecto)">
                <h3> {{ proyecto.name }} </h3>
                <br>
                <p> {{ proyecto.description }} </p>
                <p> {{ proyecto.p_o.name }} </p>
                <p> {{ proyecto.s_m.name }} </p>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        mounted(){
            axios.get('/api/proyectos')
                .then((res) => {
                    this.$set(this.$data, 'proyectos', res.data.proyectos)
                })
        },
        data() {
            return {
                proyectos: []
            }
        },
        methods: {
            showSingleProyect: function(item) {
                console.log(item.id);
                axios.post('proyectos/show/'+item.id);
            }
        }
    }
</script>

<style>
    .main{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        flex-direction: column;
    }

    .main > h1{
        padding: 50px;
        text-align: left;
    }

    .proyectos{
        width: 70%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        flex-direction: row;
    }

    .proyecto{
        
        min-height: 150px;
        min-width: 300px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 20px;
        border-radius: 4px;
        box-shadow: 0 0 20px rgba(0,0,0,1);
        cursor: pointer;
    }
</style>
