<template>
  <div>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-input label="nombre" placeholder="Ingresa el nombre" v-model="nombre_new"></el-input>
      </el-col>
      <el-col :span="12">
        <el-input
          label="descripcion"
          placeholder="Ingresa la descripcion"
          v-model="descripcion_new"
        ></el-input>
      </el-col>

    </el-row>
    <el-row>
        <el-button type="primary" @click="guardar">Guardar</el-button>
    </el-row>
    <br>
    <el-row>
      <el-input placeholder="Please input" v-model="nombre"></el-input>
    </el-row>
    <el-table :data="rolesTabla" style="width: 100%">
      <el-table-column prop="f007_nombre" label="Nombre" width="180"></el-table-column>
      <el-table-column prop="f007_descripcion" label="Descripcion" width="180"></el-table-column>
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
  data() {
    return {
      nombre: "",
      descripcion: "",
      rolesTabla: [],
      nombre_new: "",
      descripcion_new: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
    this.consultarRoles();
  },
  watch: {
    nombre() {
      this.consultarRoles();
    }
  },
  methods: {
    guardar() {
        let rol = {
            f007_nombre: this.nombre_new,
            f007_descripcion: this.descripcion_new
        }
        axios.post('/roles',rol).then(res=>{
            let msg = "Guardo satisfactoriamente"
            console.log(msg);
            this.$message({
                message:msg,
                type:"success"
            })
            this.consultarRoles();
        }).catch(err=>{
            let msg = "ocurrio un error al guardar"
            console.error(msg)
            console.error(err)

            this.$message({
                message:msg,
                type:"danger"
            })
            this.nombre_new = ""
            this.descripcion_new="";
        })
    },
    borrarRol(rol) {
      axios
        .delete("/roles/" + rol.f007_id)
        .then(res => {
          let mensaje = res.data.msg;
          console.log("borrarRol: ", mensaje);
          this.$message({
            message: mensaje,
            type: "success"
          });
          this.consultarRoles();
        })
        .catch(error => {
          console.error(error.data.msg);
        });
    },
    handleClick(rol) {
      console.log("se dio clic en el rol:", rol);
    },
    consultarRoles() {
      let buscar = this.nombre;
      let data = {
        params: {
          search: buscar
        }
      };
      axios
        .get("/roles", data)
        .then(res => {
          this.rolesTabla = res.data;
          console.log("llegaron los datos: ", res.data);
        })
        .catch(err => {
          console.error("Error al consultar la ruta");
          console.error(err);
        });
    }
  }
};
</script>
