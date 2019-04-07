<template>
  <div>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-input label="nombre" placeholder="Ingresa el nombre de Configuración" v-model="nombre_new"></el-input>
      </el-col>
      <el-col :span="12">
        <el-input label="descripcion" placeholder="Ingresa la descripcion de Configuración" v-model="descripcion_new"></el-input>
      </el-col>      
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="12">
        Indicar estado inicial de la Configuración:
        <br>
        <br>
        <el-switch
          style="display: block"
          v-model="valor_new"
          active-color="#13ce66"
          inactive-color="#ff4949"
          active-text="Activa"
          inactive-text="Inactiva">
        </el-switch>
      </el-col>
      <el-col :span="12">
        Seleccionar temperatura deseada, en caso de configuraciones para componentes tipo Aire Acondicionado:
        <br>
        <el-input-number v-model="temp_new" controls-position="right" @change="handleChange" :min="17" :max="28" :disabled="true"></el-input-number>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-select v-model="componente_new" placeholder="Componente a Configurar">
          <el-option
            v-for="item in componenteList"
            :key="item.f003_id"
            :label="item.f003_descripcion"
            :value="item.f003_id">
          </el-option>
        </el-select>
      </el-col>
    </el-row>
    <el-row>
      <br>
      <el-button type="primary" @click="guardar">{{accion}}</el-button>
      <el-button type="danger" v-if="config_id!=null" @click="cancelar">Cancelar</el-button>
    </el-row>
    <br>
    <el-row>
      <el-input placeholder="Please input" v-model="nombre"></el-input>
    </el-row>
    <el-table :data="configuracionTabla" style="width: 100%">
      <el-table-column prop="f007_nombre" label="Nombre" width="200" align="center"></el-table-column>
      <el-table-column prop="f007_descripcion" label="Descripcion" width="180" align="center"></el-table-column>
      <el-table-column prop="f007_valor_on_off" label="Valor" width="180" align="center"></el-table-column>
      <el-table-column prop="f007_valor_temp" label="Temperatura" width="180" align="center"></el-table-column>
      <el-table-column prop="f007_id_componente" label="Componente" width="180" align="center"></el-table-column>
      <el-table-column label="Opciones">
        <template slot-scope="scope">
          <el-button @click="editarConfiguracion(scope.row)" type="text" size="small">Editar</el-button>
          <el-button @click="borrarConfiguracion(scope.row)" type="text" size="small">Borrar</el-button>
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
      valor: "",
      temperatura: "",
      configuracionTabla: [],
      nombre_new: "",
      descripcion_new: "",
      valor_new: true,
      temp_new: 0,
      componente_new: "",
      config_id: null,
      accion: "Guardar",
      componenteList: []
    };
  },
  mounted() {
      console.log('Component mounted.');
      this.consultarConfiguracion();
      this.consultarComponentes();
    },
  watch: {
    nombre() {
      this.consultarConfiguracion();
    }
  },
  methods: {
    guardar() {
        let configuracion = {
            f007_nombre: this.nombre_new,
            f007_descripcion: this.descripcion_new,
            f007_valor_on_off: this.valor_new,
            f007_valor_temp: this.temp_new,
            f007_id_componente: this.componente_new
        };
        if (this.config_id != null){
            console.log("Va a actualizar")
            this.actualizarConfiguracion(configuracion, this.config_id)
        }else{
            console.warn("Va a crear")
            this.guardarConfiguracion(configuracion);
        }
    },
    guardarConfiguracion(configuracion) {
        axios
            .post("/configcomponentes", configuracion)
            .then(res => {
                let msg = "Guardo satisfactoriamente";
                console.log(msg);
                this.$message({
                    message: msg,
                    type: "success"
                });
                this.consultarConfiguracion();
            })
            .catch(err => {
                let msg = "Ocurrio un error al guardar";
                console.error(msg);
                console.error(err);
                this.$message({
                    message: msg,
                    type: "danger"
                });
                this.nombre_new = "";
                this.descripcion_new = "";
                this.valor_new = "";
                this.temp_new = 0;
            });
    },
    actualizarConfiguracion(configuracion, config_id) {
        axios
        .put("/configcomponentes/"+config_id, configuracion)
        .then(res => {
            let msg = "Actualizó satisfactoriamente";
            console.log(msg);
            this.$message({
                message: msg,
                type: "success"
            });
            this.consultarConfiguracion();
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
            this.valor_new = "";
            this.temp_new = 0;
        });
    },
    cancelar() {
        this.nombre_new = "";
        this.descripcion_new = "";
        this.valor_new = "";
        this.temp_new = 0;
        this.config_id = null;
        this.accion = "Guardar";
    },
    editarConfiguracion(configuracion) {
        this.nombre_new = configuracion.f007_nombre;
        this.descripcion_new = configuracion.f007_descripcion;
        this.valor_new = configuracion.f007_valor_on_off;
        this.temp_new = configuracion.f007_valor_temp;
        this.config_id = configuracion.f007_id;
        this.accion = "Actualizar";
    },
    borrarConfiguracion(configuracion) {
        axios
        .delete("/configcomponentes/" + configuracion.f007_id)
        .then(res => {
            let mensaje = res.data.msg;
            console.log("borrarConfiguracion: ", mensaje);
            this.$message({
                message: mensaje,
                type: "success"
            });
            this.consultarConfiguracion();
        })
        .catch(error => {
            console.error(error.data.msg);
        });
    },
    handleClick(configuracion) {
        console.log("Se dio clic en la configuracion: ", configuracion);
    },
    handleChange(value) {
        console.log(value)
    },
    consultarComponentes() {
      let data = {};
      axios
      .get("/componentes", data)
      .then(res => {
        this.componenteList = res.data;
        console.log("llegaron los datos: ", res.data);
        })
        .catch(err => {
          console.error("Error al consultar la ruta");
          console.error(err);
        });
      },
    consultarConfiguracion() {
      let buscar = this.nombre;
      let data = {
        params: {
          search: buscar
        }
      };
      axios
        .get("/configcomponentes", data)
        .then(res => {
          this.configuracionTabla = res.data;
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