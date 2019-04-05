<template>
  <div>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-input label="descripcion" placeholder="Ingresa la descripcion del Componente" v-model="descripcion_new"></el-input>
      </el-col>
      <el-col :span="12">
        <el-switch
          style="display: block"
          v-model="estado_new"
          active-color="#13ce66"
          inactive-color="#ff4949"
          active-text="Encendido"
          inactive-text="Apagado">
        </el-switch>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-select v-model="tipo_new" placeholder="Tipo de Componente">
          <el-option
            v-for="item in tipoList"
            :key="item.f002_id"
            :label="item.f002_descripcion"
            :value="item.f002_id">
          </el-option>
        </el-select>
      </el-col>
      <el-col :span="12">
        <el-select v-model="ambiente_new" placeholder="Ambiente al que pertenece">
          <el-option
            v-for="item in ambienteList"
            :key="item.f005_id"
            :label="item.f005_nombre"
            :value="item.f005_id">
          </el-option>
        </el-select>
      </el-col>
    </el-row>
    <el-row>
      <br>
      <el-button type="primary" @click="guardar">{{accion}}</el-button>
      <el-button type="danger" v-if="componente_id!=null" @click="cancelar">Cancelar</el-button>
    </el-row>
    <br>
    <el-row>
      <el-input placeholder="Please input" v-model="nombre"></el-input>
    </el-row>
    <el-table :data="componentesTabla" style="width: 100%">
      <el-table-column prop="f003_descripcion" label="Descripcion" width="180" align="center"></el-table-column>
      <el-table-column prop="f003_ind_estado" label="Estado" width="180" align="center"></el-table-column>
      <el-table-column prop="f003_id_tipo_componente" label="Tipo" width="180" align="center"></el-table-column>
      <el-table-column prop="f003_id_ambiente" label="Ambiente" width="180" align="center"></el-table-column>
      <el-table-column label="Opciones">
        <template slot-scope="scope">
          <el-button @click="editarComponente(scope.row)" type="text" size="small">Editar</el-button>
          <el-button @click="borrarComponente(scope.row)" type="text" size="small">Borrar</el-button>
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
      estado: "",
      componentesTabla: [],
      descripcion_new: "",
      estado_new: true,
      tipo_new: "",
      ambiente_new: "",
      componente_id: null,
      accion: "Guardar",
      tipoList: [],
      ambienteList: []
    };
  },
  mounted() {
      console.log('Component mounted.');
      this.consultarComponentes();
      this.consultarAmbientes();
      this.consultarTipos();
    },
  watch: {
    nombre() {
      this.consultarComponentes();
    }
  },
  methods: {
    guardar() {
        let componente = {
            f003_descripcion: this.descripcion_new,
            f003_ind_estado: this.estado_new,
            f003_id_tipo_componente: this.tipo_new,
            f003_id_ambiente: this.ambiente_new
        };
        if (this.componente_id != null){
            console.log("Va a actualizar")
            this.actualizarComponente(componente, this.componente_id)
        }else{
            console.warn("Va a crear")
            this.guardarComponente(componente);
        }
    },
    guardarComponente(componente) {
        axios
            .post("/componentes", componente)
            .then(res => {
                let msg = "Guardo satisfactoriamente";
                console.log(msg);
                this.$message({
                    message: msg,
                    type: "success"
                });
                this.consultarComponentes();
            })
            .catch(err => {
                let msg = "Ocurrio un error al guardar";
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
    actualizarComponente(componente, componente_id) {
        axios
        .put("/componentes/"+componente_id, componente)
        .then(res => {
            let msg = "Actualizó satisfactoriamente";
            console.log(msg);
            this.$message({
                message: msg,
                type: "success"
            });
            this.consultarComponentes();
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
            this.descripcion_new = "";
            this.estado_new = "";
        });
    },
    cancelar() {
        this.descripcion_new = "";
        this.estado_new = "";
        this.componente_id = null;
        this.accion = "Guardar";
    },
    editarComponente(componente) {
        this.descripcion_new = componente.f003_descripcion;
        this.estado_new = componente.f003_ind_estado;
        this.componente_id = componente.f003_id;
        this.accion = "Actualizar";
    },
    borrarComponente(componente) {
        axios
        .delete("/componentes/" + componente.f003_id)
        .then(res => {
            let mensaje = res.data.msg;
            console.log("borrarComponente: ", mensaje);
            this.$message({
                message: mensaje,
                type: "success"
            });
            this.consultarComponentes();
        })
        .catch(error => {
            console.error(error.data.msg);
        });
    },
    handleClick(componente) {
        console.log("Se dio clic en el componente: ", componente);
    },
    handleChange(value) {
        console.log(value)
    },
    consultarTipos() {
      let data = {};
      axios
      .get("/tipoComponente", data)
      .then(res => {
        this.tipoList = res.data;
        console.log("llegaron los datos: ", res.data);
        })
        .catch(err => {
          console.error("Error al consultar la ruta");
          console.error(err);
        });
      },
    consultarAmbientes() {
      let data = {};
      axios
      .get("/ambientes", data)
      .then(res => {
        this.ambienteList = res.data;
        console.log("llegaron los datos: ", res.data);
        })
        .catch(err => {
          console.error("Error al consultar la ruta");
          console.error(err);
        });
      },
    consultarComponentes() {
      let buscar = this.nombre;
      let data = {
        params: {
          search: buscar
        }
      };
      axios
        .get("/componentes", data)
        .then(res => {
          this.componentesTabla = res.data;
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