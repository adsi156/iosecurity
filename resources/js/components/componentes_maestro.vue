<!--<template>
  <div>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-input label="descripcion" placeholder="Ingresa la descripcion del Componente" v-model="descripcion_new"></el-input>
      </el-col>
      <el-col :span="12">
        <el-input label="" placeholder="Ingresa la descripcion" v-model="descripcion_new" ></el-input>
      </el-col>
    </el-row>
    <br>
    <el-row :gutter="20">
      <el-col :span="12">
        <el-select v-model="sede_new" placeholder="Selecciona Sede">
          <el-option
            v-for="item in sedeList"
            :key="item.f004_id"
            :label="item.f004_nombre"
            :value="item.f004_nombre">
          </el-option>
        </el-select>
      </el-col>
      <el-col :span="12">
        <el-select v-model="sede_new" placeholder="Selecciona Sede">
          <el-option
            v-for="item in sedeList"
            :key="item.f004_id"
            :label="item.f004_nombre"
            :value="item.f004_nombre">
          </el-option>
        </el-select>
      </el-col>
    </el-row>
    <el-row>
      <br>
      <el-button type="primary" @click="guardar">{{accion}}</el-button>
      <el-button type="danger" v-if="ambiente_id!=null" @click="cancelar">Cancelar</el-button>
    </el-row>
    <br>
    <el-row>
      <el-input placeholder="Please input" v-model="nombre"></el-input>
    </el-row>
    <el-table :data="ambientesTabla" style="width: 100%">
      <el-table-column prop="f005_nombre" label="Nombre" width="180" align="center"></el-table-column>
      <el-table-column prop="f005_descripcion" label="Descripcion" width="180" align="center"></el-table-column>
      <el-table-column prop="f005_capacidad" label="Capacidad" width="180" align="center"></el-table-column>
      <el-table-column prop="f005_id_sede" label="Sede" width="180" align="center"></el-table-column>
      <el-table-column label="Opciones">
        <template slot-scope="scope">
          <el-button @click="editarAmbiente(scope.row)" type="text" size="small">Editar</el-button>
          <el-button @click="borrarAmbiente(scope.row)" type="text" size="small">Borrar</el-button>
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
      capacidad: "",
      ambientesTabla: [],
      nombre_new: "",
      descripcion_new: "",
      capacidad_new: 0,
      sede_new: "",
      ambiente_id: null,
      accion: "Guardar",
      sedeList: []
    };
  },
  mounted() {
      console.log('Component mounted.');
      this.consultarAmbientes();
      this.consultarSedes();
    },
  watch: {
    nombre() {
      this.consultarAmbientes();
    }
  },
  methods: {
    guardar() {
        let ambiente = {
            f005_nombre: this.nombre_new,
            f005_descripcion: this.descripcion_new,
            f005_capacidad: this.capacidad_new,
            f005_id_sede: this.sede_new
        };
        if (this.ambiente_id != null){
            console.log("Va a actualizar")
            this.actualizarAmbiente(ambiente, this.ambiente_id)
        }else{
            console.warn("Va a crear")
            this.guardarAmbiente(ambiente);
        }
    },
    guardarAmbiente(ambiente) {
        axios
            .post("/ambientes", ambiente)
            .then(res => {
                let msg = "Guardo satisfactoriamente";
                console.log(msg);
                this.$message({
                    message: msg,
                    type: "success"
                });
                this.consultarAmbientes();
                this.consultarSedes();
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
                this.capacidad_new = 0;
                this.sede_new = "";
            });
    },
    actualizarAmbiente(ambiente, ambiente_id) {
        axios
        .put("/ambientes/"+ambiente_id, ambiente)
        .then(res => {
            let msg = "Actualizó satisfactoriamente";
            console.log(msg);
            this.$message({
                message: msg,
                type: "success"
            });
            this.consultarAmbientes();
            this.consultarSedes();
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
            this.capacidad_new = 0;
            this.sede_new = "";
        });
    },
    cancelar() {
        this.nombre_new = "";
        this.descripcion_new = "";
        this.capacidad_new = 0;
        this.sede_new = "";
        this.ambiente_id = null;
        this.accion = "Guardar";
    },
    editarAmbiente(ambiente) {
        this.nombre_new = ambiente.f005_nombre;
        this.descripcion_new = ambiente.f005_descripcion;
        this.capacidad_new = ambiente.f005_capacidad;
        this.sede_new = ambiente.f005_id_sede;
        this.ambiente_id = ambiente.f005_id;
        this.accion = "Actualizar";
    },
    borrarAmbiente(ambiente) {
        axios
        .delete("/ambientes/" + ambiente.f005_id)
        .then(res => {
            let mensaje = res.data.msg;
            console.log("borrarAmbiente: ", mensaje);
            this.$message({
                message: mensaje,
                type: "success"
            });
            this.consultarAmbientes();
            this.consultarSedes();
        })
        .catch(error => {
            console.error(error.data.msg);
        });
    },
    handleClick(ambiente) {
        console.log("Se dio clic en el ambiente: ", ambiente);
    },
    handleChange(value) {
        console.log(value)
    },
    consultarSedes() {
      let data = {};
      axios
      .get("/sedes", data)
      .then(res => {
        this.sedeList = res.data;
        console.log("llegaron los datos: ", res.data);
        })
        .catch(err => {
          console.error("Error al consultar la ruta");
          console.error(err);
        });
      },
    consultarAmbientes() {
      let buscar = this.nombre;
      let data = {
        params: {
          search: buscar
        }
      };
      axios
        .get("/ambientes", data)
        .then(res => {
          this.ambientesTabla = res.data;
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