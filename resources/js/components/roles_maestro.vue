<template>
    <div class="container">
       <el-row>
            <el-input placeholder="Please input" v-model="nombre"></el-input>
       </el-row>
       <el-table
      :data="rolesTabla"
      style="width: 100%">
      <el-table-column
        prop="f007_nombre"
        label="Nombre"
        width="180">
      </el-table-column>
      <el-table-column
        prop="f007_descripcion"
        label="Descripcion"
        width="180">
      </el-table-column>
      <el-table-column label="opciones">
            <template slot-scope="scope">
        <el-button @click="handleClick(scope)" type="text" size="small">{{scope.row.f007_nombre}}</el-button>
        <el-button @click="borrarRol(scope.row)" type="text" size="small">Borrar</el-button>
      </template>
      </el-table-column>
    </el-table>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                nombre:'',
                rolesTabla:[],
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.consultarRoles();
        },
        watch:{
            nombre(){
                this.consultarRoles();
            }
        },
        methods:{
            guardar(){

            },
            borrarRol(rol){
                axios.delete('/roles/'+rol.f007_id).then(res=>{
                    let mensaje = res.data.msg;
                    console.log("borrarRol: ",mensaje);
                    this.$message({
                    message: mensaje,
                    type: 'success'
                    });
                    this.consultarRoles();

                }).catch(error=>{
                    console.error(error.data.msg)
                })
            },
            handleClick(rol){
                console.log("se dio clic en el rol:",rol);
            },
            consultarRoles(){
                let buscar= this.nombre;
                let data = 
                {
                    params:{
                    search:buscar
                    }
                }
                axios.get('/roles',data).then(res=>{
                    this.rolesTabla = res.data;
                    console.log("llegaron los datos: ",res.data)
                }).catch(err=>{
                    console.error("Error al consultar la ruta")
                    console.error(err)
                })
            }
        }
    }
</script>
