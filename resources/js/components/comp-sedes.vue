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
        <el-button type="danger" v-if="sede_id!=null" @click="cancelar">Cancelar</el-button>
      </footer>
    </el-row>
    <br>
    <el-row>
      <el-input placeholder="Please input" v-model="nombre"></el-input>
    </el-row>
    <el-table :data="sedesTabla" style="width: 100%">
      <el-table-column prop="f004_nombre" label="Nombre" width="180"></el-table-column>
      <el-table-column prop="f004_descripcion" label="Descripcion" width="180"></el-table-column>
      <el-table-column label="opciones">
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
      sedesTabla: [],
      nombre_new: "",
      descripcion_new: "",
      sede_id: null,
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
      let sede = {
        f004_nombre: this.nombre_new,
        f004_descripcion: this.descripcion_new
      };
      if (this.rol_id != null) {
        console.log("Va a actualizar")
        this.actualizarRol(sede,this.sede_id)
      }else{
        console.warn("va a crear")
        this.guardarRol(sede);
      }
    },
    guardarRol(sede) {
      axios
        .post("/sedes", sede)
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
    actualizarRol(sede, sede_id) {
        axios
        .put("/sedes/"+sede_id, sede)
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
      this.sede_id = null;
      this.accion = "Guardar";
    },
    editarRol(sede) {
      this.nombre_new = sede.f004_nombre;
      this.descripcion_new = sede.f004_descripcion;
      this.sede_id = sede.f004_id;
      this.accion = "Actualizar";
    },
    borrarRol(sede) {
      axios
        .delete("/sedes/" + sede.f004_id)
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
    handleClick(sede) {
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
        .get("/sedes", data)
        .then(res => {
          this.sedesTabla = res.data;
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
