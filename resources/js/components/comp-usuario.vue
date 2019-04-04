<template>
  <div>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-input label="nombre" placeholder="Ingresa el nombre" v-model="nombre_new"></el-input>
      </el-col>
      <el-col :span="12">
        <el-input label="Celular" placeholder="Ingresa tu numero de celular" v-model="documento_new"></el-input>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="5">
        <el-select v-model="tipo_docto_new" placeholder="Tipo de documento">
          <el-option
            v-for="item in options"
            :key="item.value"
            :label="item.label"
            :value="item.value">
          </el-option>
        </el-select>
      </el-col>
      <el-col :span="7">
        <el-input label="Celular" placeholder="Ingresa tu numero de celular" v-model="celular_new"></el-input>
      </el-col>
      <el-col :span="12">
        <el-input label="Email" type="email" placeholder="Ingresa el E-mail" v-model="email_new"></el-input>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-input label="Password" type="password" placeholder="Ingresa el password" v-model="password_new"></el-input>
      </el-col>
      <el-col :span="12">
        <el-input label="confPassword" type="password" placeholder="Confirmar password" v-model="password_conf_new"></el-input>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-upload
          class="upload-demo"
          action="https://jsonplaceholder.typicode.com/posts/"
          v-model="imagen_new"
          :on-preview="handlePreview"
          :on-remove="handleRemove"
          multiple
          :limit="1"
          :on-exceed="handleExceed"
          :file-list="fileList">
          <el-button size="small" type="primary">Clic para subir archivo</el-button>
          <!--<div slot="tip" class="el-upload__tip">Solo archivos jpg/png con un tamaño menor de 500kb</div>-->
        </el-upload>
      </el-col>
      <el-col :span="12">
        <el-select v-model="rol_new" placeholder="Tipo de Rol">
          <el-option
            v-for="item in rolesList"
            :key="item.f006_id"
            :label="item.f006_nombre"
            :value="item.f006_nombre">
          </el-option>
        </el-select>
      </el-col>
    </el-row>
    <br>
    <el-row>
      <br>
      <footer class="panel-footer">
        <el-button type="primary" @click="guardar">{{accion}}</el-button>
        <el-button type="danger" v-if="rol_id!=null" @click="cancelar">Cancelar</el-button>
      </footer>
    </el-row>
    <br>
  </div>
</template>
<script>
export default {
  data(){
    return{
      accion: "Guardar",
      nombre: null,
      nombre_new: '',
      celular_new: "",
      tipo_docto_new: "",
      password_new: "",
      password_conf_new: "",
      imagen_new: "",
      rol_new: "",
      options: [{
          value: 'CC',
          label: 'CC'
        }, {
          value: 'NIT',
          label: 'NIT'
        }, {
          value: 'TI',
          label: 'TI'
        }, {
          value: 'CE',
          label: 'CE'
        }],
      fileList: [],
      rolesList: []
    };
  },
  mounted() {
    console.log('Component mounted.');
    this.consultarRoles();
  },
  methods: {
    guardar() {
      let usuario = {
        f009_nombre: this.nombre_new,
        f009_documento: this.do,
        f009_tipo_documento: this.tipo_docto_new
      };
      if (this.rol_id != null) {
        console.log("Va a actualizar")
        this.actualizarRol(rol,this.rol_id)
      }else{
        console.warn("va a crear")
        this.guardarRol(rol);
      }
    },
    handleRemove(file, fileList) {
      console.log(file, fileList);
    },
    handlePreview(file) {
      console.log(file);
    },
    handleExceed(files, fileList) {
      this.$message.warning(`El límite es 1, haz seleccionado ${files.length} archivos esta vez, añade hasta ${files.length + fileList.length}`);
    },
    consultarRoles(){
      let data = {};
      axios
      .get("/roles", data)
      .then(res => {
        this.rolesList = res.data;
        console.log("llegaron los datos: ", res.data);
      })
      .catch(err => {
        console.error("Error al consultar la ruta");
        console.error(err);
      });
    }
  },
  watch:{
        calular(){
          alert ("Hola");
          let valorAnterior = value;
          if (!Number.isInteger(value)){
            this.celular = 855888;
          }
          this.celular = 855888;
        }
  },
}
</script>

<!--
<script>
export default {
  data() {
    return {
      nombre_new: "",
      documento_new: null,
      tipo_docto_new: "CC",
      celular_new: null,
      email_new: "",
      password_new: "",
      imagen_new: null,
      rol_new: null,
      fecha_creacion_new: null,
      fecha_actualizacion_new: null,

      nombre: "",
      descripcion: "",
      rolesTabla: [],
      descripcion_new: "",
      rol_id: null,
      accion: "Guardar",

      options: [{
          value: 'CC',
          label: 'CC'
        }, {
          value: 'NIT',
          label: 'NIT'
        }, {
          value: 'TI',
          label: 'TI'
        }, {
          value: 'CE',
          label: 'CE'
        }],
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
</script>-->
