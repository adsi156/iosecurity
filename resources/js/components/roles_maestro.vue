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
      <br>
      <footer class="panel-footer">
        <el-button type="primary" @click="guardar">{{accion}}</el-button>
        <el-button type="danger" v-if="rol_id!=null" @click="cancelar">Cancelar</el-button>
      </footer>
    </el-row>
    <br>
    <el-row>
      <el-input placeholder="Please input" v-model="nombre"></el-input>
    </el-row>
    <el-table :data="rolesTabla" style="width: 100%">
      <el-table-column prop="f006_nombre" label="Nombre" width="180" align="center"></el-table-column>
      <el-table-column prop="f006_descripcion" label="Descripcion" width="200" align="center"></el-table-column>
      <el-table-column label="Opciones" align="left">
        <template slot-scope="scope">
          <el-button @click="editarRol(scope.row)" type="text" size="small">Editar</el-button>
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
      descripcion_new: "",
      rol_id: null,
      accion: "Guardar"
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
        f006_nombre: this.nombre_new,
        f006_descripcion: this.descripcion_new
      };
      if (this.rol_id != null) {
        console.log("Va a actualizar")
        this.actualizarRol(rol,this.rol_id)
      }else{
        console.warn("va a crear")
        this.guardarRol(rol);
      }
    },
    guardarRol(rol) {
      axios
        .post("/roles", rol)
        .then(res => {
          let msg = "Guardo satisfactoriamente";
          console.log(msg);
          this.$message({
            message: msg,
            type: "success"
          });
          this.consultarRoles();
        })
        .catch(err => {
          let msg = "ocurrio un error al guardar";
          console.error(msg);
          console.error(err);

          this.$message({
            message: msg,
            type: "danger"
          });
          this.nombre_new = "";
          this.descripcion_new = "";
        });
    },
    actualizarRol(rol, rol_id) {
        axios
        .put("/roles/"+rol_id, rol)
        .then(res => {
          let msg = "Actualizó satisfactoriamente";
          console.log(msg);
          this.$message({
            message: msg,
            type: "success"
          });
          this.consultarRoles();
          this.cancelar();
        })
        .catch(err => {
          let msg = "ocurrio un error al Actualizar";
          console.error(msg);
          console.error(err);

          this.$message({
            message: msg,
            type: "danger"
          });
          this.nombre_new = "";
          this.descripcion_new = "";
        });
    },
    cancelar() {
      this.nombre_new = "";
      this.descripcion_new = "";
      this.rol_id = null;
      this.accion = "Guardar";
    },
    editarRol(rol) {
      this.nombre_new = rol.f006_nombre;
      this.descripcion_new = rol.f006_descripcion;
      this.rol_id = rol.f006_id;
      this.accion = "Actualizar";
    },
    borrarRol(rol) {
      axios
        .delete("/roles/" + rol.f006_id)
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
