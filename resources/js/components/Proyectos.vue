<template>
    <div class="main">
        <br><br>
        <h1>PROYECTOS</h1>
        <div class="proyectos">
            <div class="proyecto active" v-for="proyecto in proyectos" :key="proyecto.id" @click="goTodetail(proyecto.id)">
                <!--<router-link :to="`/proyecto/${proyecto.id}`" class="dropdown-item">-->
                    <h3> {{ proyecto.name }} </h3>
                    <br>
                    <p> {{ proyecto.description }} </p>
                    <p> {{ proyecto.p_o.name }} </p>
                    <p> {{ proyecto.s_m.name }} </p>
                <!--</router-link>-->
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    export default {
        mounted(){
            axios
                .get('/api/proyectos')
                .then((res) => {
                    console.log(res.data);
                    this.$set(this.$data, 'proyectos', res.data.proyectos)
                })
        },
        data() {
            return {
                proyectos: []
            }
        },
        methods: {
            goTodetail(proId){
                this.$router.push({name:'Proyecto',params:{id:proId}})
            }
        }
    }
</script>

<style>
    a {
        color: "black"; /* blue colors for links too */
        text-decoration: inherit; /* no underline */
    }

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
        color: black;
    }
    .active{
        cursor: pointer;
    }
</style>
