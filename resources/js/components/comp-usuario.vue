<template>
  <div>
    <el-form :model="ruleUserForm" :rules="rules" ref="userForm"  class="demo-ruleForm">
    <el-row :gutter="20">
      <el-col :span="12">
         <el-form-item label="" prop="nombre">
            <el-input label="nombre" placeholder="Ingresa el nombre" v-model="ruleUserForm.nombre"></el-input>
         </el-form-item>
      </el-col>
      <el-col :span="12">
         <el-form-item label="" prop="celular">
        <el-input label="Celular" placeholder="Ingresa tu numero de celular" v-model="ruleUserForm.celular"></el-input>
         </el-form-item>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="6">
        <el-form-item label="" prop="tipo_docto">
        <el-select v-model="ruleUserForm.tipo_docto" placeholder="Tipo de documento">
          <el-option
            v-for="item in options"
            :key="item.value"
            :label="item.label"
            :value="item.value">
          </el-option>
        </el-select>
        </el-form-item>
      </el-col>
      <el-col :span="6">
        <el-form-item label="" prop="documento">
        <el-input label="Documento" placeholder="Ingresa tu numero de documento" v-model="ruleUserForm.documento"></el-input>
        </el-form-item>
      </el-col>
      <el-col :span="12">
        <el-form-item label="" prop="email">
        <el-input label="Email" type="email" placeholder="Ingresa el E-mail" v-model="ruleUserForm.email"></el-input>
        </el-form-item>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-form-item label="" prop="password">
        <el-input label="Password" type="password" placeholder="Ingresa el password" v-model="ruleUserForm.password"></el-input>
        </el-form-item>
      </el-col>
      <el-col :span="12">
        <el-form-item label="" prop="password_confirmation">
        <el-input label="confirmar password" type="password" placeholder="Confirmar password" v-model="ruleUserForm.password_confirmation"></el-input>
        </el-form-item>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="12">
        <input type="file" :v-model="ruleUserForm.foto" >
      </el-col>
      <el-col :span="12">
        <el-form-item label="" prop="rol">
        <el-select v-model="ruleUserForm.rol" placeholder="Tipo de Rol">
          <el-option
            v-for="item in rolesList"
            :key="item.f006_id"
            :label="item.f006_nombre"
            :value="item.f006_nombre">
          </el-option>
        </el-select>
        </el-form-item>
      </el-col>
    </el-row>
    </el-form>
    <br>
    <el-row>
      <br>
      <footer class="panel-footer">
        <el-button type="primary" @click="guardar">{{accion}}</el-button>
        <el-button type="danger" v-if="usuario_id!=null" @click="limpiarCampos">Cancelar</el-button>
      </footer>
    </el-row>
    <br>
    <br>
    <el-row>
      <el-input placeholder="Please input" v-model="ruleUserForm.nombre"></el-input>
    </el-row>
    <el-table :data="usuariosTabla" style="width: 100%">
      <el-table-column prop="f009_nombre" label="Nombre" width="180" align="center"></el-table-column>
      <el-table-column prop="f009_documento" label="Documento" width="180" align="center"></el-table-column>
      <el-table-column prop="email" label="Email" width="180" align="center"></el-table-column>
      <el-table-column prop="f009_celular" label="Celular" width="180" align="center"></el-table-column>
      <el-table-column label="Opciones">
        <template slot-scope="scope">
          <el-button @click="editarUsuario(scope.row)" type="text" size="small">Editar</el-button>
          <el-button @click="borrarUsuario(scope.row)" type="text" size="small">Borrar</el-button>
        </template>
      </el-table-column>
    </el-table>
  </div>
</template>
<script>
export default {
  data(){
    return{
      ruleUserForm:{
        nombre:null,
        celular:null,
        tipo_docto:null,
        documento:null,
        email:null,
        password:null,
        password_confirmation:null,
        rol:null
      },
      rules:{
        nombre: [
            { required: true, message: 'Por favor ingrese el nombre', trigger: 'blur' },
          ],
        celular: [
            { required: true, message: 'Por favor ingrese el celular', trigger: 'blur' },
          ],
        email: [
            { required: true, message: 'Por favor ingrese el celular', trigger: 'blur' },
            { type: 'email', message: 'Por favor ingrese un email valido', trigger: ['blur', 'change'] }
          ],
        /*tipo_docto: [
            { type: 'array', required: true, message: 'Por favor selecciona un tipo de documento', trigger: 'change' }
          ],
        rol: [
            { type: 'array', required: true, message: 'Por favor selecciona un Rol', trigger: 'change' }
          ],*/


      },
      usuario_id:null,
      url_user:"/usuarios",
      foto:null,
      email_new:"",
      documento_new:"",
      accion: "Guardar",
      nombre: "",
      nombre_new: '',
      celular_new: "",
      tipo_docto_new: "",
      password_new: "",
      password_conf_new: "",
      usuariosTabla: [],
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
      rolesList: [],
      errores: false,
      msgErrores: []
    };
  },
  mounted() {
    console.log('Component mounted.');
    this.consultarRoles();
    this.consultarUsuarios();
  },
  watch: {
    nombre() {
      this.consultarUsuarios();
    },
    },
  methods: {
    guardar() {
        let usuario = {
          f009_nombre: this.ruleUserForm.nombre,
          f009_documento: this.ruleUserForm.documento,
          f009_tipo_documento: this.ruleUserForm.tipo_docto,
          f009_celular: this.ruleUserForm.celular,
          email: this.ruleUserForm.email,
          password: this.ruleUserForm.password_confirmation,
          password_confirmation:this.ruleUserForm.password,
          f009_id_rol: this.ruleUserForm.rol,
        };
        let form = new FormData();
        let keys = Object.keys(usuario)
        keys.forEach(key=>{
          form.append(key,usuario[key]);
        })
        form.append("file",this.foto)
        if (this.usuario_id != null) {
          console.log("Va a actualizar")
          this.actualizarUsuario(usuario,this.usuario_id)
        }else{
          console.warn("va a crear")
          this.guardarUsuario(form);
        }
      },
      actualizarUsuario(usuario, usuario_id) {
        axios
        .put("/api/usuarios/"+usuario_id, usuario)
        .then(res => {
            let msg = "Actualizó satisfactoriamente";
            console.log(msg);
            this.$message({
                message: msg,
                type: "success"
            });
            this.consultarUsuarios();
            this.limpiarCampos();
        })
        .catch(err => {
            let msg = "ocurrio un error al Actualizar";
            console.error(msg);
            console.error(err);
            this.$message({
                message: msg,
                type: "danger"
            });
            this.descripcion_new = "";
            this.estado_new = "";
        });
    },
    guardarFoto(user_id){
      this.url_user = "/usuarios/"+user_id;
      console.log("se va a llamar al metodo submit de la foto")
      this.$refs.subirFoto.submit();
      console.log("this.$refs.subirFoto: ",this.$refs.subirFoto)

    },
    guardarFotoUsuario(params){
      console.log("parametros: ",params)

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
    },
    guardarUsuario(usuario) {
      axios
        .post("/api/usuarios", usuario)
        .then(res => {
          let msg = "Guardo satisfactoriamente";
          console.log(msg);
          this.$message({
            message: msg,
            type: "success"
          });
          console.log("va a guardar el usuario: ",res)
          // this.guardarFoto(res.data.f009_id)
          this.consultarUsuarios();
          this.limpiarCampos();
        })
        .catch(err => {
          let errores = JSON.stringify(err.response.data)

          let msg = "ocurrio un error al guardar: " +  errores;
          console.error(msg);
          console.error(err);
          console.error("error.response: ",err.response);

          this.$message({
            message: msg,
            type: "danger"
          });
          this.nombre_new = "";
          this.descripcion_new = "";
        });
    },
    editarUsuario(usuario) {
        this.ruleUserForm.nombre = usuario.f009_nombre;
        this.ruleUserForm.celular = usuario.f009_celular;
        this.ruleUserForm.tipo_docto = usuario.f009_tipo_documento;
        this.ruleUserForm.documento = usuario.f009_documento;
        this.ruleUserForm.email = usuario.email;
        this.ruleUserForm.password = usuario.password;
        this.ruleUserForm.password_confirmation = usuario.password;
        this.ruleUserForm.rol =  usuario.f009_id_rol;
        this.usuario_id = usuario.f009_id;
        this.accion = "Actualizar";
    },
    limpiarCampos() {
        this.ruleUserForm.nombre = '';
        this.ruleUserForm.celular = "";
        this.ruleUserForm.tipo_docto = "";
        this.ruleUserForm.documento = "";
        this.ruleUserForm.email = "";
        this.ruleUserForm.password = "";
        this.ruleUserForm.password_confirmation = "";
        this.ruleUserForm.rol =  "";
        this.accion = "Guardar";
    },
    borrarUsuario(usuario) {
        axios
        .delete("/api/usuarios/" + usuario.f009_id)
        .then(res => {
            let mensaje = res.data.msg;
            console.log("borrar Usuario: ", mensaje);
            this.$message({
                message: mensaje,
                type: "success"
            });
            this.consultarUsuarios();
        })
        .catch(error => {
            console.error(error.data.msg);
        });
    },
    consultarUsuarios() {
      let buscar = this.nombre;
      let data = {
        params: {
          search: buscar
        }
      };
      axios
        .get("api/usuarios", data)
        .then(res => {
          this.usuariosTabla = res.data;
          console.log("llegaron los datos: ", res.data);
        })
        .catch(err => {
          console.error("Error al consultar la ruta");
          console.error(err);
        });
      }
  }
}
</script>

